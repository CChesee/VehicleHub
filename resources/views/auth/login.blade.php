@extends('layout')

@section('link-css')
    <link rel="stylesheet" href="/css/pagecss/auth.css">
@endsection


@section('content')
<div class="container py-5 h-100">

    @if (session()->has('errorlogin'))
        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
            {{ session('errorlogin') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card mx-auto">
        <div class="row">
            <div class="col-md-6 col-lg-7 mx-auto">
                <div class="d-flex align-items-center h-100">
                    <div class="card-body p-4 text-black w-100">
                        <div class="d-flex justify-content-center align-items-center mb-3">
                            <img src="{{ asset('storage/app_image/logo.png') }}" height="150"
                            class="d-inline-block align-text-top">
                        </div>
                        <form action = "/login" method = "post">
                            @csrf
                            <div class="mb-3">
                                <h1 class="fw-bold text-center">Log in to your account</h1>
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="email">Email</label>
                                @if ($errors->has('email'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                                <input type="email" id="email" class="form-control form-control-lg" name="email" value="{{ old('email') }}"/>
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="password">Password</label>

                                @if ($errors->has('password'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                                <input type="password" id="password" class="form-control form-control-lg" name="password" value="{{ old('password') }}"/>
                            </div>

                            <div class="mb-2">
                                <p class="text-center text-muted mt-5 mb-0">Forgot Password? Login using recovery question
                                    <a href="/loginRecovery" class="fw-bold text-body" style="color: #FFCD37 !important;"><u>here</u></a>
                                </p>
                            </div>

                            <div class="mb-4">
                                <p class="text-center text-muted mt-4 mb-0">Don't Have An Account? Register
                                    <a href="/register" class="fw-bold text-body" style="color: #FFCD37 !important;"><u>here</u></a>
                                </p>
                            </div>

                            <div class="relog pt-1 mb-4 d-flex justify-content-center">
                                <button class="btn" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
