<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class Saldo extends ChartWidget
{
    protected ?string $heading = 'Saldo';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
