<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormulationEntry extends Model
{
    use HasFactory;
    protected $fillable = ['tmr_entry_id','actives_formulation'];

    public function tmr()
    {
        return $this->belongsTo(TmrEntry::class, 'tmr_entry_id');
    }
}

