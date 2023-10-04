<!doctype html>
<html xmlns:th="http://www.thymeleaf.org">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
      rel="stylesheet" />
    <title>Admin::Popular Health Care Ltd</title>

  </head>


  <body class="bg-[#EDF7FE] font-serif">

    <!-- @include('common.alert') -->
    @include('admin.partial.header')
    <!-- nav bar -->


    @yield('content')

  </body>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.country').select2({
        theme: "classic"
      });
    });
  </script>

</html>
