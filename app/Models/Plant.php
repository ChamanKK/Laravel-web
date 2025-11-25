<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $fillable = [
        'name',
        'date_planted',
        'type',
        'watering_frequency',
    ];
}
