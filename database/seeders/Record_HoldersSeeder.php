<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Record_holder;


class Record_HoldersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Record_holder::firstOrCreate([
            'name' => 'Andreas',
            'surname' => 'Wellinger',
            'country' => 'Niemcy',
        ]);

        Record_holder::firstOrCreate([
            'name' => 'Kristoffer',
            'surname' => 'Sundal',
            'country' => 'Norwegia',
        ]);
            
        
    }
    }
