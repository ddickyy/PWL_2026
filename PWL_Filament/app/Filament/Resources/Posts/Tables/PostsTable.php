<?php

namespace App\Filament\Resources\Posts\Tables;

use Dom\Text;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ReplicateAction;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Image;
use Filament\Tables\Table;
use Symfony\Component\Console\Color;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\IconColumn;
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
                TextColumn::make("id")
                    ->label("ID")
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("title")
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make("slug")
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make("category.name")
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make("created_at")
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make("tags.pluck:name, ', ')")
                    ->label("Tags")
                    ->toggleable(),
                IconColumn::make("published")
                    ->boolean()
                    ->label("Published")
                    ->toggleable(),
                ColorColumn::make("color")
                    ->sortable()
                    ->label("Color")
                    ->toggleable(isToggledHiddenByDefault: true),
                ImageColumn::make("image")
                    ->disk("public")
                    ->sortable()
                    ->toggleable(),
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
                ReplicateAction::make(),
                EditAction::make(),
                DeleteAction::make(),
                Action::make("status")
                ->label("status change")
                ->icon("heroicon-s-rectangle-stack")
                ->schema([
                    Checkbox::make("published")
                    ->default(fn($record) => $record->published),
                ])
                ->action(function ($record, $data) {
                    $record->update([
                        "published" => $data["published"],
                    ]);
                }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
