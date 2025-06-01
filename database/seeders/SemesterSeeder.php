<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $semesters = [
            ['semester_number' => 1, 'duration_months' => 6, 'year' => 2025, 'is_active' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['semester_number' => 2, 'duration_months' => 6, 'year' => 2025, 'is_active' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('semesters')->insert($semesters);
    }
}
