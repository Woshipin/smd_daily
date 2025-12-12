<?php

namespace App\Filament\Resources\WinboxThFootball2Resource\Pages;

use App\Filament\Resources\WinboxThFootball2Resource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWinboxThFootball2 extends CreateRecord
{
    protected static string $resource = WinboxThFootball2Resource::class;

    protected function getCreatedNotification(): ?\Filament\Notifications\Notification
    {
        // 这里可以自定义成功消息
        return \Filament\Notifications\Notification::make()
            ->success()
            ->title('Th Football-2 Created')
            ->body('The Th Football-2 has been successfully created.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
