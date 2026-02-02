<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VirtualAirlineResource\Pages;
use App\Filament\Resources\VirtualAirlineResource\RelationManagers;
use App\Models\VirtualAirline;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VirtualAirlineResource extends Resource
{
    protected static ?string $model = VirtualAirline::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\FileUpload::make('logo_path')->image()->label('Upload Logo'),
                Forms\Components\TextInput::make('logo_url')->url()->label('Or Logo Link (URL)')->placeholder('https://example.com/logo.png'),
                Forms\Components\TextInput::make('website_url')->url(),
                Forms\Components\TagsInput::make('hubs'),
                Forms\Components\TagsInput::make('aircraft'),
                Forms\Components\Toggle::make('is_active')->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo_path'),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
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
            'index' => Pages\ListVirtualAirlines::route('/'),
            'create' => Pages\CreateVirtualAirline::route('/create'),
            'edit' => Pages\EditVirtualAirline::route('/{record}/edit'),
        ];
    }
}
