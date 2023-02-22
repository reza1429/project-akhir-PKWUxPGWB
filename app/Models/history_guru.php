<?php

namespace App\Models;

use Carbon\Carbon;
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
        'status',
        'created_at'
    ];
    protected $table = 'history_guru';

    public function getCreatedAtAttribute(){
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, j F Y H:i');
    }
}
