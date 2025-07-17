<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>{{ $siteTitle ?? env('APP_NAME') }}</title>

  <!-- Tag Meta -->
  <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />

  <link rel="icon" href="{!! asset($siteFavicon) ?? asset('assets/img/logo-lbh.png') !!}" type="image/x-icon" />

  <!-- Fonts and icons -->
  <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
  <script>
    WebFont.load({
      google: { families: ["Public Sans:300,400,500,600,700"] },
      custom: {
        families: [
          "Font Awesome 5 Solid",
          "Font Awesome 5 Regular",
          "Font Awesome 5 Brands",
          "simple-line-icons",
        ],
        urls: ["{{ asset('assets/css/fonts.min.css') }}"],
      },
      active: function () {
        sessionStorage.fonts = true;
      },
    });
  </script>

  <!-- Meta Tags -->

  <!-- CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/plugins.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/kaiadmin.min.css') }}" />

  <!-- Integrasi file JavaScript -->
  <!-- Integrasi file CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

  <!-- Tambahan CSS dari konten -->
  @yield('additionalHeadScripts')
</head>

<body>

  <div class="wrapper">

    <!-- Komponen sidebar -->
    <x-sidebar />

    <div class="main-panel">

      <!-- Komponen header -->
      <x-header />
      
      <!-- Komponen konten utama -->
      @yield('content')
      
      <!-- Komponen footer -->
      <x-footer />

    </div>

  </div>
  <!-- end wrapper -->

  <!-- Integrasi file JavaScript -->
  <script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

  <!-- jQuery Scrollbar -->
  <script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

  <!-- Chart JS -->
  <script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }}"></script>

  <!-- jQuery Sparkline -->
  <script src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

  <!-- Chart Circle -->
  <script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js') }}"></script>

  <!-- Datatables -->
  <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>

  <!-- Bootstrap Notify -->
  <script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

  <!-- jQuery Vector Maps -->
  <script src="{{ asset('assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugin/jsvectormap/world.js') }}"></script>

  <!-- Google Maps Plugin -->
  <script src="{{ asset('assets/js/plugin/gmaps/gmaps.js') }}"></script>

  <!-- Sweet Alert -->
  <script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

  <!-- Kaiadmin JS -->
  <script src="{{ asset('assets/js/kaiadmin.min.js') }}"></script>

  <!-- Tambahan JavaScript dari konten -->
  @stack('scripts')

</body>

</html>
