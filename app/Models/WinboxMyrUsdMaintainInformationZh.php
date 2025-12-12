<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WinboxMyrUsdMaintainInformationZh extends Model
{
    use HasFactory;

    /**
     * 1. 显式定义表名
     * 必须指定，否则 Laravel 会尝试寻找 winbox_myr_maintain_information_zhs 表
     */
    protected $table = 'winbox_myr_usd_maintain_information_zh';

    /**
     * 2. 定义可批量赋值的字段
     */
    protected $fillable = [
        'provider_header', // 注意：这里写数据库的原生字段名
        'start_date',
        'start_time',
        'completion_date',
        'completion_time',
    ];
}
