<?php

namespace App\Filament\Resources\Journals\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

class JournalInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
            Fieldset::make('Data')
                ->schema([
                    TextEntry::make('created_at')
                        ->dateTime(),
                    TextEntry::make('pair.name'),
                    TextEntry::make('daily_candle_c'),
                    TextEntry::make('daily_candle_cause'),
                    IconEntry::make('hourly_first_cisd')
                        ->boolean()
                        ->trueIcon('heroicon-m-check-badge'),
                    TextEntry::make('entry_tf'),
                    TextEntry::make('entry_session'),
                    TextEntry::make('result')
                        ->badge()
                        ->color(fn (string $state): string => match ($state){
                            'WIN' => 'success',
                            'LOSE' => 'danger',
                            'BE' => 'info',
                        })
                        ->placeholder('-'),
                    TextEntry::make('result_time')
                        ->dateTime(),
                    TextEntry::make('saldo')
                        ->money('USD', decimalPlaces:2)
                        ->placeholder('-'),
                    TextEntry::make('notes')
                        ->placeholder('-')
                        ->columnSpanFull(),
                ])
                ->columns([
                    'md' => 4,
                    'default' => 2
                ]),
            
            Fieldset::make('Picture')
                ->schema([
                    ImageEntry::make('daily_img')
                        ->url(fn ($record) => $record->daily_img)
                        ->openUrlInNewTab(true)
                        ->placeholder('-'),
                    ImageEntry::make('hourly_img')
                        ->url(fn ($record) => $record->hourly_img)
                        ->openUrlInNewTab(true)
                        ->placeholder('-'),
                    ImageEntry::make('entry_img')
                        ->url(fn ($record) => $record->entry_img)
                        ->openUrlInNewTab(true)
                        ->placeholder('-'),
                    ImageEntry::make('result_img')
                        ->url(fn ($record) => $record->result_img)
                        ->openUrlInNewTab(true)
                        ->placeholder('-'),
                ])
            ])
            ->columns(1);
        }
}
                