<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nisn',
        'nama',
        'kelas'
    ];
    protected $table = 'siswa';
    protected $primaryKey = 'nisn';

    public function obat(){
        return $this->belongsToMany('App\Models\obat')->withPivot('keteragan');
    }
    
}
