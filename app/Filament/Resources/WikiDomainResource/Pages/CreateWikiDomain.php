<?php

namespace App\Filament\Resources\WikiDomainResource\Pages;

use App\Filament\Resources\WikiDomainResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWikiDomain extends CreateRecord
{
    protected static string $resource = WikiDomainResource::class;
}
