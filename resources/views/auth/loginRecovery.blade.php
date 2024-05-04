@extends('layout')

{{-- @section('link-css')
    <link rel="stylesheet" href="/css/pagecss/auth.css">
@endsection --}}


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

    <div class="card mx-auto" >
        <div class="row">

        {{-- <div class="col-md-6 col-lg-5 d-flex align-items-center">
          <img src="{{ asset('storage/bg/bg_login.png') }}"
            class="img-fluid" />
        </div> --}}



            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4  text-black">

                    <form action = "/loginRecovery" method = "post">
                        @csrf
                        <div class="mb-3">
                            <h1 class="fw-bold text-center">RECOVERY LOGIN</h1>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="email">Email</label>
                                <input type="email" id="email" class="form-control form-control-lg" name="email" />
                            <div id="error" class="form-text">{{$errors->first('email')}}</div>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="recovery_question">Recovery Question (Click to choose)</label>
                            <select class="form-control form-control-lg" id="recovery_question" name="recovery_question">
                                <option value="What is your grandfather name?">What is your grandfather's name?</option>
                                <option value="What is your grandmother name?">What is your grandmother's name?</option>
                                <option value="What was the name of your first pet?">What was the name of your first pet?</option>
                                <option value="In what city were you born?">In what city were you born?</option>
                                <option value="What is the title of your favorite book?">What is the title of your favorite book?</option>
                                <option value="What is the name of your favorite teacher in high school?">What is the name of your favorite teacher in high school?</option>
                                <option value="What is the make and model of your first car?">What is the make and model of your first car?</option>
                                <option value="What is the name of the street you grew up on?">What is the name of the street you grew up on?</option>
                                <option value="What is your favorite movie of all time?">What is your favorite movie of all time?</option>
                                <option value="What is the name of your oldest cousin?">What is the name of your oldest cousin?</option>
                            </select>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="recovery_answer">Recovery Answer</label>
                                <input type="recovery_answer" id="recovery_answer" class="form-control form-control-lg" name="recovery_answer"/>
                            <div id="error" class="form-text">{{$errors->first('recovery_answer')}}</div>
                        </div>

                        <div class="regist pt-1 mb-4 d-flex justify-content-center">
                            <button class="btn" type="submit">Login</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


