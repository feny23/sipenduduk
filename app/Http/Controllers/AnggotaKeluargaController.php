<?php

namespace App\Http\Controllers;
use App\Models\Penduduk;

use App\Models\KartuKeluarga;

use App\Models\Kewarganegaraan;

use App\Models\Pekerjaan;
use App\Models\LevelPendidikan;

use Illuminate\Http\Request;

class AnggotaKeluargaController extends Controller
{
    public function index($id)
    {
        $penduduk = Penduduk::where('keluarga_id',$id)->get();
        return view('anggotakeluarga.index', compact('penduduk','id'));
    }
    public function create($id)
    {
        $kk = KartuKeluarga::all();
        $penduduk = Penduduk::all();
        $kewarganegaraan= Kewarganegaraan::all();
        $pekerjaan= Pekerjaan::all();
        $lpen= LevelPendidikan::all();
        return view('anggotakeluarga.create', compact('kk','penduduk','kewarganegaraan','pekerjaan','lpen','id'));
        
    }
    public function store(Request $request)
    {
        $request->validate([
            
            'no' => 'required',
            'nama' => 'required',
            'nik' => 'required',
            'tempat' => 'required',
            'tanggal' => 'required',
            'agama' => 'required',
            'jk' => 'required',
            'lp' => 'required',
            'pekerjaan' => 'required',
            'sp' => 'required',
            'sk' => 'required',
            'kwn' => 'required',
            'ayah' => 'required',
            'ibu' => 'required'

        ]);
        
    		$pd = new Penduduk();
            $pd->keluarga_id = $request->input('no'); 
            $pd->nama = $request->input('nama'); 
            $pd->nik = $request->input('nik'); 
            $pd->tempat_lahir = $request->input('tempat'); 
            $pd->tanggal_lahir = $request->input('tanggal'); 
            $pd->agama = $request->input('agama'); 
            $pd->jenis_kelamin = $request->input('jk'); 
            $pd->level_pendidikan_id = $request->input('lp'); 
            $pd->pekerjaan_id = $request->input('pekerjaan'); 
            $pd->status_pernikahan = $request->input('sp'); 
            $pd->status_keluarga = $request->input('sk'); 
            $pd->kewarganegaraan_id = $request->input('kwn'); 
            $pd->ayah = $request->input('ayah'); 
            $pd->ibu = $request->input('ibu'); 
            $pd->save();
            
            return redirect()->route('anggotakeluarga.index',[$pd->id]);
    }
    public function destroy($id)
    {
        $kk-> Penduduk::find($id);
        $kk->delete();
        session()->flash('flash_success', 'Berhasil menghapus data peserta');
        return redirect()->route('anggotakeluarga.index','id');
    } 
    
}
