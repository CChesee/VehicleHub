@extends('layout')

@section('link-css')
    <link rel="stylesheet" href="/css/pagecss/product.css">
@endsection

@section('content')
    <div class="container">
        <div>
            <div class="judul text-center fw-bolder mt-5">
                <h2>EDIT PRODUCT</h2>
            </div>

            <div class="mt-5 mb-5 mx-auto border border-dark rounded px-4">
                <form action="{{url('editProduct/'.$vehicle->id)}}" method="post" enctype="multipart/form-data">
                    <div class="mt-4">
                        @csrf
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="vehicle_location">Vehicle Location</label>
                        <select class="form-control form-control" id="vehicle_location" name="vehicle_location">
                            <option value=""> </option>
                            <option value="Nanggroe Aceh Darussalam" {{ $vehicle->vehicle_location == 'Nanggroe Aceh Darussalam' ? 'selected' : '' }}>Nanggroe Aceh Darussalam</option>
                            <option value="Sumatera Utara" {{ $vehicle->vehicle_location == 'Sumatera Utara' ? 'selected' : '' }}>Sumatera Utara</option>
                            <option value="Sumatera Selatan" {{ $vehicle->vehicle_location == 'Sumatera Selatan' ? 'selected' : '' }}>Sumatera Selatan</option>
                            <option value="Sumatera Barat" {{ $vehicle->vehicle_location == 'Sumatera Barat' ? 'selected' : '' }}>Sumatera Barat</option>
                            <option value="Bengkulu" {{ $vehicle->vehicle_location == 'Bengkulu' ? 'selected' : '' }}>Bengkulu</option>
                            <option value="Riau" {{ $vehicle->vehicle_location == 'Riau' ? 'selected' : '' }}>Riau</option>
                            <option value="Kepulauan Riau" {{ $vehicle->vehicle_location == 'Kepulauan Riau' ? 'selected' : '' }}>Kepulauan Riau</option>
                            <option value="Jambi" {{ $vehicle->vehicle_location == 'Jambi' ? 'selected' : '' }}>Jambi</option>
                            <option value="Lampung" {{ $vehicle->vehicle_location == 'Lampung' ? 'selected' : '' }}>Lampung</option>
                            <option value="Bangka Belitung" {{ $vehicle->vehicle_location == 'Bangka Belitung' ? 'selected' : '' }}>Bangka Belitung</option>
                            <option value="Kalimantan Barat" {{ $vehicle->vehicle_location == 'Kalimantan Barat' ? 'selected' : '' }}>Kalimantan Barat</option>
                            <option value="Kalimantan Timur" {{ $vehicle->vehicle_location == 'Kalimantan Timur' ? 'selected' : '' }}>Kalimantan Timur</option>
                            <option value="Kalimantan Selatan" {{ $vehicle->vehicle_location == 'Kalimantan Selatan' ? 'selected' : '' }}>Kalimantan Selatan</option>
                            <option value="Kalimantan Tengah" {{ $vehicle->vehicle_location == 'Kalimantan Tengah' ? 'selected' : '' }}>Kalimantan Tengah</option>
                            <option value="Kalimantan Utara" {{ $vehicle->vehicle_location == 'Kalimantan Utara' ? 'selected' : '' }}>Kalimantan Utara</option>
                            <option value="Banten" {{ $vehicle->vehicle_location == 'Banten' ? 'selected' : '' }}>Banten</option>
                            <option value="DKI Jakarta" {{ $vehicle->vehicle_location == 'DKI Jakarta' ? 'selected' : '' }}>DKI Jakarta</option>
                            <option value="Jawa Barat" {{ $vehicle->vehicle_location == 'Jawa Barat' ? 'selected' : '' }}>Jawa Barat</option>
                            <option value="Jawa Tengah" {{ $vehicle->vehicle_location == 'Jawa Tengah' ? 'selected' : '' }}>Jawa Tengah</option>
                            <option value="Daerah Istimewa Yogyakarta" {{ $vehicle->vehicle_location == 'Daerah Istimewa Yogyakarta' ? 'selected' : '' }}>Daerah Istimewa Yogyakarta</option>
                            <option value="Jawa Timur" {{ $vehicle->vehicle_location == 'Jawa Timur' ? 'selected' : '' }}>Jawa Timur</option>
                            <option value="Bali" {{ $vehicle->vehicle_location == 'Bali' ? 'selected' : '' }}>Bali</option>
                            <option value="Nusa Tenggara Timur" {{ $vehicle->vehicle_location == 'Nusa Tenggara Timur' ? 'selected' : '' }}>Nusa Tenggara Timur</option>
                            <option value="Nusa Tenggara Barat" {{ $vehicle->vehicle_location == 'Nusa Tenggara Barat' ? 'selected' : '' }}>Nusa Tenggara Barat</option>
                            <option value="Gorontalo" {{ $vehicle->vehicle_location == 'Gorontalo' ? 'selected' : '' }}>Gorontalo</option>
                            <option value="Sulawesi Barat" {{ $vehicle->vehicle_location == 'Sulawesi Barat' ? 'selected' : '' }}>Sulawesi Barat</option>
                            <option value="Sulawesi Tengah" {{ $vehicle->vehicle_location == 'Sulawesi Tengah' ? 'selected' : '' }}>Sulawesi Tengah</option>
                            <option value="Sulawesi Utara" {{ $vehicle->vehicle_location == 'Sulawesi Utara' ? 'selected' : '' }}>Sulawesi Utara</option>
                            <option value="Sulawesi Tenggara" {{ $vehicle->vehicle_location == 'Sulawesi Tenggara' ? 'selected' : '' }}>Sulawesi Tenggara</option>
                            <option value="Sulawesi Selatan" {{ $vehicle->vehicle_location == 'Sulawesi Selatan' ? 'selected' : '' }}>Sulawesi Selatan</option>
                            <option value="Maluku Utara" {{ $vehicle->vehicle_location == 'Maluku Utara' ? 'selected' : '' }}>Maluku Utara</option>
                            <option value="Maluku" {{ $vehicle->vehicle_location == 'Maluku' ? 'selected' : '' }}>Maluku</option>
                            <option value="Papua Barat" {{ $vehicle->vehicle_location == 'Papua Barat' ? 'selected' : '' }}>Papua Barat</option>
                            <option value="Papua" {{ $vehicle->vehicle_location == 'Papua' ? 'selected' : '' }}>Papua</option>
                            <option value="Papua Tengah" {{ $vehicle->vehicle_location == 'Papua Tengah' ? 'selected' : '' }}>Papua Tengah</option>
                            <option value="Papua Pegunungan" {{ $vehicle->vehicle_location == 'Papua Pegunungan' ? 'selected' : '' }}>Papua Pegunungan</option>
                            <option value="Papua Selatan" {{ $vehicle->vehicle_location == 'Papua Selatan' ? 'selected' : '' }}>Papua Selatan</option>
                            <option value="Papua Barat Daya" {{ $vehicle->vehicle_location == 'Papua Barat Daya' ? 'selected' : '' }}>Papua Barat Daya</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="vehicle_type">Vehicle Type</label>
                        <select class="form-control form-control" id="vehicle_type" name="vehicle_type">
                            <option value=""> </option>
                            <option value="Car" {{ $vehicle->vehicle_type == 'Car' ? 'selected' : '' }}>Car</option>
                            <option value="Motorcycle" {{ $vehicle->vehicle_type == 'Motorcycle' ? 'selected' : '' }}>Motorcycle</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="vehicle_brand" class="form-label">Vehicle Brand</label>
                        <select class="form-control" id="vehicle_brand" name="vehicle_brand">
                            <!-- Options will be populated by JavaScript -->
                        </select>
                        <div id="emailHelp" class="form-text">{{ $errors->first('vehicle_brand') }}</div>
                    </div>

                    <div class="mb-3">
                        <label for="vehicle_name" class="form-label">Vehicle Name</label>
                        <input type="text" class="form-control" id="vehicle_name" name="vehicle_name" value="{{$vehicle->vehicle_name}}">
                        <div id="emailHelp" class="form-text">{{$errors->first('vehicle_name')}}</div>
                    </div>

                    <div class="mb-3">
                        <label for="vehicle_category" class="form-label">Vehicle Category</label>
                        <select class="form-control form-control" id="vehicle_category" name="vehicle_category">
                            <!-- Options will be populated by JavaScript -->
                        </select>
                        <div id="emailHelp" class="form-text">{{$errors->first('vehicle_category')}}</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="vehicle_transmition">Vehicle Transmition</label>
                        <select class="form-control form-control" id="vehicle_transmition" name="vehicle_transmition">
                            <option value=""> </option>
                            <option value="Automatic" {{ $vehicle->vehicle_transmition == 'Automatic' ? 'selected' : '' }}>Automatic</option>
                            <option value="Manual" {{ $vehicle->vehicle_transmition == 'Manual' ? 'selected' : '' }}>Manual</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="vehicle_seat_capacity" class="form-label">Vehicle Seat Capacity</label>
                        <input type="number" class="form-control" id="vehicle_seat_capacity" name="vehicle_seat_capacity" value="{{$vehicle->vehicle_seat_capacity}}">
                        <div id="emailHelp" class="form-text">{{$errors->first('vehicle_seat_capacity')}}</div>
                    </div>

                    <div class="mb-3">
                        <label for="vehicle_engine_capacity" class="form-label">Vehicle Engine Capacity(CC)</label>
                        <input type="number" class="form-control" id="vehicle_engine_capacity" name="vehicle_engine_capacity" value="{{$vehicle->vehicle_engine_capacity}}">
                        <div id="emailHelp" class="form-text">{{$errors->first('vehicle_engine_capacity')}}</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="vehicle_fuel_type">Vehicle Fuel Type</label>
                        <select class="form-control form-control" id="vehicle_fuel_type" name="vehicle_fuel_type">
                            <option value=""> </option>
                            <option value="Gasoline" {{ $vehicle->vehicle_fuel_type == 'Gasoline' ? 'selected' : '' }}>Gasoline</option>
                            <option value="Diesel" {{ $vehicle->vehicle_fuel_type == 'Diesel' ? 'selected' : '' }}>Diesel</option>
                            <option value="Electric" {{ $vehicle->vehicle_fuel_type == 'Electric' ? 'selected' : '' }}>Electric</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="vehicle_fuel_tank_capacity" class="form-label">Vehicle Full Tank Capacity(L)</label>
                        <input type="number" class="form-control" id="vehicle_fuel_tank_capacity" name="vehicle_fuel_tank_capacity" value="{{$vehicle->vehicle_fuel_tank_capacity}}">
                        <div id="emailHelp" class="form-text">{{$errors->first('vehicle_fuel_tank_capacity')}}</div>
                    </div>

                    <div class="mb-3">
                        <label for="vehicle_fuel_consumption" class="form-label">Vehicle Full Consumption(KM/L)</label>
                        <input type="number" class="form-control" id="vehicle_fuel_consumption" name="vehicle_fuel_consumption" value="{{$vehicle->vehicle_fuel_consumption}}">
                        <div id="emailHelp" class="form-text">{{$errors->first('vehicle_fuel_consumption')}}</div>
                    </div>

                    <div class="mb-3">
                        <label for="vehicle_milage" class="form-label">Vehicle Milage(KM)</label>
                        <input type="number" class="form-control" id="vehicle_milage" name="vehicle_milage" value="{{$vehicle->vehicle_milage}}">
                        <div id="emailHelp" class="form-text">{{$errors->first('vehicle_milage')}}</div>
                    </div>

                    <div class="mb-3">
                        <label for="vehicle_year_production" class="form-label">Vehicle Year Production</label>
                        <input type="text" class="form-control" id="vehicle_year_production" name="vehicle_year_production" value="{{$vehicle->vehicle_year_production}}">
                        <div id="emailHelp" class="form-text">{{$errors->first('vehicle_year_production')}}</div>
                    </div>

                    <div class="mb-3">
                        <label for="vehicle_tax" class="form-label">Vehicle Tax(RP)</label>
                        <input type="number" class="form-control" id="vehicle_tax" name="vehicle_tax" value="{{$vehicle->vehicle_tax}}">
                        <div id="emailHelp" class="form-text">{{$errors->first('vehicle_tax')}}</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="vehicle_service_fee">Vehicle Service Fee</label>
                        <select class="form-control form-control" id="vehicle_service_fee" name="vehicle_service_fee">
                            <option value=""> </option>
                            <option value="Relatively cheap" {{ $vehicle->vehicle_service_fee == 'Relatively cheap' ? 'selected' : '' }}>Relatively cheap</option>
                            <option value="Relatively expensive" {{ $vehicle->vehicle_service_fee == 'Relatively expensive' ? 'selected' : '' }}>Relatively expensive</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price(RP)</label>
                        <input type="number" class="form-control" id="price" name="price" value="{{$vehicle->price}}">
                        <div id="emailHelp" class="form-text">{{$errors->first('price')}}</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="vehicle_status">Status</label>
                        <select class="form-control form-control" id="vehicle_status" name="vehicle_status">
                            <option value="Available" {{ $vehicle->vehicle_status == 'Available' ? 'selected' : '' }}>Available</option>
                            <option value="Sold" {{ $vehicle->vehicle_status == 'Sold' ? 'selected' : '' }}>Sold</option>
                        </select>
                    </div>

                    <div class="add d-flex justify-content-center mt-3 mb-3">
                        <button type="submit" class="btn btn-warning" style="background-color: #FFC107; color: black;">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const vehicleTypeSelect = document.getElementById('vehicle_type');
        const vehicleBrandSelect = document.getElementById('vehicle_brand');
        const vehicleCategorySelect = document.getElementById('vehicle_category');

        // Fetch initial vehicle brand and category data from the database (assuming you have a way to retrieve this data using JavaScript)
        const initialVehicleBrand = "{{ $vehicle->vehicle_brand }}"; // Get the initial vehicle brand from Blade template
        const initialVehicleCategory = "{{ $vehicle->vehicle_category }}"; // Get the initial vehicle category from Blade template

        const brandsByType = {
          Car: ['', 'Acura', 'Alfa Romeo', 'Aston Martin', 'Audi', 'BAIC', 'BMW', 'BYD', 'Bentley', 'Buick', 'Chery', 'Chevrolet', 'Chrysler', 'Citroën', 'DFSK', 'Daihatsu', 'Datsun', 'Dodge', 'Ferrari', 'Ford', 'GMC', 'Haval', 'Honda', 'Hyundai', 'Infiniti', 'Isuzu', 'Jaguar', 'Jeep', 'Kia', 'Koenigsegg', 'Lamborghini', 'Land Rover', 'Lancia', 'Lexus', 'Lincoln', 'Lotus', 'MG', 'MINI', 'Maserati', 'Mazda', 'Mercedes-Benz', 'Mitsubishi', 'Nissan', 'Peugeot', 'Porsche', 'Proton', 'RAM', 'Renault', 'Rolls-Royce', 'SEAT', 'SSangYong', 'Smart', 'Subaru', 'Suzuki', 'Tata', 'Tesla', 'Toyota', 'Volkswagen', 'Volvo', 'Wuling', 'Other'],
          Motorcycle: ['', 'Aprilia', 'BMW Motorrad', 'Benelli', 'CFMoto', 'Ducati', 'Harley-Davidson', 'Honda', 'Husqvarna', 'KTM', 'Keeway', 'Kawasaki', 'KYMCO', 'MV Agusta', 'Moto Guzzi', 'SYM (Sanyang)', 'Suzuki', 'TVS', 'Triumph', 'Vespa (Piaggio)', 'Yamaha', 'Other']
        };

        const categoriesByType = {
          Car: ['', 'Convertible', 'Coupe', 'Crossover', 'Electric Car', 'Hatchback', 'Hybrid', 'Minivan', 'LCGC', 'Pickup', 'Sedan', 'SUV', 'Wagon'],
          Motorcycle: ['', 'Adventure Bike', 'Cruiser', 'Cub', 'Custom Bike', 'Dirt Bike', 'Electric Bike', 'Naked Bike', 'Touring Bike', 'Scooter', 'Sport Bike']
        };

        function populateOptions(selectElement, options, selectedValue) {
          selectElement.innerHTML = '';
          options.forEach(option => {
            const optionElement = document.createElement('option');
            optionElement.text = option;
            optionElement.value = option;
            if (option === selectedValue) {
              optionElement.selected = true;
            }
            selectElement.appendChild(optionElement);
          });
        }

        vehicleTypeSelect.addEventListener('change', function() {
          const selectedType = this.value;
          populateOptions(vehicleBrandSelect, brandsByType[selectedType] || [], initialVehicleBrand); // Pre-select the initial brand
          populateOptions(vehicleCategorySelect, categoriesByType[selectedType] || [], initialVehicleCategory); // Pre-select the initial category
        });

        // Manually trigger the change event to populate the brand and category options with the existing values from the database
        vehicleTypeSelect.dispatchEvent(new Event('change'));
      });
    </script>
    @endsection

