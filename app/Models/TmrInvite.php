<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TmrInvite extends Model
{
    use HasFactory;

    protected $fillable = [
        'token','email','expires_at','used_at','created_by','tmr_entry_id','meta'
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'used_at' => 'datetime',
        'meta' => 'array',
    ];

    public function tmr(): BelongsTo
    {
        return $this->belongsTo(TmrEntry::class, 'tmr_entry_id');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

