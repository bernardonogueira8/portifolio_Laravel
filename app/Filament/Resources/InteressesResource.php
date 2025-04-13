<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Interesses;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TrashedFilter;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\InteressesResource\Pages;
use App\Filament\Resources\InteressesResource\RelationManagers;

class InteressesResource extends Resource
{
    protected static ?string $model = Interesses::class;

    protected static ?string $modelLabel = 'Interesses';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-briefcase';
    }
    public static function getNavigationLabel(): string
    {
        return 'Gerenciar Interesses';
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Estudos e Scripts')
                    ->description('Estudo de Caso e material de aulas')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->label('Nome')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('url')
                            ->required()
                            ->label('Link')
                            ->suffixIcon('heroicon-m-globe-alt')
                            ->url(),

                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->label('Descrição')
                            ->columnSpanFull(),
                        Forms\Components\DatePicker::make('date_start')
                            ->label('Data de Inicio')
                            ->displayFormat('m/Y')
                            ->native(false)
                            ->required(),
                        Forms\Components\DatePicker::make('date_end')
                            ->label('Data de Término')
                            ->displayFormat('m/Y')
                            ->native(false),
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_start')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_end')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListInteresses::route('/'),
            'create' => Pages\CreateInteresses::route('/create'),
            'view' => Pages\ViewInteresses::route('/{record}'),
            'edit' => Pages\EditInteresses::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
