<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Island;


class IslandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

			
			
			['island_name'=>'Abemama'],
			['island_name'=>'Butaritari'],
			['island_name'=>'Arorae'],
			['island_name'=>'Maiana'],
			['island_name'=>'Abaiang'],
			['island_name'=>'Tab-South'],
            ['island_name'=>'Tarawa'],

		

			
			

        ] ;
        foreach ($data as $obj)
        {
            Island::create($obj);
        }
    }
}
