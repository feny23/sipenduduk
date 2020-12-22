<?php

namespace Database\Seeders;
use DB;

use Illuminate\Database\Seeder;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('penduduk')->insert([
        'id' => 1,
        'keluarga_id' => 1,
        'nama' => 'Bayu',
        'nik' => '1423152772',
        'tempat_lahir' => 'Padang',
        'tanggal_lahir' => '2009-10-09',
        'agama' => 'Islam',
        'jenis_kelamin' => 'Laki-laki',
        'level_pendidikan_id' => 1,
        'pekerjaan_id' => 1,
        'status_pernikahan' => 'Belum menikah',
        'status_keluarga' => 'Kandung',
        'kewarganegaraan_id' => 1,
        'ayah' => 'Sukijo',
        'ibu' => 'Surti'
        ]);
    }
}
