<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawMaterialsDetail extends Model
{
    use HasFactory;
    protected $fillable = ['raw_materials_group_id','title','is_active'];
}

