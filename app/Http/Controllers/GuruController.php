<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\guru;
use App\Models\history_guru;
use DB;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = guru::paginate(10);
        return view('guru.guru', compact('data'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $guru = guru::where('id_guru', $id)->get();
        // $guru = guru::find($id);
        // return Auth()->user()->id;
        // $guru = guru::all();
        // return $id;
        // return $guru;
        // dd($guru);
        // return view('pasien.create');
        return view('guru.create', compact('guru'));
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

        history_guru::create([
            'guru_id' => $request->id_guru,
            'keluhan' => $request->keluhan,
            'obat' => $request->obat,
            'diagnosa' => $request->diagnosa,
            'surat' => "menyusul",
            'penanggung_jawab' => Auth::id(),
            'status' => $request->status,
            'created_at' => Carbon::now()->translatedFormat('Y-m-d H:i:s')
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
        $hGuru = history_guru::where('id', $id)->first();
        $guru = DB::table('guru')
        ->join('history_guru', 'guru.id_guru', '=', 'history_guru.guru_id')->where('id', $id)
        ->join('tb_user', 'history_guru.penanggung_jawab', '=', 'tb_user.user_id')->where('id', $id)
        ->get();
        // $project = guru::find($id)->project()->get();
        // return($kontak);
        return view('guru.show', compact('guru', 'hGuru'));
        //
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
        $hGuru = history_guru::where('id', $id)->first();
        $guru = DB::table('history_guru')
        ->join('guru', 'history_guru.guru_id', '=', 'guru.id_guru')->where('id', $id)
        ->get();
        // return($hguru);
        return view('guru.edit', compact('guru', 'hGuru'));
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

        $guru = history_guru::where('id', $id)->get();
        $guru->keluhan = $request->keluhan;
        $guru->obat = $request->obat;
        $guru->diagnosa = $request->diagnosa;
        $guru->status = $request->status;

        $guru->save();
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
        $guru = history_guru::find($id)->delete();
        Session::flash('success', "project berhasil dihapus!!");
        return redirect('/riwayat');
        //
    }
}
