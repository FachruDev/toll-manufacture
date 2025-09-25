<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GettingTollInformationEntry extends Model
{
    use HasFactory;
    protected $fillable = ['tmr_entry_id','getting_toll_information_detail_id','other_value'];
}

