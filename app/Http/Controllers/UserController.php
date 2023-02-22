<?php

namespace App\Http\Controllers;

use App\Models\history;
use App\Models\siswa;
use App\Models\guru;
use App\Models\history_guru;
use App\Models\karyawan;
use App\Models\history_karyawan;
use DB;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class UserController extends Controller
{
    public function siswa()
    {
        
        // dd(Auth::user() -> no_induk);
        $id_siswa = siswa::select('id_siswa')->where('nisn', Auth::user() -> no_induk)->get();
        // dd($id_siswa);
        $dSiswa = siswa::all()->where('nisn', Auth::user() -> no_induk)->first();
        $dhsiswa = history::all()->where('siswa_id', $dSiswa->id_siswa)->first();
        // $id_hsiswa = history::select('penanggung_jawab')->where('siswa_id', $dSiswa->id_siswa)->get();
        // $hSiswa = history::all()->where('siswa_id', 53)->first();
        // $hSiswa = history::where('siswa_id', $dSiswa->id_siswa)->first();
        $hSiswa = DB::table('siswa')
        ->join('history', function (JoinClause $join) {
            $id_siswa = siswa::all()->where('nisn', Auth::user() -> no_induk)->first();
            $join->on('history.siswa_id', '=', 'siswa.id_siswa')
            ->where('history.siswa_id', '=', $id_siswa->id_siswa);
        })->get();
        // $hSiswa = DB::table('siswa')
        // ->join('history', 'history.siswa_id', '=', 'siswa.id_siswa')->where('id', 53)
        // ->get();
        $siswa = DB::table('siswa')
        ->join('history', 'siswa.id_siswa', '=', 'history.siswa_id')->where('siswa_id', $dSiswa->id_siswa)
        ->join('tb_user', 'history.penanggung_jawab', '=', 'tb_user.user_id')->where('user_id', $dhsiswa->penanggung_jawab)
        ->get();
        // $hSiswa = history::find($id_siswa)->siswa()->get();
        // dd($siswa);
        // $project = siswa::find($id)->project()->get();
        // return($kontak);
        return view('user.home_siswa', compact('siswa', 'dSiswa', 'hSiswa', 'dhsiswa'));
        //
    }
    public function guru()
    {
        // dd(Auth::user() -> no_induk);
        $id_guru = guru::select('id_guru')->where('nip', Auth::user() -> no_induk)->get();
        // dd($id_guru);
        $dGuru = guru::all()->where('nip', Auth::user() -> no_induk)->first();
        $dhguru = history_guru::all()->where('guru_id', $dGuru->id_guru)->first();
        // $id_hguru = history_guru::select('penanggung_jawab')->where('guru_id', $dGuru->id_guru)->get();
        // $hGuru = history_guru::all()->where('guru_id', 53)->first();
        // $hGuru = history_guru::where('guru_id', $dGuru->id_guru)->first();
        $hGuru = DB::table('guru')
        ->join('history_guru', function (JoinClause $join) {
            $id_guru = guru::all()->where('nip', Auth::user() -> no_induk)->first();
            $join->on('history_guru.guru_id', '=', 'guru.id_guru')
            ->where('history_guru.guru_id', '=', $id_guru->id_guru);
        })->get();
        // $hGuru = DB::table('guru')
        // ->join('history_guru', 'history_guru.guru_id', '=', 'guru.id_guru')->where('id', 53)
        // ->get();
        $guru = DB::table('guru')
        ->join('history_guru', 'guru.id_guru', '=', 'history_guru.guru_id')->where('guru_id', $dGuru->id_guru)
        ->join('tb_user', 'history_guru.penanggung_jawab', '=', 'tb_user.user_id')->where('user_id', $dhguru->penanggung_jawab)
        ->get();
        // $hGuru = history_guru::find($id_guru)->guru()->get();
        // dd($guru);
        // $project = guru::find($id)->project()->get();
        // return($kontak);
        return view('user.home_guru', compact('guru', 'dGuru', 'hGuru', 'dhguru'));
        //
    }
    public function karyawan()
    {
        // dd(Auth::user() -> no_induk);
        $id_karyawan = karyawan::select('id_karyawan')->where('nip', Auth::user() -> no_induk)->get();
        // dd($id_karyawan);
        $dkaryawan = karyawan::all()->where('nip', Auth::user() -> no_induk)->first();
        $dhkaryawan = history_karyawan::all()->where('karyawan_id', $dkaryawan->id_karyawan)->first();
        // $id_hkaryawan = history_karyawan::select('penanggung_jawab')->where('karyawan_id', $dkaryawan->id_karyawan)->get();
        // $hkaryawan = history_karyawan::all()->where('karyawan_id', 53)->first();
        // $hkaryawan = history_karyawan::where('karyawan_id', $dkaryawan->id_karyawan)->first();
        $hkaryawan = DB::table('karyawan')
        ->join('history_karyawan', function (JoinClause $join) {
            $id_karyawan = karyawan::all()->where('nip', Auth::user() -> no_induk)->first();
            $join->on('history_karyawan.karyawan_id', '=', 'karyawan.id_karyawan')
            ->where('history_karyawan.karyawan_id', '=', $id_karyawan->id_karyawan);
        })->get();
        // $hkaryawan = DB::table('karyawan')
        // ->join('history_karyawan', 'history_karyawan.karyawan_id', '=', 'karyawan.id_karyawan')->where('id', 53)
        // ->get();
        $karyawan = DB::table('karyawan')
        ->join('history_karyawan', 'karyawan.id_karyawan', '=', 'history_karyawan.karyawan_id')->where('karyawan_id', $dkaryawan->id_karyawan)
        ->join('tb_user', 'history_karyawan.penanggung_jawab', '=', 'tb_user.user_id')->where('user_id', $dhkaryawan->penanggung_jawab)
        ->get();
        // $hkaryawan = history_karyawan::find($id_karyawan)->karyawan()->get();
        // dd($karyawan);
        // $project = karyawan::find($id)->project()->get();
        // return($kontak);
        return view('user.home_karyawan', compact('karyawan', 'dkaryawan', 'hkaryawan', 'dhkaryawan'));
        //
    }
    //
}
