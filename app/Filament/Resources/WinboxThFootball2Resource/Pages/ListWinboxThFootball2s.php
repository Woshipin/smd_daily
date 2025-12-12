<?php

namespace App\Filament\Resources\WinboxThFootball2Resource\Pages;

use App\Filament\Resources\WinboxThFootball2Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\WinboxThFootball2Resource\Widgets\WinboxThFootballInformation2ResourceWidget; // <--- 引入刚才创建的 Widget

class ListWinboxThFootball2s extends ListRecords
{
    protected static string $resource = WinboxThFootball2Resource::class;

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
            WinboxThFootballInformation2ResourceWidget::class,
        ];
    }
}
