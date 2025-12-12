<?php

namespace App\Filament\Resources\WinboxThMaintainResource\Pages;

use App\Filament\Resources\WinboxThMaintainResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\WinboxThMaintainResource\Widgets\WinboxThMaintainInformation1Widget;
use App\Filament\Resources\WinboxThMaintainResource\Widgets\WinboxThMaintainInformation2Widget;
use App\Filament\Resources\WinboxThMaintainResource\Widgets\WinboxThMaintainInformationThWidget;
use App\Filament\Resources\WinboxThMaintainResource\Widgets\WinboxThMaintainInformationEnWidget;

class ListWinboxThMaintains extends ListRecords
{
    protected static string $resource = WinboxThMaintainResource::class;

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
            WinboxThMaintainInformation1Widget::class,
            WinboxThMaintainInformation2Widget::class,
            WinboxThMaintainInformationThWidget::class,
            WinboxThMaintainInformationEnWidget::class,
        ];
    }
}
