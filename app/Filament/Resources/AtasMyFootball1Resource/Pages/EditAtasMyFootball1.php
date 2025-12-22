<?php

namespace App\Filament\Resources\AtasMyFootball1Resource\Pages;

use App\Filament\Resources\AtasMyFootball1Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAtasMyFootball1 extends EditRecord
{
    protected static string $resource = AtasMyFootball1Resource::class;

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
            ->title('My Football-1 Updated')
            ->body('The My Football-1 has been successfully updated.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
