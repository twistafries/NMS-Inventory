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
    <link rel="stylesheet" href="{{ asset('css/datatable/awesome-bootstrap-checkbox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
@stop

@section('title')
    Associates
@stop

@section('../layout/breadcrumbs')
    @section('breadcrumbs-title')
    <i class="fas fa-chart-line">Inventory
    @stop
@stop

@section('content')
<form action="" id="form1">
    <!-- Toolbox -->
    <!-- <div class="d-flex flex-row-reverse">
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
    </div> -->

    <!-- Tabs -->
    <div class="container">
      <div style="height:10px"></div>
        <table id="myDataTable" class="table table-borderless table-striped table-hover" style="width:100%">
            <thead class="thead-dark">
                <tr>

                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($associates as $associate)
                <tr>

                    <td>{{ $associate->fname  }} {{ $associate->lname }}</td>
                    <td>{{ $associate->email }}</td>
                    <td>{{ $associate->name }}</td>
                    <td>{{ $associate->stat }}</td>
                    <td>
                        @if( $associate->stat == "active")
                        <button class="btn btn-secondary" id="deactivate">
                            Deactivate
                        </button>
                        @else
                        <button class="btn btn-info" id="activate">
                            Activate
                        </button>
                        @endif
                    </td>
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


@stop
