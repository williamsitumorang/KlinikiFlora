<?php

namespace App\Http\Controllers;


use App\Models\Obat;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsistenController extends Controller
{
    public function index() {
        $count = Patient::count();
        $count2 = Obat::count();
        $countTersedia = Obat::where('status', 'tersedia') -> count ();
        $countTidakTersedia = Obat::where('status', 'tidak tersedia')->count();
        return view('asisten.index',['count'=>$count , 'count2' => $count2, 'countTersedia' => $countTersedia, 'countTidakTersedia' => $countTidakTersedia ]);
    }
    

    public function show(Request $request){
        $asisten = User::query();
        $asisten -> select('users.*', 'name');
        $asisten -> where('role_id', '2');
        if(!empty($request->asisten)) {
            $asisten->where('name', 'like', '%'.$request->asisten.'%');
        }
        $pegawai = $asisten->get();


        return view('dokter.tableAkunAsisten', compact('pegawai'));


    }
    
}
