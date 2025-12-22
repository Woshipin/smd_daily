<?php

namespace App\Filament\Resources\AtasMyFootball1Resource\Pages;

use App\Filament\Resources\AtasMyFootball1Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\AtasMyFootball1Resource\Widgets\AtasMyFootballInformation1ResourceWidget; // <--- 引入刚才创建的 Widget

class ListAtasMyFootball1s extends ListRecords
{
    protected static string $resource = AtasMyFootball1Resource::class;

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
            AtasMyFootballInformation1ResourceWidget::class,
        ];
    }
}
