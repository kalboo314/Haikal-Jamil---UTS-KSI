<?php

namespace App\Filament\Admin\Resources\DokumenResource\Pages;

use App\Filament\Admin\Resources\DokumenResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDokumen extends EditRecord
{
    protected static string $resource = DokumenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
