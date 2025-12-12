<?php

namespace App\Filament\Resources\WinboxMyrJackpotResource\Pages;

use App\Filament\Resources\WinboxMyrJackpotResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\WinboxMyrJackpotResource\Widgets\WinboxMyrJackpotInformationEnWidget;
use App\Filament\Resources\WinboxMyrJackpotResource\Widgets\WinboxMyrJackpotInformationZhWidget;

class ListWinboxMyrJackpots extends ListRecords
{
    protected static string $resource = WinboxMyrJackpotResource::class;

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
            WinboxMyrJackpotInformationZhWidget::class,
            WinboxMyrJackpotInformationEnWidget::class,
        ];
    }
}
