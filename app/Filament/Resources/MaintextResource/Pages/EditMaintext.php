<?php

namespace App\Filament\Resources\MaintextResource\Pages;

use App\Filament\Resources\MaintextResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMaintext extends EditRecord
{
    protected static string $resource = MaintextResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
