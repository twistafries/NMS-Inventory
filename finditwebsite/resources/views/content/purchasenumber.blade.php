<?php
//   use Carbon\Carbon;
//   $session=Session::get('loggedIn');
//   $user_id = $session['id'];
//   $fname = $session['fname'];
//   $lname = $session['lname'];
//   // $img_path = $session['img_path'];
?>

@extends('../template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
    <link rel="stylesheet"  href="{{ asset('css/custom.css') }}">

@stop

@section('title')
    purchasenumber
@stop

@section('../layout/breadcrumbs')
    @section('breadcrumbs-title')

    @stop
@stop

@section('content')

  <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand mb-0 h1">PURCHASE NUMBER</span>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb arr-right">
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/purchaseHistory') !!}" class="text-warning">History</a>
                    </li>
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/purchasenumber') !!}"  class="text-dark active" aria-current="page">Purchase Number</a>
                    </li>
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/ornumber') !!}" class="text-warning">OR Number</a>
                    </li>
                </ol>
            </nav>
    </nav>

<form action="" id="form1">
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

    <!-- Tabs -->
    <div class="container">

        <div class="tab-content" id="pills-tabContent">
            <!-- All Items in the Inventory -->
            <div class="tab-pane fade show active" id="pills-0" role="tabpanel" aria-labelledby="pills-0-tab">
               <table id="myDataTable1" class="table table-borderless table-hover" style="width:100%">
                    <thead class="thead-dark">
                        <tr>

                            <th>ID</th>
                            <th>Purchase No</th>
                            <th>OR No</th>
                            <th>Supplier</th>
                            <th>Date Added</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($for_repair as $for_repair)
                        <tr>

                            <td> {{ $for_repair->id }} </td>
                            <td> {{ $for_repair->or_no }} </td>
                            <td></td>
                            <td> {{ $for_repair->supplier }} </td>
                            <td> {{ $for_repair->created_at }} </td>

                        </tr>

                        @endforeach

                        @foreach ($for_repair_units as $for_repair_units)
                        <tr>

                            <td> {{ $for_repair_units->description }}  {{ $for_repair_units->id }} </td>
                            <td> No Details </td>
                            <td> None </td>
                            <td> None </td>
                            <td> None </td>
                            <td> {{ $for_repair_units->created_at }} </td>
                            <td> {{ $for_repair_units->updated_at }} </td>
                            <td> {{ $for_repair_units->firstname}} {{ $for_repair_units->lastname}}  </td>
                            <td></td>
                            <td> None </td>
                        </tr>

                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>
</div>


</form>
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
      $('#issuableItems').addClass('active');
      });
    </script>

    <!-- <script type="text/javascript">
    $(document).ready(function() {
        $('#myDataTable1').DataTable();
    } );
    </script> -->
    <script type="text/javascript">
    $(document).ready(function() {
        $('#myDataTable').DataTable();
    } );
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#myDataTable1').DataTable();
    } );
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#myDataTable2').DataTable();
    } );
    </script>

@stop
