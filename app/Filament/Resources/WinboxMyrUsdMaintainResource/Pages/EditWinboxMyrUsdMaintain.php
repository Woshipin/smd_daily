<?php

namespace App\Filament\Resources\WinboxMyrUsdMaintainResource\Pages;

use App\Filament\Resources\WinboxMyrUsdMaintainResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWinboxMyrUsdMaintain extends EditRecord
{
    protected static string $resource = WinboxMyrUsdMaintainResource::class;

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
            ->title('Winbox Maintain (myr-usd) Updated')
            ->body('The Winbox Maintain (myr-usd) has been successfully updated.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
