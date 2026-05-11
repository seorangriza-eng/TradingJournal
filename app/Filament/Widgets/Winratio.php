<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class Winratio extends ChartWidget
{
    protected ?string $heading = 'Winratio';

    protected static ?int $sort = 3;

    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
