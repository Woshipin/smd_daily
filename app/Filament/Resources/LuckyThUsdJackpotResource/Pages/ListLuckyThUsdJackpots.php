<?php

namespace App\Filament\Resources\LuckyThUsdJackpotResource\Pages;

use App\Filament\Resources\LuckyThUsdJackpotResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
// 引入上面创建的两个 Widget
use App\Filament\Resources\LuckyThUsdJackpotResource\Widgets\LuckyThUsdJackpotInformationEnWidget;
use App\Filament\Resources\LuckyThUsdJackpotResource\Widgets\LuckyThUsdJackpotInformationThWidget;

class ListLuckyThUsdJackpots extends ListRecords
{
    protected static string $resource = LuckyThUsdJackpotResource::class;

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
            LuckyThUsdJackpotInformationThWidget::class,
            LuckyThUsdJackpotInformationEnWidget::class,
        ];
    }
}
