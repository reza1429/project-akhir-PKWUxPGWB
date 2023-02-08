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
                            <thead>
                                <tr style="background-color:#1AA222; color:white;">
                                    <th scope="col">No</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jenis</th>
                                    <th scope="col">Matpel</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $i => $d)
                                <tr>
                                    <td>{{ $data->firstItem() + $i }}</td>
                                        <td>{{ $d->nip }}</td>
                                        <td>{{ $d->nama }}</td>
                                        <td>{{ $d->jenis }}</td>
                                        <td>{{ $d->matpel }}</td>
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection