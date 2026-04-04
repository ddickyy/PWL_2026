<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

use function Laravel\Prompts\text;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                textInput::make('name')
                    ->required(),
                textInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),
            ]);
    }
}
