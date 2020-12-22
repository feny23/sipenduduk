<?php

namespace Database\Seeders;
use DB;
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;

class PekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    $faker = Faker::create('id_ID');
 
    for($i = 1; $i <= 20; $i++){

        DB::table('pekerjaan')->insert([
        	'id' => $faker->numberBetween(2,21),
        	'nama' => $faker->jobTitle
        ]);
    }
    }
}
