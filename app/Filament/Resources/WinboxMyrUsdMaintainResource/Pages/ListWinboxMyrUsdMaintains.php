<?php

namespace App\Filament\Resources\WinboxMyrUsdMaintainResource\Pages;

use App\Filament\Resources\WinboxMyrUsdMaintainResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\WinboxMyrUsdMaintainResource\Widgets\WinboxMyrUsdMaintainInformation1Widget;
use App\Filament\Resources\WinboxMyrUsdMaintainResource\Widgets\WinboxMyrUsdMaintainInformation2Widget;
use App\Filament\Resources\WinboxMyrUsdMaintainResource\Widgets\WinboxMyrUsdMaintainInformationZhWidget;
use App\Filament\Resources\WinboxMyrUsdMaintainResource\Widgets\WinboxMyrUsdMaintainInformationEnWidget;

class ListWinboxMyrUsdMaintains extends ListRecords
{
    protected static string $resource = WinboxMyrUsdMaintainResource::class;

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
            WinboxMyrUsdMaintainInformation1Widget::class,
            WinboxMyrUsdMaintainInformation2Widget::class,
            WinboxMyrUsdMaintainInformationZhWidget::class,
            WinboxMyrUsdMaintainInformationEnWidget::class,
        ];
    }
}
