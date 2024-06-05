@extends('layout')

@section('link-css')
    <link rel="stylesheet" href="/css/pagecss/home.css">
@endsection

@section('content')
    <div class="container">
        <div class="my-3 d-flex justify-content-end">
            <a style="background-color: #FFC107; color: black;" href="/addProduct" class="btn ">Add New Vehicle</a>
        </div>

        <div class="judul text-center fw-bolder mt-5">
            <h2 class="mb-20" style="margin-bottom: 20px;">My Product</h2>
            <table class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1; @endphp

                    @forelse ($vehicles as $vehicle)
                        <tr>
                            <td>{{ $i++; }}</td>
                            <td><img src="/storage/vehicle_images/{{ $vehicle->vehicle_cover_image }}" class="card-img-top" style="height: 200px; width: 200px; object-fit: cover;"></td>
                            <td>{{ $vehicle->vehicle_name }}</td>
                            <td>Rp. {{ number_format($vehicle->price, 0, ',', '.') }}</td>
                            <td>{{ $vehicle->vehicle_status }}</td>
                            <td>
                                <div>
                                    <a style="background-color: #FFC107; color: black;" href="{{url('editProduct/'.$vehicle->id)}}" class="btn">Edit Vehicle</a>
                                    <a style="background-color: #FFC107; color: black;" href={{ route('vehicle.preview', $vehicle->id) }} class="btn">Preview Vehicle</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No Product</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

    </div>
@endsection
