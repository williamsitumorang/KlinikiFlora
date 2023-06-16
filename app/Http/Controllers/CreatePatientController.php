<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CreatePatientController extends Controller
{
    public function create (){
    return view ('asisten.create_pasien');
    }

    public function store(Request $request)
    {
        // Validate the request...
 
        $patient= new Patient;
        
        $patient->name = $request->name;
        $patient->gender = $request->gender;
        $patient->phone_number = $request->phone_number;
        $patient->address = $request->address;
        $patient->tanggal_lahir = $request->tanggal_lahir;
 
        $patient->save();
 
        return redirect()->back()->with('success', 'Data Pasien Telah Ditambahkan');
    }

    public function show()
    {
        $data = Patient::whereNull('deleted_at')->paginate(5);
    
        // Menghitung umur dan mengubah format tanggal lahir pada semua objek pasien
        $data->map(function ($patient) {
            $birthdate = Carbon::parse($patient->tanggal_lahir);
            $age = $birthdate->diffInYears(Carbon::now());
            $patient->umur = $age;
            $patient->tanggal_lahir = $birthdate->isoFormat('D MMMM YYYY');
            return $patient;
        });
    
        return view('asisten.show_pasien', ['data' => $data]);
    }

    public function gone($id){
        $data = Patient::findOrFail($id);
    
        $data->delete();
    
        return redirect()->back()->with('success', 'Data Pasien berhasil dihapus.');
    }

    public function edit(Patient $patient){
        return view('asisten.edit_pasien', ['patient' => $patient])->with ('success', 'Data Pasien berhasil diedit');
        
    }

    public function update (Request $request , Patient $patient){
        // $patient->id = $request->id;
        $patient->name = $request->name;
        $patient->gender = $request->gender;
        $patient->phone_number= $request->phone_number;
        $patient->address = $request->address;
        $patient->update();
        
        return redirect()->route('patients.show');

    }
}