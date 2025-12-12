<?php

namespace App\Filament\Resources\LuckyMyrJackpotResource\Widgets;

use App\Models\LuckyMyrJackpotInformationZh;
use Filament\Forms\Components\TextInput; // 必须引入
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\TextColumn;

class LuckyMyrJackpotInformationZhWidget extends BaseWidget
{
    // 设置 Widget 标题
    protected static ?string $heading = 'Lucky Jackpot Information (中文)';
    
    // 设置占满全宽
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                LuckyMyrJackpotInformationZh::query()
            )
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('summary_label_zh')->label('标签 (中文)'),
                TextColumn::make('summary_value_zh')->label('数值 (中文)'),
                // TextColumn::make('updated_at')->dateTime()->label('更新时间'),
            ])
            ->headerActions([
                // === 新增 (Create) ===
                Tables\Actions\CreateAction::make()
                    ->label('新增中文信息')
                    ->modalHeading('新增中文条目')
                    ->form([
                        TextInput::make('summary_label_zh')
                            ->label('标签 (中文)')
                            ->required(),
                        TextInput::make('summary_value_zh')
                            ->label('数值 (中文)')
                            ->required(),
                    ]),
            ])
            ->actions([
                // === 编辑 (Edit) ===
                Tables\Actions\EditAction::make()
                    ->form([
                        TextInput::make('summary_label_zh')
                            ->label('标签 (中文)')
                            ->required(),
                        TextInput::make('summary_value_zh')
                            ->label('数值 (中文)')
                            ->required(),
                    ]),
                
                // === 删除 (Delete) ===
                Tables\Actions\DeleteAction::make(),
            ]);
    }
}