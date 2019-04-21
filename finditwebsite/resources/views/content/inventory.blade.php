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
@stop

@section('title')
    Inventory
@stop

@section('../layout/breadcrumbs')
    @section('breadcrumbs-title')
    <i class="fas fa-chart-line">Inventory
    @stop
@stop

@section('content')
<div class="container">

    <!-- Tabs -->
    <ul class="nav nav-pills p-3 nav-justified nav-fill font-weight-bold" id="pills-tab" role="tablist">
        <li class="nav-item text-uppercase">
            <a class="nav-link active " id="pills-0-tab" data-toggle="pill" href="#pills-0" role="tab" aria-controls="pills-0" aria-selected="true">
                All
            </a>
        </li>



        @foreach ($equipment_types as $equipment_types)
        <li class="nav-item text-uppercase">
            <a class="nav-link" id="pills-{!! $equipment_types->id !!}-tab" data-toggle="pill" href="#pills-{!! $equipment_types->id !!}" role="tab" aria-controls="pills-{!! $equipment_types->id !!}" aria-selected="false">
                {{ $equipment_types->name }}
            </a>
        </li>
        @endforeach
        <li class="nav-item text-uppercase">
        <a class="nav-link" id="pills-5-tab" data-toggle="pill" href="#pills-5" role="tab" aria-controls="pills-6" aria-selected="false"> System Unit
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
                <!-- Hide/Unhide Column -->
                <button type="button" class="btn hide-column" id="hideColumn" data-toggle="hideColumn" aria-haspopup="true"
                    aria-expanded="false">
                    <a href="#" data-toggle="tooltip" title="Hide/Unhide">
                        <img class="tool-item" src="{{ asset('assets/icons/table-toolbar-icons/view.png') }}">
                    </a>
                </button>

                <!-- <select name="toggle_column" id="toggle_column">
                    <option value="1">Name</option>
                    <option value="2">Details</option>
                    <option value="3">Serial No</option>
                    <option value="4">OR No</option>
                    <option value="5">Added At</option>
                    <option value="6">Edited At</option>
                    <option value="7">Status</option>
                </select> -->

                <!-- Multiple Select -->
                <button type="button" class="btn disabled" id="multiple-select">
                    <a href="#" data-toggle="tooltip" title="Multiple Select">
                        <img class="tool-item" src="{{ asset('assets/icons/table-toolbar-icons/checkbox-icon.png') }}">
                    </a>
                </button>

                <!-- Edit -->
                <button type="button" class="btn disabled" id="edit">
                    <a href="#" data-toggle="tooltip" title="Edit">
                        <img class="tool-item" src="{{ asset('assets/icons/table-toolbar-icons/edit-icon.png') }}">
                    </a>
                </button>

                <!-- Add -->
                <button class="btn" type="button" id="addOption" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <a href="#" data-toggle="tooltip" title="Add">
                        <img class="tool-item"  src="../../assets/icons/table-toolbar-icons/add-icon.png">
                    </a>
                </button>

                <!-- Delete -->
                <button type="button" class="btn disabled">
                    <a href="#" data-toggle="tooltip" title="delete">
                        <img class="tool-item"  src="../../assets/icons/table-toolbar-icons/delete-icon.png">
                    </a>
                    </button>

                <!-- Sort -->
                <!-- <button type="button" class="btn">
                    <a href="#" data-toggle="tooltip" title="sort">
                        <img class="tool-item"  src="../../assets/icons/table-toolbar-icons/sort-icon.png">
                    </a>
                </button> -->


                <div class="dropdown-menu" aria-labelledby="addOption">
                    <a class="dropdown-item" data-toggle="modal" data-target="#singleAdd" href="#">Single Add</a>
                    <a class="dropdown-item" href="#">Bulk Add</a>
                    <a class="dropdown-item" data-toggle="modal" data-target="#addUnit" href="#">Add System Unit</a>
                </div>


            </div>


        </div>
    </div>

    <!-- Tab Content -->
    <div class="tab-content" id="pills-tabContent">
        <!-- All Items in the Inventory -->
        <div class="tab-pane fade show active" id="pills-0" role="tabpanel" aria-labelledby="pills-0-tab">

            <table id="myDataTable" class="table table-borderless table-striped table-hover" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Types</th>
                        <th>Subtype</th>
                        <th>Supplier</th>
                        <th>Details</th>
                        <th>Serial No</th>
                        <th>OR No</th>
                        <th>Added At</th>
                        <th width="15%">Edited At</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($equipment as $equipment)
                    <tr data-toggle="modal" data-target="#modal-{!! $equipment->id !!}">

                        <td> {{ $equipment->name }} </td>
                        <td> {{ $equipment->type_name }} </td>
                        <td> {{ $equipment->subtype_name }} </td>
                        <td> {{ $equipment->supplier }} </td>
                        <td width="30%"> {{ $equipment->details }} </td>
                        <td> {{ $equipment->serial_no }} </td>
                        <td> {{ $equipment->or_no }} </td>
                        <td> {{ $equipment->created_at }} </td>
                        <td > {{ $equipment->updated_at }} </td>
                        <td> {{ $equipment->status_name }} </td>
                    </tr>

                    <!-- View Details Modal -->
                    <div class="modal fade" id="modal-{!! $equipment->id !!}" tabindex="-1" role="dialog" aria-labelledby="modal-{!! $equipment->name !!}"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <p>Official Receipt No: {{ $equipment->or_no }}</p>
                                    <h5 class="modal-title">{{ $equipment->name }}</h5>
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

        <!-- Computer Peripherals -->
        <div class="tab-pane fade" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
            <table id="myDataTable1" class="table table-borderless table-hover" style="width:100%">
                <thead class="thead-dark">
                    <tr>

                        <th>Name</th>
                        <th>Type</th>
                        <th>Supplier</th>
                        <th>Details</th>
                        <th>Serial No</th>
                        <th>OR No</th>
                        <th>Added At</th>
                        <th width="15%">Edited At</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($component as $components)
                    <tr>
                        <td> {{ $components->name }} </td>
                        <td> {{ $components->subtype_name }} </td>
                        <td> {{ $components->supplier }} </td>
                        <td width="30%"> {{ $components->details }} </td>
                        <td> {{ $components->serial_no }} </td>
                        <td> {{ $components->or_no }} </td>
                        <td> {{ $components->created_at }} </td>
                        <td> {{ $components->updated_at }} </td>
                        <td> {{ $components->status_name }} </td>
                    </tr>

                    <!-- View Details Modal -->
                    <div class="modal fade" id="modal-{!! $equipment->id !!}" tabindex="-1" role="dialog" aria-labelledby="modal-{!! $equipment->name !!}"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <p>Official Receipt No: {{ $equipment->or_no }}</p>
                                    <h5 class="modal-title">{{ $equipment->name }}</h5>
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

                        <th>Name</th>
                        <th>Subtype</th>
                        <th>Supplier</th>
                        <th>Details</th>
                        <th>Serial No</th>
                        <th>OR No</th>
                        <th>Added At</th>
                        <th width="15%">Edited At</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($peripherals as $peripherals)
                    <tr >

                        <td> {{ $peripherals->name }} </td>
                        <td> {{ $peripherals->subtype_name }} </td>
                        <td> {{ $peripherals->supplier }} </td>
                        <td width="30%"> {{ $peripherals->details }} </td>
                        <td> {{ $peripherals->serial_no }} </td>
                        <td> {{ $peripherals->or_no }} </td>
                        <td> {{ $peripherals->created_at }} </td>
                        <td> {{ $peripherals->updated_at }} </td>
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

                        <th>Name</th>
                        <th>Subtype</th>
                        <th>Supplier</th>
                        <th>Details</th>
                        <th>Serial No</th>
                        <th>OR No</th>
                        <th>Added At</th>
                        <th width="15%">Edited At</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($mobile as $mobile)
                    <tr>
                        <td> {{ $mobile->name }} </td>
                        <td> {{ $mobile->subtype_name }} </td>
                        <td> {{ $mobile->supplier }} </td>
                        <td width="30%"> {{ $mobile->details }} </td>
                        <td> {{ $mobile->serial_no }} </td>
                        <td> {{ $mobile->or_no }} </td>
                        <td> {{ $mobile->created_at }} </td>
                        <td> {{ $mobile->updated_at }} </td>
                        <td> {{ $mobile->status_name }} </td>
                    </tr>

                    @endforeach
                </tbody>

            </table>
        </div>

