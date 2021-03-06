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
    Issuance
@stop

@section('../layout/breadcrumbs')
    @section('breadcrumbs-title')
    <i class="fas fa-chart-line">Issuance
    @stop
@stop

@section('content')
<div class="container-fluid">
    <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand mb-0 h1">ISSUED ITEMS</span>
          <nav aria-label="breadcrumb" style="font-size:23px; font-weight:bold;">
                <ol class="breadcrumb arr-right">
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/issuance') !!}" class="text-warning">Issued Items</a>
                    </li>
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/issue') !!}" class="text-dark active" aria-current="page">Employee Issuance</a>
                    </li>
                </ol>
            </nav>
    </nav>

<!--
    <div class="card 12" style="margin-top: 1rem;  margin-bottom: 1rem; padding-top: 1.5rem; padding-bottom: 10px;">
    <table style="margin: auto;width: 100%; text-align: right; ">
      <thead>
        <tr>
          <th>
            <label for="types" id="labelTypes">Types: </label>
            <select id="types" name="types" style="width: 10rem; height: 1.8rem;">
              <option value="any">Any</option>
              @foreach ($typesSel as $typesSel)
              <option value="{{$typesSel->name}}">{{$typesSel->name}}</option>
              @endforeach
            </select>
          </th>
          <th>
            <label for="subtype">Subtype: </label>
            <select id="subtypes" name="subtypes" style="height: 1.8rem;">
              <option value="any">Any</option>
              @foreach ($subtypesSel as $subtypesSel)
              <option value="{{$subtypesSel->name}}">{{$subtypesSel->name}}</option>
              @endforeach
            </select>
        </th>
        <th>
          <label for="supplier">Supplier: </label>
          <select id="supplier" name="supplier" style="height: 1.8rem;">
            <option value="any">Any</option>
            @foreach ($suppliers as $suppliers)
            <option value="{{$suppliers->id}}">{{$suppliers->supplier_name}}</option>
            @endforeach
          </select>
      </th>
      <th>
        <label for="brand">Brand: </label>
        <select id="brand" name="brand" style="height: 1.8rem;">
          <option value="any">Any</option>
          @foreach ($brands as $brands)
          <option value="{{$brands->brand}}">{{$brands->brand}}</option>
          @endforeach
        </select>
      </th>
      <th>
        <label for="status">Status: </label>
        <select id="status" name="status" style="height: 1.8rem;">
          <option value="any">Any</option>
          @foreach ($status as $status)
          <option value="{{$status->name}}">{{$status->name}}</option>
          @endforeach
        </select>
      </th>
      <th></th><th></th>
        <th>
          <button class="btn btn-secondary text-uppercase p-2 btn-sm" type="button" onclick="reset()" style="margin-right: 5px;">Reset</button>
      </th>
    </tr>
      </thead>
      <tr height="10px"></tr>
    </table>
  </div> -->



    <!-- Toolbox -->
    <div class="d-flex flex-row-reverse">
        <div class="p-2">
            <!-- Single Add Modal -->

            <div class="btn-group" role="group" aria-label="Basic example">

                <button class="btn btn-primary rounded-pill" type="button" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#singleIssue" href="#" style="height: 3rem; width: 9rem;"><a class="fas fa-hand-holding" href="#" data-toggle="tooltip" title="Add"></a>  Issue Item
                </button>


            </div>
        </div>
    </div>
    <div class="tab-content" id="pills-tabContent">
            <!-- All Items in the Inventory -->
			<div class="tab-pane fade show active" id="pills-0" role="tabpanel" aria-labelledby="pills-0-tab">
                <table id="myDataTable" class="table table-borderless table-hover" style="width:100%;cursor:pointer;">
                    <thead class="thead-dark">
                        <tr>

                            <th>Item Name</th>
                            <th>Item Subtype</th>
                            <th>Serial Number</th>
                            <th>Issued To</th>
                            <th>Issued By</th>
                            <th>Date Issued</th>
                            <th>Date Updated</th>
                            <th>Issued Until</th>
                            <th>Date Returned</th>
                            <th>Remarks</th>
                            <th hidden></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($issuance as $issuance)
                        @if($issuance->issued_until < Carbon::today()->format('m-d-Y') && $issuance->issued_until != null && $issuance->returned_at == null)
                              <tr class="table-warning" data-toggle="modal" data-target="#viewItemModal">
                        @elseif($issuance->returned_at != null)
                              <tr class="table-success" data-toggle="modal" data-target="#viewItemModal">

                        @else
                              <tr data-toggle="modal" data-target="#viewItemModal">
                        @endif

                            @if( $issuance->model != null)
                            <td> {{ $issuance->model}} {{ $issuance->brand}} </td>
                            <td> {{ $issuance->subtype}} </td>
                            <td> {{ $issuance->serial_no}} </td>
                            @endif
                            @if($issuance->model == null)
                            <td> {{ $issuance->unit_name }} {{ $issuance->pc_number }} </td>
                            <td> System Unit</td>
                            <td> Not Applicable </td>
                            @endif
                            <td> {{ $issuance->givenname }} {{ $issuance->surname }} </td>
                            <td> {{ $issuance->userfname }} {{ $issuance->userlname }}  </td>
                            <td>{{ $issuance->created_at }}</td>
                            @if($issuance->updated_at != null)
                            <td>{{ $issuance->updated_at }}</td>
                            @endif
                            @if($issuance->updated_at == null)
                            <td> Not yet updated</td>
                            @endif
                            @if($issuance->issued_until != null)
                            <td>{{ $issuance->issued_until }}</td>
                            @endif
                            @if($issuance->issued_until == null)
                            <td>Not Applicable</td>
                            @endif
                            @if($issuance->updated_at != null)
                            <td>{{ $issuance->returned_at }} </td>
                            @endif
                            @if($issuance->updated_at == null)
                            <td> Not yet returned</td>
                            @endif
                            @if($issuance->remarks != null)
                            <td> {{ $issuance->remarks }} </td>
                            @endif
                            @if($issuance->remarks == null)
                            <td> None</td>
                            @endif
                            <td hidden> {{ $issuance->id }} </td>

                        </tr>
                        @endforeach
                    </tbody>


                </table>
            </div>
          </div>


              <div class="modal fade bd-example-modal-lg" id="singleIssue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalTitle">Issue Item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <!-- Issue Form -->
                        <div class="modal-body">
                            <form action="{!! url('/addIssuance'); !!}" enctype="multipart/form-data"  method="post"  role="form">
                                {!! csrf_field() !!}

                                          <table>
                                              <tr>
                                                <div class="col-md-8">
                                                  <td><p class="card-title">Issue Item:</p></td>
                                                </div>
                                                <div class="col-md-4">
                                                  <td><p class="card-title">Issued Until:</p></td>
                                                </div>
                                              </tr>

                                              <tr><div class="row">
                                                <td>
                                                  <input placeholder="Please fill out this field." class="form-control" list="items" name="items[]" id="equipment" onblur="CheckListed(this.value);" required >
                                                    <datalist id="items">
                                                      <select>
                                                      @foreach ($equipment as $equipment)
                                                      <option value="{{ $equipment->model}} {{ $equipment->brand}}  (ID: {{$equipment->id}})">({{ $equipment->subtype}}</option>
                                                      @endforeach
                                                      @foreach ($units as $units)
                                                      <option value="{{ $units->name}}  (ID: {{ $units->id}}) (System Unit)">(System Unit)</option>
                                                      @endforeach
                                                      </select>
                                                    </datalist>
                                                </td>
                                                <td>
                                                  <div class="col-md-10" style="padding: 30px 15px;">
                                                    <div class="input-group mb-3">
                                                    <input  name="issued_date[]" type="date" class="form-control" min="{{Carbon::now()->format('Y-m-d')}}">
                                                    </div>
                                                  </div>
                                                </td>
                                              </div>
                                              </tr>
                                          </table>

                                      <table id="addMoreList">
                                                 <tbody>
                                                 </tbody>
                                      </table>


                                      <br>
                                      <div class="row">

                                              <div class="col-md-4">
                                                  <button id="addMore" type="button" class="btn btn-warning btn-xs" onclick='add()'> <span class="fas fa-plus"></span>ADD MORE</button>
                                              </div>
                                      </div>

                                      <br>

                                     <div class="row">
                                          <div class="col-md-5">
                                              <p class="card-title"><span style="color:red">*</span>Issue to:</p>
                                              <input placeholder="Please fill out this field." list="employee" name="issued_to" id="issued_to" onblur="CheckListedEmployee(this.value)" required>
                                              <datalist id="employee">
                                                  @foreach ($employees as $employees)
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
                                    </div>
                                    <br>
                                      <div class="row">

                                          <div class="col">
                                              <label for="details">Remarks:</label>
                                              <div class="input-group mb-1">
                                                  <textarea maxlength="50" rows="4" cols="50" name="remarks" class="form-control" aria-label="With textarea" style="border-style: solid; border-width: 1px;"></textarea>
                                              </div>
                                          </div>
                                      </div>

                              <!-- <button type="button" class="btn btn-info" type="submit" id="addEquipment"> <span class="fas fa-plus"></span>Add Item</button> -->

                          </div>

                          <div class="modal-footer text-uppercase">
                              <button type="submit" class="btn btn-info">Add</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                          </div>
                      </form>

                    </div>
                </div>
            </div>


  <div class="modal fade bd-example-modal-xl" id="viewItemModal" tabindex="-1" role="dialog" aria-labelledby="viewItemModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl">

    <div class="modal-content">
       <div id ="viewItem" class="modal-header">
        <h5 class="modal-title" id="ModalTitle">Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <form action="{!! url('/editIssuance'); !!}" enctype="multipart/form-data" method="post" role="form">
            {!! csrf_field() !!}
          <div  class="row">
            <div class="col"><p class="card-title text-dark">Item Name:</p> <h5 id="issuedModel"></h5></div>
            <div class="col"><p class="card-title text-dark">Item Subtype:</p> <h5 id="issuedSub"></h5></div>
            <div class="col"><p class="card-title text-dark">Item Subtype:</p> <h5 id="issuedSN"></h5></div>
          </div>

           <div class="row pt-4">
               <div class="col"><p class="card-title text-dark">Issued To:</p><h5 id="issuedTo"></h5></div>
                <div class="col"><p class="card-title text-dark">Issued By:</p><h5 id="issuedBy"></h5></div>
          </div>

          <div class="row pt-4">
               <div class="col"><p class="card-title text-dark">Date Issued:</p>
                   <h5 id="dateIssued"></h5>
              </div>
                <div class="col"><p class="card-title text-dark">Date Updated:</p><h5 id="dateUpdated"></h5></div>

          </div>
          <div class="row pt-4">

              <div class="col"><p class="card-title text-dark">Issued Until:</p><input type="date" value="" name="issueUntil" id="issueUntil"></div>
              <div class="col"><p class="card-title text-dark">Date Returned:</p><h5 id="dateReturn"></h5></div>
          </div>
           <div class="row pt-4">

              <div class="col"><p class="card-title text-dark">Remarks:</p><h5 id="issuedRemarks"></h5></div>

          </div>



                <div class="row row-details">
                      <!-- <div class="col col-4 detail-header text-uppercase">Mark As: </div> -->
<!-- =                        <button type="button" class="btn btn-success rounded btn-sm" data-toggle="modal" data-dismiss="modal" data-target="#" style="height: 2.5rem; width: 10rem; margin-right: 5px;"><i class="fas fa-check"></i> Make Available</button> -->
                        <!-- <button type="button" class="btn btn-warning text-uppercase pr-2" data-dismiss="modal" data-toggle="modal" data-target="#makeAvailable">Make Available</button> -->
                        <!-- <button type="button" class="btn btn-warning rounded btn-sm" data-dismiss="modal" data-toggle="modal" data-target="#" style="height: 2.5rem; width: 7rem; margin-right: 5px;"><i class="fas fa-tools"></i>Repair</button> -->
                        <!-- <button type="button" class="btn btn-info text-uppercase" data-dismiss="modal" data-toggle="modal" data-target="#forRepair">Repair</button> -->
                        <!-- <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-dismiss="modal"data-target="#makeAvailableModal" style="height: 2.5rem; width: 10rem; margin-right: 5px;"><i class="fas fa-trash-alt"></i> Decommissioned</button> -->
                        <!-- <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal" data-toggle="modal" data-target="#decommissionedModal">Decommission</button> -->
                </div>

    </form>
      </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-primary" class="btn btn-success" id="editButton">Save Changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Empty Modal Prompt -->
    <div class="modal fade" id="makeAvailableModal" tabindex="-1" role="dialog"
    aria-hidden="true">
        <form action="{!! url('/add-to-concerns-system-unit') !!}" method="post">
        {!! csrf_field() !!}
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="height:450px;">
                <div class="modal-header" id="makeAvailableHeader">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="emptyContent()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="warning-content"  id="makeAvailableContent">

                    </div>
                </div>


            <div class="modal-footer" id="makeAvailableFooter">

                </div>
            </div>
        </div>
        </form>
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

        var table = document.getElementById('myDataTable');

        for(var i = 1; i < table.rows.length; i++)
        {
            table.rows[i].onclick = function()
            {
                 // //rIndex = this.rowIndex;
                 // document.getElementById("id").value = this.cells[10].innerHTML;
                 document.getElementById("issuedModel").innerHTML = this.cells[0].innerHTML;
                 document.getElementById("issuedSub").innerHTML = this.cells[1].innerHTML;
                 document.getElementById("issuedTo").innerHTML = this.cells[3].innerHTML;
                 document.getElementById("issuedBy").innerHTML = this.cells[4].innerHTML;
                 document.getElementById("issuedSN").innerHTML = this.cells[2].innerHTML;
                 document.getElementById("dateIssued").innerHTML = this.cells[5].innerHTML;
                 document.getElementById("dateUpdated").innerHTML = this.cells[6].innerHTML;
                 document.getElementById("issueUntil").value = this.cells[7].innerHTML;
                 document.getElementById("dateReturn").innerHTML = this.cells[8].innerHTML;
                 document.getElementById("issuedRemarks").innerHTML = this.cells[9].innerHTML;
            };
        }

    </script>

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
    <script>
      function editValues() {
          document.getElementById("editButton").innerHTML = "Save Changes";
          document.getElementById("editButton").setAttribute('type', 'submit');
          $("#editButton").off('click');
          document.getElementById("issueUntil").disabled = false;
          document.getElementById("equipmentIssued").disabled = false;
          document.getElementById("issueUntil").disabled = false;
      }
    </script>
    <script>
    function DoSubmit(){
      var item = $(equipment).val();
      document.getElementById("equipment").value = $('#items [value="' + item + '"]').data('customvalue');
      return true;
      }
  </script>
  <script>
    function CheckListed( txtSearch  ) {
     var objList = document.getElementById("items")  ;
     for (var i = 0; i < objList.options.length; i++) {
      if ( objList.options[i].value.trim().toUpperCase() == txtSearch.trim().toUpperCase() ) {
         return true }
      }
      if(txtSearch==""){
        return true
      }
        alert( 'Input data is not available.') ;
        document.getElementById("equipment").value="";
        return false ; // text does not matched ;
    }
  </script>
  <script>
    function CheckListedEmployee( txtSearch  ) {
     var objList = document.getElementById("employee")  ;
     for (var i = 0; i < objList.options.length; i++) {
      if ( objList.options[i].value.trim().toUpperCase() == txtSearch.trim().toUpperCase() ) {
         return true }
      }
      if(txtSearch==""){
        return true
      }
        alert( 'Input data is not available.') ;
        document.getElementById("issued_to").value="";
        return false ; // text does not matched ;
    }
  </script>


  <script>
  function rm() {
  $(event.target).closest("tr").remove();
  }

  function add() {
    $('#addMoreList > tbody:last-child').append("<tr><div class=\"row\"><td><div class=\"col\"><input placeholder='Please fill out this field.' class=\"form-control\" autocomplete='off' list=\"items\" name=\"items[]\" id=\"inputItems\" required></input></div></td><td><div class=\"col-xl-10\"><input name=\"issued_date[]\" type=\"date\" class=\"form-control\"></div></td><td><div class=\"col-sm-0\"><button onclick='rm()'>remove</button></td></div></div></tr><br><div class=\"row\"></div>");
  }

  function emptyContent(){
        $('#makeAvailableContent').empty()
        $('#makeAvailableFooter').empty()
    }


  </script>



@stop
