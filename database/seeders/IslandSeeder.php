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

			
			
			['uuid'=> Str::uuid(),'island_name'=>'Abemama'],
			['uuid'=> Str::uuid(),'island_name'=>'Butaritari'],
			['uuid'=> Str::uuid(),'island_name'=>'Arorae'],
			['uuid'=> Str::uuid(),'island_name'=>'Maiana'],
			['uuid'=> Str::uuid(),'island_name'=>'Abaiang'],
			['uuid'=> Str::uuid(),'island_name'=>'Tab-South'],

		

			
			

        ] ;
        foreach ($data as $obj)
        {
            Island::create($obj);
        }
    }
}
