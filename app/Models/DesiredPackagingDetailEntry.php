<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesiredPackagingDetailEntry extends Model
{
    use HasFactory;
    protected $fillable = ['desired_packaging_entry_id','pack_type_detail_id','value'];
}

