<?php

namespace App\Filament\Resources\WikiDomainResource\Pages;

use App\Filament\Resources\WikiDomainResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWikiDomain extends EditRecord
{
    protected static string $resource = WikiDomainResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
