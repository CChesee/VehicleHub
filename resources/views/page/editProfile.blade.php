@extends('layout')

@section('content')
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                    <div class="col-md-4 col-lg-4 d-none d-md-flex justify-content-center align-items-center">
                        <img src="{{ asset('storage/app_image/myprofile.png') }}"
                             alt="profile image" class="img-fluid" style="border-radius: 1rem;" />
                    </div>

                    <div class="col-md-6 col-lg-7 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5 text-black">

                            <div class="mb-3 pb-1" style="text-align: center;">
                                <span class="h1 fw-bold mb-0">EDIT PROFILE</span>
                            </div>

                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('profile.update') }}">
                                @csrf
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="name">Name</label>
                                    @if ($errors->has('name'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                    <input type="text" id="name" class="form-control" name="name" value="{{ old('name', $user->name) }}" required />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" id="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" readonly />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="phone">Phone</label>
                                    @if ($errors->has('phone'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('phone') }}
                                        </div>
                                    @endif
                                    <input type="text" id="phone" class="form-control" name="phone" value="{{ old('phone', $user->phone) }}" />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="location">Location</label>
                                    <select class="form-control form-control" id="location" name="location">
                                        <!-- Options will be populated by JavaScript -->
                                    </select>
                                </div>

                                <div class="pt-1 mt-3" style="text-align: center;">
                                    <button class="btn" style="background-color: #FFC107; color: black;" type="submit">Update Profile</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const locationSelect = document.getElementById('location');
    const initialLocation = "{{ $user->location }}";

    const locationList = {
        'Indonesia': [
            'Nanggroe Aceh Darussalam',
            'Sumatera Utara',
            'Sumatera Selatan',
            'Sumatera Barat',
            'Bengkulu',
            'Riau',
            'Kepulauan Riau',
            'Jambi',
            'Lampung',
            'Bangka Belitung',
            'Kalimantan Barat',
            'Kalimantan Timur',
            'Kalimantan Selatan',
            'Kalimantan Tengah',
            'Kalimantan Utara',
            'Banten',
            'DKI Jakarta',
            'Jawa Barat',
            'Jawa Tengah',
            'Daerah Istimewa Yogyakarta',
            'Jawa Timur',
            'Bali',
            'Nusa Tenggara Timur',
            'Nusa Tenggara Barat',
            'Gorontalo',
            'Sulawesi Barat',
            'Sulawesi Tengah',
            'Sulawesi Utara',
            'Sulawesi Tenggara',
            'Sulawesi Selatan',
            'Maluku Utara',
            'Maluku',
            'Papua Barat',
            'Papua',
            'Papua Tengah',
            'Papua Pegunungan',
            'Papua Selatan',
            'Papua Barat Daya'
        ]
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

    populateOptions(locationSelect, locationList['Indonesia'], initialLocation);
    });
</script>

@endsection
