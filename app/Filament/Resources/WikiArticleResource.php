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

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Wiki Content';

    public static function form(Form $form): Form
    {
        $contentBuilder = Forms\Components\Builder::make('content')
            ->blocks([
                Forms\Components\Builder\Block::make('markdown')
                    ->label('Markdown Text')
                    ->icon('heroicon-o-list-bullet')
                    ->schema([
                        Forms\Components\MarkdownEditor::make('body')->required()->label('Markdown Content'),
                    ]),
                Forms\Components\Builder\Block::make('aviation_alert')
                    ->label('Aviation Alert / Tab')
                    ->icon('heroicon-o-exclamation-triangle')
                    ->schema([
                        Forms\Components\Select::make('type')
                            ->options([
                                'notam' => 'NOTAM (Warning - Red)',
                                'tip' => 'ATC Tip (Info - Blue)',
                                'regulation' => 'Regulation (Alert - Yellow)',
                            ])->required(),
                        Forms\Components\Textarea::make('message')->required(),
                    ]),
                Forms\Components\Builder\Block::make('button_link')
                    ->label('Action Button')
                    ->icon('heroicon-o-link')
                    ->schema([
                        Forms\Components\TextInput::make('url')->url()->required()->label('Link URL'),
                        Forms\Components\TextInput::make('label')->required()->label('Button Text'),
                        Forms\Components\Select::make('style')
                            ->options([
                                'primary' => 'Primary (Blue)',
                                'secondary' => 'Secondary (Gray)',
                            ])->default('primary'),
                    ]),
                Forms\Components\Builder\Block::make('image')
                    ->label('Image via URL')
                    ->icon('heroicon-o-photo')
                    ->schema([
                        Forms\Components\TextInput::make('url')->url()->required()->label('Image Source URL'),
                        Forms\Components\TextInput::make('caption')->label('Optional Caption'),
                    ]),
            ])->collapsible();

        return $form
            ->schema([
                Forms\Components\Section::make('Article Settings')->schema([
                    Forms\Components\Select::make('manual_id')
                        ->relationship('manual', 'slug')
                        ->getOptionLabelFromRecordUsing(fn($record) => $record->name['en'] ?? $record->name['fr'] ?? $record->slug)
                        ->required()
                        ->label('Manual'),
                    Forms\Components\TextInput::make('title.en')->required()->label('Title (EN)'),
                    Forms\Components\TextInput::make('title.fr')->required()->label('Title (FR)'),
                    Forms\Components\TextInput::make('slug')->required()->unique(ignoreRecord: true),
                    Forms\Components\Toggle::make('is_published')->default(false),
                    Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
                ])->columns(2),

                Forms\Components\Section::make('English Content')
                    ->schema([
                        $contentBuilder->name('content.en')->label('Blocks (English)'),
                    ]),
                Forms\Components\Section::make('French Content')
                    ->schema([
                        $contentBuilder->name('content.fr')->label('Blocks (French)'),
                    ])->collapsed(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('manual.domain.slug')
                    ->label('Domain')
                    ->formatStateUsing(fn($record) => $record->manual->domain->name['en'] ?? $record->manual->domain->slug)
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('manual.slug')
                    ->label('Manual')
                    ->formatStateUsing(fn($record) => $record->manual->name['en'] ?? $record->manual->slug)
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('title.en')->label('Title')->searchable()->sortable(),
                Tables\Columns\ToggleColumn::make('is_published'),
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
            'index' => Pages\ListWikiArticles::route('/'),
            'create' => Pages\CreateWikiArticle::route('/create'),
            'edit' => Pages\EditWikiArticle::route('/{record}/edit'),
        ];
    }
}
