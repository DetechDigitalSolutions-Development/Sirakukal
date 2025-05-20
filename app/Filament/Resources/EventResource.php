<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TimePicker;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'Programs';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Event Name')
                    ->required()
                    ->maxLength(255),

                Select::make('category')
                    ->label('Category')
                    ->options(Event::CATEGORY)
                    ->placeholder('Select Category')
                    ->required(),

                DatePicker::make('date')
                    ->label('Date')
                    ->required(),

                TimePicker::make('time')
                    ->label('Time')
                    ->required(),

                TextInput::make('venue')
                    ->label('Venue')
                    ->required()
                    ->maxLength(255),

                Select::make('type')
                    ->label('Type')
                    ->options(Event::TYPE)
                    ->required(),

                TextInput::make('link')
                    ->label('Event Link')
                    ->url()
                    ->maxLength(255),

                RichEditor::make('description')
                    ->label('Description')
                    ->nullable()
                    ->maxLength(1000),

                FileUpload::make('image_url')
                    ->label('Event Image')
                    ->image()
                    ->directory('event-images')
                    ->disk('public')
                    ->imageEditor()
                    ->preserveFilenames()
                    ->downloadable()
                    ->openable()
                    ->maxSize(2048)
                    ->deleteUploadedFileUsing(function ($file) {
                        if (! $file) return;
                        Storage::disk('public')->delete($file);
                    }),

                FileUpload::make('references_links')
                    ->label('Reference Documents')
                    ->multiple()
                    ->directory('event-reference_links')
                    ->disk('public')
                    ->preserveFilenames()
                    ->downloadable()
                    ->openable()
                    ->acceptedFileTypes([
                        'application/pdf',
                        'application/msword',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                        'image/jpeg',
                        'image/png',
                    ])
                    ->helperText('Allowed types: PDF, DOC, DOCX, JPG, PNG')
                    ->columnSpanFull()
                    ->disablePreview()
                    ->imageResizeTargetWidth(1200)
                    ->imageResizeTargetHeight(1200)
                    ->imageResizeMode('cover')
                    ->deleteUploadedFileUsing(function ($file) {
                        if (! $file) return;
                        Storage::disk('public')->delete($file);
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_url')
                    ->label('Image')
                    ->size(60),

                TextColumn::make('name')->label('Event')->sortable()->searchable(),
                TextColumn::make('date')->date()->sortable(),
                TextColumn::make('time')->time()->sortable(),
                TextColumn::make('venue')->sortable()->searchable(),
                TextColumn::make('description')->limit(50)->sortable(),
                TextColumn::make('type')->sortable(),
                TextColumn::make('category')->sortable(),
                TextColumn::make('link')->url(fn($record) => $record->link)->label('Event Link')->limit(30)->openUrlInNewTab(true),
                TextColumn::make('references_links')->label('Reference Files')->view('tables.columns.reference-links'),
                TextColumn::make('created_at')->dateTime()->label('Created At'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->after(function ($record) {
                        // Delete files before record deletion
                        if ($record->image_url) {
                            Storage::disk('public')->delete($record->image_url);
                        }
                        
                        if ($record->references_links) {
                            $files = is_array($record->references_links) 
                                ? $record->references_links
                                : json_decode($record->references_links, true) ?? [];
                                
                            foreach ($files as $file) {
                                Storage::disk('public')->delete($file);
                            }
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->action(function (Collection $records) {
                        $records->each(function ($record) {
                            // Delete files
                            if ($record->image_url) {
                                Storage::disk('public')->delete($record->image_url);
                            }
                            
                            if ($record->references_links) {
                                $files = is_array($record->references_links) 
                                    ? $record->references_links
                                    : json_decode($record->references_links, true) ?? [];
                                    
                                foreach ($files as $file) {
                                    Storage::disk('public')->delete($file);
                                }
                            }
                        });
                        
                        // Delete records
                        $records->each->delete();
                    }),
            ]);
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