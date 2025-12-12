<?php

namespace App\Filament\Resources\LuckyThUsdJackpotResource\Pages;

use App\Filament\Resources\LuckyThUsdJackpotResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLuckyThUsdJackpot extends EditRecord
{
    protected static string $resource = LuckyThUsdJackpotResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getSavedNotification(): ?\Filament\Notifications\Notification
    {
        return \Filament\Notifications\Notification::make()
            ->success()
            ->title('Lucky Jackpot (th-usd) Updated')
            ->body('The Lucky Jackpot (th-usd) has been successfully updated.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
