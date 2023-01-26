@extends('template.admin')
 
@section('title', 'History Guru')
@section('content')
<h1>Halaman Tambah History Guru</h1>
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
                <form method="post" action="{{ route('guru.store') }}" enctype="multipart/form-data">
                    @csrf
                    @foreach ($guru as $guru)
                    <input type="hidden" name="id_guru" value="{{ $guru->id_guru }}">
                    <p>Nama Pasien</p>
                    <input class="form-control" type="text" name="nama" id="nama" value="{{ $guru->nama }}" aria-label="Disabled input example" disabled readonly>

                    <p>Matpel Pasien</p>
                    <input class="form-control" type="text" name="matpel" id="matpel" value="{{ $guru->matpel }}" aria-label="Disabled input example" disabled readonly>

                    <p>Jenis Pasien</p>
                    <input class="form-control" type="text" name="jenis" id="jenis" value="{{ $guru->jenis }}" aria-label="Disabled input example" disabled readonly>
                    @endforeach    
                    <p>Keluhan Pasien</p>
                    <textarea class="form-control" name="keluhan" id="keluhan" aria-label="With textarea"></textarea>

                    <p>Obat yang Diberikan</p>
                    <textarea class="form-control" name="obat" id="obat" aria-label="With textarea"></textarea>
                    
                    <p>Diagnosa Pasien</p>
                    <input type="text" class="form-control" name="diagnosa" id="diagnosa" placeholder="" aria-label="Username">
                    
                    <p>Status Pasien</p>
                    <select class="form-select form-control" name="status" id="status">
                        <!-- <option selected disabled>Pilih Jenis Kelamin</option> -->
                        <option value="rawat">Dirawat</option>
                        <option value="kembali">Kembali ke kelas</option>
                        <option value="pulang">Dipulangkan</option>
                        <option value="rujuk">Dirujuk</option>
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