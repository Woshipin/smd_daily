<?php

namespace App\Filament\Resources\WinboxMyrMaintainResource\Pages;

use App\Filament\Resources\WinboxMyrMaintainResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWinboxMyrMaintain extends CreateRecord
{
    protected static string $resource = WinboxMyrMaintainResource::class;

    protected function getCreatedNotification(): ?\Filament\Notifications\Notification
    {
        // 这里可以自定义成功消息
        return \Filament\Notifications\Notification::make()
            ->success()
            ->title('Winbox Maintain (myr) Created')
            ->body('The Winbox Maintain (myr) has been successfully created.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
