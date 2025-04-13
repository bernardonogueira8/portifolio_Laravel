<?php

namespace App\Filament\Resources\InteressesResource\Pages;

use App\Filament\Resources\InteressesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInteresses extends EditRecord
{
    protected static string $resource = InteressesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
