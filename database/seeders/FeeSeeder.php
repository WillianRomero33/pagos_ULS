<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fees = [
            ['amount' => 110, 'description' => 'Matricula', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['amount' => 45, 'description' => 'Cuota Ordinaria', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('fees')->insert($fees);
    }
}
