<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kontak extends Model
{
    use HasFactory;
    protected $fillable = [
        'siswa_id',
        'obat_id',
        'keterangan'
    ];
    protected $table = 'history';

    public function siswa(){
        return $this->belongsTo('App\Models\siswa', 'id');
    }
    public function kontak(){
        return $this->belongsTo('App\Models\obat', 'obat_id');
    }
}
