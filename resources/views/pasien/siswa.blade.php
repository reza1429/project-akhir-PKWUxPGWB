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
                        <a href="" type="button" class="btn btn-success">Create</a><br>
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