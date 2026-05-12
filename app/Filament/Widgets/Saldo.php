<?php

namespace App\Filament\Widgets;

use App\Models\Journal;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class Saldo extends ChartWidget
{
    protected ?string $heading = 'Saldo';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        // Ambil saldo terakhir per hari
        $data = Journal::whereNotNull('saldo')
            ->selectRaw('DATE(result_time) as tanggal, saldo')
            ->whereIn('id', function($query) {
                $query->selectRaw('MAX(id)')
                    ->from('journals')
                    ->whereNotNull('saldo')
                    ->whereNotNull('result_time')
                    ->groupByRaw('DATE(result_time)');
            })
            ->orderBy('tanggal')
            ->get();

           return [
            'datasets' => [
                [
                    'label'           => 'Saldo',
                    'data'            => $data->pluck('saldo')->toArray(),
                    'fill'            => true,
                    'tension'         => 0.3,
                    'pointRadius'     => 5,
                    'pointHoverRadius'=> 7,
                ],
            ],
            'labels' => $data->map(fn ($j) =>
                Carbon::parse($j->result_time)->format('d/m')
            )->toArray(),

        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
