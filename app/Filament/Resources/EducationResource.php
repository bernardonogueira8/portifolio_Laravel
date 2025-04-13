<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Education;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\EducationResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EducationResource\RelationManagers;

class EducationResource extends Resource
{
    protected static ?string $model = Education::class;
    protected static ?string $modelLabel = 'Artigo';
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-academic-cap';
    }
    public static function getNavigationLabel(): string
    {
        return 'Educação e Experiencia';
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informações Pessoais')
                    ->description('Espaço para criar os componentes para sobre-mim')
                    ->schema([
                        Forms\Components\Select::make('type')
                            ->label('Tipo de Experiência')
                            ->options([
                                'education' => 'Acadêmico',
                                'working' => 'Profissional',
                            ])
                            ->default('education')
                            ->required()
                            ->reactive()
                            ->columnSpanFull(),
                        Fieldset::make('Label')
                            ->schema([
                                // Grupo: Experiência Profissional
                                Forms\Components\Group::make([
                                    Forms\Components\Grid::make(2)
                                        ->schema([
                                            Forms\Components\TextInput::make('name')
                                                ->label('Empresa')
                                                ->required(),
                                            Forms\Components\TextInput::make('sub_name')
                                                ->label('Cargo')
                                                ->required(),
                                        ]),

                                    Forms\Components\Grid::make(2)
                                        ->schema([
                                            Forms\Components\TextInput::make('city')
                                                ->label('Cidade'),
                                            Forms\Components\TextInput::make('country')
                                                ->label('País'),
                                        ]),
                                ])->columnSpan(2)
                                    ->visible(fn(callable $get) => $get('type') === 'working'),

                                // Grupo: Formação Acadêmica
                                Forms\Components\Group::make([
                                    Forms\Components\Grid::make(2)
                                        ->schema([
                                            Forms\Components\TextInput::make('name')
                                                ->label('Instituição de Ensino')
                                                ->required(),
                                            Forms\Components\TextInput::make('sub_name')
                                                ->label('Curso / Grau'),
                                        ]),

                                    Forms\Components\Grid::make(2)
                                        ->schema([
                                            Forms\Components\TextInput::make('city')
                                                ->label('Cidade'),
                                            Forms\Components\TextInput::make('country')
                                                ->label('País'),
                                        ]),
                                ])->columnSpan(2)
                                    ->visible(fn(callable $get) => $get('type') === 'education'),
                                // Link
                                FileUpload::make('url')
                                    ->label('Arquivos (Certificado, etc.)'),
                            ])
                            ->columns(3),


                        // Datas
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\DatePicker::make('date_start')
                                    ->label('Data de Início')
                                    ->displayFormat('m/Y')
                                    ->native(false)
                                    ->required(),

                                Forms\Components\DatePicker::make('date_end')
                                    ->label('Data de Término')
                                    ->displayFormat('m/Y')
                                    ->native(false),
                            ]),

                        // Descrição
                        Forms\Components\Textarea::make('description')
                            ->label('Descrição das Atividades / Experiências')
                            ->rows(4)
                            ->columnSpanFull(),

                    ])
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')
                    ->label('Tipo')
                    ->formatStateUsing(fn(string $state) => $state === 'education' ? 'Acadêmico' : 'Profissional')
                    ->badge()
                    ->color(fn(string $state) => $state === 'education' ? 'info' : 'success')
                    ->sortable(),
                // Nome da instituição (empresa ou escola)
                Tables\Columns\TextColumn::make('name')
                    ->label('Empresa/Instituição')
                    ->searchable(),

                Tables\Columns\TextColumn::make('sub_name')
                    ->label('Cargo/Curso')
                    ->searchable(),

                // Localização
                Tables\Columns\TextColumn::make('city')
                    ->label('Cidade')
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('country')
                    ->label('País')
                    ->searchable()
                    ->toggleable(),

                // Datas formatadas
                Tables\Columns\TextColumn::make('date_start')
                    ->label('Início')
                    ->date('m/Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('date_end')
                    ->label('Término')
                    ->date('m/Y')
                    ->sortable()
                    ->toggleable(),
            ])
            ->defaultSort('date_start', 'desc')
            ->filters([
                SelectFilter::make('type')
                    ->label('Tipo')
                    ->multiple()
                    ->options([
                        'education' => 'Acadêmico',
                        'working' => 'Profissional',
                    ]),
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
            'index' => Pages\ListEducation::route('/'),
            'create' => Pages\CreateEducation::route('/create'),
            'view' => Pages\ViewEducation::route('/{record}'),
            'edit' => Pages\EditEducation::route('/{record}/edit'),
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
