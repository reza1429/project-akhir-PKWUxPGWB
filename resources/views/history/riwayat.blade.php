@extends('template.admin')
 
@section('title', 'Riwayat')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5>Siswa <button style="background-color:#1AA222;" type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-siswa">Tambah</button></h5>
                    
                </div>
                <div class="card-body">
                    <table class="table">   
                        <thead>
                            <tr style="background-color:#1AA222; color:white;">
                                <th scope="col">NO</th>
                                <th scope="col">NISN</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">JURUSAN</th>
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hSiswa as $i => $siswa)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{$siswa->nisn}}</td>
                                    <td>{{$siswa->nama}}</td>
                                    <td>{{$siswa->jurusan}}</td>
                                    <td>
                                        <a href="{{route('siswa.show', $siswa->id)}}" class="btn btn-sm btn-info btn-circle"><i class="fas fa-info"></i></a>
                                        <a href="{{route('siswa.edit', $siswa->id)}}" class="btn btn-sm btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                                        <a href="{{route('siswa.hapus', $siswa->id)}}" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5>Guru <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal-guru">Tambah</button></h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr style="background-color:#1AA222; color:white;">
                                <th scope="col">NO</th>
                                <th scope="col">NIP</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">JENIS</th>
                                <th scope="col">MATPEL</th>
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hGuru as $i => $guru)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{$guru->nip}}</td>
                                    <td>{{$guru->nama}}</td>
                                    <td>{{$guru->jenis}}</td>
                                    <td>{{$guru->matpel}}</td>
                                    <td>
                                        <a href="{{route('guru.show', $guru->id)}}" class="btn btn-sm btn-info btn-circle"><i class="fas fa-info"></i></a>
                                        <a href="{{route('guru.edit', $guru->id)}}" class="btn btn-sm btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                                        <a href="{{route('guru.hapus', $guru->id)}}" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5>Karyawan <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal-karyawan">Tambah</button></h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr style="background-color:#1AA222; color:white;">
                                <th scope="col">NO</th>
                                <th scope="col">NIP</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">BAGIAN</th>
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hKaryawan as $i => $karyawan)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{$karyawan->nip}}</td>
                                    <td>{{$karyawan->nama}}</td>
                                    <td>{{$karyawan->bagian}}</td>
                                    <td>
                                        <a href="{{route('karyawan.show', $karyawan->id)}}" class="btn btn-sm btn-info btn-circle"><i class="fas fa-info"></i></a>
                                        <a href="{{route('karyawan.edit', $karyawan->id)}}" class="btn btn-sm btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                                        <a href="{{route('karyawan.hapus', $karyawan->id)}}" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- data_siswa -->
{{-- modal siswa --}}
<div class="modal fade" id="modal-siswa">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Search Siswa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <input type="search" name="search_siswa" id="search_siswa" placeholder="Masukkan NISN" class="form-control search_siswa"> 
                <table class="table table-bordered table-stripped" id="table-siswa">
                    <thead>
                        <tr>
                            <td>NISN</td>
                            <td>Nama</td>
                            <td>Kelas</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody id="siswa_list">
                    {{-- @foreach ($siswa as $s) --}} 
                            <tr >
                            {{-- <td>{{ $s->nisn }}</td>
                                <td>{{ $s->nama }}</td>
                                <td>{{ $s->kelas }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="#" role="button">Tambah History</a>
                                    {{-- <a href="{{ route('master_s.show', $s->id)  }}" class="btn btn-sm btn-info btn-circle"><i class="fas fa-info"></i></a> --}}
                                </td>
                            </tr>
                            {{-- @endforeach --}} 
                        </div>
                    </tbody>
                </table>
                <div class="card-footer pagination d-flex justify-content-end">
                {{-- {{ $siswa->onEachSide(1)->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
{{--  script siswa --}}
<script type="text/javascript">
$(document).ready(function(){
    $('#search_siswa').on('keyup',function(){
        // var query_siswa=$(this).val();
        var isi = $('#search_siswa').val()
        // console.log(isi)
        $.ajax({
            url:"/s_siswa",
            type:"GET",
            data:{isi},
            dataType:'json',
            success: res => {
                // console.log(res);
                var _html='';
                // $.each( res.data, function( key, value ) {
                $.each( res.data, function( index, data ) {
                    // $('#siswa_list').html(value.nama)
                    _html+='<tr><td>'+data.nisn+'</td>';
                    _html+='<td>'+data.nama+'</td>';
                    _html+='<td>'+data.kelas+'</td>';
                    _html+='<td><a class="btn btn-primary btn-sm" href="siswa/create/'+data.id_siswa+'" role="button">Tambah History</a></td></tr>';
                    // console.log(value.nama)
                });
                $('#siswa_list').html(_html);
            }
        });
    });
});
</script>


<!-- data_guru -->
{{-- modal guru --}}
<div class="modal fade" id="modal-guru">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Search guru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <input type="search" name="search_guru" id="search_guru" placeholder="Masukkan NISN" class="form-control search_guru"> 
                <table class="table table-bordered table-stripped" id="table-guru">
                    <thead>
                        <tr>
                            <td>NIP</td>
                            <td>Nama</td>
                            <td>Mata pelajaran</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody id="guru_list">
                    {{-- @foreach ($guru as $g) --}} 
                            <tr >
                            {{-- <td>{{ $g->nip }}</td>
                                <td>{{ $g->nama }}</td>
                                <td>{{ $g->kelas }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="#" role="button">Tambah History</a>
                                    {{-- <a href="{{ route('master_s.show', $g->id)  }}" class="btn btn-sm btn-info btn-circle"><i class="fas fa-info"></i></a> --}}
                                </td>
                            </tr>
                            {{-- @endforeach --}} 
                        </div>
                    </tbody>
                </table>
                <div class="card-footer pagination d-flex justify-content-end">
                {{-- {{ $guru->onEachSide(1)->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
{{--  script guru --}}
<script type="text/javascript">
$(document).ready(function(){
    $('#search_guru').on('keyup',function(){
        // var query_guru=$(this).val();
        var isi_guru = $('#search_guru').val()
        // console.log(isi_guru)
        $.ajax({
            url:"/s_guru",
            type:"GET",
            data:{isi_guru},
            dataType:'json',
            success: res_guru => {
                // console.log(res_guru);
                var _html_guru='';
                // $.each( res_guru.data, function( key, value ) {
                $.each( res_guru.data_guru, function( index, data_guru ) {
                    // $('#guru_list').html(value.nama)
                    _html_guru+='<tr><td>'+data_guru.nip+'</td>';
                    _html_guru+='<td>'+data_guru.nama+'</td>';
                    _html_guru+='<td>'+data_guru.matpel+'</td>';
                    _html_guru+='<td><a class="btn btn-primary btn-sm" href="guru/create/'+data_guru.id_guru+'" role="button">Tambah History</a></td></tr>';
                    // console.log(value.nama)
                });
                $('#guru_list').html(_html_guru);
            }
        });
    });
});
</script>


<!-- data_karyawan -->
{{-- modal karyawan --}}
<div class="modal fade" id="modal-karyawan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Search karyawan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <input type="search" name="search_karyawan" id="search_karyawan" placeholder="Masukkan NISN" class="form-control search_karyawan"> 
                <table class="table table-bordered table-stripped" id="table-karyawan">
                    <thead>
                        <tr>
                            <td>NIP</td>
                            <td>Nama</td>
                            <td>Mata pelajaran</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody id="karyawan_list">
                    {{-- @foreach ($karyawan as $g) --}} 
                            <tr >
                            {{-- <td>{{ $g->nip }}</td>
                                <td>{{ $g->nama }}</td>
                                <td>{{ $g->kelas }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="#" role="button">Tambah History</a>
                                    {{-- <a href="{{ route('master_s.show', $g->id)  }}" class="btn btn-sm btn-info btn-circle"><i class="fas fa-info"></i></a> --}}
                                </td>
                            </tr>
                            {{-- @endforeach --}} 
                        </div>
                    </tbody>
                </table>
                <div class="card-footer pagination d-flex justify-content-end">
                {{-- {{ $karyawan->onEachSide(1)->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
{{--  script karyawan --}}
<script type="text/javascript">
$(document).ready(function(){
    $('#search_karyawan').on('keyup',function(){
        // var query_karyawan=$(this).val();
        var isi_karyawan = $('#search_karyawan').val()
        // console.log(isi_karyawan)
        $.ajax({
            url:"/s_karyawan",
            type:"GET",
            data:{isi_karyawan},
            dataType:'json',
            success: res_karyawan => {
                // console.log(res_karyawan);
                var _html_karyawan='';
                // $.each( res_karyawan.data, function( key, value ) {
                $.each( res_karyawan.data_karyawan, function( index, data_karyawan ) {
                    // $('#karyawan_list').html(value.nama)
                    _html_karyawan+='<tr><td>'+data_karyawan.nip+'</td>';
                    _html_karyawan+='<td>'+data_karyawan.nama+'</td>';
                    _html_karyawan+='<td>'+data_karyawan.bagian+'</td>';
                    _html_karyawan+='<td><a class="btn btn-primary btn-sm" href="karyawan/create/'+data_karyawan.id_karyawan+'" role="button">Tambah History</a></td></tr>';
                    // console.log(value.nama)
                });
                $('#karyawan_list').html(_html_karyawan);
            }
        });
    });
});
</script>
@endsection