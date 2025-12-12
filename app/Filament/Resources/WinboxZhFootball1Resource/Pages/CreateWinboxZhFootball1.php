<?php

namespace App\Filament\Resources\WinboxZhFootball1Resource\Pages;

use App\Filament\Resources\WinboxZhFootball1Resource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWinboxZhFootball1 extends CreateRecord
{
    protected static string $resource = WinboxZhFootball1Resource::class;

    protected function getCreatedNotification(): ?\Filament\Notifications\Notification
    {
        // 这里可以自定义成功消息
        return \Filament\Notifications\Notification::make()
            ->success()
            ->title('My Football-1 Created')
            ->body('The My Football-1 has been successfully created.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
