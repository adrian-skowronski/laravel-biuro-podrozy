<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Hill;

class HillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hill::firstOrCreate([
            'name'=>'Skocznia Adama Małysza',
            'country'=>'Polska',
            'city'=>'Wisła',
            'build_year'=>'2008',
            'hill_size'=>134,
            'record'=>144.5,
            'record_holder_id'=>1,
        ]);

        Hill::firstOrCreate([
            'name'=>'Skocznia Skalite',
            'country'=>'Polska',
            'city'=>'Szczyrk',
            'build_year'=>'2008',
            'hill_size'=>104,
            'record'=>101.5,
            'record_holder_id'=>2,
        ]);
    }
}
