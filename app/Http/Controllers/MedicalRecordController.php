<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Obat;
use Illuminate\Http\Request;
use App\Models\MedicalRecord;
use Illuminate\Support\Facades\DB;

class MedicalRecordController extends Controller
{
    public function index (){
        $data = DB::table('patients')->paginate(5);
        return view ('dokter.index_pasien', ['data' => $data]);
    }

    public function getID ($id) {
        $data = Patient::find($id);
        
        
        $obat = Obat::all();

        
        return view ('dokter.add_mRecord', compact('data', 'obat'));
    }
    

    public function show(){
        $medical = DB::select('CALL view_create_medical');
        $pagination = DB::table('medical_record')->paginate(5); // mengambil semua data
        // return view('asisten.show_pasien', ['patient' => $patient]);
        return view('dokter.show_medical_record', [
            'medical' => $medical, 
            'pagination' => $pagination,
        ]);
    }

    public function store(Request $request){

        // $obatId = $request->input('obat');
        // $jumlah = $request->input('jumlah_dipakai');
    
        // $obat = Obat::find($obatId);
    
        // $medicineData = session()->get('medicineData', []);
        // $medicineData[] = [
        //     'obat_id' => $obatId,
        //     'nama_obat' => $obat->nama_obat,
        //     'jumlah_dipakai' => $jumlah
        // ];
        // session()->put('medicineData', $medicineData);

    $medicalRecord = new MedicalRecord();
    // Mendapatkan pasien_id dari tabel pasien berdasarkan primary key
    $medicalRecord->pasien_id = $request->idp;
    $medicalRecord->obat_id = $request->obat;
    $medicalRecord->jumlah_dipakai = $request->jumlah_dipakai;
    $medicalRecord->diagnosa = $request->diagnosa;
    $medicalRecord->keluhan = $request->keluhan;
    $medicalRecord->save();

    $obat = Obat::find($request->obat);
    $obat->jumlah -= $request->jumlah_dipakai;
    $obat->save();

    return redirect()->back()->with('success', 'Medical Record berhasil Ditambahkan');
    }

//     public function addMedicine(Request $request)
// {
//     $obatId = $request->input('obat');
//     $jumlah = $request->input('jumlah_dipakai');

//     $obat = Obat::find($obatId);

//     $medicineData = session()->get('medicineData', []);
//     $medicineData[] = [
//         'obat_id' => $obatId,
//         'nama_obat' => $obat->nama_obat,
//         'jumlah_dipakai' => $jumlah
//     ];
//     session()->put('medicineData', $medicineData);

//     return redirect()->back();
// }

// public function simpanData(Request $request)
// {
//     // Validasi request
//     $request->validate([
//         'obatId' => 'required',
//         'obatNama' => 'required',
//         'jumlah' => 'required|numeric|min:1',
//         'diagnosa' => 'required',
//         'keluhan' => 'required',
//     ]);

//     // Simpan data obat ke dalam database MedicalRecord
//     $medicalRecord = new MedicalRecord();
//     $medicalRecord->obat_id = $request->obatId;
//     $medicalRecord->obat_dipakai = $request->obatNama;
//     $medicalRecord->jumlah_dipakai = $request->jumlah;
//     $medicalRecord->diagnosa = $request->diagnosa;
//     $medicalRecord->keluhan = $request->keluhan;
//     $medicalRecord->save();

//     dd($request->all());

//     // Respon dengan data yang berhasil disimpan
//     return response()->json(['message' => 'Data berhasil disimpan'], 200);
// }

// public function saveMedicine(Request $request)
// {
//     // Validasi input
//     $validatedData = $request->validate([
//         'medicineData' => 'required|array',
//         'medicineData.*.obatId' => 'required',
//         'medicineData.*.obatName' => 'required',
//         'medicineData.*.jumlahObat' => 'required|numeric',
//     ]);

//     try {
//         // Looping untuk menyimpan setiap data obat ke dalam tabel
//         foreach ($validatedData['medicineData'] as $medicine) {
//             // Lakukan operasi penyimpanan ke dalam tabel obat yang dipakai di database
//             // Contoh:
//             MedicalRecord::create([
//                 'obat_id' => $medicine['obatId'],
//                 'obat_dipakai' => $medicine['obatName'],
//                 'jumlah_dipakai' => $medicine['jumlahObat'],
//             ]);
//         }

//         $MedicalRecord = new MedicalRecord;

//         $MedicalRecord->keluhan = $request->keluhan;
//         $MedicalRecord->diagnosa = $request->diagnosa;
//         $MedicalRecord->save();

//         // Berhasil menyimpan data obat
//         return response()->json(['success' => true, 'message' => 'Data obat berhasil disimpan']);
//     } catch (\Exception $e) {
//         // Gagal menyimpan data obat
//         return response()->json(['success' => false, 'message' => 'Terjadi kesalahan saat menyimpan data obat']);
//     }
// }

// public function search(Request $request)
// {
//     $keyword = $request->get('q');
    
//     $obat = Obat::where('nama_obat', 'like', "%{$keyword}%")
//         ->where('jumlah', '>', 0)
//         ->get(['id', 'nama_obat']);

//     return response()->json($obat);
// }


}
