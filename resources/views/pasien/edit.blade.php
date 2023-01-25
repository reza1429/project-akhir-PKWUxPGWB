<?php

use function PHPUnit\Framework\returnValue;
?>
@extends('template.admin')
 
@section('title', 'History siswa')
@section('content')
<h1>Halaman Edit History Siswa</h1>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                {{-- <div class="card-header py-3">
    
                </div> --}}
                <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    
                @endif
                
                <form method="post" action="{{ route('siswa.update', $hSiswa->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @foreach ($siswa as $siswa)
                    <p>Nama Pasien</p>
                    <input class="form-control" type="text" name="nama" id="nama" value="{{ $siswa->nama }}" aria-label="Disabled input example" disabled readonly>

                    <p>Jurusan Pasien</p>
                    <input class="form-control" type="text" name="jurusan" id="jurusan" value="{{ $siswa->jurusan }}" aria-label="Disabled input example" disabled readonly>

                    <p>Kelas Pasien</p>
                    <input class="form-control" type="text" name="kelas" id="kelas" value="{{ $siswa->kelas }}" aria-label="Disabled input example" disabled readonly>
                    @endforeach 
                    <p>Keluhan Pasien</p>
                    <textarea class="form-control" name="keluhan" id="keluhan" aria-label="With textarea">{{$hSiswa->keluhan}}</textarea>

                    <p>Obat yang Diberikan</p>
                    <textarea class="form-control" name="obat" id="obat" aria-label="With textarea">{{$hSiswa->obat}}</textarea>
                    
                    <p>Diagnosa Pasien</p>
                    <input type="text" class="form-control" value="{{$hSiswa->diagnosa}}" name="diagnosa" id="diagnosa" placeholder="" aria-label="Username">
                    
                    <p>Status Pasien</p>
                    <select class="form-select form-control" name="status" id="status">
                        <!-- <option selected disabled>Pilih Jenis Kelamin</option> -->
                        <option value="rawat"@if($hSiswa->status == 'rawat')selected @endif>Dirawat</option>
                        <option value="kembali"@if($hSiswa->status == 'kembali')selected @endif>Kembali ke kelas</option>
                        <option value="pulang"@if($hSiswa->status == 'pulang')selected @endif>Dipulangkan</option>
                        <option value="rujuk"@if($hSiswa->status == 'rujuk')selected @endif>Dirujuk</option>
                    </select>
                    
                    <input type="submit" class="btn btn-success" value="simpan">
                    <a href="{{ route('riwayat.index') }}" class="btn btn-danger">Batal</a>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection