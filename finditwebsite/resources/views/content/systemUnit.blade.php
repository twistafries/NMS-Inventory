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
<div class="container-fluid">
<nav class="navbar navbar-light">
        <span class="navbar-brand mb-0 h1">INVENTORY</span>
        <nav aria-label="breadcrumb" style="font-size:23px; font-weight:bold;">
                <ol class="breadcrumb arr-right">
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/inventory') !!}" class="text-warning" aria-current="page">Items</a>
                    </li>
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/repair') !!}" class="text-dark" >For Repair</a>
                    </li>
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/return') !!}" class="text-dark">For Return</a>
                    </li>
                    
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/decommissioned') !!}" class="text-dark">Decommissioned</a>
                    </li>
                </ol>
            </nav>
    </nav>

<!--
     Pills Tabs
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

         <li class="nav-item text-uppercase">
            <a class="nav-link" id="pills-2-tab" data-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-2" aria-selected="false">
                Computer Peripherals</a>
        </li>
        <li class="nav-item text-uppercase">
            <a class="nav-link" id="pills-3-tab" data-toggle="pill" href="#pills-3" role="tab" aria-controls="pills-3" aria-selected="false">
                Mobile Devices</a>
        </li>
        <li class="nav-item text-uppercase">
            <a class="nav-link" id="pills-4-tab" data-toggle="pill" href="#pills-4" role="tab" aria-controls="pills-4" aria-selected="false">tab 4</a>
        </li>
    </ul>
-->


<!--    PAGE CONTENT -->
      <div class="container-fluid">
                        <div class="container-fluid">

                            <div class="row">
                                <div class="container-fluid">
                                <ul class="nav nav-pills nav-justified">
                                <li class="nav-item">
                                  <a class="nav-link  font-weight-bolder" href="{!! url('/inventory') !!}">SUMMARY</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link  font-weight-bolder" href="{!! url('/inventoryAll') !!}">INVENTORY ITEMS LIST</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link active font-weight-bolder" href="{!! url('/systemUnit') !!}">SYSTEM UNITS</a>
                                </li>


                              </ul>

                                    </div>
                            </div>

                        </div>

                        <hr>
          
             <!-- Toolbox -->
    <div class="d-flex flex-row-reverse">
        <div class="p-2">
            <div class="btn-group" role="group" aria-label="Basic example">


                <button type="button" class="btn btn-outline-dark rounded-pill hide-column mr-2" id="hideColumn"  aria-haspopup="true" aria-expanded="false" style="border-radius:25px;" data-target="#singleAdd" data-toggle="modal">

                    <a href="#" data-toggle="tooltip" title="Single Add">
                        <img class="tool-item" src="{{ asset('assets/icons/table-toolbar-icons/add-icon.png') }}"> Single Add
                    </a>
                </button>
                <!-- Bulk add  -->
                <button type="button" class="btn btn-outline-dark rounded-pill mr-2" id="bulkAdd">
                    <a  data-toggle="tooltip" title="Bulk Add" href="{!! url('/bulk-add') !!}">
                        <img class="tool-item" src="{{ asset('assets/icons/table-toolbar-icons/box.png') }}"> Bulk Add
                    </a>
                </button>

                <!-- Add System Unit  -->
                <button type="button" class="btn btn-outline-dark rounded-pill mr-2" id="addSystemUnit" data-target="#systemUnit" data-toggle="modal">
                    <a href="#" data-toggle="tooltip" title="Add System Unit">
                        <img class="tool-item" src="{{ asset('assets/icons/table-toolbar-icons/system-unit.png') }}"> Add System Unit
                    </a>
                </button>

                <!-- Build A pc  -->
                 <button type="button" class="btn btn-outline-dark rounded-pill mr-2" id="buildAPc" data-target="#build" data-toggle="modal">
                    <a href="#" data-toggle="tooltip" title="Build A Pc">
                        <img class="tool-item" src="{{ asset('assets/icons/table-toolbar-icons/build.png') }}"> Build A Pc
                    </a>
                </button>

 


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
                            <div class="input-group">
                                <textarea name="details" rows="3" id="details"></textarea>
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

                <div class="modal-footer text-uppercase">
                    <button type="submit" class="btn btn-primary text-uppercase">ADD</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
                    </form>
            </div>
        </div>
    </div>


    <!--Build From Parts Modal-->
      
        <div class="p-2">
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="build">

        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div id="buildFromPartsHeader" class="modal-header">
                    <h5 class="modal-title" id="ModalTitle"><i class="fas fa-wrench"></i>&nbsp;Build From Available Parts</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body">
                <div class="container" style="padding:5rem">


                <form action="{!! url('/buildUnit'); !!}" method="post">
                      {!! csrf_field() !!}

                  <p class="card-title text-dark">Name:</p>
                    <div class="input-group">
                        <input name="name" type="text" class="form-control" required>
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
                    </form>

                </div>
              </div>


        <div class="modal-footer">

            <button type="submit" class="btn btn-success"><span class="fas fa-wrench"></span> BUILD</button>
            <button id="cancel" type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
        </div>



    </div>
    </div>
    </div>




    <!-- Add System Unit Modal-->

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="systemUnit">
        <div class="modal-dialog modal-xxl">
            <div class="modal-content">

                <div id="addSystemUnit" class="modal-header">
                    <h5 class="modal-title" id="ModalTitle"><i class="fas fa-plus-square"></i>&nbsp;Add System Unit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body">
                    <form id="addSystemUnitForm" action="{!! url('/addSystemUnit'); !!}" enctype="multipart/form-data" method="post" role="form">
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

                            </form>
                            </div>

                        <div class="modal-footer">
                            <button id="save" class="btn btn-success" type="submit"> <span class="fas fa-plus-square"></span>&nbsp;Add System Unit</button>
                            <button id="cancel" type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
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



                     
                            <div class="row">
                                <h4>System Units</h4>
                                <div class="container-fluid">
                                    <!--
                                    <div class="collapse-group">

                                        <div class="controls">
                                            <button class="btn btn-primary open-button" type="button">
      Open all
    </button>
                                            <button class="btn btn-primary close-button" type="button">
      Close all
    </button>

                                    </div>
