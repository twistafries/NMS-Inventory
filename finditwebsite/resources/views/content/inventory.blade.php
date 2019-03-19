@extends('../template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/awesome-bootstrap-checkbox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
@stop
    
@section('title')
    Sample Page
@stop

@section('../layout/breadcrumbs')
    @section('breadcrumbs-title')
    <i class="fas fa-chart-line">Inventory
    @stop
@stop
    
@section('content')
<form action="" id="form1">
    <!-- Toolbox -->
    <div class="d-flex flex-row-reverse">
        <div class="p-2">
            <span>
                <a id="multiple_select" href="#" data-toggle="tooltip" title="Multiple Select">
                    <img class="tool-item" src="../../assets/icons/table-toolbar-icons/checkbox-icon.png">
                </a>
            </span>

            <span>
                <a href="#" data-toggle="tooltip" title="Edit">
                    <img class="tool-item" src="../../assets/icons/table-toolbar-icons/edit-icon.png">
                </a>
            </span>

            <span>
                <a href="#" data-toggle="tooltip" title="Add">
                    <img class="tool-item" src="../../assets/icons/table-toolbar-icons/add-icon.png">
                </a>
            </span>

            <span>
                <a href="#" data-toggle="tooltip" title="Hide/Unhide Columns">
                    <img class="tool-item" src="../../assets/icons/table-toolbar-icons/view.png">
                </a>
            </span>

            <span>
                <a href="#" data-toggle="tooltip" title="Delete Row(s)">
                    <img class="tool-item" src="../../assets/icons/table-toolbar-icons/delete-icon.png">
                </a>
            </span>

            <span>
                <a href="#" data-toggle="tooltip" title="Sort by Column">
                    <img class="tool-item" src="../../assets/icons/table-toolbar-icons/sort-icon.png">
                </a>
            </span>

        </div>
    </div>

    <!-- Tabs -->
    <div class="container">
		<ul class="nav nav-pills mb-3 p-3 nav-justified nav-fill font-weight-bold" id="pills-tab" role="tablist">
			<li class="nav-item text-uppercase">
				<a class="nav-link active " id="pills-0-tab" data-toggle="pill" href="#pills-0" role="tab" aria-controls="pills-0" aria-selected="true">
                    All</a>
            </li>
            
            @foreach ($equipment_type as $equipment_type)
            <li class="nav-item text-uppercase">
				<a class="nav-link" id="pills-{!! $equipment_type->id !!}-tab" data-toggle="pill" href="#pills-{!! $equipment_type->id !!}" role="tab" aria-controls="pills-{!! $equipment_type->id !!}" aria-selected="false">
                    {{ $equipment_type->name }}
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
		<div class="tab-content" id="pills-tabContent">
            <!-- All Items in the Inventory -->
			<div class="tab-pane fade show active" id="pills-0" role="tabpanel" aria-labelledby="pills-0-tab">
                <table id="myDataTable" class="table table-borderless table-hover" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Details</th>
                            <th>Added At</th>
                            <th>Editted At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($equipment as $equipment)
                        <tr>
                            <td> {{ $equipment->id }} </td>
                            <td> {{ $equipment->name_or_model }} </td>
                            <td> {{ $equipment->details }} </td>
                            <td> {{ $equipment->created_at }} </td>
                            <td> {{ $equipment->or_no }} </td>
                            <td> {{ $equipment->updated_at }} </td>
                        </tr>
                        @endforeach
                    </tbody>
                

                </table>
            </div>

            <!-- Computer Peripherals -->
			<div class="tab-pane fade" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
                <table id="myDataTable" class="table table-borderless table-hover" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Details</th>
                            <th>Added At</th>
                            <th>Editted At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peripherals as $peripherals)
                        <tr>
                            <td> {{ $peripherals->id }} </td>
                            <td> {{ $peripherals->name_or_model }} </td>
                            <td> {{ $peripherals->details }} </td>
                            <td> {{ $peripherals->created_at }} </td>
                            <td> {{ $peripherals->or_no }} </td>
                            <td> {{ $peripherals->updated_at }} </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

            <!-- Computer Units -->
            <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">

            </div>

            <!-- Mobile Devices -->
			<div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="pills-3-tab">
                <table id="myDataTable" class="table table-borderless table-hover" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Details</th>
                            <th>Added At</th>
                            <th>Editted At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mobile as $mobile)
                        <tr>
                            <td> {{ $mobile->id }} </td>
                            <td> {{ $mobile->name_or_model }} </td>
                            <td> {{ $mobile->details }} </td>
                            <td> {{ $mobile->created_at }} </td>
                            <td> {{ $mobile->or_no }} </td>
                            <td> {{ $mobile->updated_at }} </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
                
			<div class="tab-pane fade" id="pills-4" role="tabpanel" aria-labelledby="pills-4-tab">

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


    <script type="text/javascript">
        $(document).ready(function() {
            $('#myDataTable').DataTable({
                scrollY: '50vh',
                scrollCollapse: true,
                scrollX: '50vw',
                fixedColumns: {
                    leftColumns: 2
                },
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
        });
        //tooltip initialisation
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });

    </script>

@stop