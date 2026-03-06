<?php

namespace App\Filament\Resources\WikiManualResource\Pages;

use App\Filament\Resources\WikiManualResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWikiManual extends EditRecord
{
    protected static string $resource = WikiManualResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
