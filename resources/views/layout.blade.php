<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VehicleHub</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/main.css">
    @yield('link-css')
    <style>
        body {
            font-family: 'Nunito';
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        footer {
            background-color: #ffe69c;
            padding: 20px 0;
            text-align: center;
            width: 100%;
        }

        .content {
            flex-grow: 1;
            margin-top: 20px; /* Adjust margin-top as needed to push content below the footer */
        }
    </style>
</head>
<body>
    @include('components.navbar')
    <div class="content">
        @yield('content')
    </div>
    <footer class="colnav mt-auto py-3">
        <div class="container-fluid">
            <div class="row align-items-center h-100">
                <div class="col-md-2 mb-3 mb-md-0">
                    <img src="{{ asset('storage/app_image/logo.png') }}" alt="Logo" height="50"
                        class="d-inline-block align-text-top">
                </div>
                <div class="col-md-1 mb-3 mb-md-0">
                </div>
                <div class="col-md-6 text-center mb-3 mb-md-0">
                    <p class="mb-0">© 2024 VehicleHub is protected by copyright.</p>
                </div>
                <div class="col-md-3 text-md-end">
                    <p class="mb-0">Contact Us: info@vehiclehub.com</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
