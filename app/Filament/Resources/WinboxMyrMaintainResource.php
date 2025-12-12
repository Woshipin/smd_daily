<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WinboxMyrMaintainResource\Pages;
use App\Models\WinboxMyrMaintain;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class WinboxMyrMaintainResource extends Resource
{
    protected static ?string $model = WinboxMyrMaintain::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    
    protected static ?string $navigationGroup = 'Winbox Maintain (myr 和 thb) - (myr-usd 和 thb-usd)';
    protected static ?int $navigationSort = 0;

    protected static ?string $navigationLabel = 'Winbox Maintain 管理 (myr)';
    protected static ?string $modelLabel = 'Winbox Maintain 管理  (myr)';
    protected static ?string $pluralModelLabel = 'Winbox Maintain 管理 (myr)';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // === 第一部分：日期与时间设置 ===
                Forms\Components\Section::make('Schedule Settings')
                    ->description('Set the specific date and time range for the maintenance.')
                    ->schema([
                        Forms\Components\DatePicker::make('date')
                            ->label('维修日期')
                            ->required(),

                        // 修改：将 time 改为 start_time 和 end_time
                        Forms\Components\TimePicker::make('start_time')
                            ->label('开始时间 (24H)')
                            ->seconds(false) // 不显示秒，只显示 HH:mm
                            ->required(),

                        Forms\Components\TimePicker::make('end_time')
                            ->label('结束时间 (24H)')
                            ->seconds(false) // 不显示秒，只显示 HH:mm
                            ->required()
                            ->after('start_time'), // 简单的验证：结束时间必须晚于开始时间
                    ])->columns(3), // 改为3列，让日期、开始、结束在同一行显示

                // === 第二部分：图片上传 (Repeater) ===
                Forms\Components\Section::make('Game Images')
                    ->description('Upload images for games involved in this maintenance.')
                    ->schema([
                        Forms\Components\Repeater::make('items')
                            ->relationship() // 关联 items() 方法
                            ->schema([
                                Forms\Components\FileUpload::make('logo_path')
                                    ->label('Game Image')
                                    ->image()
                                    ->imageEditor()
                                    ->directory('maintenance-logos') // 存放目录
                                    ->required()
                                    ->columnSpanFull(),
                            ])
                            ->grid(3) // 每行显示 3 张
                            ->addActionLabel('Add New Game Image')
                            ->defaultItems(1),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable(),

                // === 保留原本的日期格式逻辑 ===
                Tables\Columns\TextColumn::make('date')
                    // 1. 设置 PHP 日期格式: d/m/Y (D) -> 15/01/2025 (Wed)
                    ->date('d/m/Y (D)') 
                    // 2. 添加 CSS 类 'uppercase' 将 (Wed) 强制转为大写 (WED)
                    ->extraAttributes(['class' => 'uppercase']) 
                    ->sortable()
                    ->label('维修日期'),

                // === 修改开始：显示开始和结束时间 ===
                Tables\Columns\TextColumn::make('start_time')
                    ->time('H:i') // 24小时制
                    ->sortable()
                    ->label('开始时间'),

                Tables\Columns\TextColumn::make('end_time')
                    ->time('H:i') // 24小时制
                    ->sortable()
                    ->label('结束时间'),
                // === 修改结束 ===

                Tables\Columns\ImageColumn::make('items.logo_path')
                    ->label('Game Images')
                    ->circular()
                    ->stacked()
                    ->limit(3),

                Tables\Columns\TextColumn::make('items_count')
                    ->counts('items')
                    ->label('Image Count')
                    ->badge(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWinboxMyrMaintains::route('/'),
            'create' => Pages\CreateWinboxMyrMaintain::route('/create'),
            'edit' => Pages\EditWinboxMyrMaintain::route('/{record}/edit'),
        ];
    }
}