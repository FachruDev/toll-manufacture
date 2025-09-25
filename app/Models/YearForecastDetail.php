<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearForecastDetail extends Model
{
    use HasFactory;
    protected $fillable = ['year_forecast_order_entry_id','title','value'];
}

