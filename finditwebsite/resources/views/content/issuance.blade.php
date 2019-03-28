@extends('../template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/awesome-bootstrap-checkbox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
@stop

@section('title')
    Issuance
@stop

@section('../layout/breadcrumbs')
    @section('breadcrumbs-title')
    <i class="fas fa-chart-line">Issuance
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

		<div class="tab-content" id="pills-tabContent">
            <!-- All Items in the Inventory -->
			<div class="tab-pane fade show active" id="pills-0" role="tabpanel" aria-labelledby="pills-0-tab">
                <table id="myDataTable" class="table table-borderless table-hover" style="width:100%">
                    <thead class="thead-dark">
                        <tr>

                            <th>Equipment Issued</th>
                            <th>System Unit Issued</th>
                            <th>Issued To</th>
                            <th>Issued By</th>
                            <th>Date Issued</th>
                            <th width="15%">Date Updated</th>
                            <th>Issued Until</th>
                            <th>Date Returned</th>
                            <th>Remarks</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($issuance as $issuance)
                        <tr>

                            <td> {{ $issuance->equipment_id }} </td>
                            <td width="30%"> {{ $issuance->unit_id }} </td>
                            <td> {{ $issuance->issued_to }} </td>
                            <td> {{ $issuance->user_id }} </td>
                            <td> {{ $issuance->created_at }} </td>
                            <td > {{ $issuance->updated_at }} </td>
                            <td> {{ $issuance->issued_until }} </td>
                            <td> {{ $issuance->returned_at }} </td>
                            <td> {{ $issuance->remarks }} </td>
                            <td> {{ $issuance->status_id }} </td>
                        </tr>
                        @endforeach
                    </tbody>


                </table>
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
        $('table').DataTable({
            scrollY: '50vh',
            scrollCollapse: true,
            scrollX: '50vw',
            
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
    } );
    </script>
    <!-- <script type="text/javascript">
    $(document).ready(function() {
        $('#myDataTable1').DataTable();
    } );
    </script> -->
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


