<?php

namespace App\Filament\Resources\WinboxThbUsdJackpotResource\Pages;

use App\Filament\Resources\WinboxThbUsdJackpotResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\WinboxThbUsdJackpotResource\Widgets\WinboxThbUsdJackpotInformationThWidget;
use App\Filament\Resources\WinboxThbUsdJackpotResource\Widgets\WinboxThbUsdJackpotInformationEnWidget;

class ListWinboxThbUsdJackpots extends ListRecords
{
    protected static string $resource = WinboxThbUsdJackpotResource::class;

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
            WinboxThbUsdJackpotInformationThWidget::class,
            WinboxThbUsdJackpotInformationEnWidget::class,
        ];
    }
}
