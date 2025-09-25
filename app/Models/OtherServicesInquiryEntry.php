<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherServicesInquiryEntry extends Model
{
    use HasFactory;
    protected $fillable = ['tmr_entry_id','value'];
}

