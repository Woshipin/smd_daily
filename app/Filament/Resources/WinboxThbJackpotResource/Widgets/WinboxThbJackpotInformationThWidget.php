<?php

namespace App\Filament\Resources\WinboxThbJackpotResource\Widgets;

use App\Models\WinboxThbJackpotInformationTh;
use Filament\Forms\Components\TextInput; // 必须引入
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\TextColumn;

class WinboxThbJackpotInformationThWidget extends BaseWidget
{
    // 设置 Widget 标题
    protected static ?string $heading = 'Winbox thb Jackpot Information (泰文)';
    
    // 设置占满全宽
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                WinboxThbJackpotInformationTh::query()
            )
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('summary_label_th')->label('标签 (泰文)'),
                TextColumn::make('summary_value_th')->label('数值 (泰文)'),
                // TextColumn::make('updated_at')->dateTime()->label('更新时间'),
            ])
            ->headerActions([
                // === 新增 (Create) ===
                Tables\Actions\CreateAction::make()
                    ->label('新增泰文信息')
                    ->modalHeading('新增泰文条目')
                    ->form([
                        TextInput::make('summary_label_th')
                            ->label('标签 (泰文)')
                            ->required(),
                        TextInput::make('summary_value_th')
                            ->label('数值 (泰文)')
                            ->required(),
                    ]),
            ])
            ->actions([
                // === 编辑 (Edit) ===
                Tables\Actions\EditAction::make()
                    ->form([
                        TextInput::make('summary_label_th')
                            ->label('标签 (泰文)')
                            ->required(),
                        TextInput::make('summary_value_th')
                            ->label('数值 (泰文)')
                            ->required(),
                    ]),
                
                // === 删除 (Delete) ===
                Tables\Actions\DeleteAction::make(),
            ]);
    }
}
