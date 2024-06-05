@extends('layout')

@section('link-css')
    <link rel="stylesheet" href="/css/pagecss/home.css">
@endsection

@section('content')

<body>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Vehicle Comparison</h1>

        <div class="row mb-3">
            <div class="col-md-6 vehicle-select-container">
                <label for="vehicle1">Choose Vehicle 1</label>
                <select id="vehicle1" class="vehicle-select">
                    <option value="">Choose Vehicle 1</option>
                    @foreach($vehicles as $vehicle)
                        <option
                            value="{{ $vehicle->id }}"
                            data-image="{{ asset('storage/vehicle_images/' . $vehicle->vehicle_cover_image) }}"
                            data-price="{{ $vehicle->price }}"
                            data-km="{{ $vehicle->vehicle_milage }}"
                            data-production-year="{{ $vehicle->vehicle_year_production }}"
                            data-tax-price="{{ $vehicle->vehicle_tax }}"
                            data-maintenance-cost="{{ $vehicle->vehicle_service_fee }}"
                            data-fuel-consumption="{{ $vehicle->vehicle_fuel_consumption }}"
                            data-fuel-type="{{ $vehicle->vehicle_fuel_type }}"
                            data-transmission-type="{{ $vehicle->vehicle_transmition }}"
                        >
                            {{ $vehicle->vehicle_name }}
                        </option>
                    @endforeach
                </select>
                <div class="custom-select" data-target="#vehicle1">
                    <div class="custom-select-trigger">Choose Vehicle 1</div>
                    <div class="custom-options"></div>
                </div>
            </div>
            <div class="col-md-6 vehicle-select-container">
                <label for="vehicle2">Choose Vehicle 2</label>
                <select id="vehicle2" class="vehicle-select">
                    <option value="">Choose Vehicle 2</option>
                    @foreach($vehicles as $vehicle)
                        <option
                            value="{{ $vehicle->id }}"
                            data-image="{{ asset('storage/vehicle_images/' . $vehicle->vehicle_cover_image) }}"
                            data-price="{{ $vehicle->price }}"
                            data-km="{{ $vehicle->vehicle_milage }}"
                            data-production-year="{{ $vehicle->vehicle_year_production }}"
                            data-tax-price="{{ $vehicle->vehicle_tax }}"
                            data-maintenance-cost="{{ $vehicle->vehicle_service_fee }}"
                            data-fuel-consumption="{{ $vehicle->vehicle_fuel_consumption }}"
                            data-fuel-type="{{ $vehicle->vehicle_fuel_type }}"
                            data-transmission-type="{{ $vehicle->vehicle_transmition }}"
                        >
                            {{ $vehicle->vehicle_name }}
                        </option>
                    @endforeach
                </select>
                <div class="custom-select" data-target="#vehicle2">
                    <div class="custom-select-trigger">Choose Vehicle 2</div>
                    <div class="custom-options"></div>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Detail</th>
                                <th>Vehicle 1</th>
                                <th>Vehicle 2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Price</td>
                                <td id="vehicle1Price">-</td>
                                <td id="vehicle2Price">-</td>
                            </tr>
                            <tr>
                                <td>KM</td>
                                <td id="vehicle1KM">-</td>
                                <td id="vehicle2KM">-</td>
                            </tr>
                            <tr>
                                <td>Production Year</td>
                                <td id="vehicle1ProductionYear">-</td>
                                <td id="vehicle2ProductionYear">-</td>
                            </tr>
                            <tr>
                                <td>Tax Price</td>
                                <td id="vehicle1TaxPrice">-</td>
                                <td id="vehicle2TaxPrice">-</td>
                            </tr>
                            <tr>
                                <td>Maintenance Cost</td>
                                <td id="vehicle1MaintenanceCost">-</td>
                                <td id="vehicle2MaintenanceCost">-</td>
                            </tr>
                            <tr>
                                <td>Fuel Consumption</td>
                                <td id="vehicle1FuelConsumption">-</td>
                                <td id="vehicle2FuelConsumption">-</td>
                            </tr>
                            <tr>
                                <td>Fuel Type</td>
                                <td id="vehicle1FuelType">-</td>
                                <td id="vehicle2FuelType">-</td>
                            </tr>
                            <tr>
                                <td>Transmission Type</td>
                                <td id="vehicle1TransmissionType">-</td>
                                <td id="vehicle2TransmissionType">-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const formatOption = (selectElement) => {
                const options = selectElement.querySelectorAll('option');
                const customSelect = document.querySelector(`.custom-select[data-target="#${selectElement.id}"]`);
                const customOptionsContainer = customSelect.querySelector('.custom-options');
                const customSelectTrigger = customSelect.querySelector('.custom-select-trigger');

                options.forEach(option => {
                    const imageSrc = option.getAttribute('data-image');
                    const customOption = document.createElement('div');
                    customOption.classList.add('custom-option');
                    customOption.innerHTML = `<img src="${imageSrc}" alt="${option.textContent}"><span>${option.textContent}</span>`;
                    customOption.addEventListener('click', () => {
                        customSelectTrigger.innerHTML = customOption.innerHTML;
                        selectElement.value = option.value;
                        customOptionsContainer.style.display = 'none';
                        updateTable(selectElement.id, option);
                    });
                    customOptionsContainer.appendChild(customOption);
                });

                customSelectTrigger.addEventListener('click', () => {
                    customOptionsContainer.style.display = customOptionsContainer.style.display === 'block' ? 'none' : 'block';
                });
            };

            const updateTable = (vehicleId, option) => {
                document.getElementById(`${vehicleId}Price`).textContent = `Rp. ${option.getAttribute('data-price')}`;
                document.getElementById(`${vehicleId}KM`).textContent = option.getAttribute('data-km');
                document.getElementById(`${vehicleId}ProductionYear`).textContent = option.getAttribute('data-production-year');
                document.getElementById(`${vehicleId}TaxPrice`).textContent = `Rp. ${option.getAttribute('data-tax-price')}`;
                document.getElementById(`${vehicleId}MaintenanceCost`).textContent = option.getAttribute('data-maintenance-cost');
                document.getElementById(`${vehicleId}FuelConsumption`).textContent = `${option.getAttribute('data-fuel-consumption')} KM/L`;
                document.getElementById(`${vehicleId}FuelType`).textContent = option.getAttribute('data-fuel-type');
                document.getElementById(`${vehicleId}TransmissionType`).textContent = option.getAttribute('data-transmission-type');
            };

            formatOption(document.getElementById('vehicle1'));
            formatOption(document.getElementById('vehicle2'));
        });
    </script>
</body>
@endsection

