<?php

namespace App\Filament\Resources\WinboxMyrUsdMaintainResource\Widgets;

use App\Models\WinboxMyrUsdMaintainInformation2;
use Filament\Forms;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class WinboxMyrUsdMaintainInformation2Widget extends BaseWidget
{
    // 设置 Widget 占据的列宽 (full 表示占满整行)
    protected int | string | array $columnSpan = 'full';

    // 设置 Widget 的排序 (如果在页面上有多个 Widget)
    protected static ?int $sort = 2;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                // 1. 设置查询源：读取 Information 表的数据
                WinboxMyrUsdMaintainInformation2::query()
            )
            ->heading('Maintenance Page Texts') // Widget 标题
            ->columns([
                // 2. 显示 Intro Text (限制字数，防止表格太高)
                Tables\Columns\TextColumn::make('intro_text')
                    ->label('Introduction')
                    ->limit(80) // 只显示前80个字
                    ->wrap(),   // 自动换行

                // 3. 显示 Notice Text
                Tables\Columns\TextColumn::make('notice_text')
                    ->label('Notice')
                    ->limit(80)
                    ->wrap(),
            ])
            ->headerActions([
                // 5. 创建按钮 (如果还没有记录，允许创建)
                Tables\Actions\CreateAction::make()
                    ->label('Add New Info')
                    ->form([
                        Forms\Components\Textarea::make('intro_text')
                            ->label('Introduction Text')
                            ->rows(4)
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('notice_text')
                            ->label('Notice Text')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])
            ])
            ->actions([
                // 6. 编辑按钮 (直接在当前页面弹出模态框编辑)
                Tables\Actions\EditAction::make()
                    ->form([
                        Forms\Components\Textarea::make('intro_text')
                            ->label('Introduction Text')
                            ->required()
                            ->rows(5)
                            ->columnSpanFull(),
                        
                        Forms\Components\Textarea::make('notice_text')
                            ->label('Notice Text')
                            ->required()
                            ->rows(5)
                            ->columnSpanFull(),
                    ]),

                // 7. 删除按钮
                Tables\Actions\DeleteAction::make(),
            ])
            ->paginated(false); // 通常这种配置信息很少，不需要分页
    }
}
