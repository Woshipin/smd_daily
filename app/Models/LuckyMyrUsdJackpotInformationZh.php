<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LuckyMyrUsdJackpotInformationZh extends Model
{
    use HasFactory;

    protected $table = 'lucky_myr_usd_jackpot_information_zh';

    protected $fillable = [
        'summary_label_zh',
        'summary_value_zh',
    ];
}
