<?php

namespace App\Filament\Resources\Pairs\Pages;

use App\Filament\Resources\Pairs\PairResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPairs extends ListRecords
{
    protected static string $resource = PairResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
