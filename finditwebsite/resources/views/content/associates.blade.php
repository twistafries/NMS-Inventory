@extends('../template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/awesome-bootstrap-checkbox.css') }}">
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
      <table id="myDataTable" class="table table-borderless table-hover" style="width:100%">
            <thead class="thead-dark">
                <tr>
                  <th></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>

               @foreach ($associates as $associates)
                <tr>
                  <td></td>
                    <td>{{ $associates->fname  }} {{ $associates->lname }}</td>
                    <td>{{ $associates->email }}</td>
                    <td>{{ $associates->name }}</td>
                    <td>{{ $associates->stat }}</td>
                </tr>
        @endforeach

            </tbody>

        </table>

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
      $('#associates').addClass('active');
    });
    </script>

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
