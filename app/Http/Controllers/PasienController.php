<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\siswa;
use App\Models\history;
use DB;
use Illuminate\Support\Facades\Auth;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = siswa::paginate(10);
        return view('pasien.siswa', compact('data'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $siswa = siswa::where('id_siswa', $id)->get();
        // $siswa = siswa::find($id);
        // return Auth()->user()->id;
        // $siswa = siswa::all();
        // return $id;
        // return $siswa;
        // dd($siswa);
        // return view('pasien.create');
        return view('pasien.create', compact('siswa'));
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

        history::create([
            'siswa_id' => $request->id_siswa,
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
        $hSiswa = history::where('id', $id)->first();
        $siswa = DB::table('siswa')
        ->join('history', 'siswa.id_siswa', '=', 'history.siswa_id')->where('id', $id)
        ->join('tb_user', 'history.penanggung_jawab', '=', 'tb_user.user_id')->where('id', $id)
        ->get();
        // $project = siswa::find($id)->project()->get();
        // return($kontak);
        return view('pasien.show', compact('siswa', 'hSiswa'));
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
        // $hSiswa = history::all();
        // $hSiswa = history::find($id);
        $hSiswa = history::where('id', $id)->first();
        $siswa = DB::table('history')
        ->join('siswa', 'history.siswa_id', '=', 'siswa.id_siswa')->where('id', $id)
        ->get();
        // return($hSiswa);
        return view('pasien.edit', compact('siswa', 'hSiswa'));
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

        $siswa = history::where('id', $id)->get();
        $siswa->keluhan = $request->keluhan;
        $siswa->obat = $request->obat;
        $siswa->diagnosa = $request->diagnosa;
        $siswa->status = $request->status;

        $siswa->save();
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
        $siswa = history::find($id)->delete();
        Session::flash('success', "project berhasil dihapus!!");
        return redirect('/riwayat');
        //
    }
}
