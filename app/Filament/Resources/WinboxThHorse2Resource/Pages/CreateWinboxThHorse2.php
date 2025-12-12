<?php

namespace App\Filament\Resources\WinboxThHorse2Resource\Pages;

use App\Filament\Resources\WinboxThHorse2Resource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWinboxThHorse2 extends CreateRecord
{
    protected static string $resource = WinboxThHorse2Resource::class;

    protected function getCreatedNotification(): ?\Filament\Notifications\Notification
    {
        // 这里可以自定义成功消息
        return \Filament\Notifications\Notification::make()
            ->success()
            ->title('Th Horse-2 Created')
            ->body('The Th Horse-2 has been successfully created.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
