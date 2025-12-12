<?php

namespace App\Filament\Resources\WinboxZhFootball1Resource\Pages;

use App\Filament\Resources\WinboxZhFootball1Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\WinboxZhFootball1Resource\Widgets\WinboxZhFootballInformation1ResourceWidget; // <--- 引入刚才创建的 Widget

class ListWinboxZhFootball1s extends ListRecords
{
    protected static string $resource = WinboxZhFootball1Resource::class;

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
            WinboxZhFootballInformation1ResourceWidget::class,
        ];
    }
}
