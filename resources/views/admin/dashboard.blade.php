@extends('template.admin')
 
@section('title', 'dashboard')
@section('content')
<div class="container">
    <h3>Selamat datang,<br>{{ Auth::user() -> username }}</h3>
 <br>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            {{-- <div class="card-header py-3">

            </div> --}}
            <div class="card-body">
                    <h5>Daftar Siswa Terbaru</h5>
                    <table class="table">
                        <thead>
                            <tr style="background-color:#1AA222; color:white;">
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