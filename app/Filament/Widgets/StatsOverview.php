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
        $stats = Journal::selectRaw("
            COUNT(id) as total,
            COUNT(CASE WHEN result = 'win' THEN 1 END) as win,
            COUNT(CASE WHEN result = 'lose' THEN 1 END) as lose,
            COUNT(CASE WHEN result = 'be' THEN 1 END) as be
        ")->first();

        $totalTrade = $stats->total ?? 0;
        $winningTrade = $stats->win ?? 0;
        $losingTrade = $stats->lose ?? 0;
        $beTrade = $stats->be ?? 0;

        // Proteksi division by zero
        $winRate = $totalTrade > 0 ? round((($winningTrade / $totalTrade) * 100), 2) : 0;

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
