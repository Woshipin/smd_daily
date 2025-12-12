<?php

namespace App\Filament\Resources\WinboxMyUsdHorse1Resource\Pages;

use App\Filament\Resources\WinboxMyUsdHorse1Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\WinboxMyUsdHorse1Resource\Widgets\WinboxMyUsdHorseInformation1Widget;

class ListWinboxMyUsdHorse1s extends ListRecords
{
    protected static string $resource = WinboxMyUsdHorse1Resource::class;

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
            WinboxMyUsdHorseInformation1Widget::class,
        ];
    }
}
