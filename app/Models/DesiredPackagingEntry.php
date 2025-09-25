<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesiredPackagingEntry extends Model
{
    use HasFactory;
    protected $fillable = ['tmr_entry_id','pack_type_group_id'];

    public function tmr()
    {
        return $this->belongsTo(TmrEntry::class, 'tmr_entry_id');
    }
}

