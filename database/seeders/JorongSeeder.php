<?php

namespace Database\Seeders;
use DB;
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;

class JorongSeeder extends Seeder
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

        DB::table('jorong')->insert([
        	'id' =>  $faker->numberBetween(2,30),
            'nama' => $faker->word,
            'nagari_id' =>  $faker->numberBetween(1,4),
        ]);
    }
}
}
