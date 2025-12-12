<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LuckyMyrUsdJackpotInformationEn extends Model
{
    use HasFactory;

    protected $table = 'lucky_myr_usd_jackpot_information_en'; 

    protected $fillable = [
        'summary_label_en',
        'summary_value_en',
    ];
}
