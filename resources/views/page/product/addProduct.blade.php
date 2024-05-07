@extends('layout')

@section('link-css')
    <link rel="stylesheet" href="/css/pagecss/product.css">
@endsection

@section('content')
    <div class="container">
        <div>
            <div class="judul text-center fw-bolder mt-5">
                <h2>ADD NEW PRODUCT</h2>
            </div>

            <div class="mt-5 isi mx-auto border border-dark rounded">
                <form action="{{url('/addProduct')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="vehicle_type" class="form-label">Vehicle Type</label>
                        <input type="text" class="form-control" id="vehicle_type" aria-describedby="emailHelp" name="vehicle_type"
                        >
                        <div id="emailHelp" class="form-text">{{$errors->first('vehicle_type')}}</div>
                    </div>

                    <div class="mb-3">
                        <label for="vehicle_brand" class="form-label">Vehicle Brand</label>
                        <input type="text" class="form-control" id="vehicle_brand" aria-describedby="emailHelp" name="vehicle_brand"
                        >
                        <div id="emailHelp" class="form-text">{{$errors->first('vehicle_brand')}}</div>
                    </div>

                    <div class="mb-3">
                        <label for="vehicle_name" class="form-label">Vehicle Name</label>
                        <input type="text" class="form-control" id="vehicle_name" aria-describedby="emailHelp" name="vehicle_name"
                        >
                        <div id="emailHelp" class="form-text">{{$errors->first('vehicle_name')}}</div>
                    </div>

                    <div class="mb-3">
                        <label for="vehicle_category" class="form-label">Vehicle Category</label>
                        <input type="text" class="form-control" id="vehicle_category" aria-describedby="emailHelp" name="vehicle_category"
                        >
                        <div id="emailHelp" class="form-text">{{$errors->first('vehicle_category')}}</div>
                    </div>

                    <div class="mb-3">
                        <label for="vehicle_transmition" class="form-label">Vehicle Transmition</label>
                        <input type="text" class="form-control" id="vehicle_transmition" aria-describedby="emailHelp" name="vehicle_transmition"
                        >
                        <div id="emailHelp" class="form-text">{{$errors->first('vehicle_transmition')}}</div>
                    </div>

                    <div class="mb-3">
                        <label for="vehicle_seat_capacity" class="form-label">Vehicle Seat Capacity</label>
                        <input type="number" class="form-control" id="vehicle_seat_capacity" name="vehicle_seat_capacity">
                        <div id="emailHelp" class="form-text">{{$errors->first('vehicle_seat_capacity')}}</div>
                    </div>

                    <div class="mb-3">
                        <label for="vehicle_engine_capacity" class="form-label">Vehicle Engine Capacity</label>
                        <input type="number" class="form-control" id="vehicle_engine_capacity" name="vehicle_engine_capacity">
                        <div id="emailHelp" class="form-text">{{$errors->first('vehicle_engine_capacity')}}</div>
                    </div>

                    <div class="mb-3">
                        <label for="vehicle_fuel_type" class="form-label">Vehicle Fuel Type</label>
                        <input type="text" class="form-control" id="vehicle_fuel_type" aria-describedby="emailHelp" name="vehicle_fuel_type"
                        >
                        <div id="emailHelp" class="form-text">{{$errors->first('vehicle_fuel_type')}}</div>
                    </div>

                    <div class="mb-3">
                        <label for="vehicle_fuel_tank_capacity" class="form-label">Vehicle Full Tank Capacity</label>
                        <input type="number" class="form-control" id="vehicle_fuel_tank_capacity" name="vehicle_fuel_tank_capacity">
                        <div id="emailHelp" class="form-text">{{$errors->first('vehicle_fuel_tank_capacity')}}</div>
                    </div>

                    <div class="mb-3">
                        <label for="vehicle_fuel_compsumtion" class="form-label">Vehicle Full Consumption</label>
                        <input type="number" class="form-control" id="vehicle_fuel_compsumtion" name="vehicle_fuel_compsumtion">
                        <div id="emailHelp" class="form-text">{{$errors->first('vehicle_fuel_compsumtion')}}</div>
                    </div>

                    <div class="mb-3">
                        <label for="vehicle_milage" class="form-label">Vehicle Milage</label>
                        <input type="number" class="form-control" id="vehicle_milage" name="vehicle_milage">
                        <div id="emailHelp" class="form-text">{{$errors->first('vehicle_milage')}}</div>
                    </div>

                    <div class="mb-3">
                        <label for="vehicle_year_production" class="form-label">Vehicle Year Production</label>
                        <input type="text" class="form-control" id="vehicle_year_production" aria-describedby="emailHelp" name="vehicle_year_production"
                        >
                        <div id="emailHelp" class="form-text">{{$errors->first('vehicle_year_production')}}</div>
                    </div>

                    <div class="mb-3">
                        <label for="vehicle_tax" class="form-label">Vehicle Tax</label>
                        <input type="number" class="form-control" id="vehicle_tax" name="vehicle_tax">
                        <div id="emailHelp" class="form-text">{{$errors->first('vehicle_tax')}}</div>
                    </div>

                    <div class="mb-3">
                        <label for="vehicle_service_fee" class="form-label">Vehicle Service Fee</label>
                        <input type="text" class="form-control" id="vehicle_service_fee" aria-describedby="emailHelp" name="vehicle_service_fee"
                        >
                        <div id="emailHelp" class="form-text">{{$errors->first('vehicle_service_fee')}}</div>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price">
                        <div id="emailHelp" class="form-text">{{$errors->first('price')}}</div>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                        <div id="emailHelp" class="form-text">{{$errors->first('image')}}</div>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="form-control" id="status" aria-describedby="emailHelp" name="status"
                        >
                        <div id="emailHelp" class="form-text">{{$errors->first('status')}}</div>
                    </div>

                    <div class="add d-flex justify-content-center  mt-5">
                        <button type="submit" class="btn w-60">Submit</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
@endsection
