<?php

namespace App\Filament\Resources\WinboxThUsdMaintainResource\Widgets;

use App\Models\WinboxThUsdMaintainInformationTh;
use Filament\Forms;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class WinboxThUsdMaintainInformationThWidget extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 3;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                WinboxThUsdMaintainInformationTh::query()
            )
            ->heading('维护详情')
            ->columns([
                Tables\Columns\TextColumn::make('provider_header')
                    ->label('游戏名字')
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('start_date')
                    ->label('开始时间')
                    ->description(fn (WinboxThUsdMaintainInformationTh $record): string => $record->start_time ?? '-'),

                Tables\Columns\TextColumn::make('completion_date')
                    ->label('完成时间')
                    ->description(fn (WinboxThUsdMaintainInformationTh $record): string => $record->completion_time ?? '-'),
                
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->headerActions([
                // 5. 创建按钮
                Tables\Actions\CreateAction::make()
                    ->label('添加中文条目')
                    ->form($this->getFormSchema())
                    // ❌ 删除或注释掉下面这一行，它就会变回居中显示的 Modal
                    // ->slideOver() 
                    ->modalWidth('2xl'), // (可选) 设置弹窗宽度: sm, md, lg, xl, 2xl, 3xl, 4xl, 5xl, full
            ])
            ->actions([
                // 6. 编辑按钮
                Tables\Actions\EditAction::make()
                    ->form($this->getFormSchema())
                    // ❌ 删除或注释掉下面这一行
                    // ->slideOver()
                    ->modalWidth('2xl'), // (可选) 保持和创建按钮一样的宽度

                Tables\Actions\DeleteAction::make(),
            ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Section::make('Start Settings')
            ->schema([
                Forms\Components\TextInput::make('provider_header')
                    ->label('游戏名字')
                    ->placeholder('e.g. SEXY, 9WICKETS')
                    ->required()
                    ->columnSpanFull(),
            ])->columns(1),

            Forms\Components\Section::make('Start Settings')
                ->schema([
                    Forms\Components\TextInput::make('start_date')
                        ->label('开始日期')
                        ->placeholder('e.g. 15 JAN 2025')
                        ->required(),
                    
                    Forms\Components\TextInput::make('start_time')
                        ->label('开始时间')
                        ->placeholder('e.g. 09:00 (GMT+8)')
                        ->required(),
                ])->columns(2),

            Forms\Components\Section::make('Completion Settings')
                ->schema([
                    Forms\Components\TextInput::make('completion_date')
                        ->label('完成日期')
                        ->placeholder('e.g. 15 JAN 2025')
                        ->required(),
                    
                    Forms\Components\TextInput::make('completion_time')
                        ->label('完成时间')
                        ->placeholder('e.g. 11:00 (GMT+8)')
                        ->required(),
                ])->columns(2),
        ];
    }
}
