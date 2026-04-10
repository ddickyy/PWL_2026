<?php

namespace App\Filament\Resources\Products\Schemas;

use BladeUI\Icons\Components\Icon;
use Dom\Text;
use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;

class ProductInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make()
                    ->tabs([
                        Tab::make('Product Info')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                TextEntry::make('name')
                                    ->label('Product Name')
                                    ->weight('bold')
                                    ->color('primary'),
                                TextEntry::make('id')
                                    ->label('Product ID'),
                                TextEntry::make('sku')
                                    ->label('Product SKU')
                                    ->badge()
                                    ->color('success'),
                                TextEntry::make('description')
                                    ->label('Product Description'),
                                TextEntry::make('created_at')
                                    ->label('Product Creation Date')
                                    ->date('d M Y')
                                    ->color('info'),
                            ]),
                        Tab::make('Pricing & Stock')
                            ->icon('heroicon-o-currency-dollar')
                            ->schema([
                                TextEntry::make('price')
                                    ->label('Price')
                                    ->weight('bold')
                                    ->color('success')
                                    ->icon('heroicon-o-currency-dollar'),
                                TextEntry::make('stock')
                                    ->label('Product Stock')
                                    ->badge()
                                    ->color(fn($state) => $state > 0 ? 'success' : 'danger')
                                    ->formatStateUsing(fn($state) => $state > 0 ? 'Tersedia' : 'Habis'),
                            ]),
                        Tab::make('Media & Status')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                ImageEntry::make('image')
                                    ->label('Product Image')
                                    ->disk('public'),
                                TextEntry::make('price')
                                    ->label('Product Price')
                                    ->color('primary')
                                    ->icon('heroicon-o-currency-dollar'),
                                TextEntry::make('stock')
                                    ->label('Product Stock')
                                    ->color('primary')
                                    ->weight('bold'),
                                IconEntry::make('is_active')
                                    ->label('Is Active?')
                                    ->boolean(),
                                IconEntry::make('is_featured')
                                    ->label('Is Featured?')
                                    ->boolean()
                            ])
                    ])
                    ->vertical()
                    ->columnSpanFull(),

                // Section::make('Product Info')
                //     ->schema([
                //         TextEntry::make('name')
                //             ->label('Product Name')
                //             ->weight('bold')
                //             ->color('primary'),
                //         TextEntry::make('id')
                //             ->label('Product ID'),
                //         TextEntry::make('sku')
                //             ->label('Product SKU')
                //             ->badge()
                //             ->color('primary'),
                //         TextEntry::make('description')
                //             ->label('Product Description'),
                //     ])
                //     ->columnSpanFull(),
                // Section::make('Pricing & Stock')
                //     ->icon('heroicon-o-currency-dollar')
                //     ->schema([
                //         TextEntry::make('price')
                //             ->label('Product Price')
                //             ->formatStateUsing(fn($state) => "Rp " . number_format($state)),
                //         TextEntry::make('stock')
                //             ->label('Product Stock'),
                //     ]),
                // Section::make('Media & Status')
                //     ->schema([
                //         ImageEntry::make('image')
                //             ->label('Product Image')
                //             ->disk('public'),
                //         IconEntry::make('is_active')
                //             ->label('Is Active')
                //             ->boolean(),
                //         IconEntry::make('is_featured')
                //             ->label('Is Featured')
                //             ->boolean(),
                //         TextEntry::make('created_at')
                //             ->label('Product Creation Date')
                //             ->date('d M Y')
                //             ->color('info'),
                //     ]), 

            ]); // components
    }
}
