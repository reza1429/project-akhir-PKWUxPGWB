<?php

namespace App\Models;

// use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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
        'status',
        'created_at'
    ];
    protected $table = 'history';

    public function siswa(){
        return $this->belongsTo('App\Models\siswa', 'id');
    }
    // public function obat(){
    //     return $this->belongsTo('App\Models\obat', 'obat_id');
    // }

    public function getCreatedAtAttribute(){
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, j F Y H:i');
    }
}
