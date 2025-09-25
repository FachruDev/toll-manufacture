<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackTypeDetail extends Model
{
    use HasFactory;
    protected $fillable = ['pack_type_group_id','field_title','input_type','is_required'];
}

