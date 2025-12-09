<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(['name' => 'Kate Hutton', 'email' => 'k.l.hutton@hudstudent.ac.uk', 'password' => Hash::make('password'), 'role_id' => 2]);
        DB::table('users')->insert(['name' => 'Yousef Miandad', 'email' => 'y.miandad@hudstudent.ac.uk', 'password' => Hash::make('letmein'), 'role_id' => 2]);
        DB::table('users')->insert(['name' => 'Sunil Laxman', 'email' => 's.laxman@hudstudent.ac.uk', 'password' => Hash::make('password2'), 'role_id' => 1]);
    }
}