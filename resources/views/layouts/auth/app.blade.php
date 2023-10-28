<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ $title }} - TeachFinder</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


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

  <main>
    <div class="container">

      @yield('container')

    </div>
  </main><!-- End #main -->

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

</body>

</html>