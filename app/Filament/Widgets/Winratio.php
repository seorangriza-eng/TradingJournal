<?php

namespace App\Filament\Widgets;

use App\Models\Journal;
use Filament\Widgets\ChartWidget;

class Winratio extends ChartWidget
{
    protected ?string $heading = 'Winratio';

    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $counts = Journal::whereNotNull('result')
            ->selectRaw('result, COUNT(*) as total')
            ->groupBy('result')
            ->pluck('total', 'result')
            ->toArray();

        $win  = (int) ($counts['WIN']  ?? 0);
        $lose = (int) ($counts['LOSE'] ?? 0);
        $be   = (int) ($counts['BE']   ?? 0);

        return [
            'datasets' => [
                [
                    'data'            => [$win, $lose, $be],
                    'backgroundColor' => ['#52ae07', '#ff0000', '#888780'],
                    'borderColor'     => ['#24ef00', '#ff0000', '#5F5E5A'],
                    'borderWidth'     => 1,
                    'hoverOffset'     => 6,
                ],
            ],
            'labels' => ['Win', 'Lose', 'Break Even'],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }

     protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display'  => true,
                    'position' => 'bottom',
                ],
                'tooltip' => [
                    'callbacks' => [],
                ],
            ],
        ];
    }
}
