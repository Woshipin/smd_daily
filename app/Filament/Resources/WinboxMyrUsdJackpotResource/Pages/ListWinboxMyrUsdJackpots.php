<?php

namespace App\Filament\Resources\WinboxMyrUsdJackpotResource\Pages;

use App\Filament\Resources\WinboxMyrUsdJackpotResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\WinboxMyrUsdJackpotResource\Widgets\WinboxMyrUsdJackpotInformationEnWidget;
use App\Filament\Resources\WinboxMyrUsdJackpotResource\Widgets\WinboxMyrUsdJackpotInformationZhWidget;

class ListWinboxMyrUsdJackpots extends ListRecords
{
    protected static string $resource = WinboxMyrUsdJackpotResource::class;

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
            WinboxMyrUsdJackpotInformationZhWidget::class,
            WinboxMyrUsdJackpotInformationEnWidget::class,
        ];
    }
}
