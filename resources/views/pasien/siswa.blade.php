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
                                @foreach ($data as $i => $d)
                                <tr>
                                    <td>{{ $data->firstItem() + $i }}</td>
                                    <td>{{ $d->nisn }}</td>
                                    <td>{{ $d->nama }}</td>
                                    <td>{{ $d->kelas }}</td>
                                    <td>{{ $d->jurusan }}</td>
                                    {{-- <td>
                                        <a href="{{ route('master_s.show', $d->id)  }}" class="btn btn-sm btn-info btn-circle"><i class="fas fa-info"></i></a>
                                        @if (auth()->user()->role==0)
                                        <a href="{{ route('master_s.edit', $d->id)  }}" class="btn btn-sm btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('master_s.hapus', $d->id)  }}" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                                        @endif
                                    </td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="card-footer d-flex justify-content-end">
                            {{ $data->links() }}  
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection