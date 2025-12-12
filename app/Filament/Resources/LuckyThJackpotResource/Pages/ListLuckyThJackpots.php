<?php

namespace App\Filament\Resources\LuckyThJackpotResource\Pages;

use App\Filament\Resources\LuckyThJackpotResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
// 引入上面创建的两个 Widget
use App\Filament\Resources\LuckyThJackpotResource\Widgets\LuckyThJackpotInformationEnWidget;
use App\Filament\Resources\LuckyThJackpotResource\Widgets\LuckyThJackpotInformationThWidget;

class ListLuckyThJackpots extends ListRecords
{
    protected static string $resource = LuckyThJackpotResource::class;

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
            LuckyThJackpotInformationThWidget::class,
            LuckyThJackpotInformationEnWidget::class,
        ];
    }
}
