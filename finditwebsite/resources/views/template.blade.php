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
    <style>
        /* Center the loader */
        </style>
    @yield('css')
    <link rel="stylesheet"  href="{{ asset('css/loader.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/logoicon1.png') }}" />

    <title>@yield('title')</title>
</head>

<body onload="myFunction()" >
<div id="loader"></div>


    <div class="fluid-container bg-light" id="initial">
        <div class="wrapper">
            @include('layout/sidenav')

            <div id="content">
                @include('layout/topnavblade')


                <!-- Page Content -->
                <div class="container-fluid">
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

    <script>
        $('#sidebarCollapse').click(function() {
            $("i", this).toggleClass("fas fa-chevron-left fas fa-chevron-right");
        });
    </script>

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
    <script>
        var myVar;

        function myFunction() {
            myVar = setTimeout(showPage, 1500);
        }

        function showPage() {
            document.getElementById("loader").style.display = "none";
            document.getElementById("initial").style.display = "block";
        }
    </script>
</body>

</html>
