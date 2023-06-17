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
        $data = Patient::withTrashed()->paginate(5);

        $data->map(function ($patient) {
            $birthdate = Carbon::parse($patient->tanggal_lahir);
            $age = $birthdate->diffInYears(Carbon::now());
            $patient->umur = $age;
            $patient->tanggal_lahir = $birthdate->isoFormat('D MMMM YYYY');
            return $patient;
        });
        return view ('dokter.index_pasien', ['data' => $data]);
    }

    public function index2() {
        return view ('dokter.form');
    }

    public function getID ($id) {
        $data = Patient::find($id);
        
        
        $obat = Obat::all();

        
        return view ('dokter.add_mRecord', compact('data', 'obat'));
    }
    

    // public function show()
    // {
    //     $medical = DB::select('CALL view_create_medical');
    //     $pagination = DB::table('medical_record')->paginate(5); // mengambil semua data
    
    //     $data = collect($medical);
    
    //     // Menghitung umur dan mengubah format tanggal lahir pada semua objek pasien
    //     $data->map(function ($patient) {
    //         $birthdate = Carbon::parse($patient->tanggal_lahir);
    //         $age = $birthdate->diffInYears(Carbon::now());
    //         $patient->umur = $age;
    //         $patient->tanggal_lahir = $birthdate->isoFormat('D MMMM YYYY');
    //         return $patient;
    //     });
    
    //     return view('dokter.show_medical_record', [
    //         'medical' => $medical, 
    //         'pagination' => $pagination,
    //         'data' => $data,
    //     ]);
    // }

    public function show()    {
        $data = Patient::withTrashed()->paginate(5);
    
        // Menghitung umur dan mengubah format tanggal lahir pada semua objek pasien
        $data->map(function ($patient) {
            $birthdate = Carbon::parse($patient->tanggal_lahir);
            $age = $birthdate->diffInYears(Carbon::now());
            $patient->umur = $age;
            $patient->tanggal_lahir = $birthdate->isoFormat('D MMMM YYYY');
            return $patient;
        });
    
        return view('dokter.show_medical_record', ['data' => $data]);
    }

    public function button(Patient $id)
{
        $query = "
            SELECT
                patients.name,
                patients.gender,
                patients.tanggal_lahir,
                patients.address,
                patients.phone_number,
                patients.id,
                medical_record.id,
                medical_record.pasien_id,
                medical_record.obat_id,
                medical_record.obat_id2,
                medical_record.obat_id3,
                medical_record.obat_id4,
                medical_record.obat_id5,
                medical_record.jumlah_dipakai,
                medical_record.jumlah_dipakai2,
                medical_record.jumlah_dipakai3,
                medical_record.jumlah_dipakai4,
                medical_record.jumlah_dipakai5,
                medical_record.diagnosa,
                medical_record.tinggi,
                medical_record.berat,
                medical_record.keluhan,
                medical_record.created_at,
                obats1.nama_obat AS nama_obat1,
                obats1.kemasan AS kemasan1,
                obats2.nama_obat AS nama_obat2,
                obats2.kemasan AS kemasan2,
                obats3.nama_obat AS nama_obat3,
                obats3.kemasan AS kemasan3,
                obats4.nama_obat AS nama_obat4,
                obats4.kemasan AS kemasan4,
                obats5.nama_obat AS nama_obat5,
                obats5.kemasan AS kemasan5
            FROM
                medical_record
            JOIN obats AS obats1 ON medical_record.obat_id = obats1.id
            LEFT JOIN obats AS obats2 ON medical_record.obat_id2 = obats2.id
            LEFT JOIN obats AS obats3 ON medical_record.obat_id3 = obats3.id
            LEFT JOIN obats AS obats4 ON medical_record.obat_id4 = obats4.id
            LEFT JOIN obats AS obats5 ON medical_record.obat_id5 = obats5.id
            JOIN patients ON medical_record.pasien_id = patients.id
            WHERE
                medical_record.pasien_id = :id
    ";



    $medical = DB::select($query, ['id' => $id->id]);
    $data = collect($medical);

    $data->map(function ($patient) {
        $birthdate = Carbon::parse($patient->tanggal_lahir);
        $age = $birthdate->diffInYears(Carbon::now());
        $patient->umur = $age;
        $patient->tanggal_lahir = $birthdate->isoFormat('D MMMM YYYY');
        return $patient;
    });

    return view('dokter.form', compact('id', 'medical', 'data'));
}

    
    
    // $medical = DB::select('CALL view_create_medical');
    // dd($medical);

    // $data = collect($medical);

    // // Menghitung umur dan mengubah format tanggal lahir pada semua objek pasien
    // $data->map(function ($patient) {
    //     $birthdate = Carbon::parse($patient->tanggal_lahir);
    //     $age = $birthdate->diffInYears(Carbon::now());
    //     $patient->umur = $age;
    //     $patient->tanggal_lahir = $birthdate->isoFormat('D MMMM YYYY');
    //     return $patient;
    // });

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
    $medicalRecord->tinggi = $request->tinggi;
    $medicalRecord->berat = $request->berat;
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
