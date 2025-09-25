<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TmrNumber extends Model
{
    use HasFactory;

    protected $fillable = ['year','month','last_no'];
}

