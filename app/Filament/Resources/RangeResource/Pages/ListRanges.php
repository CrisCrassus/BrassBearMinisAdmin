<?php

namespace App\Filament\Resources\RangeResource\Pages;

use App\Filament\Resources\RangeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRanges extends ListRecords
{
    protected static string $resource = RangeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
