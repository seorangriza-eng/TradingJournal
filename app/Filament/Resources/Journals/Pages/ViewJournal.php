<?php

namespace App\Filament\Resources\Journals\Pages;

use App\Filament\Actions\ResultAction;
use App\Filament\Resources\Journals\JournalResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewJournal extends ViewRecord
{
    protected static string $resource = JournalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ResultAction::make()
                ->hidden(fn ($record) => $record->result != null),
            EditAction::make(),
            DeleteAction::make(),
        ];
    }
}
