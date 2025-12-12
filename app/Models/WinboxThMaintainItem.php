<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WinboxThMaintainItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'winbox_th_maintain_id', 
        'logo_path'
    ];

    public function maintain(): BelongsTo
    {
        return $this->belongsTo(WinboxThMaintain::class, 'winbox_th_maintain_id');
    }
}