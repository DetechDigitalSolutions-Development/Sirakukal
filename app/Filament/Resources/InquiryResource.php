<?php
namespace App\Filament\Resources;

use App\Filament\Resources\InquiryResource\Pages;
use App\Models\Inquiry;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Actions\Action;

class InquiryResource extends Resource
{
    protected static ?string $model = Inquiry::class;
    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?int $navigationSort = 5;
    protected static ?string $navigationGroup = 'Site Management';

    public static function getNavigationBadge(): ?string
    {
        $count = Inquiry::where('read', false)->count();
        return $count > 0 ? (string) $count : null;
    }

    public static function getNavigationBadgeColor(): string | null
    {
        return 'danger';
    }


    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('full_name')->required(),
            Forms\Components\TextInput::make('email')->email()->required(),
            Forms\Components\Textarea::make('help_message')->label('Message')->required(),
            Forms\Components\Toggle::make('read')->label('Marked as Read'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('full_name')->sortable()->searchable(),
                TextColumn::make('email')->searchable(),
                TextColumn::make('help_message')->limit(50)->wrap(),
                BooleanColumn::make('read')->label('Read'),
                TextColumn::make('created_at')->since()->label('Received'),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Action::make('mark_read')
                    ->label('Mark as Read')
                    ->icon('heroicon-o-check')
                    ->hidden(fn ($record) => $record->read)
                    ->action(fn ($record) => $record->update(['read' => true])),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInquiries::route('/'),
        ];
    }
}
