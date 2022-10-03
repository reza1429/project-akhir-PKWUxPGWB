@extends('template.admin')
 
@section('title', 'Riwayat')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">

                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">NISN</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">ALAMAT</th>
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
@endsection