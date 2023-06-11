<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowPasienController extends Controller
{
    public function show(){
        // $medical = DB::select('CALL view_create_medical');
        
        $data = Patient::all(); // mengambil semua data
        $data = DB::table('patients')->paginate(5);
        return view('dokter.show_pasien', ['data' => $data]);
    }

    public function show2() {
        // return view('asisten.show_pasien', ['patient' => $patient]);
        $data = Obat::all(); // mengambil semua data
        $data = DB::table('obats')->paginate(5);
        return view('dokter.show_obat', ['data' => $data]);
    }
    
    public function gone($id){
        $data = Patient::findOrFail($id);
    
        $data->delete();
    
        return redirect()->back()->with('success', 'Data Pasien berhasil dihapus.');
    }

    public function edit(Patient $patient){
        return view('dokter.edit_pasien', ['patient' => $patient])->with ('success', 'Data Pasien berhasil diedit');
        
    }

    public function update (Request $request , Patient $patient){
        // $patient->id = $request->id;
        $patient->name = $request->name;
        $patient->gender = $request->gender;
        $patient->phone_number= $request->phone_number;
        $patient->address = $request->address;
        $patient->update();
        
        return redirect()->route('patients.show.dokter');

    }

    // public function show3(){
    //     $medical = DB::select('CALL view_create_medical');
        
    //     $data = Patient::all(); // mengambil semua data

    //     return view('dokter.show_pasien', ['data' => $data, 'medical' => $medical]);
    // }
}
