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
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}"> @stop @section('title') Inventory @stop @section('../layout/breadcrumbs') @section('breadcrumbs-title')
    <i class="fas fa-chart-line">Inventory
    @stop
@stop

@section('content')
<div class="container">

    <!-- Tabs -->
    <ul class="nav nav-pills p-3 nav-justified nav-fill font-weight-bold" id="pills-tab" role="tablist" style="background-color:white;">
        <li class="nav-item text-uppercase" >
            <a class="nav-link active" id="pills-0-tab" onclick="restore(true)" data-toggle="pill" href="#pills-0" role="tab" aria-controls="pills-0" aria-selected="true">
              IT Equipments
            </a>
        </li>
        <li class="nav-item text-uppercase">
        <a class="nav-link" id="pills-5-tab" data-toggle="pill" href="#pills-5" role="tab" onclick="changeFilter()" aria-controls="pills-6" aria-selected="false"> System Unit
        </a>
      </li>

        <!-- <li class="nav-item text-uppercase">
            <a class="nav-link" id="pills-2-tab" data-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-2" aria-selected="false">
                Computer Peripherals</a>
        </li>
        <li class="nav-item text-uppercase">
            <a class="nav-link" id="pills-3-tab" data-toggle="pill" href="#pills-3" role="tab" aria-controls="pills-3" aria-selected="false">
                Mobile Devices</a>
        </li>
        <li class="nav-item text-uppercase">
            <a class="nav-link" id="pills-4-tab" data-toggle="pill" href="#pills-4" role="tab" aria-controls="pills-4" aria-selected="false">tab 4</a>
        </li> -->
    </ul>

    <!-- Toolbox -->
    <div class="d-flex flex-row-reverse">
        <div class="p-2">
            <div class="btn-group" role="group" aria-label="Basic example">
<!--
                 Hide/Unhide Column
                <button type="button" class="btn hide-column" id="hideColumn" data-toggle="hideColumn" aria-haspopup="true"
                    aria-expanded="false">
                    <a href="#" data-toggle="tooltip" title="Hide/Unhide">
                        <img class="tool-item" src="{{ asset('assets/icons/table-toolbar-icons/view.png') }}">
                    </a>
                </button>
-->
                <!-- Multiple Select -->
                <button type="button" class="btn" id="multiple-select" onclick="enable()">
                    <a href="#" data-toggle="tooltip" title="Multiple Select">
                        <img class="tool-item" src="{{ asset('assets/icons/table-toolbar-icons/checkbox-icon.png') }}">
                    </a>
                </button>

<!--
                 Edit
                <button type="button" class="btn disabled" id="edit">
                    <a href="#" data-toggle="tooltip" title="Edit">
                        <img class="tool-item" src="{{ asset('assets/icons/table-toolbar-icons/edit-icon.png') }}">
                    </a>
                </button>
-->

                <!-- Add Option-->
                <div class="dropdown">
                  <button class="btn" type="button" id="addOption" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <a href="#" data-toggle="tooltip" title="Add">
                          <img class="tool-item"  src="../../assets/icons/table-toolbar-icons/add-icon.png">
                      </a>
                  </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" data-toggle="modal" data-target="#singleAdd" href="#">Single Add</a></li>
                      <li><a class="dropdown-item" href="{!! url('/bulk-add') !!}">Bulk Add</a></li>
                      <li><a class="dropdown-item" data-toggle="modal" data-target="#systemUnit" href="#">Add System Unit</a></li
                      <li><a class="dropdown-item" data-toggle="modal" data-target="#build" href="#">Build a PC</a></li>
                    </ul>
              </div>
                <!-- Delete -->
                <div class="dropdown">
                  <button class="btn" type="button" id="deleteOption" data-toggle="modal" data-target="#hardDelete"  aria-haspopup="true" aria-expanded="false">
                      <a href="#" data-toggle="tooltip" title="delete">
                          <img class="tool-item"  src="../../assets/icons/table-toolbar-icons/delete-icon.png">
                      </a>
                      </button>
              </div>


                <!-- Sort -->
                <!-- <button type="button" class="btn">
                    <a href="#" data-toggle="tooltip" title="sort">
                        <img class="tool-item"  src="../../assets/icons/table-toolbar-icons/sort-icon.png">
                    </a>
                </button> -->



            </div>


        </div>
    </div>

<table>
<thead>
  <tr>
    <th>
      <label for="types" id="labelTypes">Types: </label>
      <select id="types" name="types">
        <option value="any">Any</option>
        @foreach ($typesSel as $typesSel)
        <option value="{{$typesSel->name}}">{{$typesSel->name}}</option>
        @endforeach
      </select>
    </th>
    <th>
      <label for="subtypes">Subtype: </label>
      <select id="subtypes" name="subtypes">
        <option value="any">Any</option>
        @foreach ($subtypesSel as $subtypesSel)
        <option value="{{$subtypesSel->name}}">{{$subtypesSel->name}}</option>
        @endforeach
      </select>
  </th>
  <th>
    <label for="supplier">Supplier: </label>
    <select id="supplier" name="supplier">
      <option value="any">Any</option>
      @foreach ($suppliers as $suppliers)
      <option value="{{$suppliers->supplier}}">{{$suppliers->supplier}}</option>
      @endforeach
    </select>
</th>
<th>
  <label for="brand">Brand: </label>
  <select id="brand" name="brand">
    <option value="any">Any</option>
    @foreach ($brands as $brands)
    <option value="{{$brands->brand}}">{{$brands->brand}}</option>
    @endforeach
  </select>
</th>
<th>
  <label for="status">Status: </label>
  <select id="status" name="status">
    <option value="any">Any</option>
    @foreach ($status as $status)
    <option value="{{$status->name}}">{{$status->name}}</option>
    @endforeach
  </select>
