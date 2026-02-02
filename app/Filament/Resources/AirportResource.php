<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AirportResource\Pages;
use App\Filament\Resources\AirportResource\RelationManagers;
use App\Models\Airport;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AirportResource extends Resource
{
    protected static ?string $model = Airport::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('icao')->required()->maxLength(4),
                Forms\Components\TextInput::make('name.en')->label('Name (EN)'),
                Forms\Components\TextInput::make('name.fr')->label('Name (FR)'),
                Forms\Components\TextInput::make('city.en')->label('City (EN)'),
                Forms\Components\TextInput::make('city.fr')->label('City (FR)'),
                Forms\Components\FileUpload::make('picture_path')->image()->directory('airports')->columnSpanFull(),
                Forms\Components\TextInput::make('scenery_link')->url()->label('Scenery Link')->prefixIcon('heroicon-m-link'),
                Forms\Components\TextInput::make('charts_link')->url()->label('Charts Link')->prefixIcon('heroicon-m-document-text'),
                Forms\Components\Select::make('type')
                    ->options([
                        'free' => 'Freeware',
                        'pay' => 'Payware',
                    ])
                    ->required()
                    ->default('free'),
                Forms\Components\KeyValue::make('frequencies')->addable(true)->deletable(true)->columnSpanFull(),
                Forms\Components\KeyValue::make('runways')->addable(true)->deletable(true)->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('picture_path')->circular(),
                Tables\Columns\TextColumn::make('icao')->searchable()->sortable()->weight('bold'),
                Tables\Columns\TextColumn::make('name.en')->label('Name')->searchable(),
                Tables\Columns\TextColumn::make('city.en')->label('City')->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'free' => 'success',
                        'pay' => 'warning',
                    })
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'free' => 'Freeware',
                        'pay' => 'Payware',
                    }),
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
            'index' => Pages\ListAirports::route('/'),
            'create' => Pages\CreateAirport::route('/create'),
            'edit' => Pages\EditAirport::route('/{record}/edit'),
        ];
    }
}
