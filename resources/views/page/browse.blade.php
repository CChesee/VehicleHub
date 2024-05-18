@extends('layout')

@section('link-css')
    <link rel="stylesheet" href="/css/pagecss/home.css">
@endsection

@section('content')

  <div class="container-fluid">
    <div class="row">
      <!-- Left Side - Search Bar and Filtering Options -->
      <div class="col-md-3">
        <h2>Search and Filters</h2>
        <input type="text" class="form-control mb-3" placeholder="Search...">

        <!-- Additional Categories -->
        <h4>Categories:</h4>
        <select class="form-select mb-3">
          <option selected>Choose Vehicle Type</option>
          <option value="car">Car</option>
          <option value="motorcycle">Motorcycle</option>
        </select>

        <input type="text" class="form-control mb-3" id="brandSearch" placeholder="Search Brand...">


        <select class="form-select mb-3">
          <option selected>Choose Fuel Type</option>
          <option value="1">Petrol</option>
          <option value="2">Diesel</option>
          <option value="3">Electric</option>
          <!-- Add more fuel type options as needed -->
        </select>
        <select class="form-select mb-3">
          <option selected>Choose Transmission Type</option>
          <option value="1">Manual</option>
          <option value="2">Automatic</option>
          <!-- Add more transmission type options as needed -->
        </select>
        <input type="text" class="form-control mb-3" placeholder="Price Range">
        <input type="text" class="form-control mb-3" placeholder="Kilometer Range">
        <input type="text" class="form-control mb-3" placeholder="Location">
      </div>
      <!-- Right Side - Vehicle Cards -->
      <div class="col-md-9">
        <h1>Vehicle Catalog</h1>
        @foreach ($vehicles as $vehicle)
        <div class="card d-flex flex-row align-items-center mb-3">
            {{-- <img src="https://via.placeholder.com/150" class="card-img-top w-25" alt="Vehicle 1"> --}}
            {{-- <img src="/vehicle_images/{{ $vehicle->vehicle_cover_image }}" class="card-img-top" style="height: 200px; width:300px object-fit: cover;"> --}}

            <img src="/storage/vehicle_images/{{ $vehicle->vehicle_cover_image }}" class="card-img-top" style="height: 200px; width: 300px; object-fit: cover;">

            <div class="card-body">
                <h1 class="nama-kendaraan">{{ $vehicle->vehicle_name}}</h1>
                <h5 class="card-text">Kilometers: {{ $vehicle->vehicle_milage }}</h5>
                <h2 class="card-text">Rp. {{ number_format($vehicle->price, 0, ',', '.') }}</h2>
                <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-primary mr-2" style="background-color: #ffc107;">Check Details</a>
                <a href="#" class="btn btn-secondary">Button 2</a>
                </div>
            </div>
        </div>

        @endforeach



      </div>
    </div>
  </div>
@endsection

<script>
    // Function to filter brand options based on user input
    document.getElementById("brandSearch").addEventListener("input", function() {
      var input, filter, options, option, i, txtValue;
      input = this.value.toUpperCase();
      filter = input.toUpperCase();
      options = document.getElementById("brandSelect").getElementsByTagName("option");
      for (i = 0; i < options.length; i++) {
        option = options[i];
        txtValue = option.textContent || option.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          option.style.display = "";
        } else {
          option.style.display = "none";
        }
      }
    });
  </script>