-->


    @stop @section('script')
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
        $(document).ready(function() {
            $('#inventory').addClass('active');
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('input').attr('autocomplete', 'off');
        });

    </script>
    <script>
        $(document).ready(function() {
            $('#myDataTable').DataTable({
                "pagingType": "full_numbers",
                responsive: true,
                "order": []
            });
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myDataTable1').DataTable({
                "pagingType": "full_numbers",
                "order": []
            });
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myDataTable2').DataTable({
                "pagingType": "full_numbers",
                "order": []
            });
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myDataTable3').DataTable({
                "pagingType": "full_numbers",
                "order": []
            });
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myDataTable4').DataTable({
                "pagingType": "full_numbers",
                "order": []
            });
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myDataTable5').DataTable({
                "pagingType": "full_numbers",
                "order": []
            });
        });

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
        function DoSubmit() {
            var item = $(equipment).val();
            document.getElementById("equipment").value = $('#items [value="' + item + '"]').data('customvalue');
            var item1 = $(hequipment).val();
            document.getElementById("hequipment").value = $('#item [value="' + item1 + '"]').data('customvalue');
            return true;
        };

    </script>
    <script>
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var type = $('#types').val();
                var subtype = $('#subtypes').val();
                var supplier = $('#supplier').val();
                var brand = $('#brand').val();
                var status = $('#status').val();
                var types = data[3]; // use data for the age column
                var subtypes = data[4];
                var suppliers = data[5];
                var brands = data[2];
                var statuses = data[11];
                if (type == types || type == "any") {
                    if (subtype == subtypes || subtype == "any") {
                        if (supplier == suppliers || supplier == "any") {
                            if (brand == brands || brand == "any") {
                                if (status == statuses || status == "any") {
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
            $('#subtypes').on('keyup change', function() {
                table.draw();
            });
            $('#types').on('keyup change', function() {
                table.draw();
            });
            $('#supplier').on('keyup change', function() {
                table.draw();
            });
            $('#brand').on('keyup change', function() {
                table.draw();
            });
            $('#status').on('keyup change', function() {
                table.draw();
            });
        });
        $(document).ready(function() {
            var table = $('#myDataTable1').DataTable();

            // Event listener to the two range filtering inputs to redraw on input
            $('#subtypes').on('keyup change', function() {
                table.draw();
            });
            $('#types').on('keyup change', function() {
                table.draw();
            });
            $('#supplier').on('keyup change', function() {
                table.draw();
            });
            $('#brand').on('keyup change', function() {
                table.draw();
            });
            $('#status').on('keyup change', function() {
                table.draw();
            });
        });

        $(document).ready(function() {
            var table = $('#myDataTable2').DataTable();

            // Event listener to the two range filtering inputs to redraw on input
            $('#subtypes').on('keyup change', function() {
                table.draw();
            });
            $('#types').on('keyup change', function() {
                table.draw();
            });
            $('#supplier').on('keyup change', function() {
                table.draw();
            });
            $('#brand').on('keyup change', function() {
                table.draw();
            });
            $('#status').on('keyup change', function() {
                table.draw();
            });
        });
        $(document).ready(function() {
            var table = $('#myDataTable3').DataTable();

            // Event listener to the two range filtering inputs to redraw on input
            $('#subtypes').on('keyup change', function() {
                table.draw();
            });
            $('#types').on('keyup change', function() {
                table.draw();
            });
            $('#supplier').on('keyup change', function() {
                table.draw();
            });
            $('#brand').on('keyup change', function() {
                table.draw();
            });
            $('#status').on('keyup change', function() {
                table.draw();
            });
        });
        $(document).ready(function() {
            var table = $('#myDataTable4').DataTable();

            // Event listener to the two range filtering inputs to redraw on input
            $('#subtypes').on('keyup change', function() {
                table.draw();
            });
            $('#types').on('keyup change', function() {
                table.draw();
            });
            $('#supplier').on('keyup change', function() {
                table.draw();
            });
            $('#brand').on('keyup change', function() {
                table.draw();
            });
            $('#status').on('keyup change', function() {
                table.draw();
            });
        });
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
        function reset() {
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

        function restore(option) {
            if (option == false) {
                $("#types").hide();
                $("#labelTypes").hide();
                reset()
            } else {
                $("#types").show();
                $("#labelTypes").show();
                reset()

            }
        };

    </script>
    <!--
  <script>
        $(".open-button").on("click", function() {
            $(this).closest('.collapse-group').find('.collapse').collapse('show');
        });

        $(".close-button").on("click", function() {
            $(this).closest('.collapse-group').find('.collapse').collapse('hide');
        });

</script>
-->
    <script>
        $('#collapsedown1').click(function() {
            $('#collapseOne').toggle('1000');
            $("i", this).toggleClass("fas fa-arrow-circle-down fas fa-arrow-circle-up");

        });

        $('#collapsedown2').click(function() {
            $('#collapseTwo').toggle('1000');
            $("i", this).toggleClass("fas fa-arrow-circle-down fas fa-arrow-circle-up");

        });

        $('#collapsedown3').click(function() {
            $('#collapseThree').toggle('1000');
            $("i", this).toggleClass("fas fa-arrow-circle-down fas fa-arrow-circle-up");

        });

        $('#collapsedown4').click(function() {
            $('#collapseFour').toggle('1000');
            $("i", this).toggleClass("fas fa-arrow-circle-down fas fa-arrow-circle-up");

        });

    </script>



    @stop
