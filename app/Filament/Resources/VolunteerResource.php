<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VolunteerResource\Pages;
use App\Filament\Resources\VolunteerResource\RelationManagers;
use App\Models\Volunteer;
use Filament\Forms;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VolunteerResource extends Resource
{
    protected static ?string $model = Volunteer::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    // protected static ?string $navigationGroup = 'Volunteer Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('volunteer_id')
                    ->label('Volunteer ID')
                    ->required()
                    ->maxLength(100),

                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),

                TextInput::make('phone')
                    ->tel()
                    ->maxLength(20)
                    ->nullable(),

                Textarea::make('address')
                    ->maxLength(500)
                    ->nullable(),

                TagsInput::make('skills')
                    ->label('Skills')
                    ->nullable(),

                TagsInput::make('interested_areas')
                    ->label('Interested Areas')
                    ->nullable(),

                Toggle::make('joined')
                    ->label('Joined')
                    ->default(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('volunteer_id')->label('ID')->sortable()->searchable(),
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('email')->sortable()->searchable(),
                TextColumn::make('phone')->searchable(),
                BooleanColumn::make('joined')->label('Joined'),
                TextColumn::make('created_at')->dateTime()->label('Registered At'),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('joined')->label('Joined Status'),
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
            'index' => Pages\ListVolunteers::route('/'),
            'create' => Pages\CreateVolunteer::route('/create'),
            'edit' => Pages\EditVolunteer::route('/{record}/edit'),
        ];
    }
}
