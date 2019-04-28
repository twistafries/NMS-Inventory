<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet"  href="{{ asset('css/bootstrap/bootstrap-reboot.min.css') }}">
    <link rel="stylesheet"  href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet"  href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate/animate.css') }}">

    <!-- Datatable -->
    <link rel="stylesheet" href="{{ asset('css/datatable/dataTables.bootstrap4.min.css') }}">
    <!-- Multiple Select -->
    <link rel="stylesheet" href="{{ asset('css/multipleselect/multiple-select.css') }}">

    <!-- Your custom css goes here -->
    <link rel="stylesheet"  href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet"  href="{{ asset('css/custom-table.css') }}">
    @yield('css')

    <title>@yield('title')</title>
</head>

<body onpageshow="ShowLocalDate()">
    <div class="fluid-container">
        <div class="wrapper">
            @include('layout/sidenav')

            <div id="content">
                @include('layout/topnavblade')


                <!-- Page Content -->
                <div class="container p-lg-0 p-md-1 p-sm-0">
                    @yield('content')
                </div>
            </div>

        </div>
    </div>

    <!-- JQuery Core -->
    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper/popper.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('input').attr('autocomplete','off');
      });
    </script>
    @yield('script')

</body>

</html>
