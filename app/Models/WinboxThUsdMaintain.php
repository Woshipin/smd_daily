<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WinboxThUsdMaintain extends Model
{
    use HasFactory;
    
    // 1. 根据新的 DB 结构，允许填充 date, start_time 和 end_time
    protected $fillable = [
        'date', 
        'start_time',
        'end_time'
    ];

    // 2. 类型转换
    protected $casts = [
        'date' => 'date',           // 自动转为 Carbon 日期对象
        // 使用 datetime:H:i 确保序列化成数组/JSON时只显示 24小时制的时间 (例如: "09:00")
        'start_time' => 'datetime:H:i',  
        'end_time'   => 'datetime:H:i',  
    ];

    // 3. 关联关系保持不变
    public function items(): HasMany
    {
        return $this->hasMany(WinboxThUsdMaintainItem::class, 'winbox_th_usd_maintain_id');
    }
}
