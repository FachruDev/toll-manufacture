<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TmrDraft extends Model
{
    use HasFactory;

    protected $fillable = ['tmr_invite_id','payload','status'];

    protected $casts = [
        'payload' => 'array',
    ];

    public function invite()
    {
        return $this->belongsTo(TmrInvite::class, 'tmr_invite_id');
    }
}

