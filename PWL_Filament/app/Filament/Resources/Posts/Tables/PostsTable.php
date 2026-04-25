<?php

namespace App\Filament\Resources\Posts\Tables;

use Dom\Text;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Schemas\Components\Image;
use Filament\Tables\Table;
use Symfony\Component\Console\Color;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\ImageColumn;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort("created_at", "desc")
            ->columns([
                TextColumn::make("title")
                ->sortable(),
                TextColumn::make("slug")
                ->sortable(),
                TextColumn::make("category.name")
                ->sortable(),
                TextColumn::make("created_at")
                ->dateTime()
                ->sortable(),
                ColorColumn::make("color")
                ->sortable(),
                ImageColumn::make("image")
                    ->disk("public")
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
