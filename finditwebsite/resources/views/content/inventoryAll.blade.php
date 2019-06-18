<?php
  use Carbon\Carbon;
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
<div class="container-fluid">
<nav class="navbar navbar-light">
    <span class="navbar-brand mb-0 h1">INVENTORY</span>
    <!-- Toolbox -->
    @include('content.toolbar')
    @include('content.breadcrumb_inventory')
</nav>

<!--    PAGE CONTENT -->
      <div class="container-fluid">
                        <div class="container-fluid pb-4">

                            <div class="row">
                                <div class="container-fluid">
                                <ul class="nav nav-pills nav-justified">
                                <li class="nav-item">
                                  <a class="nav-link font-weight-bolder" href="{!! url('/inventory') !!}">SUMMARY</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link active font-weight-bolder" href="{!! url('/inventoryAll') !!}">INVENTORY ITEM LIST</a>
                                </li>


                              </ul>
                                    </div>
                            </div>

                        </div>


                    </div>
<!--    PAGE CONTENT END -->

@section('')

@stop
@if(Session::has('warning'))
<div class="alert alert-warning" role="alert">
    <h4 class="alert-heading">Warning</h4>
    {{ Session::get('warning') }}
    <button type="button" class="close btn-primary" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(Session::has('error'))
<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Error</h4>
  {{ Session::get('error') }}

  @if(Session::has('error_info'))
    <a class="btn btn-fail" data-toggle="collapse" href="#errorInfoCollapse" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"> <span>▶</span> </a>
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
  <a class="btn btn-success" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"> <span class="glyphicon glyphicon-chevron-down"></span></a>
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

<div class="row">
  <div class="col-3">
  </div>
  <div class="col-3"></div>
  <div class="col-3 text-right">
    <label class="font-weight-bolder text-uppercase text-left">Date added From:</label>
    <input type="date" name="min" id="min" value="" style="width: 10rem;">
  </div>
  <div class="col-3 text-right">
    <label class="font-weight-bolder text-uppercase text-left">To:</label>
    <input type="date" name="max" id="max" value="" style="width: 10rem;">
  </div>
</div>

