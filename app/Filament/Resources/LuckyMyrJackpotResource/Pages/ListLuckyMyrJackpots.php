<?php

namespace App\Filament\Resources\LuckyMyrJackpotResource\Pages;

use App\Filament\Resources\LuckyMyrJackpotResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
// 引入上面创建的两个 Widget
use App\Filament\Resources\LuckyMyrJackpotResource\Widgets\LuckyMyrJackpotInformationEnWidget;
use App\Filament\Resources\LuckyMyrJackpotResource\Widgets\LuckyMyrJackpotInformationZhWidget;

class ListLuckyMyrJackpots extends ListRecords
{
    protected static string $resource = LuckyMyrJackpotResource::class;

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
            LuckyMyrJackpotInformationZhWidget::class,
            LuckyMyrJackpotInformationEnWidget::class,
        ];
    }
}