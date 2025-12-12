<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LuckyThUsdJackpotInformationTh extends Model
{
    use HasFactory;

    protected $table = 'lucky_th_usd_jackpot_information_th';

    protected $fillable = [
        'summary_label_th',
        'summary_value_th',
    ];
}
