<?php

namespace App\Filament\Resources\VirtualAirlineResource\Pages;

use App\Filament\Resources\VirtualAirlineResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVirtualAirlines extends ListRecords
{
    protected static string $resource = VirtualAirlineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
