<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormulationTechnicalInformationEntry extends Model
{
    use HasFactory;
    protected $fillable = ['tmr_entry_id','technical_made_id'];

    public function tmr()
    {
        return $this->belongsTo(TmrEntry::class, 'tmr_entry_id');
    }
}

