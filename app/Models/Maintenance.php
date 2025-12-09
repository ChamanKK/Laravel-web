<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = [
        'plant_id', 
        'task',
        'frequency', 
        'last_done_date', 
        'notes'
    ];


    Public function plant() {
        return $this->belongsTo(Plant::class);
    }
}
