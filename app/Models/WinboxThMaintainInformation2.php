<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WinboxThMaintainInformation2 extends Model
{
    use HasFactory;
    
    /**
     * 1. 显式定义表名
     * Laravel 默认寻找复数形式 (winbox_myr_maintain_informations)，
     * 但您的 Migration 定义的是单数，所以必须在这里指定。
     */
    protected $table = 'winbox_th_maintain_information2';

    /**
     * 2. 定义可批量赋值的字段
     * 允许 Filament 保存这些字段。
     */
    protected $fillable = [
        'intro_text',
        'notice_text',
    ];
}
