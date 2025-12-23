<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MaintenanceSeeder extends Seeder
{
    public function run(): void
    {
        $plants = DB::table('plants')->get();

        foreach ($plants as $plant) {
            DB::table('maintenances')->insert([
                [
                    'plant_id' => $plant->id,
                    'task' => 'Water',
                    'frequency' => 'Every day',
                    'last_done_date' => Carbon::now()->subDays(1)->toDateString(),
                    'notes' => 'Watered in the morning',
                ],
                [
                    'plant_id' => $plant->id,
                    'task' => 'Fertilize',
                    'frequency' => 'Once a week',
                    'last_done_date' => Carbon::now()->subDays(7)->toDateString(),
                    'notes' => 'Used organic fertilizer',
                ],
            ]);
        }
    }
}
