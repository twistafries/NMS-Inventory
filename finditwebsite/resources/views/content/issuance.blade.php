<?php
  use Carbon\Carbon;
  $session=Session::get('loggedIn');
  $user_id = $session['id'];
  $firstname = $session['firstname'];
  $lastname = $session['lastname'];
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
    Issuance
@stop

@section('../layout/breadcrumbs')
    @section('breadcrumbs-title')
    <i class="fas fa-chart-line">Issuance
    @stop
@stop

@section('content')
    <!-- Toolbox -->
    <div class="d-flex flex-row-reverse">
        <div class="p-2">
            <!-- Single Add Modal -->

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
                    <a class="dropdown-item" href="singleIssue">Issue Item</a>
                    <a class="dropdown-item" href="#">Issue Multiple Items</a>
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
                            <th>Equipment Subtype</th>
                            <th>System Unit Issued</th>
                            <th>Issued To</th>
                            <th>Issued By</th>
                            <th>Date Issued</th>
                            <th width="15%">Date Updated</th>
                            <th>Issued Until</th>
                            <th>Date Returned</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($issuance as $issuance)
                        <tr>

                            <td> {{ $issuance->equipment}} </td>
                            <td> {{ $issuance->subtype}} </td>
                            <td width="30%"> {{ $issuance->unit_name }} {{ $issuance->pc_number }} </td>
                            <td> {{ $issuance->givenname }} {{ $issuance->surname }} </td>
                            <td> {{ $issuance->firstname }} {{ $issuance->lastname }} </td>
                            <td> {{ $issuance->created_at }} </td>
                            <td > {{ $issuance->updated_at }} </td>
                            <td> {{ $issuance->issued_until }} </td>
                            <td> {{ $issuance->returned_at }} </td>
                            <td> {{ $issuance->remarks }} </td>
                        </tr>
                        @endforeach
                    </tbody>


                </table>
            </div>
            <div class="modal fade" id="singleIssue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalTitle">Issue Item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <!-- Add Equipment Form -->
                        <div class="modal-body">
                            <form action="{!! url('/addequipment'); !!}" enctype="multipart/form-data" method="post" role="form">
                                {!! csrf_field() !!}
                                <div class="row">
                                    <p class="card-title"></p>
                                    <select name="subtype_id" class="custom-select">
                                        <option  value="value}">

                                        </option>

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

                                    <label for="serial_no">Serial Number</p>
                                    <div class="input-group mb-1">
                                        <input name="serial_no" type="text" class="form-control">
                                    </div>

                                    <p class="card-title">Official Receipt Numbers</p>
                                    <div class="input-group mb-1">
                                        <input name="or_no" type="text" class="form-control">
                                    </div>

                                    <p class="card-title">System Unit Assigned To</p>
                                    <select name="unit_id" class="custom-select">
                                        <option value="NULL">Not Assigned</option>
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
      $('#issuance').addClass('active');
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
