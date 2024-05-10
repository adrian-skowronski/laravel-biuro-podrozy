<?php

namespace Database\Seeders;

use App\Models\Trip_Hill;
use Illuminate\Database\Seeder;

class Trips_HillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Trip_Hill::firstOrCreate([
            'trip_id' => 1,
            'hill_id' => 1,
        ]);

        Trip_Hill::firstOrCreate([
            'trip_id' => 1,
            'hill_id' => 2,
        ]);
    }
}