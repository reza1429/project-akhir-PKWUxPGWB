@extends('login.template')
 
@section('title-auth', 'index')
@section('content-auth')
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-12 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            
                            <div class="col-lg-6 bg-success">
                                <div class="p-5">
                                    <div class="text-center">   
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
                                    <form class="user" method="POST" action="{{ route('login.action') }}">
                                        @csrf
                                        <div class="form-group">
                                                <input type="text" class="form-control form-control-user" id="username" name="username" value="{{ old('username') }}"
                                                    placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password"
                                                id="Password" placeholder="Password">
                                        </div>
                                        <input type="submit" class="btn btn-light btn-user btn-block" value="Login">
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small text-white" href="/register">Create an Account!</a>
                                    </div>
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
