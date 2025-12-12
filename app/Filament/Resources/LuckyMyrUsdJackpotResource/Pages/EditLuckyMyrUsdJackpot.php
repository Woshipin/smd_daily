<?php

namespace App\Filament\Resources\LuckyMyrUsdJackpotResource\Pages;

use App\Filament\Resources\LuckyMyrUsdJackpotResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLuckyMyrUsdJackpot extends EditRecord
{
    protected static string $resource = LuckyMyrUsdJackpotResource::class;

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
            ->title('Lucky Jackpot (myr-usd) Updated')
            ->body('The Lucky Jackpot (myr-usd) has been successfully updated.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
