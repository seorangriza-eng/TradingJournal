<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Winning Trade', 90),
            Stat::make('Losing Trade', 10),
            Stat::make('Breakeven Trade', 0),
            Stat::make('Win Rate', '90%'),
        ];
    }
}
