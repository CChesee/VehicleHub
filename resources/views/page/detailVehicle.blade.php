@extends('layout')

@section('link-css')
    <link rel="stylesheet" href="/css/pagecss/product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .vehicle-details .detail-title {
            flex: 0 0 200px;
            font-weight: bold;
        }
        .vehicle-details .detail-content {
            flex: 1;
        }
        .seller-details {
            border: 2px solid #ddd; /* You can adjust the border style, width, and color */
            border-radius: 10px;
            margin-top: 20px;
        }
        .seller-details img {
            border-radius: 1rem;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="judul fw-bolder mt-6">
        <div class="row mt-4 justify-content-center">
            <!-- Image Carousel -->
            <div class="col-md-6 mt-4 mb-4">
                <div id="vehicleCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/storage/vehicle_images/{{ $vehicles->vehicle_cover_image }}" style="height: 600px; width:600px;">
                        </div>
                        @foreach ($images as $image)
                            <div class="carousel-item">
                                <img src="/storage/vehicle_images/{{ $image->image }}" class="d-block" style="height: 600px; width:600px;">
                            </div>
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
            </div>

            <!-- Vehicle Details -->
            <div class="col-md-6">
                <h2>{{ $vehicles->vehicle_name }}</h2>
                <h3 class="text-success">Rp.{{ number_format($vehicles->price, 0, ',', '.') }}</h3>
                <h4 class="mt-3">Detail {{ $vehicles->vehicle_type }}</h4>
                <ul class="list-unstyled vehicle-details">
                    <li class="d-flex"><span class="detail-title"><i class="fas fa-map-marker-alt"></i> Location</span><span class="detail-content">: {{ $vehicles->vehicle_location }}</span></li>
                    <li class="d-flex"><span class="detail-title"><i class="fas fa-car"></i> Brand</span><span class="detail-content">: {{ $vehicles->vehicle_brand }}</span></li>
                    <li class="d-flex"><span class="detail-title"><i class="fas fa-tags"></i> Category</span><span class="detail-content">: {{ $vehicles->vehicle_category }}</span></li>
                    <li class="d-flex"><span class="detail-title"><i class="fas fa-tachometer-alt"></i> Milage</span><span class="detail-content">: {{ $vehicles->vehicle_milage }}</span></li>
                    <li class="d-flex"><span class="detail-title"><i class="fas fa-calendar-alt"></i> Year Production</span><span class="detail-content">: {{ $vehicles->vehicle_year_production }}</span></li>
                    <li class="d-flex"><span class="detail-title"><i class="fas fa-file-invoice-dollar"></i> Tax</span><span class="detail-content">: Rp. {{ number_format($vehicles->vehicle_tax, 0, ',', '.') }}</span></li>
                    <li class="d-flex"><span class="detail-title"><i class="fas fa-wrench"></i> Service Fee</span><span class="detail-content">: {{ $vehicles->vehicle_service_fee }}</span></li>
                    <li class="d-flex"><span class="detail-title"><i class="fas fa-gas-pump"></i> Fuel Type</span><span class="detail-content">: {{ $vehicles->vehicle_fuel_type }}</span></li>
                    <li class="d-flex"><span class="detail-title"><i class="fas fa-gas-pump"></i> Fuel Tank Capacity</span><span class="detail-content">: {{ $vehicles->vehicle_fuel_tank_capacity }} L</span></li>
                    <li class="d-flex"><span class="detail-title"><i class="fas fa-route"></i> Fuel Consumption</span><span class="detail-content">: {{ $vehicles->vehicle_fuel_consumption }} KM/L</span></li>
                    <li class="d-flex"><span class="detail-title"><i class="fas fa-cogs"></i> Transmission</span><span class="detail-content">: {{ $vehicles->vehicle_transmission }}</span></li>
                    <li class="d-flex"><span class="detail-title"><i class="fas fa-users"></i> Seat Capacity</span><span class="detail-content">: {{ $vehicles->vehicle_seat_capacity }}</span></li>
                    <li class="d-flex"><span class="detail-title"><i class="fas fa-cogs"></i> Engine Capacity</span><span class="detail-content">: {{ $vehicles->vehicle_engine_capacity }}</span></li>
                    <li class="d-flex"><span class="detail-title"><i class="fas fa-cogs"></i> Description</span><span class="detail-content">: {{ $vehicles->vehicle_description }}</span></li>
                </ul>

                <div class="seller-details d-flex align-items-center mb-3">
                    <img src="{{ asset('storage/app_image/myprofile.png') }}" alt="profile image" class="img-fluid col-md-3" />
                    <div class="ms-3">
                        <h4>Seller : {{ $vehicles->user->name }}</h4>
                        <a href="https://wa.me/{{ $vehicles->user->phone }}" class="btn btn-warning text-black mt-3">
                            <i class="fab fa-whatsapp"></i> Contact Seller on WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
@endsection
