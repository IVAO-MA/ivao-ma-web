<?php

namespace App\Filament\Resources\VirtualAirlineResource\Pages;

use App\Filament\Resources\VirtualAirlineResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVirtualAirline extends EditRecord
{
    protected static string $resource = VirtualAirlineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
