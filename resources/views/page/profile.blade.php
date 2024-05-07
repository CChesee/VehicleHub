@extends('layout')

@section('content')
    <div class="container">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-4 col-lg-4 d-none d-md-block">
                                <img src="{{ asset('storage/app_image/myprofile.png') }}"
                                    alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <span class="h1 fw-bold mb-0">MY PROFILE</span>
                                    </div>

                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Name</td>
                                                <td>:</td>
                                                <td>{{ auth()->user()->name }}</td>
                                            </tr>

                                            <tr>
                                                <td>Email</td>
                                                <td>:</td>
                                                <td>{{ auth()->user()->email }}</td>
                                            </tr>

                                            <tr>
                                                <td>Phone</td>
                                                <td>:</td>
                                                <td>{{ auth()->user()->phone }}</td>
                                            </tr>

                                            <tr>
                                                <td>Location</td>
                                                <td>:</td>
                                                <td>{{ auth()->user()->location }}</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
