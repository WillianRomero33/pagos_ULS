<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MonthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $months = [
            ['name' => 'Enero',       'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Febrero',     'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Marzo',       'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Abril',       'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Mayo',        'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Junio',       'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Julio',       'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Agosto',      'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Septiembre',  'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Octubre',     'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Noviembre',   'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Diciembre',   'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('month')->insert($months);
    }
}
