<?php

namespace App\Filament\Resources\WinboxThFootball1Resource\Pages;

use App\Filament\Resources\WinboxThFootball1Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\WinboxThFootball1Resource\Widgets\WinboxThFootballInformation1ResourceWidget; // <--- 引入刚才创建的 Widget

class ListWinboxThFootball1s extends ListRecords
{
    protected static string $resource = WinboxThFootball1Resource::class;

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
            WinboxThFootballInformation1ResourceWidget::class,
        ];
    }
}
