<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WinboxThbUsdJackpotInformationTh extends Model
{
    use HasFactory;

    protected $table = 'winbox_thb_usd_jackpot_information_th';

    protected $fillable = [
        'summary_label_th',
        'summary_value_th',
    ];
}
