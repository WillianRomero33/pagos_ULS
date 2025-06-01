<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $careers = [
            ['career_name' => 'Agroecologia', 'total_semesters' => 10, 'is_active' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['career_name' => 'Ciencias Computacion', 'total_semesters' => 10, 'is_active' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('careers')->insert($careers);
    }
}
