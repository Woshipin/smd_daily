<?php

namespace App\Filament\Resources\LuckyThJackpotResource\Widgets;

use App\Models\LuckyThJackpotInformationEn;
use Filament\Forms\Components\TextInput; // 必须引入
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\TextColumn;

class LuckyThJackpotInformationEnWidget extends BaseWidget
{
    protected static ?string $heading = 'Lucky Jackpot Information (English)';
    
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                LuckyThJackpotInformationEn::query()
            )
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('summary_label_en')->label('Label (English)'),
                TextColumn::make('summary_value_en')->label('Value (English)'),
                // TextColumn::make('updated_at')->dateTime()->label('Updated At'),
            ])
            ->headerActions([
                // === 新增 (Create) ===
                Tables\Actions\CreateAction::make()
                    ->label('New English Info')
                    ->form([
                        TextInput::make('summary_label_en')
                            ->label('Label (English)')
                            ->required(),
                        TextInput::make('summary_value_en')
                            ->label('Value (English)')
                            ->required(),
                    ]),
            ])
            ->actions([
                // === 编辑 (Edit) ===
                Tables\Actions\EditAction::make()
                    ->form([
                        TextInput::make('summary_label_en')
                            ->label('Label (English)')
                            ->required(),
                        TextInput::make('summary_value_en')
                            ->label('Value (English)')
                            ->required(),
                    ]),
                
                // === 删除 (Delete) ===
                Tables\Actions\DeleteAction::make(),
            ]);
    }
}
