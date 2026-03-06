<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WikiManualResource\Pages;
use App\Filament\Resources\WikiManualResource\RelationManagers;
use App\Models\WikiManual;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WikiManualResource extends Resource
{
    protected static ?string $model = WikiManual::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationGroup = 'Wiki Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('domain_id')
                    ->relationship('domain', 'slug')
                    ->getOptionLabelFromRecordUsing(fn($record) => $record->name['en'] ?? $record->name['fr'] ?? $record->slug)
                    ->required()
                    ->label('Domain'),
                Forms\Components\TextInput::make('name.en')->required()->label('Name (EN)'),
                Forms\Components\TextInput::make('name.fr')->required()->label('Name (FR)'),
                Forms\Components\TextInput::make('slug')->required()->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('image_url')->url()->label('Image URL'),
                Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
                Forms\Components\Textarea::make('description.en')->label('Description (EN)'),
                Forms\Components\Textarea::make('description.fr')->label('Description (FR)'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('domain.slug')
                    ->label('Domain')
                    ->formatStateUsing(fn($record) => $record->domain->name['en'] ?? $record->domain->slug)
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name.en')->label('Name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('sort_order')->sortable(),
            ])
            ->defaultSort('sort_order')
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
            'index' => Pages\ListWikiManuals::route('/'),
            'create' => Pages\CreateWikiManual::route('/create'),
            'edit' => Pages\EditWikiManual::route('/{record}/edit'),
        ];
    }
}
