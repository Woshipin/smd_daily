<?php

namespace App\Filament\Resources\WinboxThHorse1Resource\Pages;

use App\Filament\Resources\WinboxThHorse1Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\WinboxThHorse1Resource\Widgets\WinboxThHorseInformation1Widget;

class ListWinboxThHorse1s extends ListRecords
{
    protected static string $resource = WinboxThHorse1Resource::class;

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
            WinboxThHorseInformation1Widget::class,
        ];
    }
}
