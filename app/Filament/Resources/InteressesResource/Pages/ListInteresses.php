<?php

namespace App\Filament\Resources\InteressesResource\Pages;

use App\Filament\Resources\InteressesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInteresses extends ListRecords
{
    protected static string $resource = InteressesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
