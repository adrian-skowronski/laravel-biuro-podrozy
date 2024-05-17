<?php

namespace Database\Seeders;

use App\Models\Customer;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            Record_HoldersSeeder::class,
            HillsSeeder::class,
            CoordinatorsSeeder::class,
            TripsSeeder::class,
            Trips_HillsSeeder::class,
            CustomersSeeder::class,
            BookingsSeeder::class,
            
        ]);
        
        
    }
}
