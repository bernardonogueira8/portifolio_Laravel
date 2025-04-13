<?php

namespace App\Filament\Resources\InteressesResource\Pages;

use App\Filament\Resources\InteressesResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewInteresses extends ViewRecord
{
    protected static string $resource = InteressesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
