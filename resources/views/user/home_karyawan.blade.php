@extends('user.template')
 
@section('title', 'karyawan')
@section('content-user')

{{-- modal detail reservasi --}}
    @foreach ($karyawan as $detail)
    <div class="modal fade" id="modal-detail{{$detail->id}}">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail History</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body table-responsive">
                <table class="table table-borderless">
                <tr>
                    <td>Keluhan</td>
                    <td>: {{$detail->keluhan}}</td>
                </tr>
                <tr>
                    <td>Diagnosa</td>
                    <td>: {{$detail->diagnosa}}</td>
                </tr>
                <tr>
                    <td>Obat</td>
                    <td>: {{$detail->obat}}</td>
                </tr>
                <tr>
                    <?php 
                    $asli = $detail->status;
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
                    <td>Status</td>
                    <td>: <?= $status ?></td>
                </tr>
                <tr>
                    <?php
                    $tmasuk=strtotime($detail->created_at);
                    $tmasukf=date('l, j F Y', $tmasuk);
                    $jmasuk=date('H:i', $tmasuk);
                    ?>
                    <td>Tanggal Masuk</td>
                    <td>: <?=$dhkaryawan->created_at?></td>
                </tr>
                <tr>
                    <td>Penanggung Jawab</td>
                    <td>: {{ $detail->username }}</td>
                </tr>
                </table>
                </div>
            </div>
        </div>
    </div>
    @endforeach

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                {{-- <div class="card-header py-3">
    
                </div> --}}
                <div class="card-body">
                    <h1>{{ $dkaryawan->nama }}</h1>
                    <h3>{{ $dkaryawan->bagian }}</h3>
                    <a class="dropdown-item" href="{{ route('password') }}">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Reset Password
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                        <table class="table">
                        <thead>
                            <tr style="background-color:#1AA222; color:white;">
                                <th scope="col">NO</th>
                                <th scope="col">Tanggal Masuk</th>
                                <th scope="col">Penanggung Jawab</th>
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($karyawan as $i => $karyawan)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <?php
                                    $tmasuk=strtotime($karyawan->created_at);
                                    $tmasukf=date('l, j F Y', $tmasuk);
                                    $jmasuk=date('H:i', $tmasuk);
                                    ?>
                                    <td><?=$dhkaryawan->created_at?></td>
                                    <td>{{ $karyawan->username }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-info btn-circle" data-toggle="modal" data-target="#modal-detail{{$karyawan->id}}">
                                            <i class="fa fa-info" aria-hidden="true"></i> 
                                        </button>
                                    </td>
                                </tr>
                            @empty
                            <p>karyawan belum pernah masuk uks</p>
                            @endforelse
                        </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection