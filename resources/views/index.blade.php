@extends('layout')

@section('link-css')
    <link rel="stylesheet" href="/css/pagecss/home.css">
@endsection

@section('content')

    <div class="container mt-3">
        <div class="col-md-12 mb-3 d-flex justify-content-between">
            <h3 style="font-weight: bold;">Welcome!</h3>
            <a href="/browse" class="btn" style="background-color: #FFC107; color: black;">view more</a>
        </div>
        <div class="row">
            @foreach ($vehicles as $vehicle)
            <div class="col-md-3">
                <div class="card">
                    <div class="img-container" style="display: flex; justify-content: center; align-items: center; height: 300px; width: 100%;">
                        <img src="/storage/vehicle_images/{{ $vehicle->vehicle_cover_image }}" class="card-img-top" style="max-height: 300px; max-width: 100%; height: auto; width: auto;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold;">{{ $vehicle->vehicle_name }}</h5>
                        <p class="card-text">Rp. {{ number_format($vehicle->price, 0, ',', '.') }}</p>
                        <p class="card-text">{{ $vehicle->vehicle_milage }} KM</p>
                        <p class="card-text">{{ $vehicle->vehicle_location }}</p>
                        <a style="background-color: #FFC107; color: black;" href={{ route('vehicle.detail', $vehicle->id) }} class="btn">View Detail</a>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>

    <body>
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-12 mt-5 text-center">
                    <h2 style="font-weight: bold;">Vehicle Category</h5>
                </div>
                <div class="col-md-3">
                    <div class="card my-3">
                        <div class="card-body text-center">
                            <h5 class="card-title text-center" style="font-weight: bold;">EV Car</h5>
                            <img src="{{ asset('storage/app_image/iconElectricCar.png') }}" height="150" class="img-fluid mx-auto d-block" alt="Vehicle Image">
                            <a href="{{ route('browse', ['vehicle_category' => 'Electric Car']) }}" class="btn d-block mx-auto" style="background-color: #FFC107; color: black;">View Categories</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card my-3">
                        <div class="card-body text-center">
                            <h5 class="card-title text-center" style="font-weight: bold;">LCGC</h5>
                            <img src="{{ asset('storage/app_image/iconLcgc.png') }}" height="130" class="img-fluid mx-auto d-block" alt="Vehicle Image">
                            <a href="{{ route('browse', ['vehicle_category' => 'LCGC']) }}" class="btn d-block mx-auto" style="background-color: #FFC107; color: black;">View Categories</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card my-3">
                        <div class="card-body">
                            <h5 class="card-title text-center" style="font-weight: bold;">SUV</h5>
                            <img src="{{ asset('storage/app_image/iconSuv.png') }}" height="150" class="img-fluid mx-auto d-block" alt="Vehicle Image">
                            <a href="{{ route('browse', ['vehicle_category' => 'SUV']) }}" class="btn d-block mx-auto" style="background-color: #FFC107; color: black;">View Categories</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card my-3">
                        <div class="card-body">
                            <h5 class="card-title text-center" style="font-weight: bold;">Hybrid</h5>
                            <img src="{{ asset('storage/app_image/iconHybrid.png') }}" height="100" class="img-fluid mx-auto d-block" alt="Vehicle Image">
                            <a href="{{ route('browse', ['vehicle_category' => 'Hybrid']) }}" class="btn d-block mx-auto" style="background-color: #FFC107; color: black;">View Categories</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card my-3">
                        <div class="card-body">
                            <h5 class="card-title text-center" style="font-weight: bold;">Scooter</h5>
                            <img src="{{ asset('storage/app_image/iconScooter.png') }}" height="150" class="img-fluid mx-auto d-block" alt="Vehicle Image">
                            <a href="{{ route('browse', ['vehicle_category' => 'Scooter']) }}" class="btn d-block mx-auto" style="background-color: #FFC107; color: black;">View Categories</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card my-3">
                        <div class="card-body">
                            <h5 class="card-title text-center" style="font-weight: bold;">Sport Bike</h5>
                            <img src="{{ asset('storage/app_image/iconSport.png') }}" height="150" class="img-fluid mx-auto d-block" alt="Vehicle Image">
                            <a href="{{ route('browse', ['vehicle_category' => 'Sport Bike']) }}" class="btn d-block mx-auto" style="background-color: #FFC107; color: black;">View Categories</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card my-3">
                        <div class="card-body">
                            <h5 class="card-title text-center" style="font-weight: bold;">EV Bike</h5>
                            <img src="{{ asset('storage/app_image/iconElectricBike.png') }}" height="150" class="img-fluid mx-auto d-block" alt="Vehicle Image">
                            <a href="{{ route('browse', ['vehicle_category' => 'Electric Bike']) }}" class="btn d-block mx-auto" style="background-color: #FFC107; color: black;">View Categories</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card my-3">
                        <div class="card-body">
                            <h5 class="card-title text-center" style="font-weight: bold;">Cub</h5>
                            <img src="{{ asset('storage/app_image/iconCub.png') }}" height="150" class="img-fluid mx-auto d-block" alt="Vehicle Image">
                            <a href="{{ route('browse', ['vehicle_category' => 'Cub']) }}" class="btn d-block mx-auto" style="background-color: #FFC107; color: black;">View Categories</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-5 text-center">
            <h2 style="font-weight: bold;">Browse More</h5>
        </div>
        <div class="container mt-3 mb-3">
            <div class="row" style="justify-content: center;">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center" style="font-weight: bold;">Browse Vehicle</h5>
                            <img src="{{ asset('storage/app_image/iconBrowse.png') }}" height="0" class="img-fluid mx-auto d-block mb-3" alt="Vehicle Image">
                            <a href="/browse" class="btn d-block mx-auto" style="background-color: #FFC107; color: black;">Browse Vehicle</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center" style="font-weight: bold;">Compare Vehicle</h5>
                            <img src="{{ asset('storage/app_image/iconCompare.png') }}" height="150" class="img-fluid mx-auto d-block mb-3" alt="Vehicle Image">
                            <a href="/compare" class="btn d-block mx-auto" style="background-color: #FFC107; color: black;">Compare Vehicle</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center" style="font-weight: bold;">My Product</h5>
                            <img src="{{ asset('storage/app_image/iconMyProduct.png') }}" height="150" class="img-fluid mx-auto d-block mb-3" alt="Vehicle Image">
                            @if(auth()->check())
                                <a href="/myProduct" class="btn d-block mx-auto" style="background-color: #FFC107; color: black;">My Product</a>
                            @else
                                <a href="{{url('login')}}" class="btn d-block mx-auto" style="background-color: #FFC107; color: black;">My Product</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
@endsection

