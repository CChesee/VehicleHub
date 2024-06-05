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
                <input type="text" id="vehicle_name" class="form-control mb-3" name="vehicle_name" value="{{ $filters !=null? $filters['vehicle_name']:''}}"/>

                <label class="form-label" for="vehicle_type">Vehicle Type</label>
                <select class="form-control mb-3" id="vehicle_type" name="vehicle_type">
                    <option value="">All</option>
                    {{-- <option value="Car" {{ $filters['vehicle_type'] == 'Car' ? 'selected' : '' }}>Car</option>
                    <option value="Motorcycle" {{ $filters['vehicle_type'] == 'Motorcycle' ? 'selected' : '' }}>Motorcycle</option> --}}
                    <option value="Car" {{ $filters !=null? $filters['vehicle_type'] == 'Car' ? 'selected' : '' :''}}>Car</option>
                    <option value="Motorcycle" {{ $filters !=null? $filters['vehicle_type'] == 'Motorcycle' ? 'selected' : '' :''}}>Motorcycle</option>
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
                    <option value="Automatic" {{ $filters !=null? $filters['vehicle_transmition'] == 'Automatic' ? 'selected' : '' :''}}>Automatic</option>
                    <option value="Manual" {{ $filters !=null? $filters['vehicle_transmition'] == 'Manual' ? 'selected' : '' :''}}>Manual</option>
                </select>

                <label class="form-label" for="vehicle_location">Location</label>
                <select class="form-control mb-3" id="vehicle_location" name="vehicle_location">
                    <option value="">All Locations</option>
                    <option value="Nanggroe Aceh Darussalam" {{ $filters !=null? $filters['vehicle_location'] == 'Nanggroe Aceh Darussalam' ? 'selected' : '' :''}}>Nanggroe Aceh Darussalam</option>
                    <option value="Sumatera Utara" {{ $filters !=null? $filters['vehicle_location'] == 'Sumatera Utara' ? 'selected' : '' :''}}>Sumatera Utara</option>
                    <option value="Sumatera Selatan" {{ $filters !=null? $filters['vehicle_location'] == 'Sumatera Selatan' ? 'selected' : '' :''}}>Sumatera Selatan</option>
                    <option value="Sumatera Barat" {{ $filters !=null? $filters['vehicle_location'] == 'Sumatera Barat' ? 'selected' : '' :''}}>Sumatera Barat</option>
                    <option value="Bengkulu" {{ $filters !=null? $filters['vehicle_location'] == 'Bengkulu' ? 'selected' : '' :''}}>Bengkulu</option>
                    <option value="Riau" {{ $filters !=null? $filters['vehicle_location'] == 'Riau' ? 'selected' : '' :''}}>Riau</option>
                    <option value="Kepulauan Riau" {{ $filters !=null? $filters['vehicle_location'] == 'Kepulauan Riau' ? 'selected' : '' :''}}>Kepulauan Riau</option>
                    <option value="Jambi" {{ $filters !=null? $filters['vehicle_location'] == 'Jambi' ? 'selected' : '' :''}}>Jambi</option>
                    <option value="Lampung" {{ $filters !=null? $filters['vehicle_location'] == 'Lampung' ? 'selected' : '' :''}}>Lampung</option>
                    <option value="Bangka Belitung" {{ $filters !=null? $filters['vehicle_location'] == 'Bangka Belitung' ? 'selected' : '' :''}}>Bangka Belitung</option>
                    <option value="Kalimantan Barat" {{ $filters !=null? $filters['vehicle_location'] == 'Kalimantan Barat' ? 'selected' : '' :''}}>Kalimantan Barat</option>
                    <option value="Kalimantan Timur" {{ $filters !=null? $filters['vehicle_location'] == 'Kalimantan Timur' ? 'selected' : '' :''}}>Kalimantan Timur</option>
                    <option value="Kalimantan Selatan" {{ $filters !=null? $filters['vehicle_location'] == 'Kalimantan Selatan' ? 'selected' : '' :''}}>Kalimantan Selatan</option>
                    <option value="Kalimantan Tengah" {{ $filters !=null? $filters['vehicle_location'] == 'Kalimantan Tengah' ? 'selected' : '' :''}}>Kalimantan Tengah</option>
                    <option value="Kalimantan Utara" {{ $filters !=null? $filters['vehicle_location'] == 'Kalimantan Utara' ? 'selected' : '' :''}}>Kalimantan Utara</option>
                    <option value="Banten" {{ $filters !=null? $filters['vehicle_location'] == 'Banten' ? 'selected' : '' :''}}>Banten</option>
                    <option value="DKI Jakarta" {{ $filters !=null? $filters['vehicle_location'] == 'DKI Jakarta' ? 'selected' : '' :''}}>DKI Jakarta</option>
                    <option value="Jawa Barat" {{ $filters !=null? $filters['vehicle_location'] == 'Jawa Barat' ? 'selected' : '' :''}}>Jawa Barat</option>
                    <option value="Jawa Tengah" {{ $filters !=null? $filters['vehicle_location'] == 'Jawa Tengah' ? 'selected' : '' :''}}>Jawa Tengah</option>
                    <option value="Daerah Istimewa Yogyakarta" {{ $filters !=null? $filters['vehicle_location'] == 'Daerah Istimewa Yogyakarta' ? 'selected' : '' :''}}>Daerah Istimewa Yogyakarta</option>
                    <option value="Jawa Timur" {{ $filters !=null? $filters['vehicle_location'] == 'Jawa Timur' ? 'selected' : '' :''}}>Jawa Timur</option>
                    <option value="Bali" {{ $filters !=null? $filters['vehicle_location'] == 'Bali' ? 'selected' : '' :''}}>Bali</option>
                    <option value="Nusa Tenggara Timur" {{ $filters !=null? $filters['vehicle_location'] == 'Nusa Tenggara Timur' ? 'selected' : '' :''}}>Nusa Tenggara Timur</option>
                    <option value="Nusa Tenggara Barat" {{ $filters !=null? $filters['vehicle_location'] == 'Nusa Tenggara Barat' ? 'selected' : '' :''}}>Nusa Tenggara Barat</option>
                    <option value="Gorontalo" {{ $filters !=null? $filters['vehicle_location'] == 'Gorontalo' ? 'selected' : '' :''}}>Gorontalo</option>
                    <option value="Sulawesi Barat" {{ $filters !=null? $filters['vehicle_location'] == 'Sulawesi Barat' ? 'selected' : '' :''}}>Sulawesi Barat</option>
                    <option value="Sulawesi Tengah" {{ $filters !=null? $filters['vehicle_location'] == 'Sulawesi Tengah' ? 'selected' : '' :''}}>Sulawesi Tengah</option>
                    <option value="Sulawesi Utara" {{ $filters !=null? $filters['vehicle_location'] == 'Sulawesi Utara' ? 'selected' : '' :''}}>Sulawesi Utara</option>
                    <option value="Sulawesi Tenggara" {{ $filters !=null? $filters['vehicle_location'] == 'Sulawesi Tenggara' ? 'selected' : '' :''}}>Sulawesi Tenggara</option>
                    <option value="Sulawesi Selatan" {{ $filters !=null? $filters['vehicle_location'] == 'Sulawesi Selatan' ? 'selected' : '' :''}}>Sulawesi Selatan</option>
                    <option value="Maluku Utara" {{ $filters !=null? $filters['vehicle_location'] == 'Maluku Utara' ? 'selected' : '' :''}}>Maluku Utara</option>
                    <option value="Maluku" {{ $filters !=null? $filters['vehicle_location'] == 'Maluku' ? 'selected' : '' :''}}>Maluku</option>
                    <option value="Papua Barat" {{ $filters !=null? $filters['vehicle_location'] == 'Papua Barat' ? 'selected' : '' :''}}>Papua Barat</option>
                    <option value="Papua" {{ $filters !=null? $filters['vehicle_location'] == 'Papua' ? 'selected' : '' :''}}>Papua</option>
                    <option value="Papua Tengah" {{ $filters !=null? $filters['vehicle_location'] == 'Papua Tengah' ? 'selected' : '' :''}}>Papua Tengah</option>
                    <option value="Papua Pegunungan" {{ $filters !=null? $filters['vehicle_location'] == 'Papua Pegunungan' ? 'selected' : '' :''}}>Papua Pegunungan</option>
                    <option value="Papua Selatan" {{ $filters !=null? $filters['vehicle_location'] == 'Papua Selatan' ? 'selected' : '' :''}}>Papua Selatan</option>
                    <option value="Papua Barat Daya" {{ $filters !=null? $filters['vehicle_location'] == 'Papua Barat Daya' ? 'selected' : '' :''}}>Papua Barat Daya</option>
                </select>
                <button type="submit" class="btn mt-3 mb-3" id="filterButton" style="background-color: #FFC107; color: black;">Search</button>
            </form>
        </div>

        <div class="col-md-9">
            <h1>Vehicle Catalog</h1>
            @foreach ($vehicles as $vehicle)


            <div class="card d-flex flex-row align-items-center mb-3">
                <img src="/storage/vehicle_images/{{ $vehicle->vehicle_cover_image }}" class="card-img-top" style="height: 200px; width: 200px;">
                <div class="card-body">
                    <h1>{{ $vehicle->vehicle_name }}</h1>
                    <div class="d-flex flex-column">
                        <div class="d-flex mb-2">
                            <h5>Millage&nbsp;&nbsp;&nbsp;&nbsp;:</h5>
                            <h5>&nbsp;{{ $vehicle->vehicle_milage }}</h5>
                        </div>
                        <div class="d-flex mb-2">
                            <h5>Location&nbsp;&nbsp;:</h5>
                            <h5>&nbsp;{{ $vehicle->vehicle_location }}</h5>
                        </div>
                        <div class="d-flex mb-2">
                            <h5>Rp. {{ number_format($vehicle->price, 0, ',', '.') }}</h5>
                        </div>
                    </div>
                    <input type="hidden" name="user_location" id="user_location" value="{{ $vehicle->user->location }}">
                    <a style="background-color: #FFC107; color: black;" href="{{ route('vehicle.detail', $vehicle->id) }}" class="btn">View Detail</a>
                </div>
            </div>




            @endforeach
        </div>
    </div>
  </div>

@endsection

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
