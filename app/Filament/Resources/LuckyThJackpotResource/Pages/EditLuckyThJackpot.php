<?php

namespace App\Filament\Resources\LuckyThJackpotResource\Pages;

use App\Filament\Resources\LuckyThJackpotResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLuckyThJackpot extends EditRecord
{
    protected static string $resource = LuckyThJackpotResource::class;

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
            ->title('Lucky Jackpot (th) Updated')
            ->body('The Lucky Jackpot (th) has been successfully updated.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
