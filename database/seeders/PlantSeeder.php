<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlantSeeder extends Seeder
{
    public function run(): void
    {
        // Fetch category IDs
        $vegetableId = DB::table('categories')->where('name', 'Vegetable')->value('id');
        $flowerId = DB::table('categories')->where('name', 'Flower')->value('id');
        $fruitId = DB::table('categories')->where('name', 'Fruit')->value('id');
        $indoorId = DB::table('categories')->where('name', 'Indoor')->value('id');

        // Insert plants with category_id ONLY
        DB::table('plants')->insert([
            [
                'name' => 'Tomato',
                'category_id' => $fruitId,
                'date_planted' => '2025-01-01',
                'watering_frequency' => 'Every day',
            ],
            [
                'name' => 'Rose',
                'category_id' => $flowerId,
                'date_planted' => '2025-06-23',
                'watering_frequency' => 'Every day',
            ],
            [
                'name' => 'Onion',
                'category_id' => $vegetableId,
                'date_planted' => '2025-07-12',
                'watering_frequency' => 'Every 2 days',
            ],
            [
                'name' => 'Pilea Depressa',
                'category_id' => $indoorId,
                'date_planted' => '2025-06-02',
                'watering_frequency' => '3 times a week',
            ],
        ]);
    }
}
