<?php

namespace App\Filament\Resources\LuckyMyrJackpotResource\Pages;

use App\Filament\Resources\LuckyMyrJackpotResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLuckyMyrJackpot extends EditRecord
{
    protected static string $resource = LuckyMyrJackpotResource::class;

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
            ->title('Lucky Jackpot (myr) Updated')
            ->body('The Lucky Jackpot (myr) has been successfully updated.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
