<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WinboxMyrJackpotInformationZh extends Model
{
    use HasFactory;

    protected $table = 'winbox_myr_jackpot_information_zh';

    protected $fillable = [
        'summary_label_zh',
        'summary_value_zh',
    ];
}
