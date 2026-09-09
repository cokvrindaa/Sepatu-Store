<?php

namespace App\Filament\Resources\ProductTranscations\Schemas;

use App\Models\PromoCode;
use App\Models\Shoe;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
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

                                // #1
                                // Setelah data selectnya terisi data shoe
                                ->afterStateUpdated(function ($state, callable $get, callable $set) {
                                    $shoe = Shoe::find($state); // mengecek id dari kondisi select tadi yakni 1

                                    // Menghitung sub total
                                    // Jika variabel sepatu ke isi maka akan mengisi var price bedasarkan price diDB
                                    $price = $shoe ? $shoe->price : 0;
                                    $quantity = $get('quantity') ?? 1; // deafult 1
                                    $subTotalAmount = $price * $quantity;
                                    $set('price', $price);
                                    $set('sub_total_amount', $subTotalAmount);

                                    // Menghitung diskon dan total akhir
                                    $discount = $get('discount_amount') ?? 0;
                                    $grandTotalAmount = $subTotalAmount - $discount;
                                    $set('grand_total_amount', $grandTotalAmount);

                                    // Mengambil data bedasarkan id sepatu lalu ubah menjadi array
                                    $sizes = $shoe ? $shoe->sizes->pluck('size', 'id')->toArray() : [];
                                    $set('shoe_sizes', $sizes);

                                })

                                // Method ini akan dijalankan ketika data sebelumnya dipilih
                                ->afterStateHydrated(function (callable $get, callable $set, $state) {
                                    $shoeId = $state;
                                    if ($shoeId) {
                                        $shoe = Shoe::find($shoeId);
                                        $sizes = $shoe ? $shoe->sizes->pluck('size', 'id')->toArray() : [];
                                        $set('shoe_sizes', $sizes);

                                    }
                                }),

                            // Shoe size
                            Select::make('shoe_size')
                                ->label('Shoe Size')
                                ->options(function (callable $get) {
                                    $sizes = $get('shoe_sizes');

                                    return is_array($sizes) ? $sizes : [];
                                })
                                ->required()
                                ->live(),

                            // quantity
                            TextInput::make('quantity')
                                ->required()
                                ->numeric()
                                ->prefix('Qty')
                                ->live()
                                // menyesuaikan harga quantity ketika di upadate/diubah , misal deafult satu, kita menambahkan jadi 2 dst
                                ->afterStateUpdated(function ($state, callable $get, callable $set) {
                                    $price = $get('price');
                                    $quantity = $state;
                                    $subTotalAmount = $price * $quantity;

                                    $set('sub_total_amount', $subTotalAmount);

                                    $discount = $get('discount_amount') ?? 0;
                                    $grandTotalAmount = $subTotalAmount - $discount;
                                    $set('grand_total_amount', $grandTotalAmount);
                                }),

                            // Promocode
                            Select::make('promo_code_id')
                                ->relationship('promoCode', 'code')
                                ->searchable()
                                ->preload()
                                ->live()
                                // Ketika kode promo di pilih, lalu update harganya
                                ->afterStateUpdated(function ($state, callable $get, callable $set) {
                                    $subTotalAmount = $get('sub_total_amount');
                                    $promoCode = PromoCode::find($state);
                                    $discount = $promoCode ? $promoCode->discount_amount : 0;

                                    $set('discount_amount', $discount);
                                    $grandTotalAmount = $subTotalAmount - $discount;
                                    $set('grand_total_amount', $grandTotalAmount);
                                }),

                            TextInput::make('sub_total_amount')
                                ->required()
                                ->readOnly()
                                ->numeric()
                                ->prefix('IDR'),

                            TextInput::make('grand_total_amount')
                                ->required()
                                ->readOnly()
                                ->numeric()
                                ->prefix('IDR'),

                            TextInput::make('discount_amount')
                                ->readOnly()
                                ->numeric()
                                ->prefix('IDR')
                                ->default(0),

                        ]),
                    ]),
                    Step::make('Informasi Pelanggan')->schema([
                        Grid::make(2)->schema([
                            TextInput::make('name')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('phone')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('email')
                                ->required()
                                ->maxLength(255),
                            Textarea::make('address')
                                ->required()
                                ->rows(5),
                            TextInput::make('city')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('post_code')
                                ->required()
                                ->maxLength(255),
                        ]),
                    ]),
                    Step::make('Informasi Pembayaran')->schema([
                        TextInput::make('booking_trx_id')
                            ->required()
                            ->maxLength(255),
                        ToggleButtons::make('is_paid')
                            ->label('apakah sudah membayar')
                            ->boolean()
                            ->grouped()
                            ->icons([
                                false => 'heroicon-o-x-mark',
                                true => 'heroicon-o-check',
                            ])
                            ->required(),
                        FileUpload::make('proof')
                            ->image()
                            ->required(),

                    ]),
                ]),
            ]);
    }
}