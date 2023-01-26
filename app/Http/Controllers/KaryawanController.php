<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\karyawan;
use App\Models\history_karyawan;
use DB;
use Illuminate\Support\Facades\Auth;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = karyawan::paginate(10);
        return view('pasien.siswa', compact('data'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $karyawan = karyawan::where('id_karyawan', $id)->get();
        // $karyawan = karyawan::find($id);
        // return Auth()->user()->id;
        // $karyawan = karyawan::all();
        // return $id;
        // return $karyawan;
        // dd($karyawan);
        // return view('pasien.create');
        return view('karyawan.create', compact('karyawan'));
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
        $masage = [
            'required' => ':attribute harus diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maximal :max karakter',
            'numeric' => ':attribute harus diisi angka',
            'mimes' => ':attribute harus bertipe foto'
        ];

        $this->validate($request, [
            'keluhan' => 'required',
            'obat' => 'required',
            'status' => 'required',
            'diagnosa' => 'required'
        ], $masage);

        history_karyawan::create([
            'karyawan_id' => $request->id_karyawan,
            'keluhan' => $request->keluhan,
            'obat' => $request->obat,
            'diagnosa' => $request->diagnosa,
            'surat' => "menyusul",
            'penanggung_jawab' => Auth::id(),
            'status' => $request->status
        ]);

        Session::flash('success', "project berhasil ditambahkan!!");
        return redirect('/riwayat');
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
        // $hKaryawan = history::all();
        // $hKaryawan = history::find($id);
        $hKaryawan = history_karyawan::where('id', $id)->first();
        $karyawan = DB::table('history_karyawan')
        ->join('karyawan', 'history_karyawan.karyawan_id', '=', 'karyawan.id_karyawan')->where('id', $id)
        ->get();
        // return($hKaryawan);
        return view('karyawan.edit', compact('karyawan', 'hKaryawan'));
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
        $masage = [
            'required' => ':attribute harus diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maximal :max karakter',
            'numeric' => ':attribute harus diisi angka',
            'mimes' => ':attribute harus bertipe foto'
        ];

        $this->validate($request, [
            'keluhan' => 'required',
            'obat' => 'required',
            'status' => 'required',
            'diagnosa' => 'required'
        ], $masage);

        $karyawan = history_karyawan::where('id', $id)->get();
        $karyawan->keluhan = $request->keluhan;
        $karyawan->obat = $request->obat;
        $karyawan->diagnosa = $request->diagnosa;
        $karyawan->status = $request->status;

        $karyawan->save();
        Session::flash('success', "data berhasil diupdate!!");
        return redirect('riwayat');
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

    public function hapus($id)
    {
        $karyawan = history_karyawan::find($id)->delete();
        Session::flash('success', "project berhasil dihapus!!");
        return redirect('/riwayat');
        //
    }
}
