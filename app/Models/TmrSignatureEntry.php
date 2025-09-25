<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TmrSignatureEntry extends Model
{
    use HasFactory;
    protected $fillable = ['tmr_entry_id','tmr_signature_role_id','name','title'];
}

