<nav class="navbar navbar-expand-lg navbar-light colnav">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('storage/app_image/logo.png') }}" alt="Logo" height="70"
                 class="d-inline-block align-text-top">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-3 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link active bold-link" aria-current="page" href="/home">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active bold-link" aria-current="page" href="/browse">Browse</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active bold-link" aria-current="page" href="/compare">Compare</a>
                </li>

                @can('login-hide')
                    <li class="nav-item">
                        <a class="nav-link active bold-link" aria-current="page" href="/myProduct">My Product</a>
                    </li>
                @endcan

                <li class="nav-item">
                    <a class="nav-link bold-link" href="#">Book Service</a>
                </li>

            </ul>
        </div>

        @cannot('login-hide')
            <a class="auth nav-link" href="{{url('login')}}"></i>Login</a>
        @endcannot

        @can('login-hide')
                <a class="nav-link active" aria-current="page" href="/profile">Profile</a>
        @endcan

        @can('login-hide')
            <div class="auth">
                <a class="nav-link" href="{{url('logout')}}">Logout</a>
            </div>
        @endcan


    </div>
  </nav>
