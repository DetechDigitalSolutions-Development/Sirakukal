<?php
namespace App\Filament\Resources;

use App\Models\Story;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\StoryResource\Pages;

class StoryResource extends Resource
{
    protected static ?string $model = Story::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationGroup = 'Public Content';
    protected static ?int $navigationSort = 3; // Change this for ordering

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('author')->required()->maxLength(255),
                Textarea::make('description')->required()->maxLength(2000),
                FileUpload::make('image_url')
                    ->image()
                    ->directory('stories-images')
                    ->disk('public')
                    ->label('Author Image')
                    ->imageEditor()
                    ->preserveFilenames()
                    ->enableDownload()
                    ->enableOpen()
                    ->maxSize(2048),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_url')->label('Image')->disk('public')->circular(),
                TextColumn::make('author')->sortable()->searchable(),
                TextColumn::make('description')->limit(50)->wrap(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                 ->after(function ($record) {
                    // Delete files before record deletion
                    if ($record->image_url) {
                        Storage::disk('public')->delete($record->image_url);
                    }
                }),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStories::route('/'),
            'create' => Pages\CreateStory::route('/create'),
            'edit' => Pages\EditStory::route('/{record}/edit'),
        ];
    }
}
