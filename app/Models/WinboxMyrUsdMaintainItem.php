<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WinboxMyrUsdMaintainItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'winbox_myr_usd_maintain_id', 
        'logo_path'
    ];

    public function maintain(): BelongsTo
    {
        return $this->belongsTo(WinboxMyrUsdMaintain::class, 'winbox_myr_usd_maintain_id');
    }
}