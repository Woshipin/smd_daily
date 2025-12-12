<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LuckyThJackpotInformationEn extends Model
{
    use HasFactory;

    protected $table = 'lucky_th_jackpot_information_en';

    protected $fillable = [
        'summary_label_en',
        'summary_value_en',
    ];
}
