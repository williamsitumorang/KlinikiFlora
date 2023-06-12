<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;
    protected $table = 'medical_record';
    protected $fillable = [
        'pasien_id',
        'obat_id',
        'jumlah_dipakai',
        'obat_dipakai',
        'diagnosa',
        'keluhan'
    ];

    public function pasien() {
        return $this->belongsTo('App\Models\Patient', 'pasien_id', 'id');
    }
    
}
