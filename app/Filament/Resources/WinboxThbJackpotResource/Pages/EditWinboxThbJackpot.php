<?php

namespace App\Filament\Resources\WinboxThbJackpotResource\Pages;

use App\Filament\Resources\WinboxThbJackpotResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWinboxThbJackpot extends EditRecord
{
    protected static string $resource = WinboxThbJackpotResource::class;

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
            ->title('Winbox Jackpot (thb) Updated')
            ->body('The Winbox Jackpot (thb) has been successfully updated.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
