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

            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn">
                    <a href="#" data-toggle="tooltip" title="Multi Select">
                        <img class="tool-item" src="{{ asset('assets/icons/table-toolbar-icons/checkbox-icon.png') }}"></a>
                </button>
                
                <button type="button" class="btn">
                    <a href="#" data-toggle="tooltip" title="Edit">
                        <img class="tool-item" src="{{ asset('assets/icons/table-toolbar-icons/edit-icon.png') }}"></a>
                </button>

                <button type="button" class="btn">
                    <a href="#" data-toggle="tooltip" title="Hide/Unhide">
                    <img class="tool-item"  src="{{ asset('assets/icons/table-toolbar-icons/view.png') }}"></a>
                </button>
                <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><a href="#" data-toggle="tooltip" title="Add"><img class="tool-item"  src="../../assets/icons/table-toolbar-icons/add-icon.png"></a>
            </button>
                <button type="button" class="btn">
                    <a href="#" data-toggle="tooltip" title="delete"> 
                        <img class="tool-item"  src="../../assets/icons/table-toolbar-icons/delete-icon.png"></a>
                    </button>
                <button type="button" class="btn">
                    <a href="#" data-toggle="tooltip" title="sort">
                        <img class="tool-item"  src="../../assets/icons/table-toolbar-icons/sort-icon.png"></a>
                    </button>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Add (5 items or Less)</a>
                    <a class="dropdown-item" href="#">Bulk Add</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabs -->
    <div class="container">
		<ul class="nav nav-pills mb-3 p-3 nav-justified nav-fill font-weight-bold" id="pills-tab" role="tablist">
			<li class="nav-item text-uppercase">
				<a class="nav-link active " id="pills-0-tab" data-toggle="pill" href="#pills-0" role="tab" aria-controls="pills-0" aria-selected="true">
                    All</a>
            </li>
<<<<<<< HEAD

            @foreach ($equipment_type as $equipment_type)
=======
            
            @foreach ($equipment_types as $equipment_types)
>>>>>>> 6205b335f25fc4a92f89cc53d3dd738c102a6a16
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
		<div class="tab-content" id="pills-tabContent">
            <!-- All Items in the Inventory -->
			<div class="tab-pane fade show active" id="pills-0" role="tabpanel" aria-labelledby="pills-0-tab">
                <table id="myDataTable" class="table table-borderless table-hover" style="width:100%">
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

                        @foreach ($equipment as $equipment)
                        <tr>

                            <td> {{ $equipment->name }} </td>
                            <td width="30%"> {{ $equipment->details }} </td>
                            <td> {{ $equipment->serial_no }} </td>
                            <td> {{ $equipment->or_no }} </td>
                            <td> {{ $equipment->created_at }} </td>
                            <td > {{ $equipment->updated_at }} </td>
                            <td> {{ $equipment->stat }} </td>
                        </tr>
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
                            <td> {{ $components->stat }} </td>
                        </tr>

                        @endforeach
                    </tbody>

                </table>
            </div>

            <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
                      <table id="myDataTable2" class="table table-borderless table-hover" style="width:100%">
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

                              @foreach ($peripherals as $peripherals)
                              <tr>

                                  <td> {{ $peripherals->name }} </td>
                                  <td width="30%"> {{ $peripherals->details }} </td>
                                  <td> {{ $peripherals->serial_no }} </td>
                                  <td> {{ $peripherals->or_no }} </td>
                                  <td> {{ $peripherals->created_at }} </td>
                                  <td> {{ $peripherals->updated_at }} </td>
                                  <td> {{ $peripherals->stat }} </td>
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
                            <td width="30%"> {{ $mobile->details }} </td>
                            <td> {{ $mobile->serial_no }} </td>
                            <td> {{ $mobile->or_no }} </td>
                            <td> {{ $mobile->created_at }} </td>
                            <td> {{ $mobile->updated_at }} </td>
                            <td> {{ $mobile->stat }} </td>
                        </tr>

                        @endforeach
                    </tbody>

                </table>
            </div>

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
      $('#inventory').addClass('active');
      });
    </script>
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
    <script type="text/javascript">
    $(document).ready(function() {
        $('#myDataTable3').DataTable();
    } );
    </script>

@stop
