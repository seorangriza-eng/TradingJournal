<?php

namespace App\Filament\Widgets;

use App\Models\Journal;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Cache;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $totalTrade = Journal::count('id') ?? 0;

        $winningTrade = Journal::where('result', 'win')->count('id');

        $losingTrade = Journal::where('result', 'lose')->count('id');

        $beTrade = Journal::where('result', 'be')->count('id');

        $winRate = round((($winningTrade / $totalTrade) * 100), 2) ?? 0;

        return [
            Stat::make('Winning Trade', $winningTrade),
            Stat::make('Losing Trade', $losingTrade),
            Stat::make('Breakeven Trade', $beTrade),
            Stat::make('Win Rate', $winRate . "%"),
        ];
    }

     #[Override]
    protected function getColumns(): int|array|null
    {
        return([
            'md' => 4,
            'default' => 2,
        ]);
    }
}
