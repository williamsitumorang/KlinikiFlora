<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreateObatController extends Controller
{
    public function index (){
        return view ('asisten.create_obat');
    }

    public function store(Request $request)
    {
        // Validate the request...
 
        $obat = new Obat;

        $obat->nama_obat = $request->nama_obat;
        $obat->keterangan = $request->keterangan;
        $obat->tanggal_masuk = $request->tanggal_masuk;
        $obat->jumlah = $request->jumlah;
        $obat->kemasan = $request->kemasan;
        $jumlah = $request->jumlah;
    
        if ($jumlah == 0) {
            $status = 'Tidak Tersedia';
        } else {
            $status = 'Tersedia';
        }
    
        $obat->status = $status;
    
        $obat->save();
    
 
        return redirect()->back()->with('success', 'Data Obat Telah Ditambahkan');
    }

    public function show(){
        // $medical = DB::select('CALL view_create_medical');
        // return view('asisten.show_pasien', ['patient' => $patient]);
        $data = Obat::all(); // mengambil semua data
        $data = DB::table('obats')->paginate(5);
        return view('asisten.show_obat', ['data' => $data,]);
    }

    public function destroy($id){
        $data = Obat::findOrFail($id);
    
        $data->delete();
    
        return redirect()->back()->with('success', 'Data Obat berhasil dihapus.');
    }

    public function edit (Obat $obat){
        return view('asisten.edit_obat', ['obat' => $obat]);
        
    }

    public function update (Request $request , Obat $obat){
        // $patient->id = $request->id;
        $obat->nama_obat = $request->nama_obat;
        $obat->keterangan = $request->keterangan;
        $obat->tanggal_masuk= $request->tanggal_masuk;
        $obat->jumlah = $request->jumlah;
        $obat->kemasan = $request->kemasan;
        $obat->update();

        return redirect()->route('obat.show');
    
    }
}