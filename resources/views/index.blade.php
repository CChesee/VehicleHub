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
                        <img src="/storage/vehicle_images/{{ $vehicle->vehicle_cover_image }}" class="card-img-top" style="height: 300px; width:300px;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-weight: bold;">{{ $vehicle->vehicle_name}}</h5>
                            <p class="card-text">Rp. {{ number_format($vehicle->price, 0, ',', '.') }}</p>
                            <p class="card-text">{{ $vehicle->vehicle_milage }} KM</p>
                            <p class="card-text">{{ $vehicle->vehicle_location }}</p>
                            <a style="background-color: #FFC107; color: black;" href={{ route('vehicle.detail', $vehicle->id) }} class="btn">View Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- <div class="row">
            <div class="carousel slide" data-bs-ride="carousel" id="vehicleCarousel">
                <div class="carousel-inner">
                    @php
                    $item_count = 0; // Counter for items
                    $is_first_item = true; // Flag for first item in a slide
                    @endphp
                    @foreach ($vehicles as $vehicle)
                    @if ($item_count % 4 == 0) <div class="carousel-item {{ $is_first_item ? 'active' : '' }}">
                        @php
                            $is_first_item = false;
                        @endphp
                    @endif

                    <div class="col-md-3">
                        <div class="card">
                            <img src="/storage/vehicle_images/{{ $vehicle->vehicle_cover_image }}" class="card-img-top" style="height: 200px; width:300px object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title" style="font-weight: bold;">{{ $vehicle->vehicle_name }}</h5>
                                <p class="card-text">Rp. {{ number_format($vehicle->price, 0, ',', '.') }}</p>
                                <p class="card-text">{{ $vehicle->vehicle_milage }} KM</p>
                                <p class="card-text">{{ $vehicle->vehicle_location }}</p>
                                <a href={{ route('vehicle.detail', $vehicle->id) }} class="btn" style="background-color: #FFC107; color: black;">View Detail</a>
                            </div>
                        </div>
                    </div>

                    @if (($item_count + 1) % 4 == 0 || $loop->last) </div>
                    @endif

                    @php
                        $item_count++;
                    @endphp
                    @endforeach
                </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#vehicleCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#vehicleCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
        </div> --}}
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
                            <h5 class="card-title" style="font-weight: bold;">EV Bike</h5>
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
                        <img src="{{ asset('storage/app_image/iconBrowse.png') }}" height="150" class="img-fluid mx-auto d-block" alt="Vehicle Image">
                        <a href="/browse" class="btn d-block mx-auto" style="background-color: #FFC107; color: black;">Browse Vehicle</a>
                    </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center" style="font-weight: bold;">My Product</h5>
                        <img src="{{ asset('storage/app_image/iconMyproduct.png') }}" height="150" class="img-fluid mx-auto d-block" alt="Vehicle Image">
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

