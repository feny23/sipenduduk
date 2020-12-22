<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\Models\Penduduk;
use App\Models\Nagari;
use Carbon\Carbon;
use DB;

class LaporanController extends Controller
{
    public function index()
    {
    $penduduk = Penduduk::whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 15 AND 64')->get();

    return view('laporan.index', compact('penduduk'));
    }
    public function tampil()
    {
    $pdd= Penduduk::all();
    $lp = Penduduk::join('level_pendidikan','penduduk.level_pendidikan_id','=','level_pendidikan.id')
    ->select(DB::raw('count(penduduk.id) as jp'))
    ->where('level_pendidikan.nama', '=', 'SD')
    ->orWhere('level_pendidikan.nama', '=', 'SMP')
    ->orWhere('level_pendidikan.nama', '=', 'Tidak Sekolah')
    ->value('jp');
    
    return view('laporan.tampil', compact('pdd','lp'));
    }
    public function cari(Request $request)
	{
        $pdd= Penduduk::all();
		// menangkap data pencarian
        $cari = $request->cari;
        $nagari = Nagari::where('nama','like',"%".$cari."%")->paginate();
        return view('laporan.tampil', compact('nagari','cari','pdd'));

    

 
    }
    
 
}
