<?php

namespace App\Filament\Resources\Shoes\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

class ShoeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Fieldset::make('Details')->schema([
                    TextInput::make('name')
                        ->maxLength(255)
                        ->required(),
                    TextInput::make('price')
                        ->required()
                        ->numeric()
                        ->prefix('IDR'),
                    FileUpload::make('thumbnail')
                        ->image()
                        ->disk('public')
                        ->directory('shoes/thumbnails')
                        ->required(),
                    TextInput::make('description')
                        ->required(),

                    // Repeater digunakan untuk menambahkan data lebih dari satu terutama dari segi UI
                    Repeater::make('photos')
                        ->relationship('photos')
                        ->schema([
                            FileUpload::make('photo')
                                ->disk('public')
                                ->directory('shoes')
                                ->required(),
                        ]),
                    Repeater::make('sizes')
                        ->relationship('sizes')
                        ->schema([
                            TextInput::make('size')
                                ->required(),
                        ]),
                ]),

                Fieldset::make('Opsional')->schema([
                    Textarea::make('about')
                        ->required()
                        ->columnSpanFull(),

                    Select::make('category_id')
                        ->relationship('category', 'name')
                        ->searchable()
                        ->preload()
                        ->required(),

                    Select::make('brand_id')
                        ->relationship('brand', 'name')
                        ->searchable()
                        ->preload()
                        ->required(),

                    Select::make('is_popular')
                        ->options([
                            true => 'Popular',
                            false => 'Not Popular',
                        ])
                        ->required(),

                    TextInput::make('stock')
                        ->prefix('Qty')
                        ->numeric()
                        ->required(),

                ]),
            ]);
    }
}