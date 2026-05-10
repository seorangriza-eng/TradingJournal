<?php

namespace App\Filament\Resources\Journals\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class JournalInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('pair_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('daily_candle_c'),
                TextEntry::make('daily_candle_cause'),
                TextEntry::make('daily_img'),
                IconEntry::make('hourly_first_cisd')
                    ->boolean(),
                TextEntry::make('hourly_img'),
                TextEntry::make('entry_tf'),
                TextEntry::make('entry_img'),
                IconEntry::make('result')
                    ->boolean()
                    ->placeholder('-'),
                TextEntry::make('result_img')
                    ->placeholder('-'),
                TextEntry::make('notes')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('saldo')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
