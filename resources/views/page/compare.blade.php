@extends('layout')

@section('link-css')
    <link rel="stylesheet" href="/css/pagecss/home.css">
    <style>
        .highlight-green {
            color: green;
            font-weight: bold;
        }

        .custom-select {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .custom-select-trigger {
            background-color: #f1f1f1;
            padding: 10px;
            cursor: pointer;
            border: 1px solid #ccc;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .custom-options {
            display: none;
            position: absolute;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            z-index: 1;
            width: 100%;
            max-height: 200px;
            overflow-y: auto;
        }

        .custom-option {
            padding: 10px;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .custom-option img {
            margin-right: 10px;
            width: 90px;
            height: auto;
        }

        .custom-select-trigger img {
            width:300px;
            height: auto;
        }

        .custom-option:hover {
            background-color: #e9e9e9;
        }
    </style>
@endsection

@section('content')

<body>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Vehicle Comparison</h1>

        <div class="row mb-3">
            <div class="col-md-6 vehicle-select-container">
                <label for="vehicle1">Choose Vehicle 1</label>
                <div id="custom-select-trigger1" class="custom-select" data-target="#vehicle1">
                    <div class="custom-select-trigger"></div>
                    <div class="custom-options"></div>
                </div>
                <select id="vehicle1" class="vehicle-select" hidden>
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
                            data-transmission-type="{{ $vehicle->vehicle_transmission }}"
                        >
                            {{ $vehicle->vehicle_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 vehicle-select-container">
                <label for="vehicle2">Choose Vehicle 2</label>
                <div class="custom-select" data-target="#vehicle2">
                    <div id="custom-select-trigger2" class="custom-select-trigger"></div>
                    <div class="custom-options"></div>
                </div>
                <select id="vehicle2" class="vehicle-select" hidden>
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
                            data-transmission-type="{{ $vehicle->vehicle_transmission }}"
                        >
                            {{ $vehicle->vehicle_name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="container mt-5 mb-5">
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
            const formatNumber = (number) => {
                return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            };

            const formatOption = (selectElement) => {
                const options = selectElement.querySelectorAll('option');
                const customSelect = document.querySelector(`.custom-select[data-target="#${selectElement.id}"]`);
                const customOptionsContainer = customSelect.querySelector('.custom-options');
                const customSelectTrigger = customSelect.querySelector('.custom-select-trigger');

                options.forEach(option => {
                if (option.value !== "") {
                    const imageSrc = option.getAttribute('data-image');
                    const customOption = document.createElement('div');
                    customOption.classList.add('custom-option');
                    customOption.innerHTML = `<img src="${imageSrc}" alt="${option.textContent}"><span>${option.textContent}</span>`;

                    customOption.addEventListener('click', () => {
                        customSelectTrigger.innerHTML = customOption.innerHTML;
                        selectElement.value = option.value;
                        customOptionsContainer.style.display = 'none';
                        updateTable(selectElement.id, option);

                        // Set image size in trigger based on selected option
                        const triggerImage = document.querySelector(`#custom-select-trigger${selectElement.id}`);
                        triggerImage.src = option.dataset.image;
                    });
                    customOptionsContainer.appendChild(customOption);
                }
                });

                customSelectTrigger.addEventListener('click', (event) => {
                    event.stopPropagation();
                    closeAllCustomSelects();
                    customOptionsContainer.style.display = 'block';
                });
            };

            const closeAllCustomSelects = () => {
                const customOptionsContainers = document.querySelectorAll('.custom-options');
                customOptionsContainers.forEach(container => {
                    container.style.display = 'none';
                });
            };

            document.addEventListener('click', closeAllCustomSelects);

            const updateTable = (vehicleId, option) => {
                document.getElementById(`${vehicleId}Price`).textContent = `Rp. ${formatNumber(option.getAttribute('data-price'))}`;
                document.getElementById(`${vehicleId}KM`).textContent = formatNumber(option.getAttribute('data-km')) + " KM";
                document.getElementById(`${vehicleId}ProductionYear`).textContent = option.getAttribute('data-production-year');
                document.getElementById(`${vehicleId}TaxPrice`).textContent = `Rp. ${formatNumber(option.getAttribute('data-tax-price'))}`;
                document.getElementById(`${vehicleId}MaintenanceCost`).textContent = option.getAttribute('data-maintenance-cost');
                document.getElementById(`${vehicleId}FuelConsumption`).textContent = `${option.getAttribute('data-fuel-consumption')} KM/L`;
                document.getElementById(`${vehicleId}FuelType`).textContent = option.getAttribute('data-fuel-type');
                document.getElementById(`${vehicleId}TransmissionType`).textContent = option.getAttribute('data-transmission-type');

                highlightValues();
            };

            const highlightValues = () => {
                const vehicle1Price = parseInt(document.getElementById('vehicle1Price').textContent.replace('Rp. ', '').replace(/\./g, '')) || 0;
                const vehicle2Price = parseInt(document.getElementById('vehicle2Price').textContent.replace('Rp. ', '').replace(/\./g, '')) || 0;
                const vehicle1KM = parseInt(document.getElementById('vehicle1KM').textContent.replace(/\./g, '')) || 0;
                const vehicle2KM = parseInt(document.getElementById('vehicle2KM').textContent.replace(/\./g, '')) || 0;
                const vehicle1ProductionYear = parseInt(document.getElementById('vehicle1ProductionYear').textContent) || 0;
                const vehicle2ProductionYear = parseInt(document.getElementById('vehicle2ProductionYear').textContent) || 0;
                const vehicle1TaxPrice = parseInt(document.getElementById('vehicle1TaxPrice').textContent.replace('Rp. ', '').replace(/\./g, '')) || 0;
                const vehicle2TaxPrice = parseInt(document.getElementById('vehicle2TaxPrice').textContent.replace('Rp. ', '').replace(/\./g, '')) || 0;
                const vehicle1MaintenanceCost = document.getElementById('vehicle1MaintenanceCost').textContent;
                const vehicle2MaintenanceCost = document.getElementById('vehicle2MaintenanceCost').textContent;
                const vehicle1FuelConsumption = parseFloat(document.getElementById('vehicle1FuelConsumption').textContent.replace(' KM/L', '')) || 0;
                const vehicle2FuelConsumption = parseFloat(document.getElementById('vehicle2FuelConsumption').textContent.replace(' KM/L', '')) || 0;

                highlightLowerValue('vehicle1Price', 'vehicle2Price', vehicle1Price, vehicle2Price);
                highlightLowerValue('vehicle1KM', 'vehicle2KM', vehicle1KM, vehicle2KM);
                highlightLowerValue('vehicle1ProductionYear', 'vehicle2ProductionYear', vehicle1ProductionYear, vehicle2ProductionYear);
                highlightLowerValue('vehicle1TaxPrice', 'vehicle2TaxPrice', vehicle1TaxPrice, vehicle2TaxPrice);
                highlightMaintenanceCost('vehicle1MaintenanceCost', 'vehicle2MaintenanceCost', vehicle1MaintenanceCost, vehicle2MaintenanceCost);
                highlightHigherValue('vehicle1FuelConsumption', 'vehicle2FuelConsumption', vehicle1FuelConsumption, vehicle2FuelConsumption);
            };

            const highlightLowerValue = (id1, id2, value1, value2) => {
                const element1 = document.getElementById(id1);
                const element2 = document.getElementById(id2);
                if (value1 < value2) {
                    element1.classList.add('highlight-green');
                    element2.classList.remove('highlight-green');
                } else if (value2 < value1) {
                    element2.classList.add('highlight-green');
                    element1.classList.remove('highlight-green');
                } else {
                    element1.classList.remove('highlight-green');
                    element2.classList.remove('highlight-green');
                }
            };

            const highlightHigherValue = (id1, id2, value1, value2) => {
                const element1 = document.getElementById(id1);
                const element2 = document.getElementById(id2);
                if (value1 > value2) {
                    element1.classList.add('highlight-green');
                    element2.classList.remove('highlight-green');
                } else if (value2 > value1) {
                    element2.classList.add('highlight-green');
                    element1.classList.remove('highlight-green');
                } else {
                    element1.classList.remove('highlight-green');
                    element2.classList.remove('highlight-green');
                }
            };

            const highlightMaintenanceCost = (id1, id2, value1, value2) => {
                const element1 = document.getElementById(id1);
                const element2 = document.getElementById(id2);
                if (value1 === "Relatively cheap" && value2 === "Relatively expensive") {
                    element1.classList.add('highlight-green');
                    element2.classList.remove('highlight-green');
                } else if (value2 === "Relatively cheap" && value1 === "Relatively expensive") {
                    element2.classList.add('highlight-green');
                    element1.classList.remove('highlight-green');
                } else {
                    element1.classList.remove('highlight-green');
                    element2.classList.remove('highlight-green');
                }
            };

            formatOption(document.getElementById('vehicle1'));
            formatOption(document.getElementById('vehicle2'));
        });
    </script>
</body>
@endsection


