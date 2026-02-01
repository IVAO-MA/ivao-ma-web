<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WikiArticleResource\Pages;
use App\Filament\Resources\WikiArticleResource\RelationManagers;
use App\Models\WikiArticle;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WikiArticleResource extends Resource
{
    protected static ?string $model = WikiArticle::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title.en')->label('Title (EN)')->required(),
                Forms\Components\TextInput::make('title.fr')->label('Title (FR)')->required(),
                Forms\Components\TextInput::make('slug')->required()->unique(ignoreRecord: true),
                Forms\Components\RichEditor::make('content.en')->label('Content (EN)')->columnSpanFull(),
                Forms\Components\RichEditor::make('content.fr')->label('Content (FR)')->columnSpanFull(),
                Forms\Components\Toggle::make('is_published'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title.en')->searchable(),
                Tables\Columns\IconColumn::make('is_published')->boolean(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWikiArticles::route('/'),
            'create' => Pages\CreateWikiArticle::route('/create'),
            'edit' => Pages\EditWikiArticle::route('/{record}/edit'),
        ];
    }
}
