<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $fillable = [
        'plant_id', 
        'date', 
        'height', 
        'health_status', 
        'notes'];


    public function plant() {
        return $this->belongsTo(Plant::class);
    }
}
