@extends('layout')

@section('link-css')
  <link rel="stylesheet" href="/css/pagecss/home.css">
@endsection

@section('content')

  <div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <h2>Search and Filters</h2>

            <form action="{{ route('browse') }}" method="GET">
                <label class="form-label" for="vehicle_name">Vehicle Name</label>
                <input type="text" id="vehicle_name" class="form-control mb-3" name="vehicle_name"/>

                <label class="form-label" for="vehicle_type">Vehicle Type</label>
                <select class="form-control mb-3" id="vehicle_type" name="vehicle_type">
                    <option value="">All</option>
                    <option value="Car">Car</option>
                    <option value="Motorcycle">Motorcycle</option>
                </select>

                <label for="vehicle_brand" class="form-label">Vehicle Brand</label>
                <select class="form-control mb-3" id="vehicle_brand" name="vehicle_brand">
                    <option value="">All Brands</option>
                </select>

                <label for="vehicle_category" class="form-label">Vehicle Category</label>
                <select class="form-control mb-3" id="vehicle_category" name="vehicle_category">
                    <option value="">All Categories</option>
                </select>

                <label class="form-label" for="vehicle_fuel_type">Vehicle Fuel Type</label>
                <select class="form-control mb-3" id="vehicle_fuel_type" name="vehicle_fuel_type">
                    <option value="">All</option>
                    <option value="Gasoline">Gasoline</option>
                    <option value="Diesel">Diesel</option>
                    <option value="Electric">Electric</option>
                </select>

                <label class="form-label" for="vehicle_transmition">Vehicle Transmition</label>
                <select class="form-control mb-3" id="vehicle_transmition" name="vehicle_transmition">
                    <option value="">All</option>
                    <option value="Automatic">Automatic</option>
                    <option value="Manual">Manual</option>
                </select>

                <label class="form-label" for="vehicle_location">Location</label>
                <select class="form-control mb-3" id="vehicle_location" name="vehicle_location">
                    <option value="">All Locations</option>
                    <option value="Nanggroe Aceh Darussalam">Nanggroe Aceh Darussalam</option>
                    <option value="Sumatera Utara">Sumatera Utara</option>
                    <option value="Sumatera Selatan">Sumatera Selatan</option>
                    <option value="Sumatera Barat">Sumatera Barat</option>
                    <option value="Bengkulu">Bengkulu</option>
                    <option value="Riau">Riau</option>
                    <option value="Kepulauan Riau">Kepulauan Riau</option>
                    <option value="Jambi">Jambi</option>
                    <option value="Lampung">Lampung</option>
                    <option value="Bangka Belitung">Bangka Belitung</option>
                    <option value="Kalimantan Barat">Kalimantan Barat</option>
                    <option value="Kalimantan Timur">Kalimantan Timur</option>
                    <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                    <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                    <option value="Kalimantan Utara">Kalimantan Utara</option>
                    <option value="Banten">Banten</option>
                    <option value="DKI Jakarta">DKI Jakarta</option>
                    <option value="Jawa Barat">Jawa Barat</option>
                    <option value="Jawa Tengah">Jawa Tengah</option>
                    <option value="Daerah Istimewa Yogyakarta">Daerah Istimewa Yogyakarta</option>
                    <option value="Jawa Timur">Jawa Timur</option>
                    <option value="Bali">Bali</option>
                    <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                    <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                    <option value="Gorontalo">Gorontalo</option>
                    <option value="Sulawesi Barat">Sulawesi Barat</option>
                    <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                    <option value="Sulawesi Utara">Sulawesi Utara</option>
                    <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                    <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                    <option value="Maluku Utara">Maluku Utara</option>
                    <option value="Maluku">Maluku</option>
                    <option value="Papua Barat">Papua Barat</option>
                    <option value="Papua">Papua</option>
                    <option value="Papua Tengah">Papua Tengah</option>
                    <option value="Papua Pegunungan">Papua Pegunungan</option>
                    <option value="Papua Selatan">Papua Selatan</option>
                    <option value="Papua Barat Daya">Papua Barat Daya</option>
                </select>
                <button type="submit" class="btn mt-3 mb-3" id="filterButton" style="background-color: #FFC107; color: black;">Search</button>
            </form>
        </div>

        <div class="col-md-9">
            <h1>Vehicle Catalog</h1>
            @foreach ($vehicles as $vehicle)
            <div class="card d-flex flex-row align-items-center mb-3">
                <img src="/storage/vehicle_images/{{ $vehicle->vehicle_cover_image }}" class="card-img-top" style="height: 200px; width: 300px; object-fit: cover;">
                <div class="card-body">
                <h1>{{ $vehicle->vehicle_name}}</h1>
                <h5>Kilometers : {{ $vehicle->vehicle_milage }}</h5>
                <h5>Location :  {{ $vehicle->vehicle_location }}</h5>
                <input type="hidden" name="user_location" id="user_location" value="{{ $vehicle->user->location }}">
                <h5>Rp. {{ number_format($vehicle->price, 0, ',', '.') }}</h5>
                <div class="d-flex justify-content-between">
                    <a href="#" class="btn mr-2" style="background-color: #FFC107; color: black;">Check Details</a>
                </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
  </div>

