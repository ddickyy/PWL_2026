<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Group;

use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make("Post Details")
                    ->description("Fill in the details of the post.")
                    ->icon("heroicon-o-document-text")
                    ->schema([
                        Group::make([
                            TextInput::make("title")
                                ->required(),

                            TextInput::make("slug")
                                ->required(),

                            Select::make("category_id")
                                ->relationship("category", "name")
                                ->preload()
                                ->searchable(),

                            ColorPicker::make("color"),
                        ])->columns(2),

                        MarkdownEditor::make("content")
                            ->columnSpanFull(),
                    ])
                    ->columnSpan(2),

                Group::make([

                    Section::make("Image Upload")
                        ->description("Upload gambar utama")
                        ->icon("heroicon-o-photo")
                        ->schema([
                            FileUpload::make("image")
                                ->image()
                                ->disk("public")
                                ->directory("posts"),
                        ]),

                    Section::make("Meta Information")
                        ->description("Informasi tambahan")
                        ->icon("heroicon-o-cog-6-tooth")
                        ->schema([
                            TagsInput::make("tags"),
                            Checkbox::make("published"),
                            DateTimePicker::make("published_at"),
                        ])
                        ->columns(1),
                ])->columnSpan(1),
            ]);
    }
}
