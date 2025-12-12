<?php

namespace App\Filament\Resources\WinboxMyHorse1Resource\Pages;

use App\Filament\Resources\WinboxMyHorse1Resource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWinboxMyHorse1 extends CreateRecord
{
    protected static string $resource = WinboxMyHorse1Resource::class;

    protected function getCreatedNotification(): ?\Filament\Notifications\Notification
    {
        // 这里可以自定义成功消息
        return \Filament\Notifications\Notification::make()
            ->success()
            ->title('My Horse-1 Created')
            ->body('The My Horse-1 has been successfully created.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
