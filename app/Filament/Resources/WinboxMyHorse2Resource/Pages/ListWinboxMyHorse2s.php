<?php

namespace App\Filament\Resources\WinboxMyHorse2Resource\Pages;

use App\Filament\Resources\WinboxMyHorse2Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\WinboxMyHorse2Resource\Widgets\WinboxMyHorseInformation2Widget;

class ListWinboxMyHorse2s extends ListRecords
{
    protected static string $resource = WinboxMyHorse2Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    // 添加此方法，将 Widget 显示在页面底部
    protected function getFooterWidgets(): array
    {
        return [
            WinboxMyHorseInformation2Widget::class,
        ];
    }
}
