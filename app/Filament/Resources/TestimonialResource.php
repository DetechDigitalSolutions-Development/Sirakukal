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
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
use App\Filament\Resources\TestimonialResource\Pages;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';
    protected static ?string $navigationGroup = 'Public Content';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('author')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                
                Textarea::make('description')
                    ->required()
                    ->maxLength(2000)
                    ->columnSpanFull(),
                
                FileUpload::make('image_url')
                    ->image()
                    ->directory('testimonial-images')
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
                    })
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_url')
                    ->label('Author Image')
                    ->disk('public')
                    ->circular()
                    ->size(50),
                
                TextColumn::make('author')
                    ->sortable()
                    ->searchable()
                    ->weight('medium'),
                
                TextColumn::make('description')
                    ->limit(50)
                    ->wrap()
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();
                        return strlen($state) > 50 ? $state : null;
                    }),
            ])
            ->filters([
                // Add filters here if needed
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->iconButton(),
                
                Tables\Actions\DeleteAction::make()
                    ->iconButton()
                    ->after(function (Testimonial $testimonial) {
                        if ($testimonial->image_url) {
                            Storage::disk('public')->delete($testimonial->image_url);
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->action(function (Collection $records) {
                        $records->each(function (Testimonial $testimonial) {
                            if ($testimonial->image_url) {
                                Storage::disk('public')->delete($testimonial->image_url);
                            }
                        });
                        $records->each->delete();
                    }),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
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