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

            <div class="mt-5 mb-5 mx-auto border border-dark rounded px-4">
                <form action="/addProductLogic" method="post" enctype="multipart/form-data">
                    <div class="mt-4">
                        @csrf
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="vehicle_type">Vehicle Type</label>
                        <select class="form-control form-control" id="vehicle_type" name="vehicle_type">
                            <option value=" "> </option>
                            <option value="Car">Car</option>
                            <option value="Motorcycle">Motorcycle</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="vehicle_brand" class="form-label">Vehicle Brand</label>
                        <select class="form-control form-control" id="vehicle_brand" name="vehicle_brand">
                            <option value="">Please select a vehicle type first</option>
                        </select>
                        <div id="emailHelp" class="form-text">{{$errors->first('vehicle_brand')}}</div>
                    </div>

                    <div class="mb-3">
                        <label for="vehicle_name" class="form-label">Vehicle Name</label>
                        <input type="text" class="form-control" id="vehicle_name" aria-describedby="emailHelp" name="vehicle_name">
                        <div id="emailHelp" class="form-text">{{$errors->first('vehicle_name')}}</div>
                    </div>

                    <div class="mb-3">
                        <label for="vehicle_category" class="form-label">Vehicle Category</label>
                        <select class="form-control form-control" id="vehicle_category" name="vehicle_category">
                            <option value="">Please select a vehicle type first</option>
                        </select>
                        <div id="emailHelp" class="form-text">{{$errors->first('vehicle_category')}}</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="vehicle_transmition">Vehicle Transmition</label>
                        <select class="form-control form-control" id="vehicle_transmition" name="vehicle_transmition">
                            <option value=" "> </option>
                            <option value="Automatic">Automatic</option>
                            <option value="Manual">Manual</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="vehicle_seat_capacity" class="form-label">Vehicle Seat Capacity</label>
                        <input type="number" class="form-control" id="vehicle_seat_capacity" name="vehicle_seat_capacity">
                        <div id="emailHelp" class="form-text">{{$errors->first('vehicle_seat_capacity')}}</div>
                    </div>

                    <div class="mb-3">
                        <label for="vehicle_engine_capacity" class="form-label">Vehicle Engine Capacity(CC)</label>
                        <input type="number" class="form-control" id="vehicle_engine_capacity" name="vehicle_engine_capacity">
                        <div id="emailHelp" class="form-text">{{$errors->first('vehicle_engine_capacity')}}</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="vehicle_fuel_type">Vehicle Fuel Type</label>
                        <select class="form-control form-control" id="vehicle_fuel_type" name="vehicle_fuel_type">
                            <option value=" "> </option>
                            <option value="Gasoline">Gasoline</option>
                            <option value="Diesel">Diesel</option>
                            <option value="Electric">Electric</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="vehicle_fuel_tank_capacity" class="form-label">Vehicle Full Tank Capacity(L)</label>
                        <input type="number" class="form-control" id="vehicle_fuel_tank_capacity" name="vehicle_fuel_tank_capacity">
                        <div id="emailHelp" class="form-text">{{$errors->first('vehicle_fuel_tank_capacity')}}</div>
                    </div>

                    <div class="mb-3">
                        <label for="vehicle_fuel_consumption" class="form-label">Vehicle Full Consumption(KM/L)</label>
                        <input type="number" class="form-control" id="vehicle_fuel_consumption" name="vehicle_fuel_consumption">
                        <div id="emailHelp" class="form-text">{{$errors->first('vehicle_fuel_consumption')}}</div>
                    </div>

                    <div class="mb-3">
                        <label for="vehicle_milage" class="form-label">Vehicle Milage(KM)</label>
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
                        <label for="vehicle_tax" class="form-label">Vehicle Tax(RP)</label>
                        <input type="number" class="form-control" id="vehicle_tax" name="vehicle_tax">
                        <div id="emailHelp" class="form-text">{{$errors->first('vehicle_tax')}}</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="vehicle_service_fee">Vehicle Service Fee</label>
                        <select class="form-control form-control" id="vehicle_service_fee" name="vehicle_service_fee">
                            <option value=" "> </option>
                            <option value="Relatively cheap">Relatively cheap</option>
                            <option value="Relatively expensive">Relatively expensive</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price(RP)</label>
                        <input type="number" class="form-control" id="price" name="price">
                        <div id="emailHelp" class="form-text">{{$errors->first('price')}}</div>
                    </div>

                    <div class="mb-3">
                        <label for="files" class="form-label">Cover Image</label>
                        <input type="file" name="vehicle_cover_image" class="form-control" accept="image/*" >
                    </div>

                    <div class="mb-3">
                        <label for="files" class="form-label">Detail Image</label>
                        <input type="file" name="images[]" class="form-control" accept="image/*"  multiple>
                    </div>

                    <div class="mb-3" style="display: none;">
                        <label class="form-label" for="vehicle_status">Status</label>
                        <select class="form-control form-control" id="vehicle_status" name="vehicle_status">
                            <option value="Available">Available</option>
                        </select>
                    </div>

                    <div class="add d-flex justify-content-center mt-5 mb-3">
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
@endsection
