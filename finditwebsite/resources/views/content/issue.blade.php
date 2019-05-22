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
    Issue
@stop

@section('../layout/breadcrumbs')
    @section('breadcrumbs-title')
    <i class="fas fa-chart-line">Issue
    @stop
@stop

@section('content')

  <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand mb-0 h1">EMPLOYEE ISSUANCE</span>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb arr-right">
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/issuance') !!}" class="text-warning">Issued Items</a>
                    </li>
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/issue') !!}" class="text-dark active" aria-current="page">Employee Issuance</a>
                    </li>
                </ol>
            </nav>
    </nav>

    <ul class="nav nav-pills p-3 nav-justified nav-fill font-weight-bold" id="pills-tab" role="tablist" style="background-color:white;">

        <li class="nav-item text-uppercase"  data-target="#departments" data-toggle="collapse">
            <a class="nav-link active" id="pills-0-tab" onclick="restore(true)" href="#pills-0" role="tab" aria-controls="pills-0" aria-selected="true" data-toggle="pill">
              Departments
            </a>
        </li>

        <li class="nav-item text-uppercase"  data-target="#" data-toggle="collapse">
        <a class="nav-link" id="pills-5-tab" href="#pills-5" role="tab" onclick="changeFilter()" aria-controls="pills-6" aria-selected="false" data-toggle="pill"> Types
        </a>
      </li>
    
      <li class="nav-item text-uppercase"  data-target="#" data-toggle="collapse">
        <a class="nav-link" id="pills-5-tab" href="#pills-5" role="tab" onclick="changeFilter()" aria-controls="pills-6" aria-selected="false" data-toggle="pill"> Number Issued
        </a>
      </li>
    </ul>

<div id="departments" class="collapse">
 <ul class="nav nav-pills p-3 nav-justified nav-fill font-weight-bold" role="tablist" style="background-color:white;">

    <li class="nav-item text-uppercase" >
            <a class="nav-link" data-toggle="tab" href="#ITDD" role="tab" aria-controls="pills-0" aria-selected="true">
              Information Technology Development Department
            </a>
        </li>
         <li class="nav-item text-uppercase" >
            <a class="nav-link" data-toggle="pill" href="#PDD" role="tab" aria-controls="pills-0" aria-selected="true">
              Production Development Department
            </a>
        </li>
         <li class="nav-item text-uppercase" >
            <a class="nav-link" data-toggle="pill" href="#FD" role="tab" aria-controls="pills-0" aria-selected="true">
              Financial Department
            </a>
        </li>
         <li class="nav-item text-uppercase" >
            <a class="nav-link" data-toggle="pill"f href="#HRD" role="tab" aria-controls="pills-0" aria-selected="true">
               Human Resources Department
            </a>
        </li>
    </ul>
  </div>


<form action="" id="form1">
    <!-- Toolbox -->
    <div class="d-flex flex-row-reverse">
        <div class="p-2">
            <!-- Single Add Modal -->
            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="viewItemModalTitle" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">

    <div class="modal-content">
       <div id ="viewItem" class="modal-header">
        <h5 class="modal-title" id="ModalTitle">Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="row">
            <div class="col-sm-3">Items Issued</div>
            <div class="col-sm-3">Issuance Date</div>
            <div class="col-sm-3">Issuance End</div>
            <div class="col-sm-3">Remove Issuance</div>
        </div>
        <div class="row">
            <div class="col-sm-3">Iphone 8</div>
            <div class="col-sm-3">01/25/2019</div>
            <div class="col-sm-3">5/26/2019</div>
            <div class="col-sm-3"><i class="fas fa-trash"></i></div>
        </div>
        <div class="row">
            <div class="col-sm-3">Macbook</div>
            <div class="col-sm-3">01/25/2019</div>
            <div class="col-sm-3">5/26/2019</div>
            <div class="col-sm-3"><i class="fas fa-trash"></i></div>
        </div>
        <div class="row">
            <div class="col-sm-3">PC03</div>
            <div class="col-sm-3">01/25/2019</div>
            <div class="col-sm-3">5/26/2019</div>
            <div class="col-sm-3"><i class="fas fa-trash"></i></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
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
            <div class="container tab-pane active" id="ITDD" role="tabpanel" aria-labelledby="pills-0-tab">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
              
                        <th scope="col">Name</th>
                        <th scope="col">ID</th>
              
                    </tr>
                    </thead>
                <tbody>
                    <tr data-toggle="modal" data-target="#modal">
                        <th>Justine Garcia</th>
                        <td>1</td>
                    </tr>
                    <tr data-toggle="modal" data-target="#modal">
                        <th>Lovelyn Paris</th>
                        <td>2</td>
                    </tr>
                    <tr data-toggle="modal" data-target="#modal">
                        <th>Aika Vien Dayrit</th>
                        <td>3</td>
                    </tr>
                </tbody>
                </table>

                </div>


                <div id="PDD" class="container tab-pane fade">
                <table class="table">
                    <thead class="thead-dark">
                        <tr data-toggle="modal" data-target="#modal">
              
                        <th scope="col">Name</th>
                        <th scope="col">ID</th>
              
                    </tr>
                    </thead>
                <tbody>
                    <tr data-toggle="modal" data-target="#modal">
                        <th>Jake Peralta</th>
                        <td>1</td>
                    </tr>
                    <tr data-toggle="modal" data-target="#modal">
                        <th>Lovelyn Paris</th>
                        <td>2</td>
                    </tr>
                    <tr data-toggle="modal" data-target="#modal">
                        <th>Aika Vien Dayrit</th>
                        <td>3</td>
                    </tr>
                </tbody>
                </table>
                </div>

                 <div id="FD" class="container tab-pane fade">
                <table class="table">
                    <thead class="thead-dark">
                        <tr data-toggle="modal" data-target="#modal">
                        <th scope="col">Name</th>
                        <th scope="col">ID</th>
              
                    </tr>
                    </thead>
                <tbody>
                    <tr data-toggle="modal" data-target="#modal">
                        <th>Justine Garcia</th>
                        <td>2</td>
                    </tr>
                    <tr data-toggle="modal" data-target="#modal">
                        <th>Lovelyn Paris</th>
                        <td>2</td>
                    </tr>
                    <tr data-toggle="modal" data-target="#modal">
                        <th>Aika Vien Dayrit</th>
                        <td>3</td>
                    </tr>
                </tbody>
                </table>
                </div> 

                 <div id="HRD" class="container tab-pane fade">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
              
                        <th scope="col">Name</th>
                        <th scope="col">ID</th>
              
                    </tr>
                    </thead>
                <tbody>
                    <tr data-toggle="modal" data-target="#modal">
                        <th>Justine Garcia</th>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th>Lovelyn Paris</th>
                        <td>2</td>
                    </tr>
                    <tr>
                        <th>Aika Vien Dayrit</th>
                        <td>3</td>
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
