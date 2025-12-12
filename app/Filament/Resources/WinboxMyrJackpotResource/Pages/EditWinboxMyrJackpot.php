<?php

namespace App\Filament\Resources\WinboxMyrJackpotResource\Pages;

use App\Filament\Resources\WinboxMyrJackpotResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWinboxMyrJackpot extends EditRecord
{
    protected static string $resource = WinboxMyrJackpotResource::class;

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
            ->title('Winbox Jackpot (myr) Updated')
            ->body('The Winbox Jackpot (myr) has been successfully updated.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
