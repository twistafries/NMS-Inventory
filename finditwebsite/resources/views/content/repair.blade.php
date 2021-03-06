<?php
//   use Carbon\Carbon;
//   $session=Session::get('loggedIn');
//   $user_id = $session['id'];
//   $fname = $session['fname'];
//   $lname = $session['lname'];
  // $img_path = $session['img_path'];
?>

    @extends('../template') @section('css')
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/awesome-bootstrap-checkbox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}"> @stop @section('title') Repair @stop @section('../layout/breadcrumbs') @section('breadcrumbs-title')
    <i class="fas fa-chart-line">REPAIR
    @stop
@stop

@section('content')

<div class="container-fluid">
<!--breadcrumbs navigation-->
<nav class="navbar navbar-light bg-light">
    <span class="navbar-brand mb-0 h1">FOR REPAIR</span>
    @include('content.breadcrumb_inventory')
</nav>


    <!-- Toolbox -->
    <div class="d-flex flex-row-reverse">
        <div class="p-2">
            <!-- Single Add Modal -->
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                        </div>

                        <div class="modal-body">
                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-info"> <span class="fas fa-plus"></span> ADD ITEM</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <div class="container-fluid">

                            <div class="row">
                                <div class="container-fluid">
                                <ul class="nav nav-pills nav-justified">
                                <li class="nav-item">
                                  <a class="nav-link  font-weight-bolder" href="{!! url('/repairSummary') !!}">SUMMARY</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link active font-weight-bolder" href="{!! url('/repair') !!}">REPAIR ITEMS LIST</a>
                                </li>



                              </ul>
                                    </div>
                            </div>

                        </div>
                        <hr>

    <!-- Tabs -->
    <div class="container-fluid">

        <div class="tab-content" id="pills-tabContent">
            <!-- All Items in the Inventory -->
            <div class="tab-pane fade show active" id="pills-0" role="tabpanel" aria-labelledby="pills-0-tab">
                <table id="myDataTable1" class="table table-borderless table-hover" style="width:100%">
                    <thead class="thead-dark">
                        <tr>

                            <th>ID</th>
                            <th>Brand-Model/Label</th>
                            <th>Serial No</th>
                            <th>OR No</th>
                            <th>Date Added</th>
                            <th width="15%">Date Edited</th>
                            <th>Added By</th>
                            <th>Warranty</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($for_repair as $for_repair)
                        <tr>

                            <td> Item#{{ $for_repair->id }} </td>
                            <td> {{ $for_repair->brand }} {{ $for_repair->model }} </td>
                            <td> {{ $for_repair->serial_no }} </td>
                            <td> {{ $for_repair->or_no }} </td>
                            <td> {{ $for_repair->created_at }} </td>
                            <td>{{ $for_repair->updated_at }}</td>
                            <td> {{ $for_repair->firstname}} {{ $for_repair->lastname}}  </td>
                            <td>{{ $for_repair->warranty_start}} - {{ $for_repair->warranty_end}}</td>

                        </tr>

                        @endforeach

                        @foreach ($for_repair_units as $for_repair_units)
                        <tr>

                            <td> Unit# {{ $for_repair_units->id }} </td>
                            <td> {{ $for_repair_units->name }} {{ $for_repair_units->id }}</td>
                            <td> N/A </td>
                            <td> N/A </td>
                            <td> {{ $for_repair_units->created_at }} </td>
                            <td> {{ $for_repair_units->updated_at }} </td>
                            <td> {{ $for_repair_units->firstname}} {{ $for_repair_units->lastname}}  </td>
                            <td>  </td>
                        </tr>

                        @endforeach
                    </tbody>

                </table>


        </div>
    </div>
</div>



    </div>
@stop

@section('script')

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
    $(document).ready(function(){
        $('#concerns').addClass('active');
        $('#breadcrumb_for_repair').removeClass("text-dark").addClass("text-warning");

    });
    </script>

    <!-- <script type="text/javascript">
    $(document).ready(function() {
        $('#myDataTable1').DataTable();
    } );
    </script> -->
    <script>
        $(document).ready(function() {
            $('#myDataTable1').DataTable({
                "pagingType": "full_numbers",
                responsive: true,
                "order": [[ 5, "desc" ]]
            });
        });

    </script>

@stop
