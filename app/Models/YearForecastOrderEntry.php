<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearForecastOrderEntry extends Model
{
    use HasFactory;
    protected $fillable = ['tmr_entry_id','desired_format_entry_id','targeted_launch','targeted_price','expectation_price'];

    protected $casts = [
        'targeted_launch' => 'date',
        'targeted_price' => 'decimal:2',
        'expectation_price' => 'decimal:2',
    ];
}

