<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesiredFormatEntry extends Model
{
    use HasFactory;
    protected $fillable = ['tmr_entry_id','product_name_entry_id','product_char_group_id','notes'];

    public function tmr()
    {
        return $this->belongsTo(TmrEntry::class, 'tmr_entry_id');
    }
}

