<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Project;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProjectResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProjectResource\RelationManagers;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $modelLabel = 'Projeto';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-cube';
    }
    public static function getNavigationLabel(): string
    {
        return 'Gerenciador de Projetos';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informações do Card')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nome')
                                    ->required()
                                    ->maxLength(35)
                                    ->columnSpan(1),

                                Select::make('type')
                                    ->label('Tipo do Projeto')
                                    ->relationship(name: 'lang', titleAttribute: 'name')
                                    ->createOptionForm(
                                        [
                                            Forms\Components\TextInput::make('name')
                                                ->label('Tipo de Projeto/Linguagem')
                                                ->required()
                                                ->maxLength(255),
                                        ]
                                    )
                                    ->required()
                                    ->columnSpan(1),
                            ]),

                        Textarea::make('description')
                            ->label('Descrição')
                            ->required()
                            ->maxLength(150)
                            ->columnSpanFull(),

                        TextInput::make('url')
                            ->label('URL')
                            ->url()
                            ->required()
                            ->columnSpanFull(),

                        FileUpload::make('image_path')
                            ->label('Imagem do projeto')
                            ->image()
                            ->disk('s3')  // Define o disco, podendo ser "public" ou outro disco configurado.
                            ->directory('projects')
                            // ->required()
                            ->columnSpanFull(),

                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'view' => Pages\ViewProject::route('/{record}'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