</th>
<th></th><th></th>
  <th>
    <button class="btn btn-primary text-uppercase" type="button" onclick="reset()">Reset</button>
</th>
</thead>
<tr height="10px"></tr>
</table>
    <!-- Tab Content -->
    <div class="tab-content" id="pills-tabContent">
        <!-- All Items in the Inventory -->
        <div class="tab-pane fade show active" id="pills-0" role="tabpanel" aria-labelledby="pills-0-tab">

            <table id="myDataTable" class="table table-borderless table-striped table-hover" style="width:100%;cursor:pointer;">
                <thead class="thead-dark">
                    <tr>
                      <th id="checkbox" hidden></th>
                        <th>Model</th>
                        <th>Brand</th>
                        <th>Types</th>
                        <th>Subtype</th>
                        <th>Supplier</th>
                        <th>Details</th>
                        <th>Serial No</th>
                        <th>OR No</th>
                        <th>Added by</th>
                        <th>Date Added</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($equipment as $equipment)
                    <tr data-toggle="modal" data-target="#modal-{!! $equipment->id !!}">
                        <td hidden><input class="checkbox" type="checkbox"></td>
                        <td> {{ $equipment->model }} </td>
                        <td> {{ $equipment->brand }} </td>
                        <td> {{ $equipment->type_name }} </td>
                        <td> {{ $equipment->subtype_name }} </td>
                        <td> {{ $equipment->supplier }} </td>
                        <td width="30%"> {{ $equipment->details }} </td>
                        <td> {{ $equipment->serial_no }} </td>
                        <td> {{ $equipment->or_no }} </td>
                        <td> {{ $equipment->firstname }} {{ $equipment->lastname }} </td>
                        <td> {{ $equipment->created_at }} </td>
                        <td> {{ $equipment->status_name }} </td>
                    </tr>

                    <!-- View Details All Modal -->
                    <div class="modal fade" id="modal-{!! $equipment->id !!}" tabindex="-1" role="dialog" aria-labelledby="modal-{!! $equipment->model !!}"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" style=" width: 1000px;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="container">
                                        <div class="col-12">
                                            <p>Official Receipt No: {{ $equipment->or_no }}</p>
                                        </div>

                                        <div class="col col-8">
                                            <h5 class="modal-title">{{ $equipment->brand }} {{ $equipment->model }}</h5>
                                        </div>

                                        <div class="col col-4">
                                            <p class="text-light">ID: {{ $equipment->id }}</p>
                                        </div>
                                    </div>



                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <!-- Details -->
                                        <div class="row row-details">
                                            <div class="col col-4 detail-header text-uppercase">Equipment Details</div>
                                            <div class="col col-7 details" id="fullname">{{ $equipment->details }}</div>
                                        </div>

                                        <hr>

                                        <!-- Type & Subtype -->
                                        <div class="row row-details">
                                            <div class="col col-2 detail-header text-uppercase">Type:</div>
                                            <div class="col col-4 details" id="fullname">{{ $equipment->type_name }}</div>

                                            <div class="col col-2 detail-header text-uppercase">Subtype:</div>
                                            <div class="col col-4 details" id="fullname">{{ $equipment->subtype_name }}</div>

                                        <!-- SN & PC Number -->
                                            <div class="col col-2 detail-header text-uppercase">Supplier:</div>
                                            <div class="col col-4 details" id="fullname">{{ $equipment->supplier }}</div>
                                            @isset( $equipment->imei_or_macaddress)
                                            <div class="col col-2 detail-header text-uppercase">IMEI or MAC:</div>
                                            <div class="col col-4 details" id="fullname">{{ $equipment->imei_or_macaddress }}</div>
                                            @endisset
                                            @empty( $equipment->unit_id )
                                            <div class="col col-2 detail-header text-uppercase">IMEI or MAC:</div>
                                            <div class="col col-4 details" id="fullname">None</div>
                                            @endempty
                                        </div>

                                        <hr>

                                        <div class="row row-details">
                                            <div class="col col-2 detail-header text-uppercase">Added At</div>
                                            <div class="col col-4 details" id="fullname">{{ $equipment->created_at }}</div>

                                            @isset( $equipment->updated_at)
                                            <div class="col col-2 detail-header text-uppercase">Last Edit by</div>
                                            <div class="col col-4 details" id="fullname">{{ $equipment->firstname }} {{ $equipment->lastname }}</div>
                                            @endisset
                                            @empty( $equipment->updated_at)
                                            <div class="col col-2 detail-header text-uppercase">Added by</div>
                                            <div class="col col-4 details" id="fullname">{{ $equipment->firstname }} {{ $equipment->lastname }}</div>
                                            @endisset


                                            <div class="col col-2 detail-header text-uppercase">Edited At</div>
                                            <div class="col col-4 details" id="fullname">{{ $equipment->updated_at }}</div>
                                        </div>

                                        <!-- Warranty -->
                                        <div class="row row-details">
                                            <div class="col col-4 detail-header text-uppercase">Warranty Period:</div>
                                            <div class="col col-7 details" id="fullname">{{ $equipment->warranty_start }} - {{ $equipment->warranty_end }}</div>
                                        </div>

                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary text-uppercase" data-dismiss="modal" data-toggle="modal" data-target="#edit-{!! $equipment->id !!}">Edit Values</button>
                                    <button type="button" class="btn btn-primary text-uppercase" data-dismiss="modal" data-toggle="modal" data-target="#change-status-{!! $equipment->id !!}">Change Status</button>
                                    <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Details Modal -->
                    <div class="modal fade" id="edit-{!! $equipment->id !!}" tabindex="-1" role="dialog" aria-labelledby="edit-{!! $equipment->model !!}"
                        aria-hidden="true">
                        <form action="{!! url('/editEquipment'); !!}" method="post">
                            {!! csrf_field() !!}
                            <input type="hidden" name="id" value="{!! $equipment->id !!}">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title">Edit Values</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col">
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        <h6 class="font-weight-bolder text-uppercase text-left">Model:</h6>
                                                        <input name="model" value="{!! $equipment->model !!}">
                                                    </li>
                                                    <li class="list-group-item">
                                                        <h6 class="font-weight-bolder text-uppercase text-left">Brand:</h6>
                                                        <input name="brand" value="{!! $equipment->brand !!}">
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="col">
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        <h6 class="font-weight-bolder text-uppercase text-left">Serial Number:</h6>
                                                        <input name="serial_no" value="{!! $equipment->serial_no !!}" >

                                                    <li class="list-group-item">
                                                        <h6 class="font-weight-bolder text-uppercase text-left">Official Receipt No</h6>
                                                        <input name="or_no" value="{!! $equipment->or_no !!}">
                                                    </li>
                                                </ul>
                                            </div>


                                            <div class="col-sm-12">
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        <h6 class="font-weight-bolder text-uppercase">Details:</h6>
                                                        <textarea rows="4" cols="50" name="details">{{ $equipment->details }}</textarea>

                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="col-sm-6">
                                                <ul class="list-group">
                                                    @if( $equipment->type_id == 3)
                                                    @isset( $equipment->imei_or_macaddress )
                                                    <li class="list-group-item">
                                                        <h6 class="font-weight-bolder text-uppercase text-left">IMEI:</h6>
                                                        <input name="imei_or_macaddress" value="{!! $equipment->imei_or_macaddress !!}">
                                                    </li>
                                                    @endisset
                                                    @empty( $equipment->imei_or_macaddress )
                                                    <li class="list-group-item">
                                                        <h6 class="font-weight-bolder text-uppercase text-left">IMEI:</h6>
                                                        <input name="imei_or_macaddress" value="None">
                                                    </li>
                                                    @endempty
                                                    @elseif( $equipment->type_id != 3)
                                                    @isset( $equipment->imei_or_macaddress )
                                                    <li class="list-group-item">
                                                        <h6 class="font-weight-bolder text-uppercase text-left">MAC Address:</h6>
                                                        <input name="imei_or_macaddress" value="{!! $equipment->imei_or_macaddress !!}">
                                                    </li>
                                                    @endisset
                                                    @empty( $equipment->imei_or_macaddress )
                                                    <li class="list-group-item">
                                                        <h6 class="font-weight-bolder text-uppercase text-left">MAC Address:</h6>
                                                        <input name="imei_or_macaddress" value="None">
                                                    </li>
                                                    @endempty
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary text-uppercase">Save Changes</button>
                                        <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Change Status -->
                    <div class="modal fade" id="change-status-{!! $equipment->id !!}" tabindex="-1" role="dialog" aria-labelledby="edit-{!! $equipment->model !!}"
                        aria-hidden="true">
                        <form action="{!! url('/editStatus'); !!}" method="post">
                            {!! csrf_field() !!}
                            <input type="hidden" name="id" value="{!! $equipment->id !!}">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title">Change Status</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="form-group">
                                            <p class="card-title">Status</p>
                                            <select name="status_id" class="custom-select">
                                                <option value="1">Available</option>
                                                <option value="2">Issued</option>
                                                <option value="3">For Repair</option>
                                                <option value="4">For Return</option>
                                                <option value="5">For Disposal</option>
                                                <option value="6">Pending</option>
                                                <option value="7">Decomissioned</option>
                                                @if( $equipment->type_id == 1)
                                                <option value="8">In Use</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary text-uppercase">Save Changes</button>
                                        <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal">Cancel</button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>

                @endforeach
