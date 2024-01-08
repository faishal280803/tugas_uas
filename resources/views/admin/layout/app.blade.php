<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
  data-assets-path="{{asset('assets')}}/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Grosir FTH</title>
  <meta name="description" content="" />
  <link rel="icon" href="{{asset('favicon.ico')}}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{asset('apple-touch-icon.png')}}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon-16x16.png')}}">
  <link rel="manifest" href="{{asset('site.webmanifest')}}">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('assets')}}/vendor/fonts/boxicons.css" />
  <link rel="stylesheet" href="{{asset('assets')}}/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{asset('assets')}}/vendor/css/theme-default.css"
    class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{asset('assets')}}/css/demo.css" />
  <link rel="stylesheet" href="{{asset('assets')}}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="{{asset('assets')}}/vendor/libs/apex-charts/apex-charts.css" />
  <script src="{{asset('assets')}}/vendor/js/helpers.js"></script>
  <script src="{{asset('assets')}}/js/config.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="#" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bolder ms-2"><span class="text-capitalize">Grosir</span> <span
                class="text-uppercase">FTH</span></span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Mater Data</span>
          </li>
          <li class="menu-item {{$is_active == 'cabang' ? 'active' : ''}}">
            <a href="{{route('cabang.index')}}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Analytics">Cabang</div>
            </a>
          </li>
          <li class="menu-item {{$is_active == 'supplier' ? 'active' : ''}}">
            <a href="{{route('supplier.index')}}" class="menu-link">
              <i class="bx bx-package menu-icon"></i>
              <div data-i18n="Analytics">Supplier</div>
            </a>
          </li>
          <li class="menu-item {{$is_active == 'kategori' ? 'active' : ''}}">
            <a href="{{route('kategori.index')}}" class="menu-link">
              <i class="bx bx-category-alt menu-icon"></i>
              <div data-i18n="Analytics">Kategori</div>
            </a>
          </li>
          <li class="menu-item {{$is_active == 'produk' ? 'active' : ''}}">
            <a href="{{route('produk.index')}}" class="menu-link">
              <i class="bx bx-shopping-bag menu-icon"></i>
              <div data-i18n="Analytics">Produk</div>
            </a>
          </li>
          <li class="menu-item {{$is_active == 'pengguna' ? 'active' : ''}}">
            <a href="{{route('pengguna.index')}}" class="menu-link">
              <i class="bx bx-user-plus menu-icon"></i>
              <div data-i18n="Analytics">Pengguna</div>
            </a>
          </li>
          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Transaksi</span>
          </li>
          <li class="menu-item {{$is_active == 'masuk' ? 'active' : ''}}">
            <a href="{{route('transaksi.masuk')}}" class="menu-link">
                <i class="bx bx-cart-alt menu-icon"></i>
              <div data-i18n="Analytics">Transaksi Masuk</div>
            </a>
          </li>
          <li class="menu-item {{$is_active == 'selesai' ? 'active' : ''}}">
            <a href="{{route('transaksi.selesai')}}" class="menu-link">
              <i class="bx bx-check-circle menu-icon"></i>
              <div data-i18n="Analytics">Transaksi Selesai</div>
            </a>
          </li>
        </ul>
      </aside>
      <div class="layout-page">
        <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="{{asset('assets')}}/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="{{asset('assets')}}/img/avatars/1.png" alt
                              class="w-px-40 h-auto rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-semibold d-block">Admin</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="/logout">
                      <i class="bx bx-power-off me-2"></i>
                      <span class="align-middle">Log Out</span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            @yield('content')
          </div>
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">

            </div>
          </footer>
          <div class="content-backdrop fade"></div>
        </div>
      </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>

  <script src="{{asset('assets')}}/vendor/libs/jquery/jquery.js"></script>
  <script src="{{asset('assets')}}/vendor/libs/popper/popper.js"></script>
  <script src="{{asset('assets')}}/vendor/js/bootstrap.js"></script>
  <script src="{{asset('assets')}}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="{{asset('assets')}}/vendor/js/menu.js"></script>
  <script src="{{asset('assets')}}/vendor/libs/apex-charts/apexcharts.js"></script>
  <script src="{{asset('assets')}}/js/main.js"></script>
  <script src="{{asset('assets')}}/js/dashboards-analytics.js"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>

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
</body>

</html>