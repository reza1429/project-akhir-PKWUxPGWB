@extends('template.admin')
 
@section('title', 'guru')
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
                                
                                @foreach ($guru as $guru)
                                <tr>
                                    <td>NIP Guru : {{ $guru->nip }}</td>
                                    <td>Penanggung Jawab Guru : {{ $guru->username }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Guru : {{ $guru->nama }}</td>
                                    <?php 
                                    $asli = $guru->status;
                                    if ($asli == 'rawat') {
                                        $status = 'Sedang dirawat';
                                    } elseif ($asli == 'kembali'){
                                        $status = 'Kembali ke kelas';
                                    } elseif ($asli == 'pulang'){
                                        $status = 'telah dipulangkan';
                                    } elseif ($asli == 'rujuk'){
                                        $status = 'Telah dirujuk';
                                    }
                                    ?>
                                    <td>Status Guru : <?= $status ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Guru : {{ $guru->jenis }}</td>
                                    <?php
                                    $tmasuk=$guru->created_at;
                                    $tmasukf=date('l, j F Y H:i', strtotime($tmasuk));
                                    ?>
                                    <td>Tanggal Masuk : <?=$hGuru->created_at?></td>
                                </tr>
                                <tr>
                                    <td>Matpel Guru : {{ $guru->matpel }}</td>
                                    <!-- <td>Status Guru : {{ $guru->status }}</td> -->
                                </tr>
                                <tr>
                                    <td>Keluhan Guru : <br>{{ $guru->keluhan }}</td>
                                </tr>
                                <tr>
                                    <td>Diagnosa Guru : <br>{{ $guru->diagnosa }}</td>
                                </tr>
                                <tr>
                                    <td>Obat Guru : <br>{{ $guru->obat }}</td>
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