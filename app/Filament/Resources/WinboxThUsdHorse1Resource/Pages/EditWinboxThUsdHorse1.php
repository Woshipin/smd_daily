<?php

namespace App\Filament\Resources\WinboxThUsdHorse1Resource\Pages;

use App\Filament\Resources\WinboxThUsdHorse1Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWinboxThUsdHorse1 extends EditRecord
{
    protected static string $resource = WinboxThUsdHorse1Resource::class;

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
            ->title('Th-usd Horse-1 Updated')
            ->body('The Th-usd Horse-1 has been successfully updated.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
