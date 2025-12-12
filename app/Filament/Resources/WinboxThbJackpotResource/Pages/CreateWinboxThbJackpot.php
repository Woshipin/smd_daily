<?php

namespace App\Filament\Resources\WinboxThbJackpotResource\Pages;

use App\Filament\Resources\WinboxThbJackpotResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWinboxThbJackpot extends CreateRecord
{
    protected static string $resource = WinboxThbJackpotResource::class;

    protected function getCreatedNotification(): ?\Filament\Notifications\Notification
    {
        // 这里可以自定义成功消息
        return \Filament\Notifications\Notification::make()
            ->success()
            ->title('Winbox Jackpot (thb) Created')
            ->body('The Winbox Jackpot (thb) has been successfully created.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
