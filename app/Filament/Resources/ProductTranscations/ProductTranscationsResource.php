<?php

namespace App\Filament\Resources\ProductTranscations;

use App\Filament\Resources\ProductTranscations\Pages\CreateProductTranscations;
use App\Filament\Resources\ProductTranscations\Pages\EditProductTranscations;
use App\Filament\Resources\ProductTranscations\Pages\ListProductTranscations;
use App\Filament\Resources\ProductTranscations\Schemas\ProductTranscationsForm;
use App\Filament\Resources\ProductTranscations\Tables\ProductTranscationsTable;
use App\Models\ProductTranscations;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductTranscationsResource extends Resource
{
    protected static ?string $model = ProductTranscations::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'ProductTranscations';

    public static function form(Schema $schema): Schema
    {
        return ProductTranscationsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProductTranscationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProductTranscations::route('/'),
            'create' => CreateProductTranscations::route('/create'),
            'edit' => EditProductTranscations::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
