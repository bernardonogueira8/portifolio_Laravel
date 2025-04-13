<?php

namespace App\Livewire;

use Filament\Forms;
use Livewire\Component;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Concerns\InteractsWithForms;
use Joaopaulolndev\FilamentEditProfile\Concerns\HasSort;

class SocialMediaComponent extends Component implements HasForms
{
    use InteractsWithForms;
    use HasSort;

    public ?array $data = [];

    protected static int $sort = 1;

    public function mount(): void
    {
        $this->form->fill(
            Auth::user()->only([
                'social_media',
            ])
        );
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Redes Sociais')
                    ->description('Atualize os links para suas redes sociais. Essas informações podem ser exibidas publicamente no seu portfólio.')
                    ->aside()
                    ->schema([
                        TextInput::make('social_media.github')
                            ->label('GitHub')
                            ->placeholder('https://github.com/seuusuario'),
                        TextInput::make('social_media.linkedin')
                            ->label('LinkedIn')
                            ->placeholder('https://linkedin.com/in/seuusuario'),
                        TextInput::make('social_media.youtube')
                            ->label('YouTube')
                            ->placeholder('https://youtube.com/@seuusuario'),
                        TextInput::make('social_media.instagram')
                            ->label('Instagram')
                            ->placeholder('https://instagram.com/seuusuario'),
                        TextInput::make('social_media.medium')
                            ->label('Medium')
                            ->placeholder('https://medium.com/@seuusuario'),
                        TextInput::make('social_media.moodle')
                            ->label('Moodle')
                            ->placeholder('https://moodle.com/seuusuario'),
                    ]),
            ])
            ->model(Auth::user())
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        Auth::user()->update([
            'social_media' => array_merge(Auth::user()->social_media ?? [], $data['social_media'] ?? []),
        ]);
        Notification::make()
            ->title('Redes sociais atualizadas com sucesso.')
            ->success()
            ->duration(3000) // opcional: duração em milissegundos
            ->send();
    }

    public function render(): View
    {
        return view('livewire.social-media-component');
    }
}
