<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VolunteerResource\Pages;
use App\Filament\Resources\VolunteerResource\RelationManagers;
use App\Models\Volunteer;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
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
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    // protected static ?string $navigationGroup = 'Volunteer Management';

    //Auto-generate volunteer_id
    protected static function booted()
    {
        static::creating(function ($volunteer) {
            $volunteer->volunteer_id = 'VOL' . strtoupper(Str::random(6));
        });
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('volunteer_id')->required()->unique(ignoreRecord: true),

                TextInput::make('full_name')->required(),
                TextInput::make('initials_name')->label('Name with Initials'),

                Select::make('district')
                    ->options([
                        'Thirukonamalai' => 'Thirukonamalai',
                        'Mattakalappu' => 'Mattakalappu',
                        'Amparai' => 'Amparai',
                        'Nuwara Eliya' => 'Nuwara Eliya',
                        'Mullaitivu' => 'Mullaitivu',
                        'Vavuniya' => 'Vavuniya',
                        'Kilinochchi' => 'Kilinochchi',
                        'Yarlpannam' => 'Yarlpannam',
                        'Mannar' => 'Mannar',
                        'Kandy' => 'Kandy',
                        'Matale' => 'Matale',
                        'Puttalam' => 'Puttalam',
                        'Badulla' => 'Badulla',
                        'Kegalle' => 'Kegalle',
                        'Colombo' => 'Colombo',
                        'Gampaha' => 'Gampaha',
                        'Kalutara' => 'Kalutara',
                        'Kurunegala' => 'Kurunegala',
                        'Ratnapura' => 'Ratnapura',
                        'Polonnaruwa' => 'Polonnaruwa',
                        'Anuradhapura' => 'Anuradhapura',
                        'Monaragala' => 'Monaragala',
                        'Hambantota' => 'Hambantota',
                        'Matara' => 'Matara',
                        'Galle' => 'Galle',
                    ])

                    ->required(),
                TextInput::make('address')->label('Home Address')->required(),
                TextInput::make('nic_number')->label('NIC Number')->nullable(),

                DatePicker::make('date_of_birth')->required(),
                DatePicker::make('joined_date')->label('Date')->nullable(),

                Select::make('status')
                    ->options([
                        'School Leaver' => 'School Leaver',
                        'Undergraduate' => 'Undergraduate',
                        'Graduate' => 'Graduate',
                        'Professional' => 'Professional',
                        'Entrepreneur' => 'Entrepreneur',
                    ])
                    ->required()
                    ->label('Are you?'),

                TextInput::make('institution')->label('Working / Studying Institution')->required(),

                TextInput::make('email')->email()->required(),
                TextInput::make('phone')->label('Telephone')->required(),
                TextInput::make('whatsapp')->label('Whatsapp No')->nullable(),

                Select::make('referred_by')
                    ->label('How did you know about Sirakukal?')
                    ->options([
                        'Friends' => 'Friends',
                        'Social Media' => 'Social Media',
                        'Newspapers' => 'Newspapers',
                        'Others' => 'Others',
                    ])
                    ->required(),

                Textarea::make('reason_to_join')->label('Why do you want to join Sirakukal?')->required(),
                Toggle::make('joined')->label('Has Joined?'),
            ])
            ->columns(2);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('volunteer_id')->label('ID')->sortable()->searchable(),
                TextColumn::make('full_name')->label('Full Name')->sortable()->searchable(),
                TextColumn::make('name_with_initials')->label('Name with Initials')->sortable()->searchable(),
                TextColumn::make('district')->sortable()->searchable(),
                TextColumn::make('email')->sortable()->searchable(),
                TextColumn::make('telephone')->label('Telephone')->searchable(),
                TextColumn::make('whatsapp')->label('WhatsApp')->searchable()->toggleable(), // optional, toggle visibility
                TextColumn::make('status')->label('Are you?')->sortable()->searchable(),
                TextColumn::make('institution')->label('Institution')->searchable(),
                TextColumn::make('referred_by')->label('How found Sirakukal')->sortable(),
                BooleanColumn::make('joined')->label('Joined')->sortable(),
                TextColumn::make('created_at')->dateTime()->label('Registered At')->sortable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('joined')->label('Joined Status'),
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'School Leaver' => 'School Leaver',
                        'Undergraduate' => 'Undergraduate',
                        'Graduate' => 'Graduate',
                        'Professional' => 'Professional',
                        'Entrepreneur' => 'Entrepreneur',
                    ]),
                Tables\Filters\SelectFilter::make('district')
                    ->label('District')
                    ->options([
                        'Thirukonamalai' => 'Thirukonamalai',
                        'Mattakalappu' => 'Mattakalappu',
                        'Amparai' => 'Amparai',
                        'Nuwara Eliya' => 'Nuwara Eliya',
                        'Mullaitivu' => 'Mullaitivu',
                        'Vavuniya' => 'Vavuniya',
                        'Kilinochchi' => 'Kilinochchi',
                        'Yarlpannam' => 'Yarlpannam',
                        'Mannar' => 'Mannar',
                        'Kandy' => 'Kandy',
                        'Matale' => 'Matale',
                        'Puttalam' => 'Puttalam',
                        'Badulla' => 'Badulla',
                        'Kegalle' => 'Kegalle',
                        'Colombo' => 'Colombo',
                        'Gampaha' => 'Gampaha',
                        'Kalutara' => 'Kalutara',
                        'Kurunegala' => 'Kurunegala',
                        'Ratnapura' => 'Ratnapura',
                        'Polonnaruwa' => 'Polonnaruwa',
                        'Anuradhapura' => 'Anuradhapura',
                        'Monaragala' => 'Monaragala',
                        'Hambantota' => 'Hambantota',
                        'Matara' => 'Matara',
                        'Galle' => 'Galle',
                    ]),
                Tables\Filters\SelectFilter::make('how_found_sirakukal')
                    ->label('How Found Sirakukal')
                    ->options([
                        'Friends' => 'Friends',
                        'Social Media' => 'Social Media',
                        'Newspapers' => 'Newspapers',
                        'Others' => 'Others',
                    ]),
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
