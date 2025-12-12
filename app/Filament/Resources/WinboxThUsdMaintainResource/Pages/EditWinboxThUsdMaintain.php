<?php

namespace App\Filament\Resources\WinboxThUsdMaintainResource\Pages;

use App\Filament\Resources\WinboxThUsdMaintainResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWinboxThUsdMaintain extends EditRecord
{
    protected static string $resource = WinboxThUsdMaintainResource::class;

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
            ->title('Winbox Maintain (th-usd) Updated')
            ->body('The Winbox Maintain (th-usd) has been successfully updated.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
