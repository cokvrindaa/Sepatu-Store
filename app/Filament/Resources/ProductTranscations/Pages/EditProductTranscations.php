<?php

namespace App\Filament\Resources\ProductTranscations\Pages;

use App\Filament\Resources\ProductTranscations\ProductTranscationsResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditProductTranscations extends EditRecord
{
    protected static string $resource = ProductTranscationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
