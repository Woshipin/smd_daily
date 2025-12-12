<?php

namespace App\Filament\Resources\WinboxThbUsdJackpotResource\Pages;

use App\Filament\Resources\WinboxThbUsdJackpotResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWinboxThbUsdJackpot extends EditRecord
{
    protected static string $resource = WinboxThbUsdJackpotResource::class;

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
            ->title('Winbox Jackpot (thb-usd) Updated')
            ->body('The Winbox Jackpot (thb-usd) has been successfully updated.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
