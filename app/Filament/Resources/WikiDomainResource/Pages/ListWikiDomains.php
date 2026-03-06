<?php

namespace App\Filament\Resources\WikiDomainResource\Pages;

use App\Filament\Resources\WikiDomainResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWikiDomains extends ListRecords
{
    protected static string $resource = WikiDomainResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
