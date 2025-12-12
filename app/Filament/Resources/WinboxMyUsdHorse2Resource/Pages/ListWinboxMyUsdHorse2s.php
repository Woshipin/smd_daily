<?php

namespace App\Filament\Resources\WinboxMyUsdHorse2Resource\Pages;

use App\Filament\Resources\WinboxMyUsdHorse2Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\WinboxMyUsdHorse2Resource\Widgets\WinboxMyUsdHorseInformation2Widget;

class ListWinboxMyUsdHorse2s extends ListRecords
{
    protected static string $resource = WinboxMyUsdHorse2Resource::class;

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
            WinboxMyUsdHorseInformation2Widget::class,
        ];
    }
}
