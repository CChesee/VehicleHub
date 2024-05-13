@extends('layout')

@section('link-css')
    <link rel="stylesheet" href="/css/pagecss/home.css">
@endsection

@section('content')
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Vehicle Comparison</h1>
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
                            <td id="vehicle1Price">Rp. 20.000.000</td>
                            <td id="vehicle2Price">Rp. 25.000.000</td>
                        </tr>
                        <tr>
                            <td>KM</td>
                            <td id="vehicle1KM">20000</td>
                            <td id="vehicle2KM">15000</td>
                        </tr>
                        <tr>
                            <td>Production Year</td>
                            <td id="vehicle1ProductionYear">2018</td>
                            <td id="vehicle2ProductionYear">2019</td>
                        </tr>
                        <tr>
                            <td>Tax Price</td>
                            <td id="vehicle1TaxPrice">Rp. 20.000.000</td>
                            <td id="vehicle2TaxPrice">Rp. 16.000.000</td>
                        </tr>
                        <tr>
                            <td>Maintenance Cost</td>
                            <td id="vehicle1MaintenanceCost">Rp. 300.000</td>
                            <td id="vehicle2MaintenanceCost">Rp. 500.000</td>
                        </tr>
                        <tr>
                            <td>Fuel Consumption</td>
                            <td id="vehicle1FuelConsumption">7.2 kmpl</td>
                            <td id="vehicle2FuelConsumption">8.5 kmpl</td>
                        </tr>
                        <tr>
                            <td>Fuel Type</td>
                            <td id="vehicle1FuelType">Petrol</td>
                            <td id="vehicle2FuelType">Diesel</td>
                        </tr>
                        <tr>
                            <td>Transmission Type</td>
                            <td id="vehicle1TransmissionType">Manual</td>
                            <td id="vehicle2TransmissionType">Automatic</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

<script>
    // Define function to compare numeric values and append indicators
    function compareAndBoldNumericWithIndicator(vehicle1Value, vehicle2Value, vehicle1Cell, vehicle2Cell, exception = false) {
        // Extract numerical values from the strings
        var value1 = parseFloat(vehicle1Value.replace(/\D/g, ''));
        var value2 = parseFloat(vehicle2Value.replace(/\D/g, ''));

        // Compare the numerical values
        if (!isNaN(value1) && !isNaN(value2)) {
            if (exception) {
                if (value1 < value2) {
                    vehicle1Cell.innerHTML += ' <span style="color: green;">&#9650;</span>';
                } else if (value2 < value1) {
                    vehicle2Cell.innerHTML += ' <span style="color: green;">&#9650;</span>';
                }
            } else {
                if (value1 > value2) {
                    vehicle1Cell.innerHTML += ' <span style="color: green;">&#9650;</span>';
                } else if (value2 > value1) {
                    vehicle2Cell.innerHTML += ' <span style="color: green;">&#9650;</span>';
                }
            }
        }
    }

    // Define function to compare text values and append indicators
    function compareIndicator(vehicle1Value, vehicle2Value, vehicle1Cell, vehicle2Cell, exception = false) {
        if (exception) {
            if (vehicle1Value.toLowerCase() < vehicle2Value.toLowerCase()) {
                vehicle1Cell.innerHTML += ' <span style="color: green;">&#9650;</span>';
            } else if (vehicle2Value.toLowerCase() < vehicle1Value.toLowerCase()) {
                vehicle2Cell.innerHTML += ' <span style="color: green;">&#9650;</span>';
            }
        } else {
            if (vehicle1Value.toLowerCase() > vehicle2Value.toLowerCase()) {
                vehicle1Cell.innerHTML += ' <span style="color: green;">&#9650;</span>';
            } else if (vehicle2Value.toLowerCase() > vehicle1Value.toLowerCase()) {
                vehicle2Cell.innerHTML += ' <span style="color: green;">&#9650;</span>';
            }
        }
    }

    // Get the cells for each aspect
    var vehicle1PriceCell = document.getElementById('vehicle1Price');
    var vehicle2PriceCell = document.getElementById('vehicle2Price');

    var vehicle1KMCell = document.getElementById('vehicle1KM');
    var vehicle2KMCell = document.getElementById('vehicle2KM');

    var vehicle1ProductionYearCell = document.getElementById('vehicle1ProductionYear');
    var vehicle2ProductionYearCell = document.getElementById('vehicle2ProductionYear');

    var vehicle1TaxPriceCell = document.getElementById('vehicle1TaxPrice');
    var vehicle2TaxPriceCell = document.getElementById('vehicle2TaxPrice');

    var vehicle1MaintenanceCostCell = document.getElementById('vehicle1MaintenanceCost');
    var vehicle2MaintenanceCostCell = document.getElementById('vehicle2MaintenanceCost');

    var vehicle1FuelConsumptionCell = document.getElementById('vehicle1FuelConsumption');
    var vehicle2FuelConsumptionCell = document.getElementById('vehicle2FuelConsumption');

    // Compare and apply indicator for each aspect
    compareAndBoldNumericWithIndicator(vehicle1PriceCell.innerText, vehicle2PriceCell.innerText, vehicle1PriceCell, vehicle2PriceCell, true);
    compareAndBoldNumericWithIndicator(vehicle1KMCell.innerText, vehicle2KMCell.innerText, vehicle1KMCell, vehicle2KMCell, true);
    compareAndBoldNumericWithIndicator(vehicle1TaxPriceCell.innerText, vehicle2TaxPriceCell.innerText, vehicle1TaxPriceCell, vehicle2TaxPriceCell, true);
    compareAndBoldNumericWithIndicator(vehicle1MaintenanceCostCell.innerText, vehicle2MaintenanceCostCell.innerText, vehicle1MaintenanceCostCell, vehicle2MaintenanceCostCell, true);

    // Apply indicator logic for fuel consumption and production year
    compareIndicator(vehicle1FuelConsumptionCell.innerText, vehicle2FuelConsumptionCell.innerText, vehicle1FuelConsumptionCell, vehicle2FuelConsumptionCell);
    compareIndicator(vehicle1ProductionYearCell.innerText, vehicle2ProductionYearCell.innerText, vehicle1ProductionYearCell, vehicle2ProductionYearCell);
</script>

@endsection
