<?php

namespace App\Filament\Resources\Journals\Pages;

use App\Filament\Resources\Journals\JournalResource;
use Filament\Resources\Pages\CreateRecord;
use Override;

class CreateJournal extends CreateRecord
{
    protected static string $resource = JournalResource::class;

    protected static bool $canCreateAnother = false;

    #[Override]
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $sekarang = now()->hour;

        $sesi = match (true) {
        $sekarang >= 4 && $sekarang < 12  => 'Asia',     // 04:00 - 11:59
        $sekarang >= 12 && $sekarang < 18 => 'London',   // 12:00 - 17:59
        default                          => 'New York', // 18:00 - 03:59
        };

        $data['entry_session'] = $sesi;

        return $data;
    }

}
