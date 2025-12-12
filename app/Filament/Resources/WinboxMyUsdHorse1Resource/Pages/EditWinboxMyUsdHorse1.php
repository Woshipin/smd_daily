<?php

namespace App\Filament\Resources\WinboxMyUsdHorse1Resource\Pages;

use App\Filament\Resources\WinboxMyUsdHorse1Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWinboxMyUsdHorse1 extends EditRecord
{
    protected static string $resource = WinboxMyUsdHorse1Resource::class;

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
            ->title('My Usd Horse-1 Updated')
            ->body('The My Usd Horse-1 has been successfully updated.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
