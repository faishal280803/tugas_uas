<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="GrosirFTH">
    <link rel="icon" href="{{asset('favicon.ico')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('site.webmanifest')}}">
    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />
    <link href="{{asset('assets')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/css/tiny-slider.css" rel="stylesheet">
    <link href="{{asset('assets')}}/css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <title>Grosir FTH</title>
</head>

<body>
    <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

        <div class="container">
            <a class="navbar-brand" href="/">Grosir FTH<span>.</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
                aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsFurni">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item {{$is_active == 'home' ? 'active' : ''}}">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item {{$is_active == 'barang' ? 'active' : ''}}">
                        <a class="nav-link" href="/barang">Barang</a>
                    </li>
                </ul>

                <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                    @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="{{asset('assets')}}/images/user.svg">
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/pesanan-saya">Pesanan Saya</a></li>
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <footer class="footer-section">
        <div class="container relative">
            <div class="border-top copyright">
                <div class="d-flex pt-4 justify-content-center">
                    <p class="mb-2 text-center text-lg-start">Copyright - Grosir FTH &copy;<script>
                            document.write(new Date().getFullYear());
                        </script>. All Rights Reserved.
                    </p>
                </div>
            </div>

        </div>
    </footer>

    <script>
        @if(Session::has('message'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true
        }
              toastr.success("{{ session('message') }}");
        @endif
      
        @if(Session::has('error'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true
        }
              toastr.error("{{ session('error') }}");
        @endif
      
        @if(Session::has('info'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true
        }
              toastr.info("{{ session('info') }}");
        @endif
      
        @if(Session::has('warning'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true
        }
              toastr.warning("{{ session('warning') }}");
        @endif
    </script>
    <script src="{{asset('assets')}}/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets')}}/js/tiny-slider.js"></script>
    <script src="{{asset('assets')}}/js/custom.js"></script>
</body>

</html>