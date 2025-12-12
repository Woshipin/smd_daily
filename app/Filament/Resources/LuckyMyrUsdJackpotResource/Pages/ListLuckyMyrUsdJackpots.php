<?php

namespace App\Filament\Resources\LuckyMyrUsdJackpotResource\Pages;

use App\Filament\Resources\LuckyMyrUsdJackpotResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
// 引入上面创建的两个 Widget
use App\Filament\Resources\LuckyMyrUsdJackpotResource\Widgets\LuckyMyrUsdJackpotInformationEnWidget;
use App\Filament\Resources\LuckyMyrUsdJackpotResource\Widgets\LuckyMyrUsdJackpotInformationZhWidget;

class ListLuckyMyrUsdJackpots extends ListRecords
{
    protected static string $resource = LuckyMyrUsdJackpotResource::class;

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
            LuckyMyrUsdJackpotInformationZhWidget::class,
            LuckyMyrUsdJackpotInformationEnWidget::class,
        ];
    }
}
