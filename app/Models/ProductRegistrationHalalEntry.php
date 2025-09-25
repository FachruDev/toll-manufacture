<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRegistrationHalalEntry extends Model
{
    use HasFactory;
    protected $fillable = ['tmr_entry_id','halal','regist_number'];

    public function tmr()
    {
        return $this->belongsTo(TmrEntry::class, 'tmr_entry_id');
    }
}

