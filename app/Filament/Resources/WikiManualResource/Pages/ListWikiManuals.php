<?php

namespace App\Filament\Resources\WikiManualResource\Pages;

use App\Filament\Resources\WikiManualResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWikiManuals extends ListRecords
{
    protected static string $resource = WikiManualResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
