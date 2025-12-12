<?php

namespace App\Filament\Resources\WinboxMyrUsdJackpotResource\Pages;

use App\Filament\Resources\WinboxMyrUsdJackpotResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWinboxMyrUsdJackpot extends EditRecord
{
    protected static string $resource = WinboxMyrUsdJackpotResource::class;

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
            ->title('Winbox Jackpot (myr-usd) Updated')
            ->body('The Winbox Jackpot (myr-usd) has been successfully updated.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
