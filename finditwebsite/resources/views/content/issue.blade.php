<?php
  use Carbon\Carbon;
  $session=Session::get('loggedIn');
  $user_id = $session['id'];
  $fname = $session['fname'];
  $lname = $session['lname'];
  // $img_path = $session['img_path'];
?>

@extends('../template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
    <link rel="stylesheet"  href="{{ asset('css/custom.css') }}">

@stop

@section('title')
    Employee Issuance
@stop

@section('../layout/breadcrumbs')
    @section('breadcrumbs-title')
    <i class="fas fa-chart-line">Employee Issuance
    @stop
@stop

@section('content')
@if(Session::has('error'))
<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Error</h4>
    {{ Session::get('error') }}

    @if(Session::has('error_info'))
    <a class="btn btn-fail" data-toggle="collapse" href="#errorInfoCollapse" role="button" aria-expanded="false"
        aria-controls="multiCollapseExample1"> <span>▶</span> </a>
    <!-- <span class="glyphicon glyphicon-chevron-down"></span> -->


    <div class="collapse multi-collapse" id="errorInfoCollapse">
        <div class="container">
            <small>{{ Session::get('error_info') }}</small>
        </div>
    </div>
    @endif
    @if(Session::has('target') !== null)
    <a class="alert-link" data-toggle="modal" data-target="{!! Session::get('target') !!}" href="#">Please try again</a>
    @endif
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(Session::has('message'))
<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Success</h4>
    {{ Session::get('message') }}

    @if(Session::has('data'))
    {{ Session::get('message') }}
    @endif
    @if(Session::has('eq_id'))
    <a class="btn btn-success" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false"
        aria-controls="multiCollapseExample1"> <span class="glyphicon glyphicon-chevron-down"></span></a>
    <br>
    <div class="collapse multi-collapse" id="multiCollapseExample1">
        <div class="container">
            ID: {{ Session::get('eq_id') }} <br>
            Brand: {{ Session::get('brand') }} <br>
            Model: {{ Session::get('model') }} <br>
            Details: {{ Session::get('details') }} <br>
            Serial Number: {{ Session::get('serial_no') }} <br>
            IMEI or Physical Address: {{ Session::get('imei') }} <br>
            OR: {{ Session::get('or_no') }} <br>
            Warranty Start: {{ Session::get('warranty_start') }} <br>
            Warranty End: {{ Session::get('warranty_end') }} <br>
        </div>
    </div>

    @endif
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
  <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand mb-0 h1">EMPLOYEE ISSUANCE</span>
            <nav aria-label="breadcrumb" style="font-size:23px; font-weight:bold;">
                <ol class="breadcrumb arr-right">
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/issuance') !!}" class="text-dark active" aria-current="page">Issued Items</a>
                    </li>
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/issue') !!}" class="text-warning">Employee Issuance</a>
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

    <!-- Toolbox -->
    <div class="d-flex flex-row-reverse">
        <div class="p-2">
            <!-- Single Add Modal -->
        @foreach ($employee_with_issuance as $employee)

        <div class="modal fade" id="issuance{{$employee->id}}" tabindex="-1" role="dialog" aria-labelledby="viewItemModalTitle" aria-hidden="true">

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
                <a class="nav-link active" data-toggle="tab" href="#home{{$employee->id}}">Issued Items</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#issueItems{{$employee->id}}">Issue Items</a>
            </li>
        </ul>

        <div class="tab-content">
        <div id="home{{$employee->id}}" class="container tab-pane active"><br>
            <table class="myTable" id="myTable1">
                    <thead class="thead-dark" style="background: #282828; color: #eee;">
                        <tr>
                        <th scope="col">Items Issued</th>
                        <th scope="col">Subtype</th>
                        <th scope="col">Issuance Date</th>
                        <th scope="col">Issued Until</th>
                        <th scope="col">Actions</th>

                    </tr>
                    </thead>
                <tbody>
                  @foreach ($issued[$employee->id] as $item)
                  @if($item->issued_until < Carbon::today() && $item->issued_until != null )
                        <tr class="table-danger">
                  @else
                        <tr>
                  @endif
                        @if ($item->model !=null)
                        <td>{{ $item->model}} {{ $item->brand}} {{ $item->unit_name }} {{ $item->pc_number }}</td>
                        <td>{{ $item->subtype}}</td>
                        @endif
                        @if ($item->model ==null)
                        <td>{{ $item->model}} {{ $item->brand}} {{ $item->unit_name }} {{ $item->pc_number }}</td>
                        <td>System Unit</td>
                        @endif
                        <td>{{ $item->created_at}}</td>
                        <td>
                        {{ $item->issued_until }}
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <form action="{!! url('/update-issuance'); !!}" method="post">
                                {!! csrf_field() !!}
                                <input type="hidden" name="issuance_id" value="{!! $item->id !!}">
                                <input type="hidden" name="issued_to" value="{!! $employee->id !!}">
                                <input type="hidden" name="status_id" value="1">
                                @if($item->equipment_id == null)
                                    <input type="hidden" name="unit_id" value="{!! $item->pc_number !!}">
                                @else
                                    <input type="hidden" name="equipment_id" value="{!! $item->equipment_id !!}">
                                @endif
                                <button class="btn btn-success rounded btn-sm" type="submit" onclick="deleteRow(this)"><i class="fas fa-check"></i> Make Available</button>
                                </form>
                                <!-- <button class="btn btn-success" type="submit" onclick="deleteRow(this)">Make Available</button> -->
                                <button type="button" class="btn btn-warning rounded btn-sm" onclick="deleteRow(this)" data-toggle="modal" data-target="#repair-{!! $item->id !!}"><i class="fas fa-tools"></i>Repair</button>
                                <!-- <button class="btn btn-warning" type="submit" value="" onclick="deleteRow(this)" data-toggle="modal" data-target="#repair-{!! $item->id !!}"> Repair</button> -->
                                <button type="button" class="btn btn-secondary rounded btn-sm" onclick="deleteRow(this)" data-toggle="modal" data-target="#decommission-{!! $item->id !!}"><i class="fas fa-trash-alt"></i> Decommission</button>
                                <!-- <button class="btn btn-dark" type="submit" value="" onclick="deleteRow(this)">Decommission</button> -->
                                <button type="button" class="btn btn-info rounded btn-sm" onclick="deleteRow(this)" data-toggle="modal" data-target="#missing-{!! $item->id !!}">Missing</button>

                            </div>
                        </td>
                <!-- For Repair Modal -->
                        <div class="modal fade" id="repair-{!! $item->id !!}" tabindex="-1" role="dialog"
                            aria-labelledby="edit-{!! $item->model !!}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content" style="height:450px;">
                                    <div class="modal-header">
                                        @if( $item->equipment_id != null )
                                            <h5 class="modal-title">For Repair {{ $item->model }} {{ $item->brand }} {{ $item->subtype }}</h5>
                                        @elseif($item->pc_number != null)
                                        <h5 class="modal-title">For Repair {{ $item->pc_number }} {{ $item->unit_name }}</h5>
                                        @endif
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <form action="{!! url('/update-issuance'); !!}" method="post">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="issuance_id" value="{!! $item->id !!}">
                                            <input type="hidden" name="issued_to_concerns" value="{!! $employee->id !!}">
                                            <input type="hidden" name="status_id" value="3">
                                            @if($item->equipment_id != null)
                                            <input type="hidden" name="equipment_id" value="{!! $item->equipment_id !!}">
                                            @elseif($item->pc_number != null)
                                            <input type="hidden" name="unit_id" value="{!! $item->pc_number !!}">
                                            @endif
                                            <div class="col-sm-12">
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        <h6 class="text-uppercase">Remarks:</h6>
                                                        <textarea name="remarks" placeholders="Remarks"></textarea>

                                                    </li>
                                                </ul>
                                            </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary text-uppercase">Save Changes</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                <!-- Decommission -->
                        <div class="modal fade" id="decommission-{!! $item->id !!}" tabindex="-1" role="dialog"
                            aria-labelledby="edit-{!! $item->model !!}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content" style="height:450px;">
                                    <div class="modal-header">
                                        @if( $item->equipment_id != null )
                                            <h5 class="modal-title">Decommission {{ $item->model }} {{ $item->brand }} {{ $item->subtype }}</h5>
                                        @else
                                        <h5 class="modal-title">Decommission {{ $item->pc_number }} {{ $item->unit_name }}</h5>
                                        @endif
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{!! url('/update-issuance'); !!}" method="post">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="issuance_id" value="{!! $item->id !!}">
                                            <input type="hidden" name="issued_to" value="{!! $employee->id !!}">
                                            <input type="hidden" name="status_id" value="7">
                                            @if($item->equipment_id != null)
                                            <input type="hidden" name="equipment_id" value="{!! $item->equipment_id !!}">
                                            @else
                                            <input type="hidden" name="unit_id" value="{!! $item->pc_number !!}">
                                            @endif
                                            <div class="col-sm-12">
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        <h6 class="text-uppercase">Remarks:</h6>
                                                        <textarea name="remarks" placeholders="Remarks"></textarea>

                                                    </li>
                                                </ul>
                                            </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary text-uppercase">Save Changes</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                    <!-- missing modal -->
                    <div class="modal fade" id="missing-{!! $item->id !!}" tabindex="-1" role="dialog"
                        aria-labelledby="edit-{!! $item->model !!}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" style="height:450px;">
                                <div class="modal-header">
                                    @if( $item->equipment_id != null )
                                        <h5 class="modal-title">Missing Item: {{ $item->model }} {{ $item->brand }} {{ $item->subtype }}</h5>
                                    @else
                                    <h5 class="modal-title">Missing Unit: {{ $item->pc_number }} {{ $item->unit_name }}</h5>
                                    @endif
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{!! url('/update-issuance'); !!}" method="post">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="issuance_id" value="{!! $item->id !!}">
                                        <input type="hidden" name="issued_to" value="{!! $employee->id !!}">
                                        <input type="hidden" name="status_id" value="7">
                                        @if($item->equipment_id != null)
                                        <input type="hidden" name="equipment_id" value="{!! $item->equipment_id !!}">
                                        @else
                                        <input type="hidden" name="unit_id" value="{!! $item->pc_number !!}">
                                        @endif
                                        <div class="col-sm-12">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <h6 class="text-uppercase">Remarks:</h6>
                                                    <textarea name="remarks" cols="50">Item missing, due for replacement. Last User: {{$employee->fname}} {{$employee->lname}} (ID:{{$employee->id}})</textarea>

                                                </li>
                                            </ul>
                                        </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary text-uppercase">Save Changes</button>
                                    </form>
                                    <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </tbody>
                </table>
            </div>

    <div id="issueItems{{$employee->id}}" class="container tab-pane fade"><br>
      <form action="{!! url('/addIssuance'); !!}" enctype="multipart/form-data"  method="post"  role="form">
          {!! csrf_field() !!}
      <h4><button id="addMore" type="button" class="btn btn-warning btn-xs" onclick='add()'> <span class="fas fa-plus"></span>     ADD ITEMS</button></h4>

          <input name="issued_to" value="{{ $employee->fname}} {{ $employee->lname}} (ID: {{ $employee->id}})" hidden>
            <table class="table" id="addMoreList">
                <datalist id="items">
                  <select>
                  @foreach ($eqp as $equipment)
                  <option value="{{ $equipment->model}} {{ $equipment->brand}}  (ID: {{$equipment->id}})">({{ $equipment->subtype}}</option>
                  @endforeach
                  @foreach ($pc as $units)
                  <option value="{{ $units->name}}  (ID: {{ $units->id}}) (System Unit)">(System Unit)</option>
                  @endforeach
                  </select>
                </datalist>
                <thead>

                        <tbody>
                          <tr>
                            <td>Select Item/s</td>
                            <td>Issued Until</td>
                            <td></td>
                          </tr>
                          <tr>
                            <td><input class=form-control autocomplete='off' list="items" name="items[]" id="inputItems" required></td>
                            <td><input name="issued_date[]" type="date" class="form-control"></td>
                          </td><td>
                          </tr>
                        </tbody>
            </table>
            <br>
            <div class="row">

                <div class="col">
                    <label for="details">Remarks:</label>
                    <div class="input-group mb-1">
                        <textarea maxlength="50" rows="4" cols="50" name="remarks" class="form-control" aria-label="With textarea" style="border-style: solid; border-width: 1px;"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-uppercase">
                <button type="submit" class="btn btn-info">Add</button>

            </div>
              </form>
        </div>
        </div>



        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Issue items</button>
      </div>

    </div>
  </div>
    @endforeach
        </div>
    </div>

    <!-- Tabs -->
    <div class="container-fluid">
        <div class="tab-content" id="pills-tabContent">

            <div class="tab-pane active" id="ITDD" role="tabpanel" aria-labelledby="pills-0-tab">
                <h4>Information Technology Development Department</h4>
                <table class="table table-hover" id="myDataTable" style="width:100%;cursor:pointer;">
                    <thead class="thead-dark">
                        <tr>

                        <th scope="col">Employee ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Number of Items Issued</th>

                    </tr>
                    </thead>
                <tbody>
                  @foreach($itdd as $emp)
                    <tr data-toggle="modal" data-target="#issuance{{$emp->id}}">
                        <td>{{$emp->id}}</td>
                        <td>{{$emp->fname}} {{$emp->lname}}</td>
                        <td>{{$emp->totalIssued}}</td>
                    </tr>
                  @endforeach
                </tbody>
                </table>

            </div>


            <div id="PDD" class="tab-pane fade">
                <h4>Production Development Department</h4>
                <table class="table table-hover" id="myDataTable1" style="width:100%;cursor:pointer;">

                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Employee ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Number of Items Issued</th>

                    </tr>
                    </thead>
                <tbody>
                  @foreach($pdd as $emp)
                    <tr data-toggle="modal" data-target="#issuance{{$emp->id}}">
                        <th>{{$emp->id}}</th>
                        <td>{{$emp->fname}} {{$emp->lname}}</td>
                        <td>{{$emp->totalIssued}}</td>
                    </tr>
                  @endforeach
                </tbody>
                </table>
            </div>

            <div id="FD" class="tab-pane fade">
                <h4>Financial Department Department</h4>
                <table class="table table-hover" id="myDataTable2" style="width:100%;cursor:pointer;">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Employee ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Number of Items Issued</th>

                    </tr>
                    </thead>
                <tbody>
                  @foreach($fd as $emp)
                    <tr data-toggle="modal" data-target="#issuance{{$emp->id}}">
                        <th>{{$emp->id}}</th>
                        <td>{{$emp->fname}} {{$emp->lname}}</td>
                        <td>{{$emp->totalIssued}}</td>
                    </tr>
                  @endforeach
                </tbody>
                </table>
                </div>

                <div id="HRD" class="tab-pane fade">
                <h4>Human Resources Department</h4>
                <table class="table table-hover" id="myDataTable" style="width:100%;cursor:pointer;">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Employee ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Number of Items Issued</th>

                    </tr>
                    </thead>
                <tbody>
                  @foreach($hrd as $emp)
                    <tr data-toggle="modal" data-target="#issuance{{$emp->id}}">
                        <th>{{$emp->id}}</th>
                        <td>{{$emp->fname}} {{$emp->lname}}</td>
                        <td>{{$emp->totalIssued}}</td>
                    </tr>
                  @endforeach
                </tbody>
                </table>
                </div>


                </div>
            </div>
</form>


<!-- Decomissioned -->
    <div class="modal fade" id="makeAvailable" tabindex="-1" role="dialog" aria-labelledby="decommissionedModalTitle"
        aria-hidden="true">

            <div class="modal-dialog" role="document">
                <div class="modal-content" style="height:450px;">
                    <div class="modal-header">
                    <h5 class="modal-title"></h5>
                        Make Available After Issuance
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{!! url('/add-to-concerns-equipment'); !!}" method="post">
                        {!! csrf_field() !!}
                        <div class="modal-body">
                        <input type="hidden" name="equipment_id" id="availableEquipmentId">
                        <input type="hidden" name="unit_id" id="availableSystemUnitId">
                            <div class="warning-content" style="text-align: center;">
                                <p class="text-uppercase font-weight-bold text-warning">Warning!</p>
                                <pre ><span class="inner-pre" style="font-size: 15px">Are you sure you want to mark equipment,<h4 id="AvailableName"></h4>  as Available?</span></pre>
                            </div>
                            <div class="btn-group" role="group">
                                <button class="btn btn-warning text-uppercase" data-toggle="collapse"
                                    data-target="#remarks" aria-expanded="false" aria-controls="collapseExample"
                                    type="button">
                                    Add Remarks
                                </button>
                                <div class="collapse" id="remarks">
                                    <textarea class="form-control" name="remarks" placeholder="Place remarks"></textarea>
                                </div>

                            </div>

                            <input type="hidden" name="id" class="fetched-id">
                            <input type="hidden" name="status_id" value="1">
                            <input type="hidden" name="orig_status_id" value="2">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary text-uppercase">Decommission</button>
                    </form>
                    <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal">Cancel</button>
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
      $('#issuableItems').addClass('active');
      });
    </script>
    <script>
    $(document).ready(function() {
        $('.myTable').DataTable({
           "pagingType": "full_numbers",
           responsive: true,
           "searching": false,
           "lengthChange": false,
           "order": []});

    } );
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#addMoreList').DataTable();
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
  $('#addMoreList > tbody:last-child').append("<tr><div class=\"row\"><td><div class=\"col\"><input class=\"form-control\" autocomplete='off' list=\"items\" name=\"items[]\" id=\"inputItems\" required></div></td><td><div class=\"col-xl-10\"><input name=\"issued_date[]\" type=\"date\" class=\"form-control\"></div></td><td><div class=\"col-sm-0\"><button onclick='rm()'>remove</button></td></div></div></tr><br><div class=\"row\"></div>");
}

function emptyContent(){
        $('#makeAvailableContent').empty()
        $('#makeAvailableFooter').empty()
    }

function fetchInfoEquipment(id , name ,status){
    if(status = 1){
        $('#availableEquipmentId').val(id);
        $('.fetched-id').val(id);
        $('#AvailableName').text(name);
        // console.log(id + name + status);
    }
}
function issuedUntil(id){
    $('#issuanceIdEditIssuedUntil').val(id);
    console.log($('#issuanceIdEditIssuedUntil').val(id));
}

    </script>




@stop
