<?php

namespace App\Filament\Resources\LuckyMyrUsdJackpotResource\Pages;

use App\Filament\Resources\LuckyMyrUsdJackpotResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLuckyMyrUsdJackpot extends CreateRecord
{
    protected static string $resource = LuckyMyrUsdJackpotResource::class;

    protected function getCreatedNotification(): ?\Filament\Notifications\Notification
    {
        // 这里可以自定义成功消息
        return \Filament\Notifications\Notification::make()
            ->success()
            ->title('Lucky Jackpot (myr-usd) Created')
            ->body('The Lucky Jackpot (myr-usd) has been successfully created.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
