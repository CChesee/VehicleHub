@extends('layout')

@section('link-css')
    <link rel="stylesheet" href="/css/pagecss/home.css">
@endsection

@section('content')

    <div class="container mt-3">
        <div class="col-md-12 mb-3 d-flex justify-content-between">
            <h5 style="font-weight: bold;">Welcome!</h5>
            <a href="#" class="btn btn-primary" style="background-color: #ffc107;">view more</a>
        </div>
        <div id="vehicleCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="Vehicle Image">
                                <div class="card-body">
                                    <h5 class="card-title" style="font-weight: bold;">2019 Toyota Innova</h5>
                                    <p class="card-text">Rp. 290.000.000</p>
                                    <p class="card-text">50000 km</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #ffc107;">View Details</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card">
                                <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="Vehicle Image">
                                <div class="card-body">
                                    <h5 class="card-title" style="font-weight: bold;">2017 Suzuki Ertiga</h5>
                                    <p class="card-text">Rp. 90.000.000</p>
                                    <p class="card-text">80000 km</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #ffc107;">View Details</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card">
                                <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="Vehicle Image">
                                <div class="card-body">
                                    <h5 class="card-title" style="font-weight: bold;">2019 Honda Brio Satya</h5>
                                    <p class="card-text">Rp. 130.000.000</p>
                                    <p class="card-text">30000 km</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #ffc107;">View Details</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card">
                                <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="Vehicle Image">
                                <div class="card-body">
                                    <h5 class="card-title" style="font-weight: bold;">2018 Toyota Calya</h5>
                                    <p class="card-text">Rp. 88.000.000</p>
                                    <p class="card-text">60000 km</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #ffc107;">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-md-3 offset-md-3">
                            <div class="card">
                                <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="Vehicle Image">
                                <div class="card-body">
                                    <h5 class="card-title">keganti</h5>
                                    <p class="card-text">Rp</p>
                                    <p class="card-text">Mileage: XX,XXX km</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #ffc107;">View Details</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#vehicleCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#vehicleCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <body>
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-12 mb-3 d-flex justify-content-between">
                    <h5 style="font-weight: bold;">Kategori Kendaraan</h5>
                    <a href="#" class="btn btn-primary" style="background-color: #ffc107;"> view more</a>
                </div>
                <div class="col-md-3">
                    <div class="card my-3">
                        <div class="card-body text-center">
                            <h5 class="card-title text-center" style="font-weight: bold;">Mobil EV</h5>
                            <img src="{{ asset('storage/app_image/iconElectricCar.png') }}" height="150" class="img-fluid mx-auto d-block" alt="Vehicle Image">
                            <a href="#" class="btn btn-primary d-block mx-auto" style="background-color: #ffc107;">View Categories</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card my-3">
                        <div class="card-body text-center">
                            <h5 class="card-title text-center" style="font-weight: bold;">LCGC</h5>
                            <img src="{{ asset('storage/app_image/lcgc.png') }}" height="150" class="img-fluid mx-auto d-block" alt="Vehicle Image">
                            <a href="#" class="btn btn-primary d-block mx-auto" style="background-color: #ffc107;">View Categories</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card my-3">
                        <div class="card-body">
                            <h5 class="card-title text-center" style="font-weight: bold;">SUV</h5>
                            <img src="{{ asset('storage/app_image/suv.png') }}" height="150" class="img-fluid mx-auto d-block" alt="Vehicle Image">
                            <a href="#" class="btn btn-primary d-block mx-auto" style="background-color: #ffc107;">View Categories</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card my-3">
                        <div class="card-body">
                            <h5 class="card-title text-center" style="font-weight: bold;">Hybrid</h5>
                            <img src="{{ asset('storage/app_image/hybrid.png') }}" height="150" class="img-fluid mx-auto d-block" alt="Vehicle Image">
                            <a href="#" class="btn btn-primary d-block mx-auto" style="background-color: #ffc107;">View Categories</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card my-3">
                        <div class="card-body">
                            <h5 class="card-title text-center" style="font-weight: bold;">Matic</h5>
                            <img src="{{ asset('storage/app_image/matic.png') }}" height="150" class="img-fluid mx-auto d-block" alt="Vehicle Image">
                            <a href="#" class="btn btn-primary d-block mx-auto" style="background-color: #ffc107;">View Categories</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card my-3">
                        <div class="card-body">
                            <h5 class="card-title text-center" style="font-weight: bold;">Moge</h5>
                            <img src="{{ asset('storage/app_image/moge.png') }}" height="150" class="img-fluid mx-auto d-block" alt="Vehicle Image">
                            <a href="#" class="btn btn-primary d-block mx-auto" style="background-color: #ffc107;">View Categories</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card my-3">
                        <div class="card-body">
                            <h5 class="card-title" style="font-weight: bold;">Motor EV</h5>
                            <img src="{{ asset('storage/app_image/evbike.png') }}" height="150" class="img-fluid mx-auto d-block" alt="Vehicle Image">
                            <a href="#" class="btn btn-primary d-block mx-auto" style="background-color: #ffc107;">View Categories</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card my-3">
                        <div class="card-body">
                            <h5 class="card-title text-center" style="font-weight: bold;">Cub</h5>
                            <img src="{{ asset('storage/app_image/cub.png') }}" height="150" class="img-fluid mx-auto d-block" alt="Vehicle Image">
                            <a href="#" class="btn btn-primary d-block mx-auto" style="background-color: #ffc107;">View Categories</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-3">
            <div class="row">

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center" style="font-weight: bold;">Browse Vehicle</h5>
                    <img src="{{ asset('storage/app_image/searchicon.png') }}" height="200" class="img-fluid mx-auto d-block" alt="Vehicle Image">
                    <a href="/browse" class="btn btn-primary d-block mx-auto" style="background-color: #ffc107;">Browse Vehicle</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center" style="font-weight: bold;">My Product</h5>
                    <img src="{{ asset('storage/app_image/iklan.png') }}" height="200" class="img-fluid mx-auto d-block" alt="Vehicle Image">
                    <a href="/myProduct" class="btn btn-primary d-block mx-auto" style="background-color: #ffc107;">My Product</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center" style="font-weight: bold;">Service Kendaraan</h5>
                    <img src="{{ asset('storage/app_image/service.png') }}" height="200" class="img-fluid mx-auto d-block" alt="Vehicle Image">
                    <a href="#" class="btn btn-primary d-block mx-auto" style="background-color: #ffc107;">Service kendaraan</a>
                </div>
            </div>
        </div>
    </body>
    </html>
@endsection

