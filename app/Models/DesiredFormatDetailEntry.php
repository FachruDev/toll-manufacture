<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesiredFormatDetailEntry extends Model
{
    use HasFactory;
    protected $fillable = ['desired_format_entry_id','product_char_detail_id','value'];
}

