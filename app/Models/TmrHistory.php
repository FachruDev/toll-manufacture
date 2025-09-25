<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TmrHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'tmr_entry_id','actor_id','actor_role','action','note'
    ];

    public function tmr()
    {
        return $this->belongsTo(TmrEntry::class, 'tmr_entry_id');
    }

    public function actor()
    {
        return $this->belongsTo(User::class, 'actor_id');
    }
}