<table style="margin: auto;width: 100%; text-align: right; ">
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
      <option value="{{$suppliers->supplier_name}}">{{$suppliers->supplier_name}}</option>
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
    <button class="btn btn-secondary p-2" type="button" onclick="reset()">Reset</button>
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


                        <th>ID</th>
                        <th>Model</th>
                        <th>Brand</th>
                        <th>Types</th>
                        <th>Subtype</th>
                        <th>Serial No</th>
                        <th>Supplier</th>
                        <th>Added by</th>
                        <th>Date Added</th>
                        <th>Status</th>
                        <th hidden></th>
                        <th hidden></th>
                        <th hidden></th>
                        <th hidden></th>
                        <th hidden></th>
                        <th hidden></th>
                    </tr>
                </thead>
                <tbody>


                    @foreach ($equipment as $equipment)
                    <tr data-toggle="modal" data-target="#modal-{!! $equipment->id !!}">


                        <td> {{ $equipment->id }} </td>
                        <td> {{ $equipment->model }} </td>
                        <td> {{ $equipment->brand }} </td>
                        <td> {{ $equipment->type_name }} </td>
                        <td> {{ $equipment->subtype_name }} </td>
                        <td> {{ $equipment->serial_no }} </td>
                        <td> {{ $equipment->supplier }} </td>
                        <td> {{ $equipment->firstname }} {{ $equipment->lastname }} </td>
                        <td> {{ $equipment->added_at }} </td>
                        <td> {{ $equipment->status_name }} </td>
                        <td hidden> {{ $equipment->details }} </td>
                        <td hidden>{{ $equipment->warranty_start }}</td>
                        <td hidden>{{ $equipment->warranty_end }}</td>
                        <td hidden> {{ $equipment->imei_or_macaddress }} </td>
                        <td hidden> {{ $equipment->or_no }} </td>
                        <td hidden> {{ $equipment->status_id }} </td>

                    </tr>
                    @endforeach

                    <!-- View Details All Modal -->
                    @foreach ($eqp as $equipment)
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
                                            <div class="col col-4 details" id="fullname">{{ $equipment->added_at }}</div>

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

                                        <!-- Issue Item Button -->
                                        @if( $equipment->type_id != 1 && $equipment->status_id == 1 )
                                        <div class="row row-details self-align-end">
                                            <button type="button" class="btn btn-info pr-2" data-dismiss="modal" data-toggle="modal" onclick="issueItem({!! $equipment->id !!})" data-target="#issue-modal">
                                                <i class="fas fa-hand-holding"></i>  Issue Item
                                            </button>
                                        </div>
                                        @endif

                                        <!-- MArk As -->
                                        <div class="row row-details">
                                           <div class="col col-4 detail-header text-uppercase">Mark As: </div>
                                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                            @if($equipment->warranty_end < Carbon::today())
                                            <button type="button" class="btn btn-warning pr-2" data-dismiss="modal" data-toggle="modal" data-target="#for-repair">
                                                For Repair
                                            </button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="modal"
                                                data-target="#decommissionedModal">Decommission</button>
                                                @else
                                                @if($equipment->status_id == 4)
                                                <button type="button" class="btn btn-success" data-dismiss="modal" data-toggle="modal" data-target="#return">Make Available</button>
                                                <button type="button" class="btn btn-warning" data-dismiss="modal" data-toggle="modal" data-target="#return">For Repair</button>
                                                @else
                                                <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal"
                                                    data-target="#return"><i class="fas fa-undo-alt"></i> For Return</button>
                                                @endif
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="modal"
                                                    data-target="#decommissionedModal"><i class="fas fa-trash-alt"></i> Decommission Item</button>
                                                @endif
                                        </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#edit">Edit Values</button>

                                    <button type="button" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" data-target="#deleteModal">Delete Entry</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach


                    <!-- Return to supplier warning modal -->
                    <div class="modal fade" id="return" tabindex="-1" role="dialog" aria-labelledby="toBeReturnedModalTitle"
                        aria-hidden="true">

                        <div class="modal-dialog" role="document">
                            <div class="modal-content" style="height:380px; width:620px;">
                                <div class="modal-header">
                                <h5 class="modal-title">For Return</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{!! url('/add-to-concerns-equipment'); !!}" method="post">
                                    {!! csrf_field() !!}
                                <div class="modal-body">
                                    <div class="warning-content" style="text-align: center;">
                                        <p class="text-uppercase font-weight-bold text-warning">Warning!</p>
                                        <h5 class="text-center">Are you sure you want to return equipment,
                                            <b><h4 id="returnitemNAme"></h4></b>
                                            back to
                                            <b><h4 id="returnSupplier"></h4></b>

                                        </h5>

                                    </div>
                                    <br>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-warning" data-toggle="collapse"
                                            data-target="#remarks" aria-expanded="false" aria-controls="collapseExample" type="button">
                                            Add Remarks
                                        </button>
                                        <div class="collapse" id="remarks">
                                            <textarea class="form-control" name="remarks" placeholder="Place remarks" cols="50"></textarea>
                                        </div>

                                    </div>

                                    <input type="hidden" name="id" id="forReturn" value="">
                                    <input type="hidden" name="status_id" value="4">
                                    <input type="hidden" name="orig_status_id" id="forReturn_orig_status_id" value="">
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary p-2">Return to supplier</button>
                                </form>
                                    <button type="button" class="btn btn-warning" data-dismiss="modal" data-toggle="modal" data-target="#for-repair">Mark for repair</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>




                    <!-- For Repair to supplier warning modal -->
                    <div class="modal fade" id="for-repair" tabindex="-1" role="dialog" aria-labelledby="toBeReturnedModalTitle"
                        aria-hidden="true">

                        <div class="modal-dialog" role="document">
                            <div class="modal-content" style="height:380px; width:620px;">
                                <div class="modal-header">
                                <h5 class="modal-title">For Repair Equipment Warning</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{!! url('/add-to-concerns-equipment'); !!}" method="post">
                                    {!! csrf_field() !!}
                                <div class="modal-body">
                                    <div class="warning-content" style="text-align: center;">
                                        <p class="text-uppercase font-weight-bold text-warning">Warning!</p>
                                          <pre ><span class="inner-pre" style="font-size: 15px">Are you sure you want to mark equipment,<h4 id="repairitemNAme"></h4>  for repair?</span></pre>
                                    </div>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-warning" data-toggle="collapse"
                                            data-target="#remarks-4" aria-expanded="false" aria-controls="collapseExample" type="button">
                                            Add Remarks
                                        </button>
                                        <div class="collapse" id="remarks-4">
                                            <textarea class="form-control" name="remarks" placeholder="Place remarks"></textarea>
                                        </div>

                                    </div>

                                    <input type="hidden" name="id" id="forRepair" value="">
                                    <input type="hidden" name="status_id" value="3">
                                    <input type="hidden" name="orig_status_id" id="forRepair_orig_status_id" value="">
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">For Repair</button>
                                </form>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Decomissioned -->
                    <div class="modal fade" id="decommissionedModal" tabindex="-1" role="dialog" aria-labelledby="decommissionedModalTitle"
                        aria-hidden="true">

                            <div class="modal-dialog" role="document">
                                <div class="modal-content" style="height:450px;">
                                    <div class="modal-header">
                                    <h5 class="modal-title"></h5>
                                        Decommission Equipment Warning
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <form action="{!! url('/add-to-concerns-equipment'); !!}" method="post">
                                        {!! csrf_field() !!}
                                        <div class="modal-body">
                                            <div class="warning-content" style="text-align: center;">
                                                <p class="text-uppercase font-weight-bold text-warning">Warning!</p>
                                                <pre ><span class="inner-pre" style="font-size: 15px">Are you sure you want to mark equipment,<h4 id="itemNAme"></h4>  for decommission?</span></pre>
                                            </div>
                                            <div class="btn-group" role="group">
                                                <button class="btn btn-warning" data-toggle="collapse"
                                                    data-target="#remarks" aria-expanded="false" aria-controls="collapseExample"
                                                    type="button">
                                                    Add Remarks
                                                </button>
                                                <div class="collapse" id="remarks">
                                                    <textarea class="form-control" name="remarks" placeholder="Place remarks"></textarea>
                                                </div>

                                            </div>

                                            <input type="hidden" name="id" id="decommission_id" value="">
                                            <input type="hidden" name="status_id" value="7">
                                            <input type="hidden" name="orig_status_id" id="orig_status_id_decommissioned" value="">
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Decommission</button>
                                    </form>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                    </div>





                    <!-- Permanently Delete -->

                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">

                            <div class="modal-dialog" role="document">
                                <div class="modal-content" style="height:500px;">
                                    <div class="modal-header">
                                    <h5 class="modal-title"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body" style="text-align: center;">
                                      <div class="warning-content">
                                          <p class="text-danger text-uppercase font-weight-bold">Warning!</p>
                                          <pre><span class="inner-pre" style="font-size: 15px">Are you sure you want to permanently delete<h4 id="deleteitemNAme"></h4>   from the inventory?</span></pre>
                                      </div>

                                    </div>

                                    <div class="modal-footer">
                                        <form action="{!! url('/hardDeleteEquipment'); !!}" method="post">
                                        {!! csrf_field() !!}
                                        <input  name="equipment_id" id="delete_id" value="" hidden>
                                        <input  name="deleted_item" id="deleted_item" value="" hidden>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                    </div>








                    <!-- Edit Details Modal -->
                    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit"
                        aria-hidden="true">
                        <form action="{!! url('/editEquipment'); !!}" method="post">
                            {!! csrf_field() !!}
                            <input type="hidden" name="id" id="id" value="">
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
                                                        <input name="model" id="model" value="">
                                                    </li>
                                                    <li class="list-group-item">
                                                        <h6 class="font-weight-bolder text-uppercase text-left">Brand:</h6>
                                                        <input name="brand" id="brand_eqp" value="">
                                                    </li>
                                                    <li class="list-group-item">
                                                        <h6 class="font-weight-bolder text-uppercase text-left">Serial Number: </h6>
                                                        <input name="serial_no" id="serial_no" value="">
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="col">
                                                <ul class="list-group">

                                                    <li class="list-group-item">
                                                        <h6 class="font-weight-bolder text-uppercase text-left">IMEI/MAC Address:</h6>
                                                        <input name="imei_or_macaddress" id="imei_or_macaddress" value="">
                                                    </li>

                                                    <li class="list-group-item">
                                                        <h6 class="font-weight-bolder text-uppercase text-left">Official Receipt No: </h6>
                                                        <input name="or_no" id="or_no" value="">
                                                    </li>
                                                    <li class="list-group-item">
                                                        <h6 class="font-weight-bolder text-uppercase text-left">Supplier: </h6>
                                                        <input  list="suppliers" name="supplier" required style="width: 9rem;">
                                                        <datalist id="suppliers">
                                                            <select>
                                                            @foreach ($supp as $supplier)
                                                            <option value="{{ $supplier->supplier_name}}">
                                                            @endforeach
                                                        </select>
                                                        </datalist>
                                                    </li>
                                                </ul>
                                            </div>


                                            <div class="col-sm-12">
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        <h6 class="font-weight-bolder text-uppercase">Details:</h6>
                                                        <textarea rows="4" cols="50" name="details" id="details"></textarea>

                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">                                                                                            <ul class="list-group">
                                                <ul class="list-group"></ul>
                                                    <li class="list-group-item">
                                                        <h6 class="font-weight-bolder text-uppercase text-left">Warranty Start:</h6>
                                                            <input type="date" name="warranty_start" id="warranty_start_eqp" value="">
                                                        </h6>
                                                    </li>
                                                <ul>
                                            </div>
                                            <div class="col">                                                                                            <ul class="list-group">
                                                <ul class="list-group"></ul>
                                                    <li class="list-group-item">
                                                        <h6 class="font-weight-bolder text-uppercase text-left">Warranty End:</h6>
                                                            <input type="date" name="warranty_end" id="warranty_end_eqp" value="">
                                                        </h6>
                                                    </li>
                                                <ul>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>



              </tbody>

            </table>
        </div>

    <!-- Issue Modal -->
    <div class="modal fade" id="issue-modal" tabindex="-1" role="dialog" aria-labelledby="modal-{!! $equipment->model !!}"
                        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" style=" width: 1000px;">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="container">
                        <h5 class="modal-title" id="ModalTitle">Issue Item Modal</h5>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{!! url('/issueEquipment'); !!}" method="post" onsubmit="DoSubmit()">
                {!! csrf_field() !!}
                <div class="modal-body">
                    <div class="container-fluid" id="issueToModalBody">
                        <!-- Issue To  -->
                        <div class="row">
                            <input type="hidden" name="equipment_id" id="eq_id">
                            <div class="col col-2 detail-header text-uppercase">Issue To</div>
                                <input list="employee" name="issued_to" id="issuedTo" onblur="CheckListedEmployee(this.value)" required>
                                <datalist id="employee">
                                    @foreach ($active_employees as $employees)
                                    <option data-customvalue="{{ $employees->id}}" value="{{ $employees->fname}} {{ $employees->lname}} (ID: {{ $employees->id}})">
                                    @switch($employees->dept_id)
                                        @case(1)
                                            ITDD
                                            @break
                                        @case(2)
                                            PDD
                                            @break
                                        @case(3)
                                            FD
                                            @break
                                        @case(4)
                                            HRD
                                            @break

                                    @endswitch
                                    </option>
                                    @endforeach
                                </datalist>

                        </div>

                        <hr>
                        <div class="row row-details">
                            <div class="col col-4 detail-header text-uppercase">Issue Until</div>
                            <input type="date" class="form-control" name="issued_until" id="issued_until" >
                            <br>
                            <!-- <button type="button" class="btn btn-secondary text-uppercase"> Issue Item Indefinetely </button> -->
                        </div>

                        <hr>
                        <div class="row row-details">
                            <div class="col col-4 detail-header text-uppercase">Remarks</div>
                            <textarea rows="4" cols="50" name="remarks" id="remarks"></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Issue Item</button>
                </form>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
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
                    <form action="{!! url('/addEquipment'); !!}" enctype="multipart/form-data" method="post" role="form" id="singleAddForm">
                    {!! csrf_field() !!}
                    <div class="row pb-2">
                        <div class="col">
                        <p class="card-title text-dark">Equipment Subtype:</p>
                        <select name="subtype_id" id="selectComp" class="custom-select" onchange="subtypeTextArea()">
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
                            <div  class="input-group">
                                <textarea id="detailsArea" name="details" rows="3" id="details">
                       </textarea>
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
                                <option value="{!! $units->id !!}">
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

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
                    </form>
            </div>
        </div>
    </div>


    <!--Build From Parts Modal-->





    <!-- Add System Unit Modal -->

    @include('content.addunit')

    <!-- Add Subtype Modal -->

