<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\MedicalRecord;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MedicalRecordController extends Controller
{
    public function index (){
        $data = Patient::paginate(5);

        $data->map(function ($patient) {
            $birthdate = Carbon::parse($patient->tanggal_lahir);
            $age = $birthdate->diffInYears(Carbon::now());
            $patient->umur = $age;
            $patient->tanggal_lahir = $birthdate->isoFormat('D MMMM YYYY');
            return $patient;
        });
        return view ('dokter.index_pasien', ['data' => $data]);
    }

    public function getID ($id) {
        $data = Patient::find($id);
        
        
        $obat = Obat::all();

        
        return view ('dokter.add_mRecord', compact('data', 'obat'));
    }
    

    public function show()
    {
        $medical = DB::select('CALL view_create_medical');
        $pagination = DB::table('medical_record')->paginate(5); // mengambil semua data
    
        $data = collect($medical);
    
        // Menghitung umur dan mengubah format tanggal lahir pada semua objek pasien
        $data->map(function ($patient) {
            $birthdate = Carbon::parse($patient->tanggal_lahir);
            $age = $birthdate->diffInYears(Carbon::now());
            $patient->umur = $age;
            $patient->tanggal_lahir = $birthdate->isoFormat('D MMMM YYYY');
            return $patient;
        });
    
        return view('dokter.show_medical_record', [
            'medical' => $medical, 
            'pagination' => $pagination,
            'data' => $data,
        ]);
    }
    

    // public function show()
    // {
    //     $data = Patient::whereNull('deleted_at')->paginate(5);
    
    //     // Menghitung umur dan mengubah format tanggal lahir pada semua objek pasien
    //     $data->map(function ($patient) {
    //         $birthdate = Carbon::parse($patient->tanggal_lahir);
    //         $age = $birthdate->diffInYears(Carbon::now());
    //         $patient->umur = $age;
    //         $patient->tanggal_lahir = $birthdate->isoFormat('D MMMM YYYY');
    //         return $patient;
    //     });
    
    //     return view('asisten.show_pasien', ['data' => $data]);
    // }

    public function store(Request $request){

    $medicalRecord = new MedicalRecord();
    // Mendapatkan pasien_id dari tabel pasien berdasarkan primary key
    $medicalRecord->pasien_id = $request->idp;
    $medicalRecord->obat_id = $request->obat;
    $medicalRecord->obat_id2 = $request->obat2;
    $medicalRecord->obat_id3 = $request->obat3;
    $medicalRecord->obat_id4 = $request->obat4;
    $medicalRecord->obat_id5 = $request->obat5;
    $medicalRecord->jumlah_dipakai = $request->jumlah_dipakai;
    $medicalRecord->jumlah_dipakai2 = $request->jumlah_dipakai2;
    $medicalRecord->jumlah_dipakai3 = $request->jumlah_dipakai3;
    $medicalRecord->jumlah_dipakai4 = $request->jumlah_dipakai4;
    $medicalRecord->jumlah_dipakai5 = $request->jumlah_dipakai5;
    $medicalRecord->diagnosa = $request->diagnosa;
    $medicalRecord->keluhan = $request->keluhan;
    $medicalRecord->save();

    $obat = Obat::find($request->obat);
    $obat->jumlah -= $request->jumlah_dipakai;
    $obat->jumlah -= $request->jumlah_dipakai2;
    $obat->jumlah -= $request->jumlah_dipakai3;
    $obat->jumlah -= $request->jumlah_dipakai4;
    $obat->jumlah -= $request->jumlah_dipakai5;
    $obat->save();

    return redirect()->back()->with('success', 'Medical Record berhasil Ditambahkan');
    }
    
}
