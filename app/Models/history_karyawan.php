<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history_karyawan extends Model
{
    use HasFactory;
    protected $fillable = [
        'karyawan_id',
        'obat',
        'keluhan',
        'diagnosa',
        'surat',
        'penanggung_jawab',
        'status'
    ];
    protected $table = 'history_karyawan';
}
