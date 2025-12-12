<?php

namespace App\Filament\Resources\WinboxThHorse2Resource\Pages;

use App\Filament\Resources\WinboxThHorse2Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\WinboxThHorse2Resource\Widgets\WinboxThHorseInformation2Widget;

class ListWinboxThHorse2s extends ListRecords
{
    protected static string $resource = WinboxThHorse2Resource::class;

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
            WinboxThHorseInformation2Widget::class,
        ];
    }
}
