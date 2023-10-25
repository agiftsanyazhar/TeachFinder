<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ $title }} - Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  {{-- <link href="{{ asset($aboutMe[0]['sidebar_profile'] ? 'storage/' . $aboutMe[0]['sidebar_profile'] : 'storage/upload/profile/unnamed.jpg') }}" rel="icon">
  <link href="{{ asset($aboutMe[0]['sidebar_profile'] ? 'storage/' . $aboutMe[0]['sidebar_profile'] : 'storage/upload/profile/unnamed.jpg') }}" rel="apple-touch-icon"> --}}

  <!-- Google Fonts -->
  <link rel="preconnect" href="{{ url('https://fonts.googleapis.com') }}">
  <link rel="preconnect" href="{{ url('https://fonts.gstatic.com') }}" crossorigin>
  <link href="{{ url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap') }}" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('dashboard-assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('dashboard-assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('dashboard-assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('dashboard-assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('dashboard-assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('dashboard-assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('dashboard-assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('dashboard-assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

  @include('layouts.dashboard.header')

  @include('layouts.dashboard.sidebar')

  <main id="main" class="main">

    @if (session('success'))
      <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @elseif(session('warning'))
      <div class="alert alert-warning bg-warning border-0 alert-dismissible fade show" role="alert">
        {{ session('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @elseif(session('danger'))
      <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
        {{ session('danger') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @yield('container')

  </main><!-- End #main -->

  @include('layouts.dashboard.footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('dashboard-assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('dashboard-assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('dashboard-assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('dashboard-assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('dashboard-assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('dashboard-assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('dashboard-assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('dashboard-assets/vendor/php-email-form/validate.js') }}"></script>
  
  <!-- Template Main JS File -->
  <script src="{{ asset('dashboard-assets/js/main.js') }}"></script>

  <script src="{{ url('https://code.jquery.com/jquery-3.7.0.min.js') }}" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

  <script>
    const d = new Date();
    let year = d.getFullYear();
    const yearElements = document.querySelectorAll(".yearNow");
    yearElements.forEach(element => {
      element.innerHTML = year;
    });
  </script>

</body>

</html>