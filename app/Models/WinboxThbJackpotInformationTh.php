<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WinboxThbJackpotInformationTh extends Model
{
    use HasFactory;

    protected $table = 'winbox_thb_jackpot_information_th';

    protected $fillable = [
        'summary_label_th',
        'summary_value_th',
    ];
}
