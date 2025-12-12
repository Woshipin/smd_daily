<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WinboxThbUsdJackpotInformationEn extends Model
{
    use HasFactory;

    protected $table = 'winbox_thb_usd_jackpot_information_en';

    protected $fillable = [
        'summary_label_en',
        'summary_value_en',
    ];
}
