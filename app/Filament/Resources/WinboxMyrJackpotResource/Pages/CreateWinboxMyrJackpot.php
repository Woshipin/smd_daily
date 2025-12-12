<?php

namespace App\Filament\Resources\WinboxMyrJackpotResource\Pages;

use App\Filament\Resources\WinboxMyrJackpotResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWinboxMyrJackpot extends CreateRecord
{
    protected static string $resource = WinboxMyrJackpotResource::class;

    protected function getCreatedNotification(): ?\Filament\Notifications\Notification
    {
        // 这里可以自定义成功消息
        return \Filament\Notifications\Notification::make()
            ->success()
            ->title('Winbox Jackpot (myr) Created')
            ->body('The Winbox Jackpot (myr) has been successfully created.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
