<?php

namespace App\Livewire\Contacts;

use Filament\Forms;
use App\Models\Contact;
use Livewire\Component;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;

class CreateContact extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];
    public bool $sent = false;
    public string $name = '';
    public string $email = '';
    public string $message = '';

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('_nome')
                    ->required()
                    ->live()
                    ->lazy()
                    ->afterStateUpdated(fn($state) => $this->name = $state),
                TextInput::make('email')
                    ->label('_email')
                    ->email()
                    ->required()
                    ->live()
                    ->lazy()
                    ->afterStateUpdated(fn($state) => $this->email = $state),
                Textarea::make('message')
                    ->label('_mensagem')
                    ->required()
                    ->live()
                    ->lazy()
                    ->afterStateUpdated(fn($state) => $this->message = $state),
            ])
            ->statePath('data')
            ->model(Contact::class);
    }

    public function create(): void
    {
        $data = $this->form->getState();

        $record = Contact::create($data);
        $this->form->model($record)->saveRelationships();

        $this->sent = true;
        $this->dispatch('message-sent');

        // Importante: manter os dados visíveis para o template JS
        $this->data = $data;
    }

    public function render(): View
    {
        return view('livewire.contacts.create-contact');
    }
}
