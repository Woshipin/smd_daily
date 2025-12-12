<?php

namespace App\Filament\Resources\WinboxThUsdHorse2Resource\Pages;

use App\Filament\Resources\WinboxThUsdHorse2Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\WinboxThUsdHorse2Resource\Widgets\WinboxThUsdHorseInformation2Widget;

class ListWinboxThUsdHorse2s extends ListRecords
{
    protected static string $resource = WinboxThUsdHorse2Resource::class;

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
            WinboxThUsdHorseInformation2Widget::class,
        ];
    }
}
