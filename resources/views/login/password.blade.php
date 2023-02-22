@extends('user.template')
 
@section('title-auth', 'index')
@section('content-user')
    <div class="container">

        <!-- Outer Row -->  
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            
                            <div class="col-lg-6 bg-gradient-success">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                                    </div>
                                    @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert">x</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @endif
                                    @if ($errors -> any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form class="user" method="POST" action="{{ route('password.action') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="old_password"
                                                id="old_Password" placeholder="Old Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="new_password"
                                                id="new_Password" placeholder="New Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="confirm_new_password"
                                                id="confirm_new_Password" placeholder="Confirm New Password">
                                        </div>
                                        <input type="submit" class="btn btn-light btn-user btn-block" value="Reset">
                                        @if( auth()->user()->role == 0)
                                        <a href="/dashboard" class="btn btn-light btn-user btn-block">Kembali</a>
                                        @elseif (auth()->user()->role == 1)
                                        <a href="/home_siswa" class="btn btn-light btn-user btn-block">Kembali</a>
                                        @elseif (auth()->user()->role == 2)
                                        <a href="/home_guru" class="btn btn-light btn-user btn-block">Kembali</a>
                                        @elseif (auth()->user()->role == 3)
                                        <a href="/home_karyawan" class="btn btn-light btn-user btn-block">Kembali</a>
                                        @endif
                                    </form>
                                    {{-- <hr> --}}
                                    {{-- <div class="text-center">
                                        <a class="small text-white" href="/register">Create an Account!</a>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-lg-6 d-none d-lg-block text-center m-auto">
                                <img src="assets/img/logo_uks.jpeg">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
