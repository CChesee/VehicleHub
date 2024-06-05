@extends('layout')

@section('link-css')
    <link rel="stylesheet" href="/css/pagecss/auth.css">
@endsection

@section('content')
    <div class="container py-5 h-100">
        <div class="card mx-auto">
            <div class="row">
                <div class="col-md-6 col-lg-7 mx-auto">
                    <div class="d-flex align-items-center h-100">
                        <div class="card-body p-4 w-100">
                            <div class="d-flex justify-content-center align-items-center mb-3">
                                <img src="{{ asset('storage/app_image/logo.png') }}" height="150"
                                class="d-inline-block align-text-top">
                            </div>

                            <form action = "/register" method = "post">
                                @csrf
                                <div class="mb-3">
                                    <h1 class="fw-bold text-center">Create an account</h1>
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="name">Name</label>
                                    @if ($errors->has('name'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                    <input type="text" id="name" class="form-control form-control-lg @if ($errors->has('name')) is-invalid @endif" name="name" value="{{ old('name') }}"/>
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
                                    <label class="form-label" for="phoneNumber">Phone Number (Please use country code in the beginning)</label>
                                    @if ($errors->has('phoneNumber'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('phoneNumber') }}
                                        </div>
                                    @endif
                                    <input type="text" id="phoneNumber" class="form-control form-control-lg" name="phoneNumber" placeholder="Example:62xxxxxxxxxx" value="{{ old('phoneNumber') }}"/>
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="location">City Location (Click to choose)</label>
                                    @if ($errors->has('location'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('location') }}
                                        </div>
                                    @endif
                                    <select class="form-control form-control-lg" id="location" name="location">
                                        <option value=""> </option>
                                        <option value="Nanggroe Aceh Darussalam">Nanggroe Aceh Darussalam</option>
                                        <option value="Sumatera Utara">Sumatera Utara</option>
                                        <option value="Sumatera Selatan">Sumatera Selatan</option>
                                        <option value="Sumatera Barat">Sumatera Barat</option>
                                        <option value="Bengkulu">Bengkulu</option>
                                        <option value="Riau">Riau</option>
                                        <option value="Kepulauan Riau">Kepulauan Riau</option>
                                        <option value="Jambi">Jambi</option>
                                        <option value="Lampung">Lampung</option>
                                        <option value="Bangka Belitung">Bangka Belitung</option>
                                        <option value="Kalimantan Barat">Kalimantan Barat</option>
                                        <option value="Kalimantan Timur">Kalimantan Timur</option>
                                        <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                                        <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                                        <option value="Kalimantan Utara">Kalimantan Utara</option>
                                        <option value="Banten">Banten</option>
                                        <option value="DKI Jakarta">DKI Jakarta</option>
                                        <option value="Jawa Barat">Jawa Barat</option>
                                        <option value="Jawa Tengah">Jawa Tengah</option>
                                        <option value="Daerah Istimewa Yogyakarta">Daerah Istimewa Yogyakarta</option>
                                        <option value="Jawa Timur">Jawa Timur</option>
                                        <option value="Bali">Bali</option>
                                        <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                                        <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                                        <option value="Gorontalo">Gorontalo</option>
                                        <option value="Sulawesi Barat">Sulawesi Barat</option>
                                        <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                                        <option value="Sulawesi Utara">Sulawesi Utara</option>
                                        <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                                        <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                                        <option value="Maluku Utara">Maluku Utara</option>
                                        <option value="Maluku">Maluku</option>
                                        <option value="Papua Barat">Papua Barat</option>
                                        <option value="Papua">Papua</option>
                                        <option value="Papua Tengah">Papua Tengah</option>
                                        <option value="Papua Pegunungan">Papua Pegunungan</option>
                                        <option value="Papua Selatan">Papua Selatan</option>
                                        <option value="Papua Barat Daya">Papua Barat Daya</option>
                                    </select>
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="recoveryQuestion">Recovery Question (Click to choose)</label>
                                    @if ($errors->has('recoveryQuestion'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('recoveryQuestion') }}
                                        </div>
                                    @endif
                                    <select class="form-control form-control-lg" id="recoveryQuestion" name="recoveryQuestion">
                                        <option value=""> </option>
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
                                    <label class="form-label" for="recoveryAnswer">Recovery Answer (must use lowercase letter only)</label>
                                    @if ($errors->has('recoveryAnswer'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('recoveryAnswer') }}
                                        </div>
                                    @endif
                                    <input type="text" id="recoveryAnswer" class="form-control form-control-lg" name="recoveryAnswer" pattern="[a-z]+" value="{{ old('recoveryAnswer') }}"/> <div id="error" class="form-text">{{$errors->first('recoveryAnswer')}}</div>
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password">Password</label>
                                    @if ($errors->has('password'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                    <input type="password" id="password" class="form-control form-control-lg" name="password"/>
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="confirmPassword">Confirm Password</label>
                                    @if ($errors->has('confirmPassword'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('confirmPassword') }}
                                        </div>
                                    @endif
                                    <input type="password" id="confirmPassword" class="form-control form-control-lg" name="confirmPassword"/>
                                </div>

                                <div class="mb-3">
                                    <p class="text-center text-muted mt-5 mb-0">Already have an account? Log in
                                        <a href="/login" class="fw-bold text-body" style="color: #FFCD37 !important;"><u>here</u></a>
                                    </p>
                                </div>

                                <div class="relog pt-1 mb-4 d-flex justify-content-center">
                                    <button class="btn" type="submit">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
