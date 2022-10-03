@extends('login.template')
 
@section('title', 'index')
@section('content-auth')
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    
                    <div class="col-lg-7 bg-gradient-success">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            @if ($errors -> any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="user" method="POST" action="{{ route('register.action') }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" value="{{ old('username') }}"
                                            placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email" name="email" value="{{ old('password') }}"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="password"
                                            id="password" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" name="confirm_password"
                                            id="confrim_password" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-light btn-user btn-block" value="Register Account">
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small text-white" href="/login">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 d-none d-lg-block text-center m-auto">
                        <img src="assets/img/logo_uks.jpeg">
                    </div>
                </div>
            </div>
        </div>
@endsection
