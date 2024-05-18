@extends('layout')

@section('link-css')
    <link rel="stylesheet" href="/css/pagecss/product.css">
@endsection

@section('content')
<div class="container">

    <div class="judul text-center fw-bolder mt-5">
        <h2>Product {{ $vehicles->vehicle_name }} </h2>
        <div class="row mt-4">
            {{-- @foreach ($images as $image)
            <div class= "col-md-3">
                <div class="card tect_white bg-secondary mb3" style="max-width: 20rem;">
                    <div class="card-body">
                        <img src="/vehicle_images/{{ $image->image }}" class="card-img-top">

                    </div>
                </div>
            </div>
            @endforeach --}}
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <img src="/storage/vehicle_images/{{ $vehicles->vehicle_cover_image }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                    </div>
                </div>
            </div>

            @foreach ($images as $image)
                <div class="col-md-3">
                    <div class="card">
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <img src="/storage/vehicle_images/{{ $image->image }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                    </div>
                    </div>
                </div>
            @endforeach


            <table class="table mt-5" style="border: 1px solid black;">
                <tbody>
                    <tbody>
                        <tr>
                            <td>Type</td>
                            <td>|</td>
                            <td>{{ $vehicles->vehicle_type }}</td>
                        </tr>

                        <tr>
                            <td>Name</td>
                            <td>|</td>
                            <td>{{ $vehicles->vehicle_name }}</td>
                        </tr>

                        <tr>
                            <td>Brand</td>
                            <td>|</td>
                            <td>{{ $vehicles->vehicle_brand }}</td>
                        </tr>

                        <tr>
                            <td>Category</td>
                            <td>|</td>
                            <td>{{ $vehicles->vehicle_category }}</td>
                        </tr>

                        <tr>
                            <td>Milage</td>
                            <td>|</td>
                            <td>{{ $vehicles->vehicle_milage }}</td>
                        </tr>

                        <tr>
                            <td>Year Production</td>
                            <td>|</td>
                            <td>{{ $vehicles->vehicle_year_production }}</td>
                        </tr>

                        <tr>
                            <td>Tax</td>
                            <td>|</td>
                            <td>Rp. {{ number_format($vehicles->vehicle_tax, 0, ',', '.') }}</td>
                        </tr>

                        <tr>
                            <td>Service Fee</td>
                            <td>|</td>
                            <td>{{ $vehicles->vehicle_service_fee }}</td>
                        </tr>

                        <tr>
                            <td>Fuel Type</td>
                            <td>|</td>
                            <td>{{ $vehicles->vehicle_fuel_type }}</td>
                        </tr>

                        <tr>
                            <td>Fuel Tank Capacity</td>
                            <td>|</td>
                            <td>{{ $vehicles->vehicle_fuel_tank_capacity }} L</td>
                        </tr>

                        <tr>
                            <td>Fuel Consumption</td>
                            <td>|</td>
                            <td>{{ $vehicles->vehicle_fuel_consumption }} KM/L</td>
                        </tr>

                        <tr>
                            <td>Transmition</td>
                            <td>|</td>
                            <td>{{ $vehicles->vehicle_transmition }}</td>
                        </tr>

                        <tr>
                            <td>Seat Capacity</td>
                            <td>|</td>
                            <td>{{ $vehicles->vehicle_seat_capacity }} Seat</td>
                        </tr>

                        <tr>
                            <td>Engine Capacity</td>
                            <td>|</td>
                            <td>{{ $vehicles->vehicle_engine_capacity }}CC</td>
                        </tr>

                        <tr>
                            <td>Status</td>
                            <td>|</td>
                            <td>{{ $vehicles->vehicle_status }}</td>
                        </tr>

                        <tr>
                            <td>Price</td>
                            <td>|</td>
                            <td>Rp. {{ number_format($vehicles->price, 0, ',', '.') }}</td>
                        </tr>

                    </tbody>
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
