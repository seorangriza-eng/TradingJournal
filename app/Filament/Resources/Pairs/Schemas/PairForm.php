<?php

namespace App\Filament\Resources\Pairs\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PairForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Select::make('type')
                    ->options(['major' => 'Major', 'minor' => 'Minor', 'exotic' => 'Exotic'])
                    ->required(),
                Toggle::make('is_active')
                    ->default('true')
            ])->columns(3);
    }
}
