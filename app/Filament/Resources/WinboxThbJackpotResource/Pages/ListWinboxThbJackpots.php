<?php

namespace App\Filament\Resources\WinboxThbJackpotResource\Pages;

use App\Filament\Resources\WinboxThbJackpotResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\WinboxThbJackpotResource\Widgets\WinboxThbJackpotInformationThWidget;
use App\Filament\Resources\WinboxThbJackpotResource\Widgets\WinboxThbJackpotInformationEnWidget;

class ListWinboxThbJackpots extends ListRecords
{
    protected static string $resource = WinboxThbJackpotResource::class;

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
            WinboxThbJackpotInformationThWidget::class,
            WinboxThbJackpotInformationEnWidget::class,
        ];
    }
}
