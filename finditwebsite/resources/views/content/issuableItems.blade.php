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
    <link rel="stylesheet"  href="{{ asset('css/custom.css') }}">
    
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
        </div>
    </div>

    <!-- Tabs -->
    <div class="container">
		<ul class="nav nav-pills mb-3 p-3 nav-justified nav-fill font-weight-bold" id="pills-tab" role="tablist">
			<li class="nav-item text-uppercase">
				<a class="nav-link active " id="pills-0-tab" data-toggle="pill" href="#pills-0" role="tab" aria-controls="pills-0" aria-selected="true">
                    ALL</a>
            </li>

		<li class="nav-item text-uppercase">
				<a class="nav-link" id="pills-1-tab" data-toggle="pill" href="#pills-1" role="tab" aria-controls="pills-1" aria-selected="false">
                    Mobile Device </a>
			</li>
			<li class="nav-item text-uppercase">
				<a class="nav-link" id="pills-2-tab" data-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-2" aria-selected="false">
                    System Units</a>
			</li>
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
                            <th>IMEI/MAC Address</th>
                            <th>Added At</th>
                            <th width="15%">Edited At</th>
                            <th>Added by</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($all_mobile_device as $all_mobile_device)
                        <tr>

                            <td> {{ $all_mobile_device->name }} </td>
                            <td width="30%"> {{ $all_mobile_device->details }} </td>
                            <td> {{ $all_mobile_device->serial_no }} </td>
                            <td> {{ $all_mobile_device->imei_or_macaddress }} </td>
                            <td> {{ $all_mobile_device->created_at }} </td>
                            <td > {{ $all_mobile_device->updated_at }} </td>
                            <td> {{ $all_mobile_device->fname }} {{ $all_mobile_device->lname }}</td>
                            <td>  </td>
                        </tr>
                        @endforeach
                        @foreach ($all_units as $all_units)
                        <tr>

                            <td> {{ $all_units->description }}-{{ $all_units->id }}</td>
                            <td width="30%"> NONE </td>
                            <td> NONE </td>
                            <td> {{ $all_units->mac_address }} </td>
                            <td> {{ $all_units->created_at }} </td>
                            <td > {{ $all_units->updated_at }} </td>
                            <td> {{ $all_units->fname }} {{ $all_units->lname }}</td>
                            <td>  </td>
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
                          <th>IMEI/MAC Address</th>
                          <th>Added At</th>
                          <th width="15%">Edited At</th>
                          <th>Added by</th>
                          <th></th>
                      </tr>
                  </thead>
                  <tbody>

                      @foreach ($available as $available)
                      <tr>

                          <td> {{ $available->name }} </td>
                          <td width="30%"> {{ $available->details }} </td>
                          <td> {{ $available->serial_no }} </td>
                          <td> {{ $available->imei_or_macaddress }} </td>
                          <td> {{ $available->created_at }} </td>
                          <td > {{ $available->updated_at }} </td>
                          <td> {{ $available->fname }} {{ $available->lname }}</td>
                          <td>  </td>
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
                                <th>IMEI/MAC Address</th>
                                <th>Added At</th>
                                <th width="15%">Edited At</th>
                                <th>Added by</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($units as $units)
                            <tr>

                                <td> {{ $units->description }}-{{ $units->id }} </td>
                                <td width="30%"> NONE </td>
                                <td> NONE </td>
                                <td> {{ $units->mac_address }} </td>
                                <td> {{ $units->created_at }} </td>
                                <td > {{ $units->updated_at }} </td>
                                <td> {{ $units->fname }} {{ $units->lname }}</td>
                                <td>  </td>
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
      $('#issuableItems').addClass('active');
      });
    </script>

    <!-- <script type="text/javascript">
    $(document).ready(function() {
        $('#myDataTable1').DataTable();
    } );
    </script> -->
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

@stop
