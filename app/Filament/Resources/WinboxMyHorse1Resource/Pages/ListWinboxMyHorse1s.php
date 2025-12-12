<?php

namespace App\Filament\Resources\WinboxMyHorse1Resource\Pages;

use App\Filament\Resources\WinboxMyHorse1Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\WinboxMyHorse1Resource\Widgets\WinboxMyHorseInformation1Widget;

class ListWinboxMyHorse1s extends ListRecords
{
    protected static string $resource = WinboxMyHorse1Resource::class;

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
            WinboxMyHorseInformation1Widget::class,
        ];
    }
}
