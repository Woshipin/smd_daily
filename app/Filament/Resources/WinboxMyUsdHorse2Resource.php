<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WinboxMyUsdHorse2Resource\Pages;
use App\Filament\Resources\WinboxMyUsdHorse2Resource\RelationManagers;
use App\Models\WinboxMyUsdHorse2;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WinboxMyUsdHorse2Resource extends Resource
{
    protected static ?string $model = WinboxMyUsdHorse2::class;

    // 在左側導覽列中顯示的圖示
    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    // --- 新增：設定導覽群組和中文標籤 ---
    protected static ?string $navigationGroup = 'Winbox 赛马 - 1 和 2 (my-usd 和 th-usd)';
    protected static ?int $navigationSort = 0; // 數字越小，排序越靠前
     // -------------------------

    protected static ?string $navigationLabel = '赛马赛事管理 - 2 (my-usd)';
    protected static ?string $modelLabel = '赛马赛事 (my-usd)';
    protected static ?string $pluralModelLabel = '赛马赛事 - 2 (my-usd)';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // 对应 'location' 字段，使用文本输入框
                Forms\Components\TextInput::make('location')
                    ->label('比赛地点')
                    ->required()
                    ->maxLength(255),

                // 对应 'time' 字段，使用时间选择器
                Forms\Components\TimePicker::make('time')
                    ->label('比赛时间 (24小时制)')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // 顯示 'location' 欄位，並格式化為日期
                Tables\Columns\TextColumn::make('location')
                    ->label('比赛地点')
                    ->sortable(),

                // 顯示 'time' 欄位，並格式化為時間
                Tables\Columns\TextColumn::make('time')
                    ->label('比赛时间')
                    ->time()
                    ->sortable(),

                // 顯示建立時間
                Tables\Columns\TextColumn::make('created_at')
                    ->label('建立时间')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), // 預設隱藏，但可透過選項開啟

                // 顯示更新時間
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('更新时间')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWinboxMyUsdHorse2s::route('/'),
            'create' => Pages\CreateWinboxMyUsdHorse2::route('/create'),
            'edit' => Pages\EditWinboxMyUsdHorse2::route('/{record}/edit'),
        ];
    }
}
