<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Trip;

class TripsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        Trip::firstOrCreate([
            'title'=>'Pakiet polski',
            'start'=>'2024-05-20',
            'end'=>'2024-05-22',
            'price'=>1090,
            'description'=>'Podróż szlakiem polskich skoczni',
            'max_participants'=>20,
            'current_participants'=>0,
            'status'=>'aktualna',
            'coordinator_id'=>1,
            'photo'=>'pakiet_polski.jpg',
        ]);


    }
}

    
