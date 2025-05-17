<?php

namespace App\Filament\Widgets;

use App\Models\Event;
use Illuminate\Support\Carbon;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

class UpcomingEvents extends BaseWidget
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
                Event::query()
                    ->whereDate('date', '>=', now())
                    ->orderBy('date')
                    ->limit(5)
            )
            ->columns([
                TextColumn::make('name')
                    ->label('Event')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('date')
                    ->label('Date')
                    ->date('M d, Y')
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->getStateUsing(function (Event $event): string {
                        return Carbon::parse($event->date)->isToday() ? 'Today' : 'Upcoming';
                    })
                    ->badge()
                    ->color(fn(string $state) => $state === 'Today' ? 'warning' : 'success'),
            ]);
    }
}
