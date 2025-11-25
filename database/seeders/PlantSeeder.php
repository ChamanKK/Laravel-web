<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlantSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('plants')->insert(['name' => 'Tomato', 'type' => 'Fruit', 'date_planted' => '2025-01-01', 'watering_frequency' => 'Every day']);
        DB::table('plants')->insert(['name' => 'Rose', 'type' => 'Flower', 'date_planted' => '2025-06-23', 'watering_frequency' => 'Every day']);
        DB::table('plants')->insert(['name' => 'Onion', 'type' => 'Vegetable', 'date_planted' => '2025-07-12', 'watering_frequency' => 'Every 2 days']);
    }
}
