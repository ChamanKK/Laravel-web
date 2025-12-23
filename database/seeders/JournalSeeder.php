<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JournalSeeder extends Seeder
{
    public function run(): void
    {
        $plants = DB::table('plants')->get();

        foreach ($plants as $plant) {
            DB::table('journals')->insert([
                [
                    'plant_id' => $plant->id,
                    'date' => Carbon::now()->subDays(7)->toDateString(),
                    'height' => '10',
                    'health_status' => 'Good',
                    'notes' => 'Healthy leaves',
                ],
                [
                    'plant_id' => $plant->id,
                    'date' => Carbon::now()->toDateString(),
                    'height' => '12',
                    'health_status' => 'Very good',
                    'notes' => 'New leaves growing',
                ],
            ]);
        }
    }
}
