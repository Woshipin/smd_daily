<?php

namespace App\Filament\Resources\WinboxMyHorse1Resource\Pages;

use App\Filament\Resources\WinboxMyHorse1Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWinboxMyHorse1 extends EditRecord
{
    protected static string $resource = WinboxMyHorse1Resource::class;

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
            ->title('My Horse-1 Updated')
            ->body('The My Horse-1 has been successfully updated.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
