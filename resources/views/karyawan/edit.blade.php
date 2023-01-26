<?php

use function PHPUnit\Framework\returnValue;
?>
@extends('template.admin')
 
@section('title', 'History Karyawan')
@section('content')
<h1>Halaman Edit History Karyawan</h1>
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
                
                <form method="post" action="{{ route('karyawan.update', $hKaryawan->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @foreach ($karyawan as $karyawan)
                    <p>Nama Pasien</p>
                    <input class="form-control" type="text" name="nama" id="nama" value="{{ $karyawan->nama }}" aria-label="Disabled input example" disabled readonly>

                    <p>Bagian Pasien</p>
                    <input class="form-control" type="text" name="bagian" id="bagian" value="{{ $karyawan->bagian }}" aria-label="Disabled input example" disabled readonly>
                    @endforeach 
                    <p>Keluhan Pasien</p>
                    <textarea class="form-control" name="keluhan" id="keluhan" aria-label="With textarea">{{$hKaryawan->keluhan}}</textarea>

                    <p>Obat yang Diberikan</p>
                    <textarea class="form-control" name="obat" id="obat" aria-label="With textarea">{{$hKaryawan->obat}}</textarea>
                    
                    <p>Diagnosa Pasien</p>
                    <input type="text" class="form-control" value="{{$hKaryawan->diagnosa}}" name="diagnosa" id="diagnosa" placeholder="" aria-label="Username">
                    
                    <p>Status Pasien</p>
                    <select class="form-select form-control" name="status" id="status">
                        <!-- <option selected disabled>Pilih Jenis Kelamin</option> -->
                        <option value="rawat"@if($hKaryawan->status == 'rawat')selected @endif>Dirawat</option>
                        <option value="kembali"@if($hKaryawan->status == 'kembali')selected @endif>Kembali ke kelas</option>
                        <option value="pulang"@if($hKaryawan->status == 'pulang')selected @endif>Dipulangkan</option>
                        <option value="rujuk"@if($hKaryawan->status == 'rujuk')selected @endif>Dirujuk</option>
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