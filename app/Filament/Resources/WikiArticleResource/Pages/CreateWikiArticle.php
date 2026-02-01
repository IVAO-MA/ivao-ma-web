<?php

namespace App\Filament\Resources\WikiArticleResource\Pages;

use App\Filament\Resources\WikiArticleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWikiArticle extends CreateRecord
{
    protected static string $resource = WikiArticleResource::class;
}
