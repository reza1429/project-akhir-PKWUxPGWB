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
                            <thead>
                                <tr style="background-color:#1AA222; color:white;">
                                    <th scope="col">No</th>
                                    <th scope="col">NISN</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Bagian</th>
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