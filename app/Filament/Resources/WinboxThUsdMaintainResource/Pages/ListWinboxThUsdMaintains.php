<?php

namespace App\Filament\Resources\WinboxThUsdMaintainResource\Pages;

use App\Filament\Resources\WinboxThUsdMaintainResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\WinboxThUsdMaintainResource\Widgets\WinboxThUsdMaintainInformation1Widget;
use App\Filament\Resources\WinboxThUsdMaintainResource\Widgets\WinboxThUsdMaintainInformation2Widget;
use App\Filament\Resources\WinboxThUsdMaintainResource\Widgets\WinboxThUsdMaintainInformationThWidget;
use App\Filament\Resources\WinboxThUsdMaintainResource\Widgets\WinboxThUsdMaintainInformationEnWidget;

class ListWinboxThUsdMaintains extends ListRecords
{
    protected static string $resource = WinboxThUsdMaintainResource::class;

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
            WinboxThUsdMaintainInformation1Widget::class,
            WinboxThUsdMaintainInformation2Widget::class,
            WinboxThUsdMaintainInformationThWidget::class,
            WinboxThUsdMaintainInformationEnWidget::class,
        ];
    }
}
