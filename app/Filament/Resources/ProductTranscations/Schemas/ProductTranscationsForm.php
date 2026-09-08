<?php

namespace App\Filament\Resources\ProductTranscations\Schemas;

use App\Models\Shoe;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Schema;

class ProductTranscationsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Wizard::make([
                    // Step untuk 1 , 2 , 3 dst
                    Step::make('Produk dan Harga')->schema([
                        Grid::make(2)->schema([
                            Select::make('shoe_id') // misal : value id 1
                                ->relationship('shoe', 'name')
                                ->searchable()
                                ->preload()
                                ->required()
                                ->live()

                                // setelah terisi shoenya lalu dia memanggil kode dibawah berikut
                                ->afterStateUpdated(function ($state, callable $get, callable $set) {
                                    $shoe = Shoe::find($state); // mengecek id dari kondisi select tadi yakni 1

                                }),
                        ]),
                    ]),
                ]),
            ]);
    }
}
