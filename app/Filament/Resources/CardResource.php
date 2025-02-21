<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Card;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CardResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CardResource\RelationManagers;

class CardResource extends Resource
{
    protected static ?string $model = Card::class;

    protected static ?string $modelLabel = 'Card';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    protected static ?string $navigationIcon = 'heroicon-o-bookmark';

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-bookmark';
    }
    public static function getNavigationLabel(): string
    {
        return 'Lista de Cards';
    }
    public static function getNavigationGroup(): ?string
    {
        return 'Cadastro Básico';
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informações do Card')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('nome')
                                    ->label('Nome')
                                    ->required()
                                    ->maxLength(35)
                                    ->columnSpan(1),

                                Select::make('tipo')
                                    ->label('Tipo')
                                    ->options([
                                        'dashboard' => 'Dashboard',
                                        'ferramenta' => 'Ferramenta',
                                    ])
                                    ->required()
                                    ->default('dashboard')
                                    ->columnSpan(1),
                            ]),

                        Textarea::make('descricao')
                            ->label('Descrição')
                            ->required()
                            ->maxLength(150)
                            ->columnSpanFull(),

                        TextInput::make('link')
                            ->label('Link')
                            ->url()
                            ->required()
                            ->columnSpanFull(),

                        FileUpload::make('imagem')
                            ->label('Imagem do Card')
                            ->image()
                            ->directory('cards')
                            ->required()
                            ->columnSpanFull(),
                    ]),

            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('imagem')
                    ->circular() // Deixa a imagem arredondada
                    ->size(50), // Define um tamanho fixo para manter a consistência

                TextColumn::make('nome')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('descricao')
                    ->limit(50)
                    ->label('Descrição'),

                IconColumn::make('tipo')
                    ->label('Tipo')
                    ->icon(fn(string $state): string => match ($state) {
                        'ferramenta' => 'heroicon-o-wrench',
                        'dashboard' => 'heroicon-o-presentation-chart-bar',
                    })
                    ->color(fn(string $state): string => match ($state) {
                        'ferramenta' => 'danger',
                        'dashboard' => 'success',
                        default => 'gray',
                    }),
                IconColumn::make('link')
                    ->label('Acessar') // Nome mais intuitivo
                    ->icon('heroicon-o-link') // Ícone de link
                    ->color('primary') // Cor azul para destacar
                    ->url(fn($record) => $record->link, true), // Torna o ícone clicável e abre em nova aba

            ])

            ->filters([
                SelectFilter::make('tipo')
                    ->label('Tipo')
                    ->options([
                        'dashboard' => 'Dashboard',
                        'ferramenta' => 'Ferramenta',
                    ])
                    ->default(null)
                    ->placeholder('Todos'),
            ])
            ->filtersTriggerAction(
                fn(Action $action) => $action
                    ->button()
                    ->label('Filtrar')
                    ->icon('heroicon-o-funnel')
                    ->color('primary')
            )


            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCards::route('/'),
            'create' => Pages\CreateCard::route('/create'),
            'edit' => Pages\EditCard::route('/{record}/edit'),
        ];
    }
}
