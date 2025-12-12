<?php

namespace App\Filament\Resources\WinboxMyrUsdMaintainResource\Widgets;

use App\Models\WinboxMyrUsdMaintainInformationEn;
use Filament\Forms;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class WinboxMyrUsdMaintainInformationEnWidget extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 3;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                WinboxMyrUsdMaintainInformationEn::query()
            )
            ->heading('English Maintenance Details')
            ->columns([
                Tables\Columns\TextColumn::make('provider_header')
                    ->label('Provider')
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('start_date')
                    ->label('Start')
                    ->description(fn (WinboxMyrUsdMaintainInformationEn $record): string => $record->start_time ?? '-'),

                Tables\Columns\TextColumn::make('completion_date')
                    ->label('Completion')
                    ->description(fn (WinboxMyrUsdMaintainInformationEn $record): string => $record->completion_time ?? '-'),
                
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->headerActions([
                // 5. 创建按钮
                Tables\Actions\CreateAction::make()
                    ->label('Add English Item')
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
                    ->label('Provider Name')
                    ->placeholder('e.g. SEXY, 9WICKETS')
                    ->required()
                    ->columnSpanFull(),
            ])->columns(1),

            Forms\Components\Section::make('Start Settings')
                ->schema([
                    Forms\Components\TextInput::make('start_date')
                        ->label('Start Date')
                        ->placeholder('e.g. 15 JAN 2025')
                        ->required(),
                    
                    Forms\Components\TextInput::make('start_time')
                        ->label('Start Time')
                        ->placeholder('e.g. 09:00 (GMT+8)')
                        ->required(),
                ])->columns(2),

            Forms\Components\Section::make('Completion Settings')
                ->schema([
                    Forms\Components\TextInput::make('completion_date')
                        ->label('Completion Date')
                        ->placeholder('e.g. 15 JAN 2025')
                        ->required(),
                    
                    Forms\Components\TextInput::make('completion_time')
                        ->label('Completion Time')
                        ->placeholder('e.g. 11:00 (GMT+8)')
                        ->required(),
                ])->columns(2),
        ];
    }
}
