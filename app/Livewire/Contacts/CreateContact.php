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
                    ->columnSpanFull()
                    ->required(),
                TextInput::make('email')
                    ->label('_email')
                    ->email()
                    ->columnSpanFull()
                    ->required(),
                Textarea::make('message')
                    ->label('_mensagem')
                    ->columnSpanFull()
                    ->required(),
            ])
            ->statePath('data')
            ->model(Contact::class);
    }

    public function create(): void
    {
        $data = $this->form->getState();
        $record = Contact::create($data);
        $this->form->model($record)->saveRelationships();

        $this->sent = true; // exibe mensagem de agradecimento
        $this->dispatch('message-sent'); // Livewire v3
        $this->form->fill([]);
    }

    public function render(): View
    {
        return view('livewire.contacts.create-contact');
    }
}
