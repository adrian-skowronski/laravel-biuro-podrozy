<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class HillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hills')->insert([
            [
                'name' => 'Skocznia Narciarska Wielka Krokiew',
                'country' => 'Polska',
                'city' => 'Zakopane',
                'build_year' => 1925,
                'hill_size' => 140,
                'record' => 145.0,
                'record_holder' => 'Adam Małysz',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Harrachov Ski Jumping Area',
                'country' => 'Czechy',
                'city' => 'Harrachov',
                'build_year' => 1908,
                'hill_size' => 200,
                'record' => 220.0,
                'record_holder' => 'Noriaki Kasai',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vikersundbakken',
                'country' => 'Norwegia',
                'city' => 'Vikersund',
                'build_year' => 1936,
                'hill_size' => 240,
                'record' => 253.5,
                'record_holder' => 'Stefan Kraft',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
