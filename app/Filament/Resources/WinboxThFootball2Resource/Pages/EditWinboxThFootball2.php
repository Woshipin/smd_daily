<?php

namespace App\Filament\Resources\WinboxThFootball2Resource\Pages;

use App\Filament\Resources\WinboxThFootball2Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWinboxThFootball2 extends EditRecord
{
    protected static string $resource = WinboxThFootball2Resource::class;

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
            ->title('Th Football-2 Updated')
            ->body('The Th Football-2 has been successfully updated.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // 关键代码：创建成功后跳转到 ListTags
    }
}
