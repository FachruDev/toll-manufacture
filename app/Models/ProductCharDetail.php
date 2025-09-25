<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCharDetail extends Model
{
    use HasFactory;
    protected $fillable = ['product_char_group_id','field_title','input_type','is_required'];
}

