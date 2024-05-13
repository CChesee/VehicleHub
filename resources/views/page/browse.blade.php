@extends('layout')

@section('link-css')
    <link rel="stylesheet" href="/css/pagecss/home.css">
@endsection

@section('content')

<body>
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
        <div class="card d-flex flex-row align-items-center">
          <img src="https://via.placeholder.com/150" class="card-img-top w-25" alt="Vehicle 1">
          <div class="card-body">
            <h1 class="nama-kendaraan">Vehicle 1</h1>
            <h5 class="card-text">Kilometers: 10000 km</h5>
            <h2 class="card-text">Rp. 200.000.000</h2>
            <div class="d-flex justify-content-between">
              <a href="#" class="btn btn-primary mr-2" style="background-color: #ffc107;">Check Details</a>
              <a href="#" class="btn btn-secondary">Button 2</a>
            </div>
          </div>
        </div>

        <div class="card d-flex flex-row align-items-center">
          <img src="https://via.placeholder.com/150" class="card-img-top w-25" alt="Vehicle 2">
          <div class="card-body">
            <h1 class="nama-kendaraan">Vehicle 2</h1>
            <h5 class="card-text">Kilometers: 2000 km</h5>
            <h2 class="card-text">Rp. 400.000.000</h2>
            <div class="d-flex justify-content-between">
              <a href="#" class="btn btn-primary mr-2" style="background-color: #ffc107;">Check Details</a>
              <a href="#" class="btn btn-secondary">Button 2</a>
            </div>
          </div>

        </div>
        <div class="card d-flex flex-row align-items-center">
          <img src="https://via.placeholder.com/150" class="card-img-top w-25" alt="Vehicle 2">
          <div class="card-body">
            <h1 class="nama-kendaraan">Vehicle 3</h1>
            <h5 class="card-text">Kilometers: 22000 km</h5>
            <h2 class="card-text">Rp. 500.000.000</h2>
            <div class="d-flex justify-content-between">
              <a href="#" class="btn btn-primary mr-2" style="background-color: #ffc107;">Check Details</a>
              <a href="#" class="btn btn-secondary">Button 2</a>
            </div>
          </div>

        </div>
        <div class="card d-flex flex-row align-items-center">
          <img src="https://via.placeholder.com/150" class="card-img-top w-25" alt="Vehicle 2">
          <div class="card-body">
            <h1 class="nama-kendaraan">Vehicle 4</h1>
            <h5 class="card-text">Kilometers: 12000 km</h5>
            <h2 class="card-text">Rp. 100.000.000</h2>
            <div class="d-flex justify-content-between">
              <a href="#" class="btn btn-primary mr-2" style="background-color: #ffc107;">Check Details</a>
              <a href="#" class="btn btn-secondary">Button 2</a>
            </div>
          </div>

        </div>
        <div class="card d-flex flex-row align-items-center">
          <img src="https://via.placeholder.com/150" class="card-img-top w-25" alt="Vehicle 2">
          <div class="card-body">
            <h1 class="nama-kendaraan">Vehicle 5</h1>
            <h5 class="card-text">Kilometers: 112000 km</h5>
            <h2 class="card-text">Rp. 300.000.000</h2>
            <div class="d-flex justify-content-between">
              <a href="#" class="btn btn-primary mr-2" style="background-color: #ffc107;">Check Details</a>
              <a href="#" class="btn btn-secondary">Button 2</a>
            </div>
          </div>
        </div>
        <!-- Add more cards for other vehicles -->
      </div>
    </div>
  </div>
</body>


    {{-- <div class="container mt-3">

        <p>ini browse</p>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>

    </div> --}}
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