<!-- Mobile Devices -->
<div class="tab-pane fade" id="pills-4" role="tabpanel" aria-labelledby="pills-4-tab">
    <table id="myDataTable3" class="table table-borderless table-hover" style="width:100%">
        <thead class="thead-dark">
            <tr>

                <th>Name</th>
                <th>Subtype</th>
                <th>Supplier</th>
                <th>Details</th>
                <th>Serial No</th>
                <th>OR No</th>
                <th>Added At</th>
                <th width="15%">Edited At</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($software as $software)
            <tr>
                <td> {{ $software->name }} </td>
                <td> {{ $software->subtype_name }} </td>
                <td> {{ $software->supplier }} </td>
                <td width="30%"> {{ $software->details }} </td>
                <td> {{ $software->serial_no }} </td>
                <td> {{ $software->or_no }} </td>
                <td> {{ $software->created_at }} </td>
                <td> {{ $software->updated_at }} </td>
                <td> {{ $software->status_name }} </td>
            </tr>

            @endforeach
        </tbody>

    </table>
</div>

<!-- Mobile Devices -->
<div class="tab-pane fade" id="pills-5" role="tabpanel" aria-labelledby="pills-5-tab">
    <table id="myDataTable3" class="table table-borderless table-hover" style="width:100%">
        <thead class="thead-dark">
            <tr>

              <th>Name</th>
              <th>Details</th>
              <th>Serial No</th>
              <th>IMEI/MAC Address</th>
              <th>Added At</th>
              <th width="15%">Edited At</th>
              <th>Added by</th>
              <th></th>
          </tr>
      </thead>
      <tbody>

          @foreach ($system_units as $system_units)
          <tr>

              <td> {{ $system_units->description }}-{{ $system_units->id }} </td>
              <td width="30%"> NONE </td>
              <td> NONE </td>
              <td> {{ $system_units->mac_address }} </td>
              <td> {{ $system_units->created_at }} </td>
              <td > {{ $system_units->updated_at }} </td>
              <td> {{ $system_units->fname }} {{ $system_units->lname }}</td>
              <td>  </td>
          </tr>
          @endforeach
        </tbody>

    </table>

