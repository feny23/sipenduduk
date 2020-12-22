<?php

namespace Database\Seeders;
use DB;
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;

class LevelPendidikanSeeder extends Seeder
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
        DB::table('level_pendidikan')->insert([
        	'id' => $faker->numberBetween(2,31),
        	'nama' => $faker->randomElement(['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'S1', 'S2', 'S3'])
        ]);
        }
    }
}
