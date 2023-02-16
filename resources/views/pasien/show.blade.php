@extends('template.admin')
 
@section('title', 'siswa')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                {{-- <div class="card-header py-3">
    
                </div> --}}
                <div class="card-body">
                        <table class="table">
                            
                            <tbody>
                                
                                @foreach ($siswa as $siswa)
                                <tr>
                                    <td>NISN Siswa : {{ $siswa->nisn }}</td>
                                    <td>Penanggung Jawab Siswa : {{ $siswa->username }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Siswa : {{ $siswa->nama }}</td>
                                    <td>Status Siswa : {{ $siswa->status }}</td>
                                </tr>
                                <tr>
                                    <td>Kelas Siswa : {{ $siswa->kelas }}</td>
                                    <?php
                                    $tmasuk=strtotime($siswa->created_at);
                                    $tmasukf=date('l, j F Y H:i', $tmasuk);
                                    ?>
                                    <td>Tanggal Masuk : <?=$tmasukf?></td>
                                </tr>
                                <tr>
                                    <td>Jurusan Siswa : {{ $siswa->jurusan }}</td>
                                    <!-- <td>Status Siswa : {{ $siswa->status }}</td> -->
                                </tr>
                                <tr>
                                    <td>Keluhan Siswa : <br>{{ $siswa->keluhan }}</td>
                                </tr>
                                <tr>
                                    <td>Diagnosa Siswa : <br>{{ $siswa->diagnosa }}</td>
                                </tr>
                                <tr>
                                    <td>Obat Siswa : <br>{{ $siswa->obat }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('riwayat.index') }}" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection