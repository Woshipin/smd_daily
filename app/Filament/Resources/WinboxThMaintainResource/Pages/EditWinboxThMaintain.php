<?php

namespace App\Filament\Resources\WinboxThMaintainResource\Pages;

use App\Filament\Resources\WinboxThMaintainResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWinboxThMaintain extends EditRecord
{
    protected static string $resource = WinboxThMaintainResource::class;

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
            ->title('Winbox Maintain (th) Updated')
            ->body('The Winbox Maintain (th) has been successfully updated.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