</div>
</div>
</div>
<!-- Single Add Modal -->
<div class="modal fade" id="singleAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
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
                    <div class="row">
                        <p class="card-title">Equipment Subtype</p>
                        <select name="subtype_id" class="custom-select">
                        @foreach ($equipment_subtypes as $equipment_subtypes)
                            <option  value="{!! $equipment_subtypes->id !!}">
                                {{ $equipment_subtypes->name }}
                            </option>
                        @endforeach
                        </select>

                        <hr>
                        <!-- Name -->
                        <p class="card-title">Name</p>
                            <div class="input-group mb-3">
                            <input name="name" type="text" class="form-control">
                        </div>

                        <label for="details">Details</p>
                        <div class="input-group mb-1">
                            <textarea name="details" class="form-control" aria-label="With textarea"></textarea>
                        </div>
                        <label for="details">Warranty Details</p>
                        <div class="input-group mb-1">
                            <textarea name="warranty_details" class="form-control" aria-label="With textarea"></textarea>
                        </div>
                        <label for="serial_no">Serial Number</p>
                        <div class="input-group mb-1">
                            <input name="serial_no" type="text" class="form-control">
                        </div>

                        <label for="serial_no">IMEI/MAC address</p>
                        <div class="input-group mb-1">
                            <input name="imei_or_macaddress" type="text" class="form-control">
                        </div>

                        <p class="card-title">Official Receipt Numbers</p>
                        <div class="input-group mb-1">
                            <input name="or_no" type="text" class="form-control">
                        </div>
                        <label for="serial_no">Supplier</p>
                        <div class="input-group mb-1">
                            <input name="supplier" type="text" class="form-control">
                        </div>

                        <p class="card-title">System Unit Assigned To</p>
                        <select name="unit_id" class="custom-select">
                            <option value="NULL">Not Assigned</option>
                            @foreach ($units as $units)

                            <hr>
                            <option value="{!! $system_units->id !!}">
                                {{ $units->description }}-{{ $units->id }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                <!-- <button type="button" class="btn btn-info" type="submit" id="addEquipment"> <span class="fas fa-plus"></span>Add Item</button> -->
            </div>


            <div class="modal-footer text-uppercase">
                <button class="btn btn-info" type="submit" id= "AddEquipment">Add</button>

                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

            </div>
            </form>
          </div>
      </div>
    </div>
    <!--Build From Parts Modal-->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div id="buildFromPartsHeader" class="modal-header">
                    <h5 class="modal-title" id="ModalTitle"><i class="fas fa-wrench"></i>&nbsp;Build From Parts</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="container" style="padding:2rem">




                    <table class="table table-borderless table-striped table-hover" style="width:100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>Quantity</th>
                                <th>Component</th>
                                <th>Details</th>
                                <th>OR no.</th>
                                <th>Serial no.</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td></td>
                                <td>
                                    <select class="selectpicker">
                                    <option>Select Motherboard</option>
                                      <optgroup label="Motherboard category">
                                        <option></option>
                                        <option></option>
                                        <option></option>
                                      </optgroup>
                                    </select>
                                </td>

                            </tr>


                            <tr>
                                <td></td>
                                <td>
                                    <select class="selectpicker">
                                    <option>Select CPU</option>
                                      <optgroup label="Cpu category">
                                        <option></option>
                                        <option></option>
                                        <option></option>
                                      </optgroup>
                                    </select>
                                </td>

                            </tr>

                            <tr>
                                <td><input type="number" min="1" max="8" id="ramCount" class="form-control border" style="width:75px; max-width:75px; text-align: center;" value="1"></td>

                                <td>
                                    <select class="selectpicker">
                                    <option>Select Storage</option>
                                      <optgroup label="Storage category">
                                        <option></option>
                                        <option></option>
                                        <option></option>
                                      </optgroup>
                                    </select>
                                </td>

                            </tr>

                            <tr>
                                <td><input type="number" min="1" max="8" id="ramCount" class="form-control border" style="width:75px; max-width:75px; text-align: center;" value="1"></td>
                                <td>
                                    <select class="selectpicker">
                                    <option>Select RAM</option>
                                      <optgroup label="RAM category">
                                        <option></option>
                                        <option></option>
                                        <option></option>
                                      </optgroup>
                                    </select>
                                </td>

                            </tr>

                            <tr>
                                <td><input type="number" min="1" max="8" id="gpuCount" class="form-control border" style="width:75px; max-width:75px; text-align: center;" value="1"></td>
                                <td>
                                    <select class="selectpicker">
                                    <option>Select GPU</option>
                                      <optgroup label="GPU category">
                                        <option></option>
                                        <option></option>
                                        <option></option>
                                      </optgroup>
                                    </select>
                                </td>

                            </tr>


                            <!--optional
    <tr>
        <td></td>
        <td>
            <select class="selectpicker">
            <option>Select HDD</option>
              <optgroup label="cpu category">
                <option></option>
                <option></option>
                <option></option>
              </optgroup>
            </select>
        </td>

    </tr>
<tr>
        <td></td>
        <td>
            <select class="selectpicker">
            <option>Select SDD</option>
              <optgroup label="cpu category">
                <option></option>
                <option></option>
                <option></option>
              </optgroup>
            </select>
        </td>

    </tr>
-->

                            <tr>
                                <td></td>
                                <td>
                                    <select class="selectpicker">
                                    <option>Select Power Supply</option>
                                      <optgroup label="Select Power category">
                                        <option></option>
                                        <option></option>
                                        <option></option>
                                      </optgroup>
                                    </select>
                                </td>

                            </tr>

                            <tr>
                                <td></td>
                                <td>
                                    <select class="selectpicker">
                                    <option>Case</option>
                                      <optgroup label="Case category">
                                        <option></option>
                                        <option></option>
                                        <option></option>
                                      </optgroup>
                                    </select>
                                </td>

                            </tr>

                            <tr>
                                <td></td>
                                <td>
                                    <select class="selectpicker">
                                    <option>Heat Sink Fan</option>
                                      <optgroup label="Heat Sink Fan">
                                        <option></option>
                                        <option></option>
                                        <option></option>
                                      </optgroup>
                                    </select>
                                </td>

                            </tr>

                            <tr>
                                <td></td>
                                <td>
                                    <select class="selectpicker">
                                    <option>Mouse</option>
                                      <optgroup label="Mouse category">
                                        <option></option>
                                        <option></option>
                                        <option></option>
                                      </optgroup>
                                    </select>
                                </td>


                            </tr>

                            <tr>
                                <td></td>
                                <td>
                                    <select class="selectpicker">
                                    <option>Keyboard</option>
                                      <optgroup label="Keyboard category">
                                        <option></option>
                                        <option></option>
                                        <option></option>
                                      </optgroup>
                                    </select>
                                </td>

                            </tr>


                            <tr>
                                <td></td>
                                <td>
                                    <select class="selectpicker">
                                    <option>Monitor</option>
                                      <optgroup label="Monitor category">
                                        <option></option>
                                        <option></option>
                                        <option></option>
                                      </optgroup>
                                    </select>
                                </td>

                            </tr>





                        </tbody>

                    </table>
                    <div class="modal-footer">
                        <button id="save" type="button" class="btn btn-success" data-dismiss="modal" data-toggle="modal" href="#successAssociate"> <span class="fas fa-wrench"></span>Build</button>
                        <button id="cancel" type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                    </div>


                </div>
            </div>
        </div>
    </div>




    <!-- Add System Unit Modal                                   -->

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="addUnit">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <div id="addSystemUnit" class="modal-header">
                    <h5 class="modal-title" id="ModalTitle"><i class="fas fa-plus-square"></i>&nbsp;Add System Unit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="container" style="padding:2rem">
                  <form action="{!! url('/addSystemUnit'); !!}" enctype="multipart/form-data" method="post" role="form">
                      {!! csrf_field() !!}

                    <div class="row">
                        <div class="col-sm">

                            <table class="table table-borderless table-striped table-hover table-responsive table-condensed" style="width:100%; ">
                                <thead>
                                    <tr>
                                        <th>Mac Address</th>
                                        <th>Supplier</th>
                                        <th>OR no.</th>
                                        <th>Warranty</th>




                                    </tr>

                                </thead>
                                <tbody>
                                    <tr>
                                      <td> <input type="text" name="unit[mac_address]"></td>
                                        <td>
                                        <input type="text" name="unit[supplier]"><br>

                                        </td>
                                        <td> <input type="text" name="unit[or_no]"></td>
                                        <td>
                                                <label for="start">Start date:</label>
                                                <input type="date" id="start" name="unit[warranty_start]">
                                                <br>
                                                <label for="start">End date:</label>
                                                <input type="date" id="start" name="unit[warranty_end]">


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
                                        <th>Name</th>
                                        <th>Serial no.</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Motherboard <input type="text" name="equipment[subtype_id][]" value="1" hidden></td>
                                        <td> <input type="text" name="equipment[name][]"></td>
                                        <td> <input type="text" name="equipment[serial_no][]"</td>
                                        <td>
                                            <textarea name="equipment[details][]" rows="2" cols="22">
                                            </textarea>
                                        </td>


                                    </tr>


                                    <tr>
                                        <td>CPU<input type="text" name="equipment[subtype_id][]" value="2" hidden></td>
                                        <td> <input type="text" name="equipment[name][]"></td>
                                        <td> <input type="text" name="equipment[serial_no][]"</td>
                                        <td>
                                            <textarea name="equipment[details][]" rows="2" cols="22">
                                            </textarea>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Storage<input type="text" name="equipment[subtype_id][]" value="3" hidden></td>
                                        <td> <input type="text" name="equipment[name][]"></td>
                                        <td> <input type="text" name="equipment[serial_no][]"</td>
                                        <td>
                                            <textarea name="equipment[details][]" rows="2" cols="22">
                                            </textarea>
                                        </td>



                                    </tr>

                                    <tr>
                                        <td>RAM<input type="text" name="equipment[subtype_id][]" value="4" hidden></td>
                                        <td> <input type="text" name="equipment[name][]"></td>
                                        <td> <input type="text" name="equipment[serial_no][]"</td>
                                        <td>
                                            <textarea name="equipment[details][]" rows="2" cols="22">
                                            </textarea>
                                        </td>


                                    </tr>

                                    <tr>
                                        <td>GPU<input type="text" name="equipment[subtype_id][]" value="5" hidden></td>
                                        <td> <input type="text" name="equipment[name][]"></td>
                                        <td> <input type="text" name="equipment[serial_no][]"</td>
                                        <td>
                                            <textarea name="equipment[details][]" rows="2" cols="22">
                                            </textarea>
                                        </td>

                                    </tr>



                                    <tr>
                                        <td>Case<input type="text" name="equipment[subtype_id][]" value="7" hidden></td>
                                        <td> <input type="text" name="equipment[name][]"></td>
                                        <td> <input type="text" name="equipment[serial_no][]"</td>
                                        <td>
                                            <textarea name="equipment[details][]" rows="2" cols="22">
                                            </textarea>
                                        </td>



                                    </tr>

                                    <tr>
                                        <td>Heat Sink Fan<input type="text" name="equipment[subtype_id][]" value="8" hidden></td>
                                        <td> <input type="text" name="equipment[name][]"></td>
                                        <td> <input type="text" name="equipment[serial_no][]"</td>
                                        <td>
                                            <textarea name="equipment[details][]" rows="2" cols="22">
                                            </textarea>
                                        </td>


                                    </tr>

                                    <tr>
                                        <td>Sound Card<input type="text" name="equipment[subtype_id][]" value="18" hidden></td>
                                        <td> <input type="text" name="equipment[name][]"></td>
                                        <td> <input type="text" name="equipment[serial_no][]"</td>
                                        <td>
                                            <textarea name="equipment[details][]" rows="2" cols="22">
                                            </textarea>
                                        </td>


                                    </tr>
<!--
                                    <tr>
                                        <td>Optical Disk<input type="text" name="equipment[subtype_id][]" value="1" hidden></td>
                                        <td> <input type="text" name="equipment[name][]"></td>
                                        <td> <input type="text" name="equipment[serial_no][]"</td>
                                        <td>
                                            <textarea name="equipment[details][]" rows="2" cols="22">
                                            </textarea>
                                        </td>


                                    </tr> -->







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
            <!-- Add system_unit-->
            <div class="modal fade bd-example-modal-lg" id="adcdUnit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalTitle">Add System Unit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <!-- Add system unit Form -->
                        <div class="modal-body">
                          <form action="{!! url('/addSystemUnit'); !!}" enctype="multipart/form-data" method="post" role="form">
                              {!! csrf_field() !!}
                              <div class="row">
                                <p class="card-title">OR No.</p>
                                  <div class="col-md-3">
                                    <input name="unit[or_no]" type="text" class="form-control">
                                  </div>
                                  <p class="card-title">Supplier</p>
                                    <div class="col-md-3">
                                      <input name="unit[supplier]" type="text" class="form-control">
                                    </div>
                                    <p class="card-title">Mac Address</p>
                                      <div class="col-md-3">
                                        <input name="unit[mac_address]" type="text" class="form-control">
                                      </div>
                              </div>
                              <div class="row">
                              <div class="col-md-2">
                              </div></div>
                              <div class="row">

                                  <!-- Name -->
                                  <p class="card-title">Motherboard:</p> <hr>
                                  <p class="card-title">Name</p>
                                    <div class="col-md-3">
                                      <input name="equipment[name][]" type="text" class="form-control">
                                  </div>

                                  <label for="details">Details</p>
                                    <div class="col-md-15">
                                      <textarea name="equipment[details][]" class="form-control" aria-label="With textarea"></textarea>
                                  </div>
                                </div>
                                <div class="row">
                                <div class="col-md-2">
                                </div></div>
                                <div class="row">
                                  <p class="card-title">CPU:</p> <hr>
                                  <p class="card-title">Name</p>
                                      <div class="col-md-5">
                                      <input name="equipment[name][]" type="text" class="form-control">
                                  </div>

                                  <label for="details">Details</p>
                                    <div class="col-md-15">
                                      <textarea name="equipment[details][]" class="form-control" aria-label="With textarea"></textarea>
                                  </div>
                              </div>
                          <!-- <button type="button" class="btn btn-info" type="submit" id="addEquipment"> <span class="fas fa-plus"></span>Add Item</button> -->
                          </div>

                          <div class="modal-footer text-uppercase">
                          <button class="btn btn-info" type="submit" id= "AddEquipment">Add</button>

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


@stop
