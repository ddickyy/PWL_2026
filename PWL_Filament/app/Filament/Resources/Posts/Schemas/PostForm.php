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
            ->components([
                Section::make("Post Details")
                    ->description("Fill in the details of the post.")
                    ->icon("heroicon-o-document-text")
                    ->schema([
                        Group::make([
                            TextInput::make("title"),
                            TextInput::make("slug"),
                            Select::make("category_id")
                                ->relationship("category", "name")
                                ->preload()
                                ->searchable(),
                            ColorPicker::make("color"),
                        ])->columns(2),
                        MarkdownEditor::make("content"),
                    ])->columnSpan(2),

                Group::make([
                    Section::make("Image Upload")
                        // RichEditor::make("Content"),
                        ->schema([
                            FileUpload::make("image")
                                ->disk("public")
                                ->directory("posts"),
                        ]),

                    Section::make("Meta Information")
                        ->schema([
                            TagsInput::make("tags"),
                            Checkbox::make("published"),
                        ])->columns(2),
                    DateTimePicker::make("published_at"),
                ])->columnSpan(1),
            ])->columns(3);
    }
}
