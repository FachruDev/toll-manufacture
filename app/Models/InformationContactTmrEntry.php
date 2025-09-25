<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationContactTmrEntry extends Model
{
    use HasFactory;
    protected $fillable = ['tmr_entry_id','company','address','phone_number','contact_person','email'];

    public function tmr()
    {
        return $this->belongsTo(TmrEntry::class, 'tmr_entry_id');
    }
}

