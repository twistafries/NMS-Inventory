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
    
    <!-- Your custom css goes here -->
    <link rel="stylesheet"  href="{{ asset('css/custom.css') }}">

    <title>Login-FindIt</title>
</head>
<body>
    <!-- Login Card -->
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-6 col-lg-4 my-5 mx-auto">
                <div class="card card-signin my-5 main-sign-in-card">
                    <div class="card-body align-middle custom-card-sign-in yellow-divider-top">
                            <img src="../assets/images/logo/logo2.png" alt="FindIt Logo" class="responsive" width="600" height="400">
                            <h4 class="card-title text-center login-newMedia">New Media Services</h4>
                            <form action="{!! url('/login') !!}" method="post" id="loginForm">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group"><center>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email">
                                </center></div>
                                <br>
                                <div class="form-group"><center>
                                <input type="password" name="password" class="form-control" placeholder="Enter Password">
                                @if(Session::has('errorLogin'))
                                    <br><center>
                                    <small class="text-warning">{{ Session::get('errorLogin') }}</center></small>
                                @endif 
                               </center> </div>

                                <br>
                                <center><button id="saveButton" type="submit" class="btn btn-success p-2 px-3 my-1 text-uppercase text-lg-center">Log In</button></center>
                            </form>
                        </div>
                    <div class="card-footer custom-footer"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- JQuery Core -->
    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper/popper.min.js') }}"></script>
    
    <!-- Bootstrap -->
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>

    <!-- Additional JS -->
    <script type="text/javascript">
    
    </script>   

</body>

</html>