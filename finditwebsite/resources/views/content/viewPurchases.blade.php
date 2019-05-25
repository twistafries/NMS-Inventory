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
    viewPurchases
@stop

@section('../layout/breadcrumbs')
    @section('breadcrumbs-title')

    @stop
@stop

@section('content')
<div class="container">
  <!-- <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand mb-0 h1">PURCHASES</span>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb arr-right">
                <li class="breadcrumb-item ">
                        <a href="{!! url('/purchaseHistory') !!}"  class="text-dark active" aria-current="page">History</a>
                    </li>
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/purchasenumber') !!}" class="text-warning">Purchase Number</a>
                    </li>
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/ornumber') !!}" class="text-warning">OR Number</a>
                    </li>
                </ol>
            </nav>
    </nav> -->

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

    <ul class="nav nav-pills p-3 nav-justified nav-fill font-weight-bold" id="pills-tab" role="tablist" style="background-color:white;">
        <li class="nav-item text-uppercase" >
          <a class="nav-link" href="{!! url('/purchases') !!}">Completed Orders and Purchases</a>
        </li>
        <li class="nav-item text-uppercase">
          <a class="nav-link active" href="{!! url('/viewPurchases') !!}">View Purchases</a>
        </li>
    </ul>

    <!--Tab Content-->
    <!-- <div class="text-right">
      <button type="button" id="print" onclick="printContent('sample');" class="btn btn-info p-2" style="margin-top: 2rem;" data-toggle="modal" data-target="#purchasesmodal">
        <span class="fas fa-plus-circle" style="padding-right: 5px"></span>NEW PURCHASE
      </button>
    </div> -->

      <nav class="navbar navbar-light bg-light row" style="margin-top: 4rem; margin-left: 0.1rem; margin-right: 0.1rem;">
          <span class="navbar-brand mb-0 h1 col-3" style="font-size: 20px;">Purchase #1</span>
          <span class="navbar-brand mb-0 h1 col-3" style="font-size: 20px;">Supplier: Octagon</span>
          <span class="navbar-brand mb-0 h1 col-3" style="font-size: 20px;">Date Purchase: 2/24/2019</span>
      </nav>


      <!-- purchases modal -->
      <div class="modal fade" id="purchasesmodal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document" style=" width: 1000px;">
              <div class="modal-content">
                  <div class="modal-header">
                      <div class="container">
                          <h5>Add Purchase</h5>
                      </div>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>

                  <div class="modal-body">
                      <div class="container-fluid">
                      </div>
                  </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal">Close</button>
                  </div>
              </div>
          </div>
      </div>


    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-0" role="tabpanel" aria-labelledby="pills-0-tab">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Brand</th>
              <th scope="col">Name</th>
              <th scope="col">Category</th>
              <th scope="col">Type</th>
              <th scope="col">Subtype</th>
              <th scope="col">Qty</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>ASUS</th>
              <td></td>
              <td>Computer Computer</td>
              <td>Hardware</td>
              <td>Keyboard</td>
              <td>10</td>
              <td></td>
            </tr>
            <tr>
              <th>Logitech</th>
              <td></td>
              <td>Computer Peripherals</td>
              <td>Hardware</td>
              <td>Mouse</td>
              <td>10</td>
              <td></td>
            </tr>
            <tr>
              <th>ASUS</th>
              <td></td>
              <td>Computer Computer</td>
              <td>Hardware</td>
              <td>Keyboard</td>
              <td>10</td>
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
      $('#purchases').addClass('active');
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
