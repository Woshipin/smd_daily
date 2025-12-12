<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LuckyThUsdJackpot extends Model
{
    use HasFactory;

    protected $table = 'lucky_th_usd_jackpots';

    protected $fillable = [
        'amount',
        'prize_value_today',
        'prize_value_current',
        'third_prize_title',
        'bonus_badge',
        'detail_label_thai_1',
        'detail_label_thai_2',
        'detail_label_english_1',
        'detail_label_english_2',
        'detail_value_1',
        'detail_value_2',
        'detail_value_3',
        'section_title',
        'bonus_section_title',
    ];
}
