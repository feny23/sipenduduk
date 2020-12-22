<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Penduduk;

use App\Models\KartuKeluarga;

use App\Models\Kewarganegaraan;

use App\Models\Pekerjaan;

use DB;


use App\Models\LevelPendidikan;

class PendudukController extends Controller
{
    public function index()
    {
    $penduduk = Penduduk::paginate(25);
    return view('penduduk.index', compact('penduduk'));
    }
    
    public function create()
    {
        $kk = KartuKeluarga::all();
        $penduduk = Penduduk::all();
        $kewarganegaraan= Kewarganegaraan::all();
        $pekerjaan= Pekerjaan::all();
        $lpen= LevelPendidikan::all();
        return view('penduduk.create', compact('kk','penduduk','kewarganegaraan','pekerjaan','lpen'));
        
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
            
            return redirect()->route('penduduk.index');
    }
    public function show($id)
    {
        $pd = Penduduk::findOrFail($id);
        return view('penduduk.show', compact('pd'));
    }
    public function edit($id)
    {
        $pd = Penduduk::findOrFail($id);
        $kartukeluarga = KartuKeluarga::all();
        $kewarganegaraan= Kewarganegaraan::all();
        $pekerjaan= Pekerjaan::all();
        $lpen= LevelPendidikan::all();
        return view('penduduk.edit', compact('kartukeluarga','pd','kewarganegaraan','pekerjaan','lpen'));
    }
    public function update (Request $request, $id) {
        $pd=Penduduk::findOrFail($id);
    
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
            $pd->keluarga_id = $request->no; 
            $pd->nama = $request->nama; 
            $pd->nik = $request->nik; 
            $pd->tempat_lahir = $request->tempat; 
            $pd->tanggal_lahir = $request->tanggal; 
            $pd->agama = $request->agama; 
            $pd->jenis_kelamin = $request->jk; 
            $pd->level_pendidikan_id = $request->lp; 
            $pd->pekerjaan_id = $request->pekerjaan; 
            $pd->status_pernikahan = $request->sp; 
            $pd->status_keluarga = $request->sk; 
            $pd->kewarganegaraan_id = $request->kwn; 
            $pd->ayah = $request->ayah; 
            $pd->ibu = $request->ibu; 
            $pd->save();
               if ($pd->save()) {
                    session()->flash('flash_success','Berhasil memperbaharui data semhas');
                 //redirect kehalaman detail
                     return redirect()->route('penduduk.show', [$pd->id]);
                }
                return redirect()->route('penduduk.show');
        }
    public function destroy($id)
    {
        $pd = Penduduk::findOrFail($id);
        $pd->delete();
        return redirect()->route('penduduk.index')->with('danger', 'Data Kartu Keluarga '.$pd->keluarga_id.' Berhasil Dihapus!');
    }


}
