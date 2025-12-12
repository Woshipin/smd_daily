<?php

namespace App\Filament\Resources\WinboxThUsdMaintainResource\Pages;

use App\Filament\Resources\WinboxThUsdMaintainResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWinboxThUsdMaintain extends CreateRecord
{
    protected static string $resource = WinboxThUsdMaintainResource::class;

    protected function getCreatedNotification(): ?\Filament\Notifications\Notification
    {
        // 这里可以自定义成功消息
        return \Filament\Notifications\Notification::make()
            ->success()
            ->title('Winbox Maintain (th-usd) Created')
            ->body('The Winbox Maintain (th-usd) has been successfully created.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
