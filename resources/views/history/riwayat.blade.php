@extends('template.admin')
 
@section('title', 'Riwayat')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5>Siswa <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal-siswa">Tambah</button></h5>
                    
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">NISN</th>
                                <th scope="col">NAMA</th>
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
                    <h5>Guru</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
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
                                <th scope="col">Action</th>
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
                    <h5>Karyawan</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
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
                <table class="table table-bordered table-stripped" id="table-siswa">
                    <thead>
                        <tr>
                            <td>NISN</td>
                            <td>Nama</td>
                            <td>Kelas</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection