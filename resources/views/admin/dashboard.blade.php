@extends('template.admin')
 
@section('title', 'dashboard')
@section('content')
<div class="container">
    <h3>Selamat datang,<br>Admin!</h3>
 <br>
 <div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            {{-- <div class="card-header py-3">

            </div> --}}
            <div class="card-body">
                    <h5>Daftar Siswa Terbaru</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NISN</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Jurusan</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection