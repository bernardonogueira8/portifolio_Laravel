<?php

namespace App\Livewire;

use Filament\Forms;
use Livewire\Component;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Forms\Concerns\InteractsWithForms;
use Joaopaulolndev\FilamentEditProfile\Concerns\HasSort;

class ProfileComponent extends Component implements HasForms
{
    use InteractsWithForms;
    use HasSort;

    public ?array $data = [];

    protected static int $sort = 0;

    public function mount(): void
    {
        $this->form->fill(
            Auth::user()->only([
                'name',
                'email',
                'username',
                'subtitle',
                'resume',
                'bio'
            ])
        );
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informações do Perfil')
                    ->aside()
                    ->description('Atualize as informações do seu perfil e endereço de e-mail.')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nome Completo')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('email')
                            ->label('E-mail')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),

                        Forms\Components\TextInput::make('username')
                            ->label('Nome de Usuário')
                            ->placeholder('ex: bernardo.dev')
                            ->required()
                            ->maxLength(255)
                            ->unique(table: 'users', column: 'username', ignoreRecord: true),

                        Forms\Components\TextInput::make('subtitle')
                            ->label('Subtítulo')
                            ->placeholder('ex: Desenvolvedor Laravel & Filament')
                            ->maxLength(255),
                        Forms\Components\Textarea::make('resume')
                            ->label('Resumo')
                            ->placeholder('ex: Gosto de bolo e coca cola')
                            ->maxLength(60)
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('bio')
                            ->label('Bio')
                            ->placeholder('ex: Espaço para falar mais sobre mim')
                            ->autosize()
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ])
            ->model(Auth::user())
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $user = Auth::user();
        $user->update($data);

        Notification::make()
            ->title('Perfil atualizado com sucesso!')
            ->success()
            ->duration(3000) // opcional: duração em milissegundos
            ->send();
    }

    public function render(): View
    {
        return view('livewire.profile-component');
    }
}
