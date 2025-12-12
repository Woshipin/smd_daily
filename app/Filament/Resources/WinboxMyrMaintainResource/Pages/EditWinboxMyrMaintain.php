<?php

namespace App\Filament\Resources\WinboxMyrMaintainResource\Pages;

use App\Filament\Resources\WinboxMyrMaintainResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWinboxMyrMaintain extends EditRecord
{
    protected static string $resource = WinboxMyrMaintainResource::class;

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
            ->title('Winbox Maintain (myr) Updated')
            ->body('The Winbox Maintain (myr) has been successfully updated.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
