<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LuckyThUsdJackpotResource\Pages;
use App\Filament\Resources\LuckyThUsdJackpotResource\RelationManagers;
use App\Models\LuckyThUsdJackpot;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Grid as FormGrid;

// --- Infolist 组件 (View Modal 核心) ---
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section as InfoSection;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Grid as InfoGrid;
use Filament\Infolists\Components\Group;
use Filament\Support\Enums\FontWeight;
use Filament\Infolists\Components\TextEntry\TextEntrySize;
use Filament\Support\Enums\Alignment; 
use Filament\Support\Enums\IconPosition;

class LuckyThUsdJackpotResource extends Resource
{
    protected static ?string $model = LuckyThUsdJackpot::class;

protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?string $navigationGroup = 'Lucky Jackpot (myr 和 th) - (myr-usd 和 th-usd)';
    protected static ?int $navigationSort = 0;

    protected static ?string $navigationLabel = 'Lucky Jackpot 管理 (th-usd)';
    protected static ?string $modelLabel = 'Lucky Jackpot 管理  (th-usd)';
    protected static ?string $pluralModelLabel = 'Lucky Jackpot 管理 (th-usd)';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // ==========================
                // Section 1: 第一层
                // ==========================
                Section::make('第一层 (基本金额信息)')
                    ->schema([
                        FormGrid::make(3)->schema([
                            TextInput::make('amount')
                                ->label('Amount')
                                ->placeholder('e.g. 1,234,567.00'),
                            
                            TextInput::make('prize_value_today')
                                ->label('Prize Value Today'),

                            TextInput::make('prize_value_current')
                                ->label('Prize Value Current'),
                        ]),
                    ])
                    ->collapsible(),

                // ==========================
                // Section 2: 第二层
                // ==========================
                Section::make('第二层 (详细标签与数值)')
                    ->schema([
                        FormGrid::make(2)->schema([
                            TextInput::make('third_prize_title')
                                ->label('Third Prize Title'),

                            TextInput::make('bonus_badge')
                                ->label('Bonus Badge'),
                        ]),

                        // 标签组
                        FormGrid::make(2)->schema([
                            TextInput::make('detail_label_thai_1')->label('Detail Label (Th 1)'),
                            TextInput::make('detail_label_english_1')->label('Detail Label (English 1)'),
                            TextInput::make('detail_label_thai_2')->label('Detail Label (Th 2)'),
                            TextInput::make('detail_label_english_2')->label('Detail Label (English 2)'),
                        ]),

                        // 数值组
                        FormGrid::make(3)->schema([
                            TextInput::make('detail_value_1')->label('Detail Value 1'),
                            TextInput::make('detail_value_2')->label('Detail Value 2'),
                            TextInput::make('detail_value_3')->label('Detail Value 3'),
                        ]),
                    ])
                    ->collapsible(),

