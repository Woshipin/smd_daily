<?php

namespace App\Filament\Resources\WinboxMyrUsdMaintainResource\Pages;

use App\Filament\Resources\WinboxMyrUsdMaintainResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWinboxMyrUsdMaintain extends CreateRecord
{
    protected static string $resource = WinboxMyrUsdMaintainResource::class;

    protected function getCreatedNotification(): ?\Filament\Notifications\Notification
    {
        // 这里可以自定义成功消息
        return \Filament\Notifications\Notification::make()
            ->success()
            ->title('Winbox Maintain (myr-usd) Created')
            ->body('The Winbox Maintain (myr-usd) has been successfully created.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
