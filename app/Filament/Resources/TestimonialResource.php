<?php

namespace App\Filament\Resources;

use App\Models\Testimonial;
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
use App\Filament\Resources\TestimonialResource\Pages;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';
    protected static ?string $navigationGroup = 'Public Content';
    protected static ?int $navigationSort = 1; // Change this for ordering

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('author')->required()->maxLength(255),
                Textarea::make('description')->required()->maxLength(2000),
                FileUpload::make('image_url')
                    ->image()
                    ->directory('testimonials')
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
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
