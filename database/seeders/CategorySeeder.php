<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Vegetable', 'Flower', 'Fruit', 'Indoor'];

        foreach ($categories as $name) {
            DB::table('categories')->updateOrInsert(
                ['name' => $name] 
            );
        }
    }
}