</tbody>

            </table>
        </div>

        <!-- Computer Peripherals -->
        <div class="tab-pane fade" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
            <table id="myDataTable1" class="table table-borderless table-hover" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                      <th id="checkbox" hidden></th>
                      <th>Model</th>
                      <th>Brand</th>
                      <th hidden>Subtypes</th>
                      <th>Subtype</th>
                      <th>Supplier</th>
                      <th>Details</th>
                      <th>Serial No</th>
                      <th>OR No</th>
                      <th>Added By</>
                      <th>Date Added</th>
                      <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($component as $components)
                    <tr>
                        <td hidden><input class="checkbox" type="checkbox"></td>
                        <td> {{ $components->model }} </td>
                        <td> {{ $components->brand }} </td>
                        <td hidden></td>
                        <td> {{ $components->subtype_name }} </td>

                        <td> {{ $components->supplier }} </td>
                        <td width="30%"> {{ $components->details }} </td>
                        <td> {{ $components->serial_no }} </td>
                        <td> {{ $components->or_no }} </td>
                        <td> {{ $equipment->firstname }} {{ $equipment->lastname }} </td>
                        <td> {{ $components->created_at }} </td>
                        <td> {{ $components->status_name }} </td>
                    </tr>

                    <!-- View Details Modal -->
                    <div class="modal fade" id="modal-{!! $equipment->id !!}" tabindex="-1" role="dialog" aria-labelledby="modal-{!! $equipment->model !!}"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <p>Official Receipt No: {{ $equipment->or_no }}</p>
                                    <h5 class="modal-title">{{ $equipment->model }} {{ $equipment->brand }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <ul class="list-group">
                                                <li class="list-group-item"><h5 class="font-weight-bolder text-uppercase text-left">ID:</h5> {{ $equipment->id }}</li>
                                                <li class="list-group-item"><h5 class="font-weight-bolder text-uppercase text-left">Serial Number:</h5> {{ $equipment->serial_no }}</li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-6">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <h5 class="font-weight-bolder text-uppercase text-left">Type:</h5>
                                                    {{ $equipment->type_name }}
                                                </li>
                                                <li class="list-group-item"><h5 class="font-weight-bolder text-uppercase text-left">Subtype:</h5> {{ $equipment->subtype_name }}</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 m-1">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <h5 class="font-weight-bolder text-uppercase">Details:</h5>
                                                    {{ $equipment->details }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-6">
                                            <ul class="list-group">
                                                @isset( $equipment->unit_id )
                                                <li class="list-group-item">
                                                    <h5 class="font-weight-bolder text-uppercase text-left">PC Number:</h5>
                                                    {{ $equipment->unit_id }}
                                                </li>
                                                @endisset
                                                @empty( $equipment->unit_id )
                                                <li class="list-group-item">
                                                    <h5 class="font-weight-bolder text-uppercase text-left">PC Number:</h5>
                                                    Not Assigned to A Unit
                                                </li>
                                                @endempty
                                            </ul>
                                        </div>

                                        <div class="col-sm-6">
                                            <ul class="list-group">
                                                @if( $equipment->type_id == 3)
                                                @isset( $equipment->imei_or_macaddress )
                                                <li class="list-group-item">
                                                    <h5 class="font-weight-bolder text-uppercase text-left">IMEI:</h5>
                                                    {{ $equipment->imei_or_macaddress }}
                                                </li>
                                                @endisset
                                                @empty( $equipment->imei_or_macaddress )
                                                <li class="list-group-item">
                                                    <h5 class="font-weight-bolder text-uppercase text-left">IMEI:</h5>
                                                    None
                                                </li>
                                                @endempty
                                                @elseif( $equipment->type_id != 3)
                                                @isset( $equipment->imei_or_macaddress )
                                                <li class="list-group-item">
                                                    <h5 class="font-weight-bolder text-uppercase text-left">MAC Address:</h5>
                                                    {{ $equipment->imei_or_macaddress }}
                                                </li>
                                                @endisset
                                                @empty( $equipment->imei_or_macaddress )
                                                <li class="list-group-item">
                                                    <h5 class="font-weight-bolder text-uppercase text-left">MAC Address:</h5>
                                                    None
                                                </li>
                                                @endempty
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary text-uppercase">Edit Values</button>
                                    <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>

            </table>
        </div>

        <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
            <table id="myDataTable2" class="table table-borderless table-hover" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                      <th id="checkbox" hidden></th>
                      <th>Model</th>
                      <th>Brand</th>
                      <th hidden>Subtype</th>
                      <th>Subtypes</th>
                      <th>Supplier</th>
                      <th>Details</th>
                      <th>Serial No</th>
                      <th>OR No</th>
                      <th>Added By</>
                      <th>Date Added</th>
                      <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($peripherals as $peripherals)
                    <tr >
                        <td hidden><input class="checkbox" type="checkbox"></td>
                        <td> {{ $peripherals->model }} </td>
                        <td> {{ $peripherals->brand }} </td>
                        <td hidden></td>
                        <td> {{ $peripherals->subtype_name }} </td>
                        <td> {{ $peripherals->supplier }} </td>
                        <td width="30%"> {{ $peripherals->details }} </td>
                        <td> {{ $peripherals->serial_no }} </td>
                        <td> {{ $peripherals->or_no }} </td>
                        <td> {{ $equipment->firstname }} {{ $equipment->lastname }} </td>
                        <td> {{ $peripherals->created_at }} </td>
                        <td> {{ $peripherals->status_name }} </td>
                    </tr>

                    @endforeach
                </tbody>

            </table>
        </div>

        <!-- Mobile Devices -->
        <div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="pills-3-tab">
            <table id="myDataTable3" class="table table-borderless table-hover" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                      <th id="checkbox" onclick="selectAll()" hidden></th>
                      <th>Model</th>
                      <th>Brand</th>
                      <th hidden>Subtype</th>
                      <th>Subtypes</th>
                      <th>Supplier</th>
                      <th>Details</th>
                      <th>Serial No</th>
                      <th>OR No</th>
                      <th>Added By</>
                      <th>Date Added</th>
                      <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($mobile as $mobile)
                    <tr>
                      <td hidden><input class="checkbox" type="checkbox"></td>
                        <td> {{ $mobile->model }} </td>
                        <td> {{ $mobile->brand }} </td>
                        <td hidden></td>
                        <td> {{ $mobile->subtype_name }} </td>
                        <td> {{ $mobile->supplier }} </td>
                        <td width="30%"> {{ $mobile->details }} </td>
                        <td> {{ $mobile->serial_no }} </td>
                        <td> {{ $mobile->or_no }} </td>
                        <td> {{ $equipment->firstname }} {{ $equipment->lastname }} </td>
                        <td> {{ $mobile->created_at }} </td>
                        <td> {{ $mobile->status_name }} </td>
                    </tr>

                    @endforeach
                </tbody>

            </table>
        </div>

<!-- Software -->
<div class="tab-pane fade" id="pills-4" role="tabpanel" aria-labelledby="pills-4-tab">
    <table id="myDataTable4" class="table table-borderless table-hover" style="width:100%">
        <thead class="thead-dark">
            <tr>

              <th id="checkbox" hidden></th>
              <th>Model</th>
              <th>Brand</th>
              <th hidden>Subtype</th>
              <th>Subtypes</th>
              <th>Supplier</th>
              <th>Details</th>
              <th>Serial No</th>
              <th>OR No</th>
              <th>Added By</>
              <th>Date Added</th>
              <th>Status</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($software as $software)
            <tr>
            <td hidden><input class="checkbox" type="checkbox"></td>
                <td> {{ $software->model }} </td>
                <td> {{ $software->brand }} </td>
                <td> {{ $software->subtype_name }} </td>
                <td> {{ $software->supplier }} </td>
                <td width="30%"> {{ $software->details }} </td>
                <td hidden></td>
                <td> {{ $software->serial_no }} </td>
                <td> {{ $software->or_no }} </td>
                <td> {{ $equipment->firstname }} {{ $equipment->lastname }} </td>
                <td> {{ $software->created_at }} </td>
                <td> {{ $software->status_name }} </td>
            </tr>

            @endforeach
        </tbody>

    </table>
</div>

<!-- System Units -->
<div class="tab-pane fade" id="pills-5" role="tabpanel" aria-labelledby="pills-5-tab">
    <table id="myDataTable5" class="table table-borderless table-hover" style="width:100%">
        <thead class="thead-dark">
            <tr>
              <th id="checkbox" hidden></th>
              <th>Name</th>
              <th>Details</th>
              <th>Date Added</th>
              <th width="15%">Date Edited</th>
              <th>Added by</th>
              <th></th>
          </tr>
      </thead>
      <tbody>

          @foreach ($system_units as $system_units)
          <tr data-toggle="modal" data-target="#pc-component-{!! $system_units->id !!}">
            <td hidden><input class="checkbox" type="checkbox"></td>
              <td> {{ $system_units->description }}-{{ $system_units->id }} </td>
              <td width="30%"> NONE </td>
              <td> {{ $system_units->created_at }} </td>
              <td > {{ $system_units->updated_at }} </td>
              <td> {{ $system_units->fname }} {{ $system_units->lname }}</td>
              <td>  </td>
          </tr>

             <div class="modal fade" id="pc-component-{!! $system_units->id !!}" tabindex="-1" role="dialog" aria-labelledby="modal-{!! $system_units->id!!}"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" style=" width: 1000px;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="container">
                                        <div class="col-12">
                                        </div>

                                        <div class="col col-8">
                                            <h5 class="modal-title">{{ $system_units->description }}</h5>
                                        </div>

                                        <div class="col col-4">
                                            <p class="text-light">ID: PC-{{ $system_units->id }}</p>
                                        </div>
                                    </div>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>


                                <div class="modal-body">
                                    <div class="container-fluid">

                                        <!--Component Details -->
                                        <div class="row">

                                            @foreach( $unit_parts as $unit_part)
                                            @if($system_units->id==$unit_part->unit_id)





                                            <div class="col col-12 details">
                                                <strong>{{ $unit_part->subtype_name }}</strong>
                                                <p class="text">ID: {{ $unit_part->id }} </p>
                                                <p class="text">Serial Number: {{ $unit_part->serial_no }}</p>
                                                <p class="text">{{ $unit_part->brand }} {{ $unit_part->model }}</p>
                                                <p class="text">{{ $unit_part->details }}</p>
                                            </div>
                                            <hr>


                                            @endif

                                        @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary text-uppercase" data-dismiss="modal" data-toggle="modal" data-target="#edit-{!! $equipment->id !!}">Edit Values</button>
                                    <button type="button" class="btn btn-primary text-uppercase" data-dismiss="modal" data-toggle="modal" data-target="#change-status-{!! $equipment->id !!}">Change Status</button>
                                    <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>



          @endforeach
        </tbody>

    </table>

</div>
</div>
</div>

    <!-- Single Add Modal -->

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="singleAdd">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalTitle">Single Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Add Equipment Form -->
                <div class="modal-body">
                    <form action="{!! url('/addEquipment'); !!}" enctype="multipart/form-data" method="post" role="form">
                    {!! csrf_field() !!}
                    <div class="row pb-2">
                        <div class="col">
                        <p class="card-title text-dark">Equipment Subtype:</p>
                        <select name="subtype_id" class="custom-select">
                        @foreach ($equipment_subtypes as $equipment_subtypes)
                            <option  value="{!! $equipment_subtypes->id !!}">
                                {{ $equipment_subtypes->name }}
                            </option>
                        @endforeach
                        </select>
                        </div>
                    </div>

                    <!-- Model & Brand -->
                    <div class="row">
                        <div class="col-5">
                            <p class="card-title text-dark">Model:</p>
                            <div class="input-group">
                                <input name="model" type="text" size="30">
                            </div>
                        </div>
                        <div class="col-4">
                            <p class="card-title text-dark">Brand:</p>
                            <div class="input-group">
                                <input name="brand" type="text" size="30">
                            </div>
                        </div>
                    </div>

                    <!-- Details -->
                    <div class="row">
                        <div class="col-9">
                            <label for="details" class="card-title text-dark">Details:</label>
                            <div class="input-group mb-1">
                                <textarea name="details" class="form-control" aria-label="With textarea" rows="2"></textarea>
                            </div>
                        </div>
                    </div>

                    <br>
                    <!-- Warranty -->
                    <div class="row pb-2">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <label for="details" class="card-title text-dark">Warranty Start:</label>
                                    <input type="date" id="start" name="warranty_start">
                                </div>

                                <div class="col">
                                    <label for="details" class="card-title text-dark">Warranty End:</label>
                                    <input type="date" id="start" name="warranty_end">
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>

                    <!-- Serial and IMEI/MAC -->
                    <div class="row">
                        <div class="col-6">
                            <label for="serial_no" class="card-title text-dark">Serial Number:</label>
                            <div class="input-group mb-1">
                                <input name="serial_no" type="text" size="30" >
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="serial_no" class="card-title text-dark">IMEI/MAC address:</label>
                            <div class="input-group mb-1">
                                <input name="imei_or_macaddress" type="text" size="30">
                            </div>
                        </div>
                    </div>

                    <!-- OR & Supplier -->
                    <div class="row">
                        <div class="col-6">
                            <p class="card-title text-dark">Official Receipt Numbers:</p>
                            <div class="input-group mb-1">
                                <input name="or_no" type="text" size="30">
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="serial_no" class="card-title text-dark">Supplier:</label>
                            <div class="input-group mb-1">
                                <input name="supplier" type="text" size="30">
                            </div>
                        </div>
                    </div>

                    <!-- System Unit & Status -->
                    <div class="row">
                        <div class="col-6">
                            <p class="card-title text-dark">System Unit Assigned To:</p>
                            <select name="unit_id" class="custom-select">
                                <option value="NULL">Not Assigned</option>
                                @foreach ($units as $units)
                                <option value="{!! $system_units->id !!}">
                                    {{ $units->description }}-{{ $units->id }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-6">
                            <p class="card-title text-dark">Status:</p>
                            <select class="custom-select" name="status_id" >
                                <option value="1">Available</option>
                                <option value="4">For return</option>
                                <option value="6">Pending</option>
                                <option value="8">In-use</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="modal-footer text-uppercase">
                    <button type="submit" class="btn btn-primary text-uppercase">ADD</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
                    </form>
            </div>
        </div>
    </div>


    <!--Build From Parts Modal-->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="build">

        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div id="buildFromPartsHeader" class="modal-header">
                    <h5 class="modal-title" id="ModalTitle"><i class="fas fa-wrench"></i>&nbsp;Build From Available Parts</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            <div class="container" style="padding:2rem">


        <form action="{!! url('/buildUnit'); !!}" method="post">
            {!! csrf_field() !!}
            <div class="container">
                <p class="card-title text-dark">Name:</p>
                    <div class="input-group">
                        <input name="description" type="text" class="form-control" required>
                    </div>
            <div class="row">
                @foreach ($subtypes as $subtypes)
                <div class="col col-6 mb-2">
                    <p class="card-title">{{$subtypes->name}}: </p>
                    <select name="items[]" class="custom-select">
                        @foreach ($parts as $part)
                        @if ($part->subtype_id==$subtypes->id)
                        <option value="{{ $part->id}} ">{{ $part->model}} {{ $part->brand}} S/N:{{ $part->serial_no}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                @endforeach
            </div>


        <div class="modal-footer">

            <button type="submit" class="btn btn-success"><span class="fas fa-wrench"></span> BUILD</button>
            <button id="cancel" type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
        </div>
        </form>


    </div>
    </div>
    </div>
    </div>
  </div>



    <!-- Add System Unit Modal                                   -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="systemUnit">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <div id="addSystemUnit" class="modal-header">
                    <h5 class="modal-title" id="ModalTitle"><i class="fas fa-plus-square"></i>&nbsp;Add System Unit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="container">
                    <form action="{!! url('/addSystemUnit'); !!}" enctype="multipart/form-data" method="post" role="form">
                        {!! csrf_field() !!}

                        <div class="row">
                            <div class="col-sm">

                                <table class="table table-borderless table-striped table-hover table-responsive table-condensed" style="width:100%; ">
                                    <thead>
                                        <tr>
                                            <th>PC Description</th>
                                            <th>Supplier</th>
                                            <th>OR No.</th>
                                            <th>Warranty</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td> <input type="text" name="unit[mac_address]" required></td>
                                            <td>
                                                <input type="text" name="unit[supplier]" required><br>

                                            </td>
                                            <td> <input type="text" name="unit[or_no]" required></td>
                                            <td>
                                                <label for="start">Start date:</label>
                                                <input type="date" id="start" name="unit[warranty_start]" required>
                                                <br>
                                                <label for="start">End date:</label>
                                                <input type="date" id="start" name="unit[warranty_end]" required>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                            <div class="col-sm">
                                <table class="table table-borderless table-striped table-hover table-responsive" style="width:100%">
                                    <thead class="">
                                        <tr>
                                            <th>Component</th>
                                            <th>Brand</th>
                                            <th>Model</th>
                                            <th>Serial no.</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>Motherboard <input type="text" name="equipment[subtype_id][]" value="1" hidden></td>
                                            <td> <input type="text" name="equipment[brand][]" required></td>
                                            <td> <input type="text" name="equipment[model][]" required></td>
                                            <td> <input type="text" name="equipment[serial_no][]" required></td>
                                            <td><textarea name="equipment[details][]" rows="2" cols="22"></textarea></td>
                                        </tr>


                                        <tr>
                                            <td>CPU<input type="text" name="equipment[subtype_id][]" value="2" hidden></td>
                                            <td> <input type="text" name="equipment[brand][]" required></td>
                                            <td> <input type="text" name="equipment[model][]" required></td>
                                            <td> <input type="text" name="equipment[serial_no][]" required></td>
                                            <td><textarea name="equipment[details][]" rows="2" cols="22"></textarea></td>
                                        </tr>

                                        <tr>
                                            <td>Storage<input type="text" name="equipment[subtype_id][]" value="3" hidden></td>
                                            <td> <input type="text" name="equipment[brand][]" required></td>
                                            <td> <input type="text" name="equipment[model][]" required></td>
                                            <td> <input type="text" name="equipment[serial_no][]" required></td>

                                            <td><textarea name="equipment[details][]" rows="2" cols="22"></textarea></td>

                                        <tr>
                                            <td>RAM<input type="text" name="equipment[subtype_id][]" value="4" hidden></td>
                                            <td> <input type="text" name="equipment[brand][]" required></td>
                                            <td> <input type="text" name="equipment[model][]" required></td>
                                            <td> <input type="text" name="equipment[serial_no][]" required></td>
                                            <td><textarea name="equipment[details][]" rows="2" cols="22"></textarea></td>
                                        </tr>

                                        <tr>
                                            <td>GPU<input type="text" name="equipment[subtype_id][]" value="5" hidden></td>
                                            <td> <input type="text" name="equipment[brand][]" required></td>
                                            <td> <input type="text" name="equipment[model][]" required></td>
                                            <td> <input type="text" name="equipment[serial_no][]" required> </td>
                                            <td><textarea name="equipment[details][]" rows="2" cols="22"></textarea></td>
                                        </tr>

                                        <tr>
                                            <td>Case<input type="text" name="equipment[subtype_id][]" value="7" hidden></td>
                                            <td> <input type="text" name="equipment[brand][]" required></td>
                                            <td> <input type="text" name="equipment[model][]" required></td>
                                            <td> <input type="text" name="equipment[serial_no][]" required></td>
                                            <td><textarea name="equipment[details][]" rows="2" cols="22"></textarea></td>
                                        </tr>

                                        <tr>
                                            <td>Heat Sink Fan<input type="text" name="equipment[subtype_id][]" value="8" hidden></td>
                                            <td> <input type="text" name="equipment[brand][]"></td>
                                            <td> <input type="text" name="equipment[model][]"></td>
                                            <td> <input type="text" name="equipment[serial_no][]"> </td>
                                            <td><textarea name="equipment[details][]" rows="2" cols="22"></textarea></td>


                                        </tr>

                                        <tr>
                                            <td>Sound Card<input type="text" name="equipment[subtype_id][]" value="18" hidden></td>
                                            <td> <input type="text" name="equipment[brand][]"></td>
                                            <td> <input type="text" name="equipment[model][]"></td>
                                            <td> <input type="text" name="equipment[serial_no][]" ></td>
                                            <td><textarea name="equipment[details][]" rows="2" cols="22"></textarea></td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button id="save" class="btn btn-success" type="submit"> <span class="fas fa-plus-square"></span>&nbsp;Add System Unit</button>
                            <button id="cancel" type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- Soft Delete-->
    <div class="modal fade bd-example-modal-sm" id="softDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalTitle">Soft Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Add system unit Form -->
                <div class="modal-body">
                  <form action="{!! url('/softDeleteEquipment'); !!}" enctype="multipart/form-data" onsubmit="DoSubmit()"  method="post" role="form">
                      {!! csrf_field() !!}
                      <div class="row">
                        <div class="col-md-5">
                            <p class="card-title">Delete Item:</p>
                            <input  list="items" name="items" id="equipment" onblur="CheckListed(this.value);" required>
                              <datalist id="items">
                                <select>
                                @foreach ($equipments as $equipment)
                                <option data-customvalue="Mobile Device-{{ $equipment->id}}" value="{{ $equipment->model}} {{ $equipment->brand}}">{{ $equipment->subtype_name}}</option>
                                @endforeach
                                @foreach ($systemunits as $systemunits)
                                <option data-customvalue="System Unit-{{ $systemunits->id}}" value="{{ $systemunits->description}}-{{ $systemunits->id}}">System Unit</option>
                                @endforeach
                              </select>
                              </datalist>

                        </div>
                      </div>

                  <!-- <button type="button" class="btn btn-info" type="submit" id="addEquipment"> <span class="fas fa-plus"></span>Add Item</button> -->
                  </div>

                  <div class="modal-footer text-uppercase">
                  <button class="btn btn-info" type="submit" id= "deleteEquipment">Delete</button>

                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

                  </div>
                  </form>
</div>
</div>
</div>

<!-- Hard Delete-->
<div class="modal fade bd-example-modal-sm" id="hardDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalTitle">Hard Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Add system unit Form -->
            <div class="modal-body">
              <form action="{!! url('/hardDeleteEquipment'); !!}" enctype="multipart/form-data" onsubmit="DoSubmit()"  method="post" role="form">
                  {!! csrf_field() !!}
                  <div class="row">
                    <div class="col-md-5">
                        <p class="card-title">Delete Item:</p>
                        <input  list="item" name="item" id="hequipment" onblur="CheckListed(this.value);" required>
                          <datalist id="item">
                            <select>
                            @foreach ($equipments as $equipment)
                            <option data-customvalue="Mobile Device-{{ $equipment->id}}" value="{{ $equipment->model}} {{ $equipment->brand}}">{{ $equipment->subtype_name}}</option>
                            @endforeach
                            @foreach ($units_system as $units_system)
                            <option data-customvalue="System Unit-{{ $units_system->id}}" value="{{ $units_system->description}}-{{ $units_system->id}}">System Unit</option>
                            @endforeach
                          </select>
                          </datalist>

                    </div>
                  </div>

              <!-- <button type="button" class="btn btn-info" type="submit" id="addEquipment"> <span class="fas fa-plus"></span>Add Item</button> -->
              </div>

              <div class="modal-footer text-uppercase">
              <button class="btn btn-info" type="submit" id= "deleteEquipment">Delete</button>

              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

              </div>
              </form>
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
      $('#inventory').addClass('active');
      });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('input').attr('autocomplete','off');
      });
    </script>
    <script>
    $(document).ready(function() {
        $('#myDataTable').DataTable({
           "pagingType": "full_numbers",
           responsive: true,
           "order": []});
    } );
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#myDataTable1').DataTable({
           "pagingType": "full_numbers",
           "order": []});
    } );
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#myDataTable2').DataTable({ "pagingType": "full_numbers",
        "order": []});
    } );
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#myDataTable3').DataTable({ "pagingType": "full_numbers",
        "order": []});
    } );
  </script>
  <script type="text/javascript">
  $(document).ready(function() {
      $('#myDataTable4').DataTable({ "pagingType": "full_numbers",
      "order": []});
  } );
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#myDataTable5').DataTable({ "pagingType": "full_numbers",
    "order": []});
} );
</script>
    <!-- <script>
      $(document).ready(function() {
            $('table.display').DataTable({
              pagingType: "full_numbers",
              scrollY:        "300px",
              scrollX:        true,
              scrollCollapse: true,
              paging:         false,
              fixedColumns:   {
                  leftColumns: 1,
                  rightColumns: 1
              }
            });
        } );
      </script> -->
    <script>
      function DoSubmit(){
        var item = $(equipment).val();
        document.getElementById("equipment").value = $('#items [value="' + item + '"]').data('customvalue');
        var item1 = $(hequipment).val();
        document.getElementById("hequipment").value = $('#item [value="' + item1 + '"]').data('customvalue');
        return true;
        };
    </script>
    <script>
    $.fn.dataTable.ext.search.push(
function( settings, data, dataIndex ) {
var type =  $('#types').val();
var subtype =  $('#subtypes').val();
var supplier =  $('#supplier').val();
var brand =  $('#brand').val();
var status =  $('#status').val();
var types = data[3]; // use data for the age column
var subtypes = data[4];
var suppliers = data[5];
var brands = data[2];
var statuses = data[11];
if ( type == types || type == "any"){
  if (subtype == subtypes || subtype == "any"){
    if (supplier == suppliers || supplier == "any"){
      if (brand == brands || brand == "any"){
        if (status == statuses || status == "any"){
          return true;
        }
      }
    }
  }

}
return false;
}
);

