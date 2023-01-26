<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    use HasFactory;
    protected $fillable = [
        'nip',
        'nama',
        'matpel'
    ];
    protected $table = 'guru';
    protected $primaryKey = 'nip';
}
