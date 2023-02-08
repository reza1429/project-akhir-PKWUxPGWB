@extends('template.admin')
 
@section('title', 'karyawan')
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
                                
                                @foreach ($karyawan as $karyawan)
                                <tr>
                                    <td>NIP Karyawan : {{ $karyawan->nip }}</td>
                                    <td>Penanggung Jawab karyawan : {{ $karyawan->username }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Karyawan : {{ $karyawan->nama }}</td>
                                    <td>Status karyawan : {{ $karyawan->status }}</td>
                                </tr>
                                <tr>
                                    <td>Bagian Karyawan : {{ $karyawan->bagian }}</td>
                                    <?php
                                    $tmasuk=$karyawan->created_at;
                                    $tmasukf=date('l, j F Y H:i', strtotime($tmasuk));
                                    ?>
                                    <td>Tanggal Masuk : <?=$tmasukf?></td>
                                </tr>
                                <!-- <tr> -->
                                    <!-- <td>Status Karyawan : {{ $karyawan->status }}</td> -->
                                <!-- </tr> -->
                                <tr>
                                    <td>Keluhan Karyawan : <br>{{ $karyawan->keluhan }}</td>
                                </tr>
                                <tr>
                                    <td>Diagnosa Karyawan : <br>{{ $karyawan->diagnosa }}</td>
                                </tr>
                                <tr>
                                    <td>Obat Karyawan : <br>{{ $karyawan->obat }}</td>
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