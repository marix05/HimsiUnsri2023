@extends('layouts.admin.index')

@section('content')
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="py-5 px-4">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">WELCOME BACK RISTEK!</h1>
                                </div>
                                @if(session()->has("error"))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <small>{{ session('error') }}</small>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <form class="user" method="POST" action="{{ route('admin-login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control form-control-user" value="{{ old('username') }}" placeholder="Enter Username" required>
                                        @error('username')
                                            <small class="text-danger pl-3">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user" value="{{ old('password') }}" placeholder="Password" required>
                                        @error('password')
                                            <small class="text-danger pl-3">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block" name="login">
                                        Login
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
