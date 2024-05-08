<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\Redirect;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Action::make('Visit')
                ->action(function () {
                    return Redirect::away(config('app.url') . '/products/' . $this->record->slug);
                }),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if($data['sold_at']) {
            $data['sold_at'] = now();
        } else {
            $data['sold_at'] = null;
        }
        return $data;
    }

    public function getTitle(): string|Htmlable
    {
        return "Edit " . $this->record->title;
    }
}
