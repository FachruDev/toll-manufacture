<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScopeTollManufactureEntry extends Model
{
    use HasFactory;
    protected $fillable = ['tmr_entry_id','scope_toll_detail_id'];
}

