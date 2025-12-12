<?php

namespace App\Filament\Resources\WinboxThMaintainResource\Pages;

use App\Filament\Resources\WinboxThMaintainResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWinboxThMaintain extends CreateRecord
{
    protected static string $resource = WinboxThMaintainResource::class;

    protected function getCreatedNotification(): ?\Filament\Notifications\Notification
    {
        // 这里可以自定义成功消息
        return \Filament\Notifications\Notification::make()
            ->success()
            ->title('Winbox Maintain (th) Created')
            ->body('The Winbox Maintain (th) has been successfully created.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
