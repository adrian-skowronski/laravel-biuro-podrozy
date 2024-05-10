<?php

namespace Database\Seeders;

use App\Models\Coordinator;
use Illuminate\Database\Seeder;

class CoordinatorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Coordinator::firstOrCreate([
            'name'=>'Alfred',
            'surname'=>'Nowak',
        ]);
    }
}

    