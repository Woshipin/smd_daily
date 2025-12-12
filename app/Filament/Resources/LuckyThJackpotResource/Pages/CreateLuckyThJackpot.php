<?php

namespace App\Filament\Resources\LuckyThJackpotResource\Pages;

use App\Filament\Resources\LuckyThJackpotResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLuckyThJackpot extends CreateRecord
{
    protected static string $resource = LuckyThJackpotResource::class;

    protected function getCreatedNotification(): ?\Filament\Notifications\Notification
    {
        // 这里可以自定义成功消息
        return \Filament\Notifications\Notification::make()
            ->success()
            ->title('Lucky Jackpot (th) Created')
            ->body('The Lucky Jackpot (th) has been successfully created.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
