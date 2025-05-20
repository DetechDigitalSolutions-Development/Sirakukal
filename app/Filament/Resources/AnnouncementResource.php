<?php

namespace App\Filament\Resources;

use App\Models\Announcement;
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
use App\Filament\Resources\AnnouncementResource\Pages;

class AnnouncementResource extends Resource
{
    protected static ?string $model = Announcement::class;
    protected static ?string $navigationIcon = 'heroicon-o-megaphone';
    protected static ?string $navigationGroup = 'Public Content';
    protected static ?int $navigationSort = 2;

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
                    ->directory('announcements-images')
                    ->disk('public')
                    ->label('Author Image')
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
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->after(function ($record) {
                        if ($record->image_url) {
                            Storage::disk('public')->delete($record->image_url);
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->action(function (Collection $records) {
                        // First delete all associated files
                        $records->each(function ($record) {
                            if ($record->image_url) {
                                Storage::disk('public')->delete($record->image_url);
                            }
                        });
                        
                        // Then delete the records
                        $records->each->delete();
                    }),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAnnouncements::route('/'),
            'create' => Pages\CreateAnnouncement::route('/create'),
            'edit' => Pages\EditAnnouncement::route('/{record}/edit'),
        ];
    }
}