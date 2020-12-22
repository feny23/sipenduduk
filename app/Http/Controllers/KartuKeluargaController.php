<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\KartuKeluarga;

use App\Models\Jorong;

class KartuKeluargaController extends Controller
{
    public function index()
    {
    $kartukeluarga = KartuKeluarga::paginate(25);
    $jorong= Jorong::paginate(25);
    return view('kartukeluarga.index', compact('kartukeluarga','jorong'));
    }
    public function create()
    {
      $jorong=Jorong::all();
      return view('kartukeluarga.create', compact('jorong'));

    }
    public function store(Request $request)
    {
        $request->validate([
            
            'no' => 'required',
            'jorong' => 'required',
            'tanggal' => 'required'

        ]);
        
    		$kk = new KartuKeluarga();
            $kk->no = $request->input('no');
            $kk->jorong_id = $request->input('jorong');
            $kk->tanggal_pencatatan = $request->input('tanggal');
            $kk->save();
            
            return redirect()->route('kartukeluarga.index');
        // try {
        //     $kk = KartuKeluarga::create($request->all());
        //     $kk->save();
        //     return redirect()->route('kartukeluarga.index')->with('status', 'Data Kartu Keluarga '.$kk->no.' Berhasil Ditambahkan!');
        // } catch (\Throwable $th) {
        //     return redirect()->route('kartukeluarga.create')->with('danger', 'Data dengan Nomor Kartu Keluarga '.$request->no.' sudah ada!');
        // }
    }

    public function show($id)
    {
        $kk = KartuKeluarga::findOrFail($id);
        return view('kartukeluarga.show', compact('kk'));
    }
    public function edit($id)
    {
        $kk = KartuKeluarga::findOrFail($id);
        $jorong =Jorong::all();
        return view('kartukeluarga.edit', compact('kk','jorong'));
    }
    public function update (Request $request, $id) {
        $kk=KartuKeluarga::findOrFail($id);
    
            $request->validate([
                'no' => 'required',
                'jorong' => 'required',
                'tanggal' => 'required'
            ]);
                $kk->no = $request->no;
               
                $kk->jorong_id = $request->jorong;
                $kk->tanggal_pencatatan = $request->tanggal;
    
                
                $kk->save();
                           
                          
               if ($kk->save()) {
                    session()->flash('flash_success','Berhasil memperbaharui data semhas');
                 //redirect kehalaman detail
                     return redirect()->route('kartukeluarga.show', [$kk->id]);
                }
                return redirect()->route('kartukeluarga.show');
        }
    public function destroy($id)
    {
        $kk = KartuKeluarga::findOrFail($id);
        $kk->delete();
        return redirect()->route('kartukeluarga.index')->with('danger', 'Data Kartu Keluarga '.$kk->no.' Berhasil Dihapus!');
    }
}
