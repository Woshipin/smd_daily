<?php

namespace App\Filament\Resources\WinboxThbUsdJackpotResource\Pages;

use App\Filament\Resources\WinboxThbUsdJackpotResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWinboxThbUsdJackpot extends CreateRecord
{
    protected static string $resource = WinboxThbUsdJackpotResource::class;

    protected function getCreatedNotification(): ?\Filament\Notifications\Notification
    {
        // 这里可以自定义成功消息
        return \Filament\Notifications\Notification::make()
            ->success()
            ->title('Winbox Jackpot (thb-usd) Created')
            ->body('The Winbox Jackpot (thb-usd) has been successfully created.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
