<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Login :: {!! $siteTitle !!}</title>

  <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
  <link rel="icon" href="{!! $siteFavicon ?? 'favicon.png' !!}" type="image/x-icon" />

  <!-- Fonts and icons -->
  <script src="assets/js/plugin/webfont/webfont.min.js"></script>
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
        urls: ["assets/css/fonts.min.css"],
      },
      active: function () {
        sessionStorage.fonts = true;
      },
    });
  </script>

  <!-- CSS Files -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/plugins.min.css" />
  <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />
</head>

<body style="background: url('{{ asset('assets/img/bg.jpg') }}') no-repeat center center; background-size: cover;">
  <div class="container min-vh-100 d-flex justify-content-center align-items-center">
    <div class="col-lg-10">
      <div class="card shadow-lg">
        <div class="row no-gutters">

            <!-- KIRI: Logo dan Keterangan -->
            <div class="col-lg-6 d-none d-lg-flex flex-column justify-content-center align-items-center bg-light p-4">
                <img src="{{ asset($siteLogo) }}" alt="logo" class="w-50 mb-3 rounded-circle">
                <h2 class="text-dark text-center display-2 text-uppercase">{!! $siteTitle !!}</h2>
                <p class="text-muted text-center h2">{!! $siteDescription !!}</p>
            </div>

            <!-- KANAN: Form Login -->
            <div class="col-lg-6 p-4">
            <div class="text-center">
                <h4 class="mb-4 display-2 fw-bold">Login</h4>
                <p>Gunakan alamat email dan kata sandi (password) Anda <br> untuk masuk ke dalam sistem.</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group mb-3">
                <label for="emailaddress">📧 Alamat Email</label>
                <input type="text" id="emailaddress" name="email" class="form-control form-control-lg" placeholder="Alamat email">
                @error('email')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
                </div>

                <div class="form-group mb-3">
                <label for="password">🔑 Kata Sandi</label>
                <div class="input-group input-group-merge">
                    <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Kata Sandi">
                    <div class="input-group-append" data-password="false">
                    <div class="input-group-text">
                        <span class="password-eye" style="cursor: pointer;"></span>
                    </div>
                    </div>
                </div>
                @error('password')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
                </div>

                <button class="btn btn-dark btn-lg w-100 text-uppercase" type="submit">
                <i class="fas fa-sign-in-alt mr-1"></i> Login
                </button>

                <hr>

                <p class="text-muted text-center small mt-3">Jika ada kendala saat mengakses, silahkan hubungi tim admin.</p>
            </form>
            </div>

        </div>
      </div>
    </div>
  </div>

  <!-- JS Files -->
  <script src="assets/js/core/jquery-3.7.1.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
  <script src="assets/js/kaiadmin.min.js"></script>
</body>

</html>
