@extends('layout')

<!--
@section('link-css')
    <link rel="stylesheet" href="/css/pagecss/about.css">
@endsection
-->

@section('content')
    <div class="container">
        <div class="header">
            <h1 class="text-center fw-bolder text-uppercase">
                About Us
            </h1>
        </div>

        <div class="about d-flex flex-row justify-content-between align-items-center shadow p-3 mb-5 mx-auto">
            <div class="img">
                <!-- <img src="{{ asset('storage/bg/logo.png') }}" alt="" width="400px" height="400px"> -->
            </div>
            <div class="isi">
                <p>
                    VehicleHub is a website that promote vehicle from...
                </p>
            </div>
        </div>



    </div>
@endsection