                // ==========================
                // Section 3: 第三层
                // ==========================
                Section::make('第三层 (板块标题)')
                    ->schema([
                        FormGrid::make(2)->schema([
                            TextInput::make('section_title')
                                ->label('Main Section Title'),

                            TextInput::make('bonus_section_title')
                                ->label('Bonus Section Title'),
                        ]),
                    ])
                    ->collapsible(),
            ]);
    }

    /**
     * View Modal 详情弹窗设计
     * 区域命名为：第一层、第二层、第三层
     */
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                // --------------------------------------------------------
                // 第一层
                // --------------------------------------------------------
                InfoSection::make('第一层 (基本金额信息)')
                    ->icon('heroicon-m-banknotes')
                    ->schema([
                        InfoGrid::make(3)->schema([
                            TextEntry::make('amount')
                                ->label('JACKPOT AMOUNT')
                                ->size(TextEntrySize::Large)
                                ->weight(FontWeight::Bold)
                                ->color('warning') // 金黄色
                                ->icon('heroicon-m-currency-dollar'),

                            TextEntry::make('prize_value_today')
                                ->label('Prize Value Today')
                                ->size(TextEntrySize::Large)
                                ->weight(FontWeight::Bold)
                                ->color('warning') // 金黄色
                                ->icon('heroicon-m-currency-dollar'),

                            TextEntry::make('prize_value_current')
                                ->label('Prize Value Current')
                                ->size(TextEntrySize::Large)
                                ->weight(FontWeight::Bold)
                                ->color('warning') // 金黄色
                                ->icon('heroicon-m-currency-dollar'),
                        ]),
                    ]),

                // --------------------------------------------------------
                // 第二层
                // --------------------------------------------------------
                InfoSection::make('第二层 (详细标签与数值)')
                    ->icon('heroicon-m-trophy')
                    ->collapsible()
                    ->schema([
                        // 标题与 Badge
                        InfoGrid::make(2)->schema([
                            TextEntry::make('third_prize_title')
                                ->label('Prize Title')
                                ->weight(FontWeight::Bold)
                                ->color('warning')
                                ->size(TextEntrySize::Medium),

                            TextEntry::make('bonus_badge')
                                ->label('Status Badge')
                                ->badge()
                                ->color('danger')
                                ->icon('heroicon-m-fire'),
                        ]),

                        // 标签对照 (左右布局)
                        InfoGrid::make(2)->schema([
                            // 左侧
                            Group::make([
                                TextEntry::make('detail_label_thai_1')
                                    ->label('Label Th 1')
                                    ->color('warning')
                                    ->icon('heroicon-m-language')
                                    ->size(TextEntrySize::Small),
                                TextEntry::make('detail_label_english_1')
                                    ->label('Label English 1')
                                    ->color('warning')
                                    ->weight(FontWeight::SemiBold),
                            ]),
                            
                            // 右侧
                            Group::make([
                                TextEntry::make('detail_label_thai_2')
                                    ->label('Label Th 2')
                                    ->color('warning')
                                    ->icon('heroicon-m-language')
                                    ->size(TextEntrySize::Small),
                                TextEntry::make('detail_label_english_2')
                                    ->label('Label English 2')
                                    ->color('warning')
                                    ->weight(FontWeight::SemiBold),
                            ]),
                        ])->extraAttributes(['class' => 'my-4']),

                        // ==========================================================
                        // 核心数值区 (模仿截图样式：独立卡片 + 居中大字)
                        // ==========================================================

                        InfoSection::make('第二层 数值区')
                            // ->icon('heroicon-m-banknotes')
                            ->schema([
                                InfoGrid::make(3)->schema([
                                    TextEntry::make('detail_value_1')
                                        ->label('Value 1')
                                        ->size(TextEntrySize::Large)
                                        ->weight(FontWeight::Bold)
                                        ->icon('heroicon-m-hashtag') 
                                        ->color('warning'), // 金黄色

                                    TextEntry::make('detail_value_2')
                                        ->label('Value 2')
                                        ->size(TextEntrySize::Large)
                                        ->weight(FontWeight::Bold)
                                        ->icon('heroicon-m-hashtag') 
                                        ->color('warning'), // 金黄色

                                    TextEntry::make('detail_value_3')
                                        ->label('Value 3')
                                        ->size(TextEntrySize::Large)
                                        ->weight(FontWeight::Bold)
                                        ->icon('heroicon-m-currency-dollar')
                                        ->color('warning'), // 金黄色
                                ]),
                            ]),
                    ]),

                // --------------------------------------------------------
                // 第三层
                // --------------------------------------------------------
                InfoSection::make('第三层 (板块标题)')
                    ->icon('heroicon-m-tag')
                    ->collapsed() // 默认折叠
                    ->schema([
                        InfoGrid::make(2)->schema([
                            TextEntry::make('section_title')
                                ->color('warning')
                                ->label('Main Section Title'),
                            TextEntry::make('bonus_section_title')
                                ->color('warning')
                                ->label('Bonus Section Title'),
                        ]),
                    ]),
            ]);
    }

    /**
     * Table 列表配置
     * 顺序严格遵循 Database Migration 顺序
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->label('ID'),

                // ==========================
                // 第一层 (First Layer)
                // ==========================
                TextColumn::make('amount')
                    ->label('Amount')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false), // 默认显示

                TextColumn::make('prize_value_today')
                    ->label('Prize Today')
                    ->toggleable(isToggledHiddenByDefault: true), // 默认隐藏
                
                TextColumn::make('prize_value_current')
                    ->label('Prize Current')
                    ->toggleable(isToggledHiddenByDefault: true),

                // ==========================
                // 第二层 (Second Layer)
                // ==========================
                TextColumn::make('third_prize_title')
                    ->label('3rd Prize Title')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('bonus_badge')
                    ->label('Badge')
                    ->badge()
                    ->color('danger')
                    ->toggleable(isToggledHiddenByDefault: false), // 默认显示

                // Labels & Values (默认全部隐藏，保持列表整洁)
                TextColumn::make('detail_label_thai_1')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('detail_label_thai_2')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('detail_label_english_1')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('detail_label_english_2')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('detail_value_1')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('detail_value_2')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('detail_value_3')->toggleable(isToggledHiddenByDefault: true),

                // ==========================
                // 第三层 (Third Layer)
                // ==========================
                TextColumn::make('section_title')
                    ->label('Section Title')
                    ->toggleable(isToggledHiddenByDefault: false), // 默认显示

                TextColumn::make('bonus_section_title')
                    ->label('Bonus Section Title')
                    ->toggleable(isToggledHiddenByDefault: true),

                // ==========================
                // Timestamps
                // ==========================
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListLuckyThUsdJackpots::route('/'),
            'create' => Pages\CreateLuckyThUsdJackpot::route('/create'),
            'edit' => Pages\EditLuckyThUsdJackpot::route('/{record}/edit'),
        ];
    }
}
