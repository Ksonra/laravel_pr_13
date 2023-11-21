<?php

namespace App\Filament\Resources\MaintextResource\Pages;

use App\Filament\Resources\MaintextResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMaintexts extends ListRecords
{
    protected static string $resource = MaintextResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
