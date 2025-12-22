<?php

namespace App\Filament\Resources\AtasMyFootball2Resource\Pages;

use App\Filament\Resources\AtasMyFootball2Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\AtasMyFootball2Resource\Widgets\AtasMyFootballInformation2ResourceWidget; // <--- 引入刚才创建的 Widget

class ListAtasMyFootball2s extends ListRecords
{
    protected static string $resource = AtasMyFootball2Resource::class;

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
            AtasMyFootballInformation2ResourceWidget::class,
        ];
    }
}
