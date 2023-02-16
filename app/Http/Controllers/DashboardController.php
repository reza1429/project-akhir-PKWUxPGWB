<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Pagination\CursorPaginator;
use App\Models\history_guru;
use App\Models\history;
use Illuminate\Support\Facades\DB;
// use DB;
use Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hariIni = Carbon\Carbon::now();
        // $besok = strtotime($hariIni)*60*60*24;
        $besok = Carbon\Carbon::tomorrow();
        // $fbesok = date('j F Y H:i', $besok );
        // dd($besok);

        $siswa = history::all()->where('created_at'==$hariIni);
        $hSiswa = DB::table('siswa')
        ->join('history', function($join) {
            $join->on('history.siswa_id', '=', 'siswa.id_siswa')->whereDate('history.created_at', Carbon\Carbon::now());
        })->paginate(5);
        // dd($hSiswa);
        $hGuru = DB::table('guru')
        ->join('history_guru', function($join) {
            $join->on('history_guru.guru_id', '=', 'guru.id_guru')->whereDate('history_guru.created_at', Carbon\Carbon::now());
        })->paginate(5);
        // $hGuru = DB::table('history_guru')
        // ->join('guru', 'history_guru.guru_id', '=', 'guru.id_guru')
        // ->paginate(5);
        $hKaryawan = DB::table('karyawan')
        ->join('history_karyawan', function($join) {
            $join->on('history_karyawan.karyawan_id', '=', 'karyawan.id_karyawan')->whereDate('history_karyawan.created_at', Carbon\Carbon::now());
        })->paginate(5);
        // $hKaryawan = DB::table('history_karyawan')
        // ->join('karyawan', 'history_karyawan.karyawan_id', '=', 'karyawan.id_karyawan')
        // ->paginate(5);
        // return $hSiswa;
        // $hSiswa = $dataSiswa->toQuery()->cursorPaginate(5);
        // $hSiswa = history::all();
        // $hSiswa = siswa::where('id', $id)->history()->get();
        return view('admin.dashboard', compact('hSiswa', 'hGuru', 'hKaryawan'));
        // return view('admin.dashboard');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
