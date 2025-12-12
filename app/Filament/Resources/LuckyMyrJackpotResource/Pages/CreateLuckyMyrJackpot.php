<?php

namespace App\Filament\Resources\LuckyMyrJackpotResource\Pages;

use App\Filament\Resources\LuckyMyrJackpotResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLuckyMyrJackpot extends CreateRecord
{
    protected static string $resource = LuckyMyrJackpotResource::class;

    protected function getCreatedNotification(): ?\Filament\Notifications\Notification
    {
        // 这里可以自定义成功消息
        return \Filament\Notifications\Notification::make()
            ->success()
            ->title('Lucky Jackpot (myr) Created')
            ->body('The Lucky Jackpot (myr) has been successfully created.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
