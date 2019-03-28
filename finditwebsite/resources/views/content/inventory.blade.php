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
                All</a>
        </li>

        

        @foreach ($equipment_types as $equipment_types)
        <li class="nav-item text-uppercase">
            <a class="nav-link" id="pills-{!! $equipment_types->id !!}-tab" data-toggle="pill" href="#pills-{!! $equipment_types->id !!}" role="tab" aria-controls="pills-{!! $equipment_types->id !!}" aria-selected="false">
                {{ $equipment_types->name }}
            </a>
        </li>
        @endforeach

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
                    <a class="dropdown-item" data-toggle="modal" data-target="#singleAdd" href="#">Add Equipment</a>
                    <a class="dropdown-item" href="#">Bulk Add</a>
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
                        <th></th>
                        <th>Name</th>
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
                        <td></td>
                        <td> {{ $equipment->name }} </td>
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
                        <th></th>
                        <th>Name</th>
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
                        <td></td>
                        <td> {{ $peripherals->name }} </td>
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
                        <th></th>
                        <th>Name</th>
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
                        <td></td>
                        <td> {{ $mobile->name }} </td>
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

    </div>
</div>

<!-- Single Add Modal -->
<div class="modal fade" id="singleAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalTitle">Add Equipment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Add Equipment Form -->
            <div class="modal-body">
                <form id="addEquipmentForm" action="{!! url('/add-equipment'); !!}" enctype="multipart/form-data" method="post" role="form">
                    {!! csrf_field() !!}                       
                    
                    <div class="row">
                        <!-- Subtype -->
                        <div class="col-sm-12 col-lg-6 col-md-6">
                            <p class="label">Equipment Subtype</p>
                            <select name="subtype_id" class="custom-select no-max">
                                @foreach ($equipment_subtypes as $equipment_subtypes)
                                <option value="{!! $equipment_subtypes->id !!}">
                                    {{ $equipment_subtypes->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                            
                        <!-- Status -->
                        <div class="col-sm-12 col-lg-3 col-md-3">
                            <p class="label">Status</p>
                            <select name="equipment_status" class="custom-select no-max">
                                <option value="1">
                                    Available
                                </option>
                                <option value="6">
                                    Pending
                                </option>
                            </select>
                        </div>
                        
                        <!-- PC Unit Assigned To -->
                        <div class="col-sm-12 col-lg-3 col-md-3">
                            <p class="label">Computer Unit ID</p>
                            <select name="unit_id" class="custom-select no-max">
                                <option value="NULL">Not Assigned</option>
                                
                                <hr>
                                @foreach ($system_units as $system_units)
                                <option value="{!! $system_units->id !!}">
                                    {{ $system_units->description }}-{{ $system_units->id }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <hr>
                    </div>

                    <div class="row">
                        <!-- Name -->
                        <div class="col-sm-12">
                            <p class="label">Name</p>
                            <div class="input-group mb-3">
                                <input name="name" type="text" class="form-control">
                            </div>
                        </div>
                        
                        <!-- Details -->
                        <div class="col-sm-12">
                            <p class="label">Details</p>
                            <div class="input-group mb-1">
                                <textarea name="details" class="form-control input-lg" aria-label="With textarea"></textarea>
                            </div>
                        </div>
                    </div>                
                    
                    <div class="row">
                        <!-- Serial Number -->
                        <div class="col-sm-12 col-lg-6 col-md-6">
                            <p class="label">Serial Number</p>
                            <div class="input-group mb-1">
                                <input name="serial_no" type="text" class="form-control">
                            </div>
                        </div>
                            
                        <!-- OR Number -->
                        <div class="col-sm-12 col-lg-6 col-md-6">
                            <p class="label">Official Receipt Numbers</p>
                            <div class="input-group mb-1">
                                <input name="or_no" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
            
                </div>
                
            
            <div class="modal-footer text-uppercase">
                <button class="btn btn-info" type="submit" id= "AddEquipment">Add</button>
                </form>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

@stop


@section('script')
    <!-- JQuery Form Validation -->
    <script type="text/javascript" src="{{ asset('js/jquery-validation/lib/jquery-1.11.1.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-validation/dist/additional-methods.min.js') }}"></script>

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

        var table = $('table').DataTable({
            scrollY: '50vh',
            scrollCollapse: true,
            // scrollX: '100vw',        
            
            'ajax': '',
            'select': 'multi',
            'order': [
                [1, 'asc']
            ],
            
            'columnDefs': [{
                'targets': 0,
                'render': function(data, type, row, meta) {
                    if (type === 'display') {
                        data = '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>';
                    }

                    return data;
                },
                
                'checkboxes': {
                    'selectRow': true,
                    'selectAllRender': '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>'
                }
            }]
 
        });

        // $('a[data-toggle="pill"]').on('show.bs.tab' , function(e){
        //     console.log("inside tab fn");
        //     $($.fn.dataTable.tables(true)).DataTable().scroller.measure();
        // });
        console.log("skipped");

        function hideAllColumns() {
                for (var i = 0; i < 6; i++) {
                    columns = my_table.column(i).visible(0);
                }
            };

            function showAllColumns() {
                for (var i = 0; i < 5; i++) {
                    my_table.column(i).visible(1);
                }
            }

            jQuery(document).ready(function() {

                my_table = $('#myDataTable').DataTable();


                jQuery('#toggle_column').multipleSelect({
                    width: 200,
                    onClick: function(view) {
                        var selectedItems = jQuery('#toggle_column').multipleSelect("getSelects");
                        hideAllColumns();
                        for (var i = 0; i < selectedItems.length; i++) {
                            var s = selectedItems[i];
                            my_table.column(s).visible(1);
                        }
                        jQuery('#myDataTable').css('width', '100%');
                    },
                    onCheckAll: function() {
                        showAllColumns();
                        jQuery('#myDataTable').css('width', '100%');
                    },
                    onUncheckAll: function() {
                        hideAllColumns();
                    }
                });

            });
            
            // jQuery.validator.setDefaults({
            //     debug: true,
            //     success: "valid"
            // });
        
            jQuery.validator.addMethod("fieldcheck", function(value, element) {
                return this.optional( element ) || /^[a-z0-9A-Z0-9_-]{1,15}$/.test( value );
                },'Invalid Input.');

            $('#addEquipmentForm').validate({
                rules: {
                    subtype_id:{
                        minlength: 1,
                        required: true
                    },
                    status:{
                        minlength: 1,
                        required: true
                    },
                    unit_id:{
                        required: true
                    },
                    name:{
                        minlength: 1,
                        required: true,
                        nowhitespace: false,
                        maxlength: 50,
                        fieldcheck: true
                    },
                    details:{
                        minlength: 1,
                        required: true,
                        nowhitespace: false,
                        maxlength: 255
                    },
                    serial_no:{
                        minlength: 1,
                        nowhitespace: true,
                        required: true,
                        maxlength: 50,
                        fieldcheck: true
                    },
                    or_no:{
                        minlength: 1,
                        nowhitespace: true,
                        required: true,
                        maxlength: 50,
                        fieldcheck: true
                    },
                    imei_or_macaddress:{
                        nowhitespace: true,
                        maxlength: 50,
                    }
                },
                messages:{
                    subtype_id:{
                        minlength: 'Please fill out this field',
                        required: 'Please fill out this field',
                    },
                    status:{
                        minlength: 'Please fill out this field',
                        required: 'Please fill out this field',
                    },
                    unit_id:{
                        required: 'Please fill out this field',
                    },
                    name:{
                        minlength: 'Please fill out this field',
                        required: 'Please fill out this field',
                        maxlength: 'Maximum of 50 characters',
                    },
                    details:{
                        minlength: 'Please fill out this field',
                        required: 'Please fill out this field',
                        maxlength: 'Maximum of 255 characters',
                    },
                    serial_no:{
                        minlength: 'Please fill out this field',
                        required: 'Please fill out this field',
                        nowhitespace: 'Invalid input',
                        maxlength: 'Maximum of 50 characters',
                    },
                    or_no:{
                        minlength: 'Please fill out this field',
                        nowhitespace: 'Invalid input',
                        required: 'Please fill out this field',
                        maxlength: 'Maximum of 50 characters',
                    },
                    imei_or_macaddress:{
                        nowhitespace: 'Invalid input',
                        maxlength: 'Maximum of 50 characters',
                    }
                }
            })
    });
    </script>
    

@stop
