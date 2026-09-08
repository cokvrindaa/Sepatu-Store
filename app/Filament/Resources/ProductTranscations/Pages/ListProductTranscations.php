<?php

namespace App\Filament\Resources\ProductTranscations\Pages;

use App\Filament\Resources\ProductTranscations\ProductTranscationsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProductTranscations extends ListRecords
{
    protected static string $resource = ProductTranscationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
