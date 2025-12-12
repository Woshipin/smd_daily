<?php

namespace App\Filament\Resources\WinboxMyHorse2Resource\Pages;

use App\Filament\Resources\WinboxMyHorse2Resource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWinboxMyHorse2 extends CreateRecord
{
    protected static string $resource = WinboxMyHorse2Resource::class;

    protected function getCreatedNotification(): ?\Filament\Notifications\Notification
    {
        // 这里可以自定义成功消息
        return \Filament\Notifications\Notification::make()
            ->success()
            ->title('My Horse-2 Created')
            ->body('The My Horse-2 has been successfully created.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
