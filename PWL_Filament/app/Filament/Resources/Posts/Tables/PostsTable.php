<?php

namespace App\Filament\Resources\Posts\Tables;

use Dom\Text;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Image;
use Filament\Tables\Table;
use Symfony\Component\Console\Color;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort("created_at", "desc")
            ->columns([
                TextColumn::make("title")
                ->sortable()
                ->searchable(),
                TextColumn::make("slug")
                ->sortable()
                ->searchable(),
                TextColumn::make("category.name")
                ->sortable()
                ->searchable(),
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
                Filter::make("created_at")
                    ->schema([
                        DatePicker::make("created_at")
                            ->label("Select Date"),
                    ])
                    ->query(function ($query, $data) {
                        return $query->when(
                            $data["created_at"],
                            fn($query, $date) => $query->whereDate("created_at", $date)
                        );
                    }),
                SelectFilter::make("category_id")
                    ->relationship("category", "name")
                    ->preload()
                    ->label("Category"),
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
