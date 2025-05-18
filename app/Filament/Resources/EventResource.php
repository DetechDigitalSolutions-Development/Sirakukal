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
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\View;
use Filament\Tables\Columns\TextColumn;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    //protected static ?int $navigationSort = 3;

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

                Select::make('category')
                    ->label('Category')
                    ->options([
                        'Online' => 'Online',
                        'Physical' => 'Physical',
                    ])
                    ->required(),

                TextInput::make('link')
                    ->label('Event Link')
                    ->url()
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
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
                    ->enableDownload()
                    ->enableOpen()
                    ->maxSize(2048),
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
                TextColumn::make('category')->sortable(),
                TextColumn::make('link')->url(fn($record) => $record->link)->label('Event Link')->limit(30)->openUrlInNewTab(true),
                TextColumn::make('created_at')->dateTime()->label('Created At'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