$(document).ready(function() {
var table = $('#myDataTable').DataTable();

// Event listener to the two range filtering inputs to redraw on input
$('#subtypes').on('keyup change',  function() {
    table.draw();
    } );
    $('#types').on('keyup change',  function() {
        table.draw();
        } );
        $('#supplier').on('keyup change',  function() {
            table.draw();
            } );
            $('#brand').on('keyup change',  function() {
                table.draw();
                } );
                $('#status').on('keyup change',  function() {
                    table.draw();
                    } );
        } );
        $(document).ready(function() {
        var table = $('#myDataTable1').DataTable();

        // Event listener to the two range filtering inputs to redraw on input
        $('#subtypes').on('keyup change',  function() {
            table.draw();
            } );
            $('#types').on('keyup change',  function() {
                table.draw();
                } );
                $('#supplier').on('keyup change',  function() {
                    table.draw();
                    } );
                    $('#brand').on('keyup change',  function() {
                        table.draw();
                        } );
                        $('#status').on('keyup change',  function() {
                            table.draw();
                            } );
                } );

              $(document).ready(function() {
                var table = $('#myDataTable2').DataTable();

                // Event listener to the two range filtering inputs to redraw on input
                $('#subtypes').on('keyup change',  function() {
                    table.draw();
                    } );
                    $('#types').on('keyup change',  function() {
                        table.draw();
                        } );
                        $('#supplier').on('keyup change',  function() {
                            table.draw();
                            } );
                            $('#brand').on('keyup change',  function() {
                                table.draw();
                                } );
                                $('#status').on('keyup change',  function() {
                                    table.draw();
                                    } );
                        } );
                        $(document).ready(function() {
                          var table = $('#myDataTable3').DataTable();

                          // Event listener to the two range filtering inputs to redraw on input
                          $('#subtypes').on('keyup change',  function() {
                              table.draw();
                              } );
                              $('#types').on('keyup change',  function() {
                                  table.draw();
                                  } );
                                  $('#supplier').on('keyup change',  function() {
                                      table.draw();
                                      } );
                                      $('#brand').on('keyup change',  function() {
                                          table.draw();
                                          } );
                                          $('#status').on('keyup change',  function() {
                                              table.draw();
                                              } );
                                  } );
                                  $(document).ready(function() {
                                    var table = $('#myDataTable4').DataTable();

                                    // Event listener to the two range filtering inputs to redraw on input
                                    $('#subtypes').on('keyup change',  function() {
                                        table.draw();
                                        } );
                                        $('#types').on('keyup change',  function() {
                                            table.draw();
                                            } );
                                            $('#supplier').on('keyup change',  function() {
                                                table.draw();
                                                } );
                                                $('#brand').on('keyup change',  function() {
                                                    table.draw();
                                                    } );
                                                    $('#status').on('keyup change',  function() {
                                                        table.draw();
                                                        } );
                                            } );
                                            // $(document).ready(function() {
                                            //   var table = $('#myDataTable5').DataTable();
                                            //
                                            //   // Event listener to the two range filtering inputs to redraw on input
                                            //   $('#subtypes').on('keyup change',  function() {
                                            //       table.draw();
                                            //       } );
                                            //       $('#types').on('keyup change',  function() {
                                            //           table.draw();
                                            //           } );
                                            //           $('#supplier').on('keyup change',  function() {
                                            //               table.draw();
                                            //               } );
                                            //               $('#brand').on('keyup change',  function() {
                                            //                   table.draw();
                                            //                   } );
                                            //                   $('#status').on('keyup change',  function() {
                                            //                       table.draw();
                                            //                       } );
                                            //           } );
        function reset(){
          document.getElementById("subtypes").selectedIndex = "0";
          document.getElementById("types").selectedIndex = "0";
          document.getElementById("supplier").selectedIndex = "0";
          document.getElementById("brand").selectedIndex = "0";
          document.getElementById("status").selectedIndex = "0";
          $('#myDataTable').DataTable().search('').draw();
          $('#myDataTable1').DataTable().search('').draw();
          $('#myDataTable2').DataTable().search('').draw();
          $('#myDataTable3').DataTable().search('').draw();
          $('#myDataTable4').DataTable().search('').draw();
          // $('#myDataTable5').DataTable().search('').draw();

        }
        function restore(option){
          if(option== false){
              $("#types").hide();
            $("#labelTypes").hide();
            reset()
          } else{
            $("#types").show();
            $("#labelTypes").show();
            reset()

          }
        };


    </script>


@stop
