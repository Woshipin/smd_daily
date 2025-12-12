<?php

namespace App\Filament\Resources\WinboxThFootball1Resource\Pages;

use App\Filament\Resources\WinboxThFootball1Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWinboxThFootball1 extends EditRecord
{
    protected static string $resource = WinboxThFootball1Resource::class;

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
            ->title('Th Football-1 Updated')
            ->body('The Th Football-1 has been successfully updated.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
