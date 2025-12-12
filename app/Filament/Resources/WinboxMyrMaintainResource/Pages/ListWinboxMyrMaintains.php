<?php

namespace App\Filament\Resources\WinboxMyrMaintainResource\Pages;

use App\Filament\Resources\WinboxMyrMaintainResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\WinboxMyrMaintainResource\Widgets\WinboxMyrMaintainInformation1Widget;
use App\Filament\Resources\WinboxMyrMaintainResource\Widgets\WinboxMyrMaintainInformation2Widget;
use App\Filament\Resources\WinboxMyrMaintainResource\Widgets\WinboxMyrMaintainInformationZhWidget;
use App\Filament\Resources\WinboxMyrMaintainResource\Widgets\WinboxMyrMaintainInformationEnWidget;

class ListWinboxMyrMaintains extends ListRecords
{
    protected static string $resource = WinboxMyrMaintainResource::class;

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
            WinboxMyrMaintainInformation1Widget::class,
            WinboxMyrMaintainInformation2Widget::class,
            WinboxMyrMaintainInformationZhWidget::class,
            WinboxMyrMaintainInformationEnWidget::class,
        ];
    }
}
