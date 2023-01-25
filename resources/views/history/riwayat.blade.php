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
                    <h5>Guru <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal-siswa">Tambah</button></h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr style="background-color:#1AA222; color:white;">
                                {{-- <th scope="col">id</th>
                                <th scope="col">NISN</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">ALAMAT</th>
                                <th scope="col">ACTION</th> --}}
                                <th scope="col">NO</th>
                                <th scope="col">NIP</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">JENIS</th>
                                <th scope="col">JURUSAN</th>
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-info btn-circle"><i class="fas fa-info"></i></a>
                                        <a href="" class="btn btn-sm btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                                        <a href="" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
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
                    <h5>Karyawan <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal-siswa">Tambah</button></h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr style="background-color:#1AA222; color:white;">
                                <th scope="col">NO</th>
                                <th scope="col">NISN</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">BAGIAN</th>
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-info btn-circle"><i class="fas fa-info"></i></a>
                                        <a href="" class="btn btn-sm btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                                        <a href="" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
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


<!-- data_guru
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
                            <td>Kelas</td>
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
        var isi = $('#search_guru').val()
        // console.log(isi)
        $.ajax({
            url:"/s_guru",
            type:"GET",
            data:{isi},
            dataType:'json',
            success: res => {
                // console.log(res);
                var _html='';
                // $.each( res.data, function( key, value ) {
                $.each( res.data, function( index, data ) {
                    // $('#guru_list').html(value.nama)
                    _html+='<tr><td>'+data.nisn+'</td>';
                    _html+='<td>'+data.nama+'</td>';
                    _html+='<td>'+data.kelas+'</td>';
                    _html+='<td><a class="btn btn-primary btn-sm" href="guru/create/'+data.id_guru+'" role="button">Tambah History</a></td></tr>';
                    // console.log(value.nama)
                });
                $('#guru_list').html(_html);
            }
        });
    });
});
</script> -->
@endsection