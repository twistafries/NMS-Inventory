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

        <li class="nav-item text-uppercase"  data-target="#departments" data-toggle="">
            <a class="nav-link active" id="pills-0-tab" onclick="restore(true)" href="#pills-0" role="tab" aria-controls="pills-0" aria-selected="true" data-toggle="pill">
              Departments
            </a>
        </li>

    </ul>

<div id="departments" class="">
 <ul class="nav nav-pills p-3 nav-justified nav-fill font-weight-bold" role="tablist" style="background-color:white;">

    <li class="nav-item text-uppercase" >
            <a class="nav-link active" data-toggle="tab" href="#ITDD" role="tab" aria-controls="pills-0" aria-selected="true">
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
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home">Issued Items</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#issueItems">Issue Items</a>
            </li>
        </ul>
        <div class="tab-content">
        <div id="home" class="container tab-pane active"><br>
            <table class="table" id="myTable">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Items Issued</th>
                        <th scope="col">Issuance Date</th>
                        <th scope="col">Issuance End</th>
                        <th scope="col">Remove Issuance</th>

                    </tr>
                    </thead>
                <tbody>
                    <tr>
                        <td>Iphone 8</td>
                        <td>01/25/2019</td>
                        <td>5/26/2019</td>
                        <td><input type="button" value="Delete" onclick="deleteRow(this)"></td>
                    </tr>
                    <tr>
                        <td>Macbook</td>
                        <td>01/25/2019</td>
                        <td>5/26/2019</td>
                        <td><input type="button" value="Delete" onclick="deleteRow(this)"></td>
                    </tr>
                    <tr>
                       <td>PC10</td>
                        <td>01/25/2019</td>
                        <td>5/26/2019</td>
                        <td><input type="button" value="Delete" onclick="deleteRow(this)"></td>
                    </tr>
                </tbody>
                </table>
            </div>


    <div id="issueItems" class="container tab-pane fade"><br>

      <h4><button id="addMore" type="button" class="btn btn-warning btn-xs" onclick='add()'> <span class="fas fa-plus"></span>     ADD ITEMS</button></h4>

            <table class="table" id="addMoreList">
                        <tbody>
                        </tbody>
            </table>
            <br>
        </div>
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


            <div class="container tab-pane active" id="ITDD" role="tabpanel" aria-labelledby="pills-0-tab">
                <h4>Information Technology Development Department</h4>
                <table class="table" >
                    <thead class="thead-dark">
                        <tr>

                        <th scope="col">Name</th>
                        <th scope="col">ID</th>
                        <th scope="col">Number Issued</th>

                    </tr>
                    </thead>
                <tbody>
                    <tr data-toggle="modal" data-target="#modal">
                        <th>Justine Garcia</th>
                        <td>1</td>
                        <td>6</td>
                    </tr>
                    <tr data-toggle="modal" data-target="#modal">
                        <th>Lovelyn Paris</th>
                        <td>2</td>
                        <td>5</td>
                    </tr>
                    <tr data-toggle="modal" data-target="#modal">
                        <th>Aika Vien Dayrit</th>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                </tbody>
                </table>

                </div>


                <div id="PDD" class="container tab-pane fade">
                <h4>Production Development Department</h4>
                <table class="table">
                    <thead class="thead-dark">
                        <tr data-toggle="modal" data-target="#modal">

                        <th scope="col">Name</th>
                        <th scope="col">ID</th>
                        <th scope="col">Number Issued</th>

                    </tr>
                    </thead>
                <tbody>
                    <tr data-toggle="modal" data-target="#modal">
                        <th>Jake Peralta</th>
                        <td>1</td>
                        <td>3</td>
                    </tr>
                    <tr data-toggle="modal" data-target="#modal">
                        <th>Lovelyn Paris</th>
                        <td>2</td>
                        <td>4</td>
                    </tr>
                    <tr data-toggle="modal" data-target="#modal">
                        <th>Aika Vien Dayrit</th>
                        <td>3</td>
                        <td>6</td>
                    </tr>
                </tbody>
                </table>
                </div>

                 <div id="FD" class="container tab-pane fade">
                <h4>Financial Department Department</h4>
                <table class="table">
                    <thead class="thead-dark">
                        <tr data-toggle="modal" data-target="#modal">
                        <th scope="col">Name</th>
                        <th scope="col">ID</th>
                        <th scope="col">Number Issued</th>

                    </tr>
                    </thead>
                <tbody>
                    <tr data-toggle="modal" data-target="#modal">
                        <th>Justine Garcia</th>
                        <td>2</td>
                        <td>6</td>
                    </tr>
                    <tr data-toggle="modal" data-target="#modal">
                        <th>Lovelyn Paris</th>
                        <td>2</td>
                        <td>6</td>
                    </tr>
                    <tr data-toggle="modal" data-target="#modal">
                        <th>Aika Vien Dayrit</th>
                        <td>3</td>
                        <td>6</td>
                    </tr>
                </tbody>
                </table>
                </div>

                 <div id="HRD" class="container tab-pane fade">
                <h4>Human Resources Department</h4>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>

                        <th scope="col">Name</th>
                        <th scope="col">ID</th>
                        <th scope="col">Number Issued</th>

                    </tr>
                    </thead>
                <tbody>
                    <tr data-toggle="modal" data-target="#modal">
                        <th>Justine Garcia</th>
                        <td>3</td>
                        <td>6</td>
                    </tr>
                    <tr>
                        <th>Lovelyn Paris</th>
                        <td>2</td>
                        <td>6</td>
                    </tr>
                    <tr>
                        <th>Aika Vien Dayrit</th>
                        <td>3</td>
                        <td>6</td>
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

<script>
function deleteRow(r) {
  var i = r.parentNode.parentNode.rowIndex;
  document.getElementById("myTable").deleteRow(i);
}
</script>

<script>function rm() {
  $(event.target).closest("tr").remove();
}

function add() {
                $('#addMoreList > tbody:last-child').append("<tr><div class=\"row\"><td><div class=\"col-md-0\"><input list=\"items\" name=\"items\" id=\"inputItems\"></div></td><td><div class=\"col-xl-11\"><input name=\"issued_until\" type=\"date\" class=\"form-control\"></div></td><td><div class=\"col-sm-0\"><button onclick='rm()'>remove</button></td></div></div></tr><br>");
            }
    </script>




@stop
