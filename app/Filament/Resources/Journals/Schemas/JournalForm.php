<?php

namespace App\Filament\Resources\Journals\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class JournalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('pair_id')
                    ->relationship('pair', 'name')
                    ->required(),
                Radio::make('daily_candle_c')
                    ->label('Daily Candle C?')
                    ->options([
                        'C3' => 'C3',
                        'C4' => 'C4',
                        'C5' => 'C5',
                        'pause' => 'pause',
                    ])
                    ->inline(true)
                    ->required(),
                Radio::make('daily_candle_cause')
                    ->label('Daily Cause')
                    ->options([
                        'opposing candle' => 'Opposing Candle',
                        'Swing Point' => 'Swing Point',
                    ])
                    ->inline()
                    ->required(),
                TextInput::make('daily_img')
                    ->label('Daily Image')
                    ->required(),
                Toggle::make('hourly_first_cisd')
                    ->required(),
                TextInput::make('hourly_img')
                    ->label('Hourly Image')
                    ->required(),
                Radio::make('entry_tf')
                    ->label('Entry Timeframe')
                    ->options([
                        '1m' => '1m',
                        '5m' => '5m',
                        '15m' => '15m',
                        '30m' => '30m',
                        '1H' => '1H',
                    ])
                    ->inline()
                    ->required(),
                TextInput::make('entry_img')
                    ->label('Entry Image')
                    ->required(),
                Hidden::make('entry_seesion')
                    ->dehydrated(),
                Select::make('result')
                    ->options([
                        'WIN' => 'WIN',
                        'LOSE' => 'LOSE',
                        'BE' => 'BREAK EVEN'
                    ])
                    ->visibleOn('edit'),
                DateTimePicker::make('result_time')
                    ->visibleOn('edit'),
                TextInput::make('result_img')
                    ->visibleOn('edit'),
                Textarea::make('notes')
                    ->visibleOn('edit'),
                TextInput::make('saldo')
                    ->visibleOn('edit')
            ]);
    }
}
