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
        'category_id',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function maintenances() {
        return $this->hasMany(Maintenance::class);
    }

    public function journals() {
        return $this->hasMany(Journal::class);
    }
}
