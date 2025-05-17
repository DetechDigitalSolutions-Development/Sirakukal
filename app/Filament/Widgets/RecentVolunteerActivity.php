<?php

namespace App\Filament\Widgets;

use App\Models\Volunteer;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class RecentVolunteerActivity extends BaseWidget
{
    protected int|string|array $columnSpan = [
    'default' => 6,
    'md' => 3,
    'xl' => 6,
];

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Volunteer::query()
                    ->latest()
                    ->limit(5)
            )
            ->columns([
                TextColumn::make('full_name')
                    ->label('Name')
                    ->searchable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->copyable(),

                TextColumn::make('created_at')
                    ->label('Signed Up')
                    ->since() // shows "2 hours ago"
                    ->sortable(),
            ]);
    }
}
