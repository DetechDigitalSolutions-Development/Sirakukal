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
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
use App\Filament\Resources\StoryResource\Pages;

class StoryResource extends Resource
{
    protected static ?string $model = Story::class;
    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationGroup = 'Public Content';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('author')
                    ->required()
                    ->maxLength(255),
                
                Textarea::make('description')
                    ->required()
                    ->maxLength(2000)
                    ->columnSpanFull(),
                
                FileUpload::make('image_url')
                    ->image()
                    ->directory('stories-images')
                    ->disk('public')
                    ->label('Story Image')
                    ->imageEditor()
                    ->preserveFilenames()
                    ->downloadable()
                    ->openable()
                    ->maxSize(2048)
                    ->deleteUploadedFileUsing(function ($file) {
                        if (!$file) return;
                        Storage::disk('public')->delete($file);
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_url')
                    ->label('Image')
                    ->disk('public')
                    ->circular(),
                
                TextColumn::make('author')
                    ->sortable()
                    ->searchable(),
                
                TextColumn::make('description')
                    ->limit(50)
                    ->wrap()
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 50) {
                            return null;
                        }
                        return $state;
                    }),
            ])
            ->filters([
                // Add filters if needed
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->after(function (Story $story) {
                        if ($story->image_url) {
                            Storage::disk('public')->delete($story->image_url);
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->action(function (Collection $records) {
                        $records->each(function (Story $story) {
                            if ($story->image_url) {
                                Storage::disk('public')->delete($story->image_url);
                            }
                        });
                        $records->each->delete();
                    }),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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