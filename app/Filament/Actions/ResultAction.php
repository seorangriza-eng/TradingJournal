<?php

namespace App\Filament\Actions;

use Filament\Actions\Action;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Support\RawJs;

class ResultAction extends Action
{
    public static function make(?string $name = 'Result'): static
    {
        return parent::make($name)
            ->label('Result')
            ->icon('heroicon-o-trophy')
            ->color('success')
            ->schema([
                Radio::make('result')
                    ->options([
                        'WIN' => 'WIN',
                        'LOSE' => 'LOSE',
                        'BE' => 'BREAK EVEN'
                    ])
                    ->default('WIN')
                    ->inline()
                    ->required(),
                TextInput::make('result_img')
                    ->label('Result Image')
                    ->required(),
                Textarea::make('notes')
                    ->required(),
                TextInput::make('saldo')
                    ->numeric()
                    ->mask(RawJs::make('$money($input)'))
                    ->stripCharacters(',')
                    ->required(),
                DateTimePicker::make('result_time')
                    ->default(now())
                    ->required()
            ])
            ->action(function ($record, array $data): void {
                $result = $data['result'];
                $result_img = $data['result_img'];
                $notes = $data['notes'];
                $saldo = $data['saldo'];
                $result_time = $data['result_time'];

                $record->update([
                    'result' => $result,
                    'result_img' => $result_img,
                    'notes' => $notes,
                    'saldo' => $saldo,
                    'result_time' => $result_time
                ]);

                if($result === 'WIN'){
                    Notification::make()
                        ->title('Berhasil Menyimpan Kemenangan')
                        ->success()
                        ->send();
                } else {
                    Notification::make()
                        ->title('Dont Give Up, Kita akan berhasil pada akhirnya!!!')
                        ->danger()
                        ->send();    
                }
            })
            ->modalWidth('md');
    }
}
