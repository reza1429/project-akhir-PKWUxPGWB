<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history_guru extends Model
{
    use HasFactory;
    protected $fillable = [
        'guru_id',
        'obat',
        'keluhan',
        'diagnosa',
        'surat',
        'penanggung_jawab',
        'status'
    ];
    protected $table = 'history_guru';
}