<div class="modal fade" id="addSubtype" tabindex="-1" role="dialog" aria-labelledby="addSubtypeTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="height:450px;">
            <div id="addSubtypeHeader" class="modal-header">
                <h5 class="modal-title" id="ModalTitle"><i class="far fa-plus-square"></i>&nbsp;Add Subtype</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <div class="container pb-2">
             <div class="row pt-2">
                        <div class="col">
                        <p class="card-title text-dark">Equipment Type:</p>
                        <select name="subtype_id" class="custom-select">
                        @foreach ($equipment_types as $equipment_types)
                            <option  value="{!! $equipment_subtypes->id !!}">
                                {{ $equipment_types->name }}
                            </option>
                        @endforeach
                        </select>
                        </div>
                    </div>
                <div class="row pt-2">
                        <div class="col">
                        <p class="card-title text-dark">Equipment Subtype:</p>

                            <div class="input-group">
                                <input name="subtype" type="text" size="30">
                            </div>
                        </div>
                    </div>
                </div>
              </div>
             <div class="modal-footer">
                            <button id="save" class="btn btn-success" type="submit"> <span class="fas fa-plus-square"></span>&nbsp;Add System Unit</button>
                            <button id="cancel" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script> -->
    <script src="{{ asset('js/jqueryvalidation/dist/jquery.validate.js') }}"></script>
	<!-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script> -->
    <script src="{{ asset('js/jqueryvalidation/dist/additional-methods.min.js') }}"></script>
	<script src="{{ asset('js/validation-inventory.js') }}"></script>

    <!-- Multiple Select -->
    <script src="{{ asset('js/multipleselect/multiple-select.js') }}"></script>

    <!-- Additional Scripts   -->
    <script type="text/javascript" src="{{ asset('js/datatable/dataTables.select.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/datatable/dataTables.checkboxes.min.js') }}"></script>

    <script>
    $(document).ready(function(){
        $('#inventory').addClass('active');
        $('#breadcrumb_items').removeClass("text-dark").addClass("text-warning");
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('input').attr('autocomplete','off');
      });
    </script>

    @if(Session::has('type_filter'))
    <script>
        $(document).ready(function () {
            document.getElementById("types").selectedIndex = "{!! Session::get('type_filter'); !!}";
            document.getElementById("subtypes").selectedIndex = "{!! Session::get('subtype_filter'); !!}";
            document.getElementById("status").selectedIndex = "{!! Session::get('status_filter'); !!}";
        })
    </script>
    @endif
    <script>
    $(document).ready(function() {
        $('#myDataTable').DataTable({
           "pagingType": "full_numbers",
           responsive: true,
           "order": []});
    } );
    </script>

    <script>
    function DoSubmit(){
      var name = $(issuedTo).val();
      document.getElementById("issuedTo").value = $('#employee [value="' + name + '"]').data('customvalue');
      return true;
      }
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
    $.fn.dataTable.ext.search.push(
function( settings, data, dataIndex ) {
var type =  $('#types').val();
var subtype =  $('#subtypes').val();
var supplier =  $('#supplier').val();
var brand =  $('#brand').val();
var status =  $('#status').val();
var types = data[3]; // use data for the age column
var subtypes = data[4];
var suppliers = data[6];
var brands = data[2];
var statuses = data[9];

function subtypeUnblock(element) {
    $("#subtypes option:nth-child("+element+")").show();
}

function subtypeBlockAll(){
    $("#subtypes > option").hide();
}

function subtypeUnBlockAll(){
    $("#subtypes > option").show();
}

if( type == "Computer Component" ){
    subtypeBlockAll();

    for (var i = 1; i <= 9; i++) {
        subtypeUnblock(i);
    }
}
else if ( type == "Computer Peripheral"){
    subtypeBlockAll();
    subtypeUnblock(1);

    for(var i=10; i<=12; i++){
        subtypeUnblock(i);
    }
}
else if( type == "Mobile Device" ){
    subtypeBlockAll();
    subtypeUnblock(1);

    for (var i = 13; i <= 15; i++) {
        subtypeUnblock(i);
    }
}
else if (type == "Software License") {
    subtypeBlockAll();
    subtypeUnblock(1);

    for (var i = 16; i <= 18; i++) {
        subtypeUnblock(i);
    }
}else{
    subtypeUnBlockAll();
}

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

        function reset(){
          document.getElementById("subtypes").selectedIndex = "0";
          document.getElementById("types").selectedIndex = "0";
          document.getElementById("supplier").selectedIndex = "0";
          document.getElementById("brand").selectedIndex = "0";
          document.getElementById("status").selectedIndex = "0";
          document.getElementById("min").value = "";
          document.getElementById("max").value = "";
          $('#myDataTable').DataTable().search('').draw();

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
  <script>
        $(".open-button").on("click", function() {
            $(this).closest('.collapse-group').find('.collapse').collapse('show');
        });

        $(".close-button").on("click", function() {
            $(this).closest('.collapse-group').find('.collapse').collapse('hide');
        });

    </script>

    <script type="text/javascript">
    function issueItem(id){
        console.log(id);
        $('#eq_id').val(id);

    }
// function issueItem(id){
//     $.ajax({
//         url: 'issueItem/' + id,
//         type: 'get',
//         dataType: 'json',
//         success: function(response){
//             console.log("Response " + response['equipment']);
//             console.log("Response " + response['equipment']);
//             len = response['active_employees'].length;
//             console.log("len" + len);

//             if(len > 0){
//                 for(var i=0; i < len; i++){
//                     var emp_id = response['active_employees'][i].id;
//                     var emp_firstName = response['active_employees'][i].fname;
//                     var emp_lastName = response['active_employees'][i].lname;
//                     var emp_department = response['active_employees'][i].dept_name;
//                 }

//                 var employeeOption =
//                 '<option>' + emp_id + ' ' + emp_firstName + ' ' + emp_lastName + ' ' + emp_department + '</option>';

//                 $('#issuedTo').append(employeeOption);
//             }
//         }
//     })
// }

function toggle(source) {
    checkboxes = document.getElementsByName('ALL');
    for ( var i in checkboxes)
        checkboxes[i].checked = source.checked;
}

function toggle2(source) {
    checkboxes2 = document.getElementsByName('status');
    for ( var i in checkboxes2)
        checkboxes2[i].checked = source.checked;
}

$('a.warranty-not').click(function(){
    console.log("Warranty not Covered");

    $('<button type="button" class="btn btn-warning text-uppercase pr-2" data-dismiss="mod           al" data-toggle="modal" data-target="#for-repair">For Repair</button>').appendTo($(this).parent().parent());

})


</script>

@include('partials._singleadd')
<script>

    var table = document.getElementById('myDataTable');

    for(var i = 1; i < table.rows.length; i++)
    {
        table.rows[i].onclick = function()
        {
             //rIndex = this.rowIndex;
             document.getElementById("id").value = this.cells[0].innerHTML;
             document.getElementById("delete_id").value = this.cells[0].innerHTML;
             document.getElementById("model").value = this.cells[1].innerHTML;
             document.getElementById("brand_eqp").value = this.cells[2].innerHTML;
             document.getElementById("serial_no").value = this.cells[5].innerHTML;
             document.getElementById("imei_or_macaddress").value = this.cells[13].innerHTML;
             document.getElementById("or_no").value = this.cells[14].innerHTML;
             document.getElementById("supplier_eqp").value = this.cells[6].innerHTML;
             document.getElementById("details").value = this.cells[10].innerHTML;
             document.getElementById("warranty_start_eqp").value = this.cells[11].innerHTML;
             document.getElementById("warranty_end_eqp").value = this.cells[12].innerHTML;
             document.getElementById("itemNAme").innerHTML = this.cells[2].innerHTML + " " + this.cells[1].innerHTML;
             document.getElementById("deleteitemNAme").innerHTML = this.cells[2].innerHTML + " " + this.cells[1].innerHTML;
             document.getElementById("repairitemNAme").innerHTML = this.cells[2].innerHTML + " " + this.cells[1].innerHTML;
             document.getElementById("returnitemNAme").innerHTML = this.cells[2].innerHTML + " " + this.cells[1].innerHTML;
             document.getElementById("deleted_item").value = this.cells[2].innerHTML + " " + this.cells[1].innerHTML;
             document.getElementById("decommission_id").value = this.cells[0].innerHTML;
             document.getElementById("forRepair").value = this.cells[0].innerHTML;
             document.getElementById("forReturn").value = this.cells[0].innerHTML;
             document.getElementById("returnSupplier").innerHTML = this.cells[6].innerHTML + "?";
             document.getElementById("orig_status_id_decommissioned").value = this.cells[15].innerHTML;
             document.getElementById("forRepair_orig_status_id").value = this.cells[15].innerHTML;
             document.getElementById("forReturn_orig_status_id").value = this.cells[15].innerHTML;
        };
    }

</script>
<script type="text/javascript">
$.fn.dataTable.ext.search.push(
      function (settings, data, dataIndex) {
      var minimum = $('#min').val();
      var maximum = $('#max').val();
      var min = new Date(minimum);
      var max = new Date(maximum);
      var startDate = new Date(data[8]);
      console.log(startDate);
      if (isNaN(min) && isNaN(max) ) { return true; }
      if (isNaN(min)  && startDate <= max) { return true;}
      if(isNaN(max) && startDate >= min) {return true;}
      if (startDate <= max && startDate >= min) { return true; }
        console.log("false"); return false;
  });

  $(document).ready(function() {
  var table = $('#myDataTable').DataTable();

  // Event listener to the two range filtering inputs to redraw on input
  $('#min').on('keyup change',  function() {
      table.draw();
      } );
      $('#max').on('keyup change',  function() {
          table.draw();
      } );
    });


</script>

<script>
    </script>

@stop
