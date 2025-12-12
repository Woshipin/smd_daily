<?php

namespace App\Filament\Resources\WinboxThUsdHorse1Resource\Pages;

use App\Filament\Resources\WinboxThUsdHorse1Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\WinboxThUsdHorse1Resource\Widgets\WinboxThUsdHorseInformation1Widget;

class ListWinboxThUsdHorse1s extends ListRecords
{
    protected static string $resource = WinboxThUsdHorse1Resource::class;

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
            WinboxThUsdHorseInformation1Widget::class,
        ];
    }
}
