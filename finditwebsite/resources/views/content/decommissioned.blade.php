<?php
//   use Carbon\Carbon;
//   $session=Session::get('loggedIn');
//   $user_id = $session['id'];
//   $fname = $session['fname'];
//   $lname = $session['lname'];
  // $img_path = $session['img_path'];
?>

@extends('../template')

@section('css')
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
@stop

@section('title')
    Decommissioned
@stop

@section('../layout/breadcrumbs')
    @section('breadcrumbs-title')

    @stop
@stop

@section('content')


<nav class="navbar navbar-light bg-light">
    <span class="navbar-brand mb-0 h1">DECOMMISSIONED</span>
    @include('content.breadcrumb_inventory')
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
    <div class="container-fluid">

        <div class="tab-content" id="pills-tabContent">
            <!-- All Items in the Inventory -->
            <div class="container-fluid card" style="padding: 1rem; margin-top: 1rem; margin-bottom: 1rem; color: #333;">
              <h5 style="font-weight: bold; margin-bottom: 2rem; margin-top: 1rem;">INVENTORY COMPONENTS</h5>

            <div class="tab-pane fade show active" id="pills-0" role="tabpanel" aria-labelledby="pills-0-tab">
                  <table id="myDataTable2" class="table table-borderless table-hover" style="width:100%">
                          <thead class="thead-dark">
                              <tr>
                                  <th>ID</th>
                                  <th>Name</th>
                                  <th>Details</th>
                                  <th>Serial No</th>
                                  <th>OR No</th>
                                  <th>Date Added</th>
                                  <th width="15%">Edited At</th>
                                  <th>Edited By</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($decommissioned as $decommissioned)
                              <tr>
                                  <td> {{ $decommissioned->id }} </td>
                                  <td> {{ $decommissioned->brand }} {{ $decommissioned->model }} </td>
                                  <td width="30%"> {{ $decommissioned->details }} </td>
                                  <td> {{ $decommissioned->serial_no }} </td>
                                  <td> {{ $decommissioned->or_no }} </td>
                                  <td> {{ $decommissioned->created_at }} </td>
                                  <td> {{ $decommissioned->updated_at }} </td>
                                  <td> {{ $decommissioned->firstname}} {{ $decommissioned->lastname}}  </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>


              <div class="container-fluid card" style="padding: 1rem; margin-top: 1rem; margin-bottom: 1rem; color: #333;">
                <h5 style="font-weight: bold; margin-bottom: 2rem; margin-top: 1rem;">SYSTEM UNIT</h5>
                  <table id="myDataTable" class="table table-borderless table-hover" style="width:100%;cursor:pointer;">
                     <thead class="thead-dark">
                         <tr>
                             <th>ID</th>
                             <th>Name</th>
                             <th>Status</th>
                             <th>Issued To</th>
                             <th>Department</th>
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
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
        $('#concerns').addClass('active');
        $('#breadcrumb_decommissioned').removeClass("text-dark").addClass("text-warning");
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
    <script type="text/javascript">
    $(document).ready(function() {
        $('#myDataTable3').DataTable();
    } );
    </script>

@stop