@endsection

{{-- <script>
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
</script> --}}

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const vehicleTypeSelect = document.getElementById('vehicle_type');
        const vehicleBrandSelect = document.getElementById('vehicle_brand');
        const vehicleCategorySelect = document.getElementById('vehicle_category');

        const brandsByType = {
            Car: ['', 'Acura', 'Alfa Romeo', 'Aston Martin', 'Audi', 'BAIC',
                    'BMW', 'BYD', 'Bentley', 'Buick', 'Chery',
                    'Chevrolet', 'Chrysler', 'Citroën', 'DFSK', 'Daihatsu',
                    'Datsun', 'Dodge', 'Ferrari', 'Ford', 'GMC',
                    'Haval', 'Honda', 'Hyundai', 'Infiniti', 'Isuzu',
                    'Jaguar', 'Jeep', 'Kia', 'Koenigsegg',
                    'Lamborghini', 'Land Rover', 'Lancia', 'Lexus', 'Lincoln',
                    'Lotus', 'MG', 'MINI', 'Maserati', 'Mazda',
                    'Mercedes-Benz', 'Mitsubishi', 'Nissan', 'Peugeot', 'Porsche',
                    'Proton', 'RAM', 'Renault', 'Rolls-Royce', 'SEAT',
                    'SSangYong', 'Smart', 'Subaru', 'Suzuki', 'Tata',
                    'Tesla', 'Toyota', 'Volkswagen', 'Volvo', 'Wuling',
                    'Other'
                ],
            Motorcycle: ['', 'Aprilia', 'BMW Motorrad', 'Benelli', 'CFMoto', 'Ducati',
                            'Harley-Davidson', 'Honda', 'Husqvarna', 'KTM', 'Keeway',
                            'Kawasaki', 'KYMCO', 'MV Agusta', 'Moto Guzzi', 'SYM (Sanyang)',
                            'Suzuki', 'TVS', 'Triumph', 'Vespa (Piaggio)', 'Yamaha',
                            'Other'
                        ]

        };

        const categoriesByType = {
            Car: ['', 'Convertible', 'Coupe', 'Crossover', 'Electric Car', 'Hatchback', 'Hybrid', 'Minivan', 'LCGC', 'Pickup', 'Sedan', 'SUV', 'Wagon'],
            Motorcycle: ['', 'Adventure Bike', 'Cruiser', 'Cub', 'Custom Bike', 'Dirt Bike', 'Electric Bike', 'Naked Bike', 'Touring Bike', 'Scooter', 'Sport Bike' ]
        };

        vehicleTypeSelect.addEventListener('change', function() {
            const selectedType = this.value;
            const brands = brandsByType[selectedType] || [];
            const categories = categoriesByType[selectedType] || [];

            // Clear existing options
            vehicleBrandSelect.innerHTML = '';
            vehicleCategorySelect.innerHTML = '';

            // Add new brand options
            brands.forEach(brand => {
                const option = document.createElement('option');
                option.text = brand;
                vehicleBrandSelect.appendChild(option);
            });

            // Add new category options
            categories.forEach(category => {
                const option = document.createElement('option');
                option.text = category;
                vehicleCategorySelect.appendChild(option);
            });
        });
    });
</script>
