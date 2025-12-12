<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WinboxThFootball1Resource\Pages;
use App\Filament\Resources\WinboxThFootball1Resource\RelationManagers;
use App\Models\WinboxThFootball1;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WinboxThFootball1Resource extends Resource
{
    protected static ?string $model = WinboxThFootball1::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    
    // --- 新增：設定導覽群組和中文標籤 ---
    protected static ?string $navigationGroup = 'Winbox 足球 - 1 和 2 (my 和 th)';
    protected static ?int $navigationSort = 0; // 數字越小，排序越靠前
    // -------------------------

    protected static ?string $navigationLabel = '足球赛事管理 - 1 (th)';
    protected static ?string $modelLabel = '足球赛事 - 1 (th)';
    protected static ?string $pluralModelLabel = '足球赛事 - 1 (th)';
    // ------------------------------------

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('比赛详细信息')
                    ->schema([
                        Forms\Components\FileUpload::make('league_logo_path')
                            ->label('联赛Logo')
                            ->image()
                            ->directory('football-logos')
                            ->disk('public') // <--- 添加这行
                            ->columnSpanFull(),

                        Forms\Components\FileUpload::make('team1_logo_path')
                            ->label('队伍1的Logo')
                            ->image()
                            ->directory('football-logos')
                            ->disk('public'), // <--- 添加这行

                        Forms\Components\FileUpload::make('team2_logo_path')
                            ->label('队伍2的Logo')
                            ->image()
                            ->directory('football-logos')
                            ->disk('public'), // <--- 添加这行

                        Forms\Components\DatePicker::make('date')
                            ->label('比赛日期')
                            ->required(),

                        Forms\Components\TimePicker::make('time')
                            ->label('比赛时间 (24小时制)')
                            ->required(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('league_logo_path')
                    ->label('联赛Logo'),
                Tables\Columns\ImageColumn::make('team1_logo_path')
                    ->label('队伍1 Logo'),
                Tables\Columns\ImageColumn::make('team2_logo_path')
                    ->label('队伍2 Logo'),
                Tables\Columns\TextColumn::make('date')
                    ->label('比赛日期')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('time')
                    ->label('比赛时间')
                    ->time(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWinboxThFootball1s::route('/'),
            'create' => Pages\CreateWinboxThFootball1::route('/create'),
            'edit' => Pages\EditWinboxThFootball1::route('/{record}/edit'),
        ];
    }
}
