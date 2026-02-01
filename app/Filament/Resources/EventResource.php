<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title.en')->label('Title (EN)')->required(),
                Forms\Components\TextInput::make('title.fr')->label('Title (FR)')->required(),
                Forms\Components\RichEditor::make('description.en')->label('Description (EN)')->columnSpanFull(),
                Forms\Components\RichEditor::make('description.fr')->label('Description (FR)')->columnSpanFull(),
                Forms\Components\DateTimePicker::make('start_at')->required(),
                Forms\Components\DateTimePicker::make('end_at')->required(),
                Forms\Components\Select::make('type')->options([
                    'training' => 'Training',
                    'exam' => 'Exam',
                    'event' => 'Event',
                    'rfe' => 'RFE',
                ])->required(),
                Forms\Components\FileUpload::make('image_path')->image(),
                Forms\Components\TextInput::make('slug')->required()->unique(ignoreRecord: true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title.en')->label('Title')->searchable(),
                Tables\Columns\TextColumn::make('type')->badge(),
                Tables\Columns\TextColumn::make('start_at')->dateTime()->sortable(),
                Tables\Columns\TextColumn::make('end_at')->dateTime()->sortable(),
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
