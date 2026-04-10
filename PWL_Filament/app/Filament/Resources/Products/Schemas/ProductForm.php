<?php

namespace App\Filament\Resources\Products\Schemas;

use Dom\Text;
use Filament\Schemas\Schema;
use Tiptap\Core\Mark;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Group;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Checkbox;
use Filament\Actions\Action;


class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Wizard::make([
                    Step::make('Product Info')
                        ->description('Isi Informasi Produk')
                        ->icon('heroicon-o-information-circle')
                        ->schema([
                            Group::make([
                                TextInput::make('name')
                                    ->required(),
                                TextInput::make('sku')
                                    ->required(),
                            ])->columns(2),
                            MarkdownEditor::make('description')

                        ]),
                    Step::make('Pricing & Stock')
                        ->description('Isi Harga dan Jumlah Stok')
                        ->icon('heroicon-o-currency-dollar')
                        ->schema([
                            TextInput::make('price')
                                ->minValue(1)
                                ->numeric()
                                ->required(),

                            TextInput::make('stock')
                                ->numeric()
                                ->required(),
                        ]),
                    Step::make('Media & Status')
                        ->description('Upload gambar dan atur status')
                        ->icon('heroicon-o-photo')
                        ->schema([
                            FileUpload::make('image')
                                ->disk('public')
                                ->directory('products')
                                ->image(),
                            Checkbox::make('is_active'),
                            Checkbox::make('is_featured'),
                        ]),
                ])
                    ->columnSpanFull()
                    ->submitAction(
                        Action::make('save')
                            ->label('Save Product')
                            ->button()
                            ->color('primary')
                            ->submit('save')
                    ),
            ]); // components
    }
}
