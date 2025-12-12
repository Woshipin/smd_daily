<?php

namespace App\Filament\Resources\WinboxThUsdHorse1Resource\Pages;

use App\Filament\Resources\WinboxThUsdHorse1Resource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWinboxThUsdHorse1 extends CreateRecord
{
    protected static string $resource = WinboxThUsdHorse1Resource::class;

    protected function getCreatedNotification(): ?\Filament\Notifications\Notification
    {
        // 这里可以自定义成功消息
        return \Filament\Notifications\Notification::make()
            ->success()
            ->title('Th-usd Horse-1 Created')
            ->body('The Th-usd Horse-1 has been successfully created.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
