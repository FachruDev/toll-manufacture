<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TmrApproval extends Model
{
    use HasFactory;

    protected $fillable = [
        'tmr_entry_id','step','approver_id','approver_role','decision','note','decided_at'
    ];

    protected $casts = [
        'decided_at' => 'datetime',
    ];

    public function tmr()
    {
        return $this->belongsTo(TmrEntry::class, 'tmr_entry_id');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approver_id');
    }
}

