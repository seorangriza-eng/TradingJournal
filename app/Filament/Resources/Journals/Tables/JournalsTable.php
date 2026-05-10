<?php

namespace App\Filament\Resources\Journals\Tables;

use App\Filament\Actions\ResultAction;
use Dom\Text;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Support\RawJs;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Table;

class JournalsTable
{
    public static function configure(Table $table): Table
    {
        return $table
        ->deferLoading()
        ->columns([
                TextColumn::make('created_at')
                    ->label('Tgl')
                    ->date('d F y'),
                TextColumn::make('pair.name')
                    ->sortable(),
                TextColumn::make('daily_candle_c')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('daily_candle_cause')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('daily_img')
                    ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('hourly_first_cisd')
                    ->boolean()
                    ->trueIcon('heroicon-m-check-badge')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('hourly_img')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('entry_tf')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('entry_img')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('result')
                    ->badge()
                    ->color(fn (string $state): string => match ($state){
                        'WIN' => 'success',
                        'LOSE' => 'danger',
                        'BE' => 'info',
                    }),
                TextColumn::make('result_img')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('saldo')
                    ->numeric()
                    ->money('USD', decimalPlaces: 2),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->recordActions([
                ActionGroup::make([
                    ResultAction::make(),
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ])
                ->icon('heroicon-m-paper-airplane')
            ], position : RecordActionsPosition::BeforeCells)
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
