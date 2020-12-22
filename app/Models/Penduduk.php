<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = "penduduk";

    public function kartu_keluarga(){
        return $this->belongsTo('App\Models\KartuKeluarga', 'keluarga_id');
    }
    public function kewarganegaraan(){
        return $this->belongsTo('App\Models\Kewarganegaraan');
    }
    public function pekerjaan(){
        return $this->belongsTo('App\Models\Pekerjaan');
    }
    public function level_pendidikan(){
        return $this->belongsTo('App\Models\LevelPendidikan');
    }
   
}
