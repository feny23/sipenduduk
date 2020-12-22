<?php

namespace Database\Seeders;
use DB;
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;

class KewarganegaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 
        for($i = 1; $i <= 30; $i++){
        DB::table('kewarganegaraan')->insert([
        	'id' => $faker->numberBetween(2,31),
        	'nama' => $faker->randomElement(['WNI','WNA'])
        ]);
    }
}
}
