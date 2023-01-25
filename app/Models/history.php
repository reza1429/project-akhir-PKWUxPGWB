<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    use HasFactory;
    protected $fillable = [
        'siswa_id',
        'obat',
        'keluhan',
        'diagnosa',
        'surat',
        'penanggung_jawab',
        'status'
    ];
    protected $table = 'history';

    public function siswa(){
        return $this->belongsTo('App\Models\siswa', 'id');
    }
    // public function obat(){
    //     return $this->belongsTo('App\Models\obat', 'obat_id');
    // }
}
