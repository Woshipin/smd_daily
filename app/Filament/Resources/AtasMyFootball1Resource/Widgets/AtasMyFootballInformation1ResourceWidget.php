<?php

namespace App\Filament\Resources\AtasMyFootball1Resource\Widgets;

use App\Models\AtasMyFootballInformation1;
use Filament\Forms;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class AtasMyFootballInformation1ResourceWidget extends BaseWidget
{
    // 设置表格标题
    protected int | string | array $columnSpan = 'full'; // 让表格占满全宽
    protected static ?string $heading = '足球赛事资讯列表 - 1 (my) - Information';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                // 这里指定使用 AtasMyFootballInformation1 模型
                AtasMyFootballInformation1::query()
            )
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('标题'),
                Tables\Columns\TextColumn::make('information')
                    ->label('资讯内容')
                    ->limit(50), // 限制显示长度
                // Tables\Columns\TextColumn::make('created_at')
                //     ->label('创建时间')
                //     ->dateTime()
                //     ->sortable(),
            ])
            ->headerActions([
                // 修复点：必须先使用 CreateAction，然后在 form() 中定义 Section
                Tables\Actions\CreateAction::make()
                    ->label('New 足球资讯 -1 (my)') // 按钮显示的文字
                    ->form([
                        Forms\Components\Section::make('资讯内容')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label('标题')
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\RichEditor::make('information')
                                    ->label('详细信息')
                                    ->required()
                                    ->columnSpanFull(),
                            ])
                    ]),
            ])
            ->actions([
                // 编辑功能
                Tables\Actions\EditAction::make()
                    ->modalWidth('5xl') // <--- 这里设置宽度，可选：sm, md, lg, xl, 2xl ... 7xl, full
                    ->form([
                        Forms\Components\TextInput::make('title')
                            ->label('标题')
                            ->required(),

                        // 修改这里：把 Textarea 改为 RichEditor
                        Forms\Components\RichEditor::make('information')
                            ->label('资讯内容') // 这里的 Label 可以改回 '详细信息' 以保持一致
                            ->required()
                            ->columnSpanFull(), // 建议加上这个，让编辑器占满一行，体验更好
                    ]),
                // 删除功能
                Tables\Actions\DeleteAction::make(),
            ]);
    }
}
