<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'company', 'phone', 'address', 'meta'
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    // No relation to User; account will be created later upon TMR approval
}
