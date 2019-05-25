<?php
  use Carbon\Carbon;
  $session=Session::get('loggedIn');
  $user_id = $session['id'];
  $fname = $session['fname'];
  $lname = $session['lname'];
  // $img_path = $session['img_path'];
?>

    @extends('../template') @section('css')
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}"> @stop @section('title') Dashboard @stop @section('content')

    <!--  -->
    <div class="container">
      <div class="row card-row pl-0">
        <div class="col-4 p-1">
            <div class="card">
                <div class="card-header text-white mb-3" id="card-header"><i class="far fa-check-circle"></i> Total Available Units </div>
                <h4>
                    <center>10</center>
                </h4>
                <div class="card-body p-0">


                    <div class="card p-3">
                        <table class="table table-borderless text-justify text-break">
                            <tbody>
                                <th></th>
                                <th></th>
                                <th></th>
                                <tr>
                                    <td>
                                        <h6>Available System Units</h6>
                                    </td>
                                    <td class="text-justify">5</td>
                                    <td><button type="button" class="btn btn-primary btn-sm">View more</button></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6>Available Mobile Phones</h6>
                                    </td>
                                    <td class="text-justify">5</td>
                                    <td><button type="button" class="btn btn-primary btn-sm">View more</button></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6>Available Laptops</h6>
                                    </td>
                                    <td class="text-justify">5</td>
                                    <td><button type="button" class="btn btn-primary btn-sm">View more</button></td>
                                </tr>

                            </tbody>

                        </table>
                        <button type="button" class="btn btn-light btn-sm">View all</button>
                    </div>


                </div>
            </div>
        </div>

        <div class="col-4 p-1">
            <div class="card">
                <div class="card-header text-white mb-3" id="card-header"><i class="fas fa-tools"></i> Total Items in Repair</div>
                <h4>
                    <center>10</center>
                </h4>
                <div class="card-body p-0">
                    <div class="card p-3">
                        <table class="table table-borderless text-justify text-break">
                            <tbody>
                                <th></th>
                                <th></th>
                                <th></th>
                                <tr>
                                    <td>
                                        <h6>System Units</h6>
                                    </td>
                                    <td class="text-justify">5</td>
                                    <td><button type="button" class="btn btn-primary btn-sm">View more</button></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6>Mobile Phones</h6>
                                    </td>
                                    <td class="text-justify">5</td>
                                    <td><button type="button" class="btn btn-primary btn-sm">View more</button></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6>Laptops</h6>
                                    </td>
                                    <td class="text-justify">5</td>
                                    <td><button type="button" class="btn btn-primary btn-sm">View more</button></td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-light btn-sm">View All</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 p-1">
            <div class="card">
                <div class="card-header text-white mb-3" id="card-header"><i class="fas fa-cash-register"></i> Total Purchases This Month</div>
                <div class="card-body ">
                </div>
            </div>
        </div>
        <div class="col-4 p-1">
            <div class="card">
                <div class="card-header text-white mb-3" id="card-header"><i class="fas fa-shopping-cart"></i> Incoming Purchases</div>
                <div class="card-body ">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Purchase #1</li>
                        <li class="list-group-item">Purchase #2</li>
                        <li class="list-group-item">Purchase #3</li>
                        <li class="list-group-item">Purchase #4</li>
                        <button type="button" class="btn btn-light btn-sm">View all</button>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-4 p-1">
            <div class="card">
                <div class="card-header text-white mb-3" id="card-header"> Incomplete Orders</div>
                <div class="card-body ">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Order #1</li>
                        <li class="list-group-item">Order #2</li>
                        <li class="list-group-item">Order #3</li>
                        <li class="list-group-item">Order #4</li>
                        <button type="button" class="btn btn-light btn-sm">View all</button>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-4 p-1">
            <div class="card">
                <div class="card-header text-white mb-3" id="card-header"><i class="fas fa-exchange-alt"></i> Items Returned</div>
                <div class="card-body ">
                </div>
            </div>
        </div>
    </div>



    <div class="row card-row pl-0">
        <div class="col-6 p-1">
            <div class="card">
                <div class="card-header text-white mb-3" id="card-header"> Zero Availability Items </div>
                <h4>
                    <center>10</center>
                </h4>

            </div>
        </div>

         <div class="col-6 p-1">
            <div class="card">
                <div class="card-header text-white mb-3" id="card-header"> Low Availability Items </div>
                <h4>
                    <center>10</center>
                </h4>
            </div>
        </div>
    </div>
</div>

<br>


    @stop @section('script')

    <!-- Datatable -->
    <script type="text/javascript" src="{{ asset('js/datatable/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/datatable/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/datatable/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Multiple Select -->
    <script src="{{ asset('js/multipleselect/multiple-select.js') }}"></script>

    <!-- Additional Scripts   -->
    <script type="text/javascript" src="{{ asset('js/datatable/dataTables.select.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/datatable/dataTables.checkboxes.min.js') }}"></script>


    <script>
        $(document).ready(function() {
            $('#dashboard').addClass('active');
        });

    </script>

    @stop
