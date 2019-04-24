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
                    <a class="dropdown-item" data-toggle="modal" data-target="#singleIssue" href="#">Issue Item</a>
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
                        <tr data-toggle="modal" data-target="#viewItemModal">

                            <td> {{ $issuance->equipment}} </td>
                            <td> {{ $issuance->subtype}} </td>
                            <td width="30%"> {{ $issuance->unit_name }} {{ $issuance->pc_number }} </td>
                            <td> {{ $issuance->givenname }} {{ $issuance->surname }} </td>
                            <td> {{ $issuance->userfname }} {{ $issuance->userlname }}  </td>
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
            <div class="modal fade" id="viewItemModal" tabindex="-1" role="dialog" aria-labelledby="viewItemModalTitle" aria-hidden="true">

                <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">
       <div id ="viewItem" class="modal-header">
        <h5 class="modal-title" id="ModalTitle">Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

      <form>
        Equipment Issued:<input type="text" name="equipmentIssued" id="equipmentIssued"><br><br>
        Equipment Subtype:<input type="text" name="equipmentSubtype" id="equipmentSubtype"><br><br>
        System Unit Issued:<input type="text" name="unitIssued" id="unitIssued"><br><br>
        Issued To:<input type="text" name="issuedTo" id="issuedTo"><br><br>
        Issued By:<input type="text" name="issuedBy" id="issuedBy"><br><br>
        Date Issued:<input type="text" name="dateIssued" id="dateIssued"><br><br>
        Date Updated:<input type="text" name="dateUpdated" id="dateUpdated"><br><br>
        Issued Until:<input type="text" name="issueUntil" id="issueUntil"><br><br>
        Date Returned:<input type="text" name="dateReturned" id="dateReturned"><br><br>
        Remarks:<input type="text" name="remarks" id="remarks"><br><br>
      </div>
      </form>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
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

                        <!-- Add Equipment Form -->
                        <div class="modal-body">
                            <form action="{!! url('/addIssuance'); !!}" enctype="multipart/form-data" method="post"  onsubmit="DoSubmit()" role="form">
                                {!! csrf_field() !!}
                                <div class="row">

                                          <div class="col-md-5">
                                              <p class="card-title">Issue Item:</p>
                                              <input  list="items" name="items" id="equipment" onblur="CheckListed(this.value);" required>
                                                <datalist id="items">
                                                  <select>
                                                  @foreach ($equipment as $equipment)
                                                  <option data-customvalue="Mobile Device-{{ $equipment->id}}" value="{{ $equipment->name}} S/N:{{ $equipment->serial_no}} ">{{ $equipment->subtype}}</option>
                                                  @endforeach
                                                  @foreach ($units as $units)
                                                  <option data-customvalue="System Unit-{{ $units->id}}" value="{{ $units->description}}-{{ $units->id}}">System Unit</option>
                                                  @endforeach
                                                </select>
                                                </datalist>

                                          </div>
                                          <div class="col-md-2">
                                          </div>

                                          <div class="col-md-5">
                                              <p class="card-title">Issued_until</p>
                                                  <div class="input-group mb-3">
                                                  <input  name="issued_until" type="date" class="form-control" required>
                                                  </div>
                                          </div>
                                      </div>

                                      <div class="row">

                                              <div class="col-md-4"><table></table></div>
                                      </div>

                                      <br>
                                      <div class="row">

                                              <div class="col-md-4">
                                                  <button id="addMore" type="button" class="btn btn-warning btn-xs" onclick='add()'> <span class="fas fa-plus"></span>ADD MORE</button>
                                              </div>
                                      </div>

                                      <br>

                                     <div class="row">
                                          <div class="col-md-5">
                                              <p class="card-title">Issue to:</p>
                                              <input list="employee" name="issued_to" id="issued_to" onblur="CheckListedEmployee(this.value)" required>
                                              <datalist id="employee">
                                                  @foreach ($employees as $employees)
                                                  <option data-customvalue="{{ $employees->id}}" value="{{ $employees->fname}} {{ $employees->lname}} ID: {{ $employees->id}}">
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

                                      <div class="row">

                                          <div class="col">
                                              <label for="details">Remarks</p>
                                              <div class="input-group mb-1">
                                                  <textarea maxlength="50" rows="4" cols="50" name="remarks" class="form-control" aria-label="With textarea"></textarea>
                                              </div>
                                          </div>
                                      </div>

                              <!-- <button type="button" class="btn btn-info" type="submit" id="addEquipment"> <span class="fas fa-plus"></span>Add Item</button> -->
                          </div>

                          <div class="modal-footer text-uppercase">
                              <button class="btn btn-info">Add</button>

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

    var table = document.getElementById('myDataTable');

    for(var i = 1; i < table.rows.length; i++)
    {
        table.rows[i].onclick = function()
        {
             //rIndex = this.rowIndex;
             document.getElementById("equipmentIssued").value = this.cells[0].innerHTML;
             document.getElementById("equipmentSubtype").value = this.cells[1].innerHTML;
             document.getElementById("unitIssued").value = this.cells[2].innerHTML;
             document.getElementById("issuedTo").value = this.cells[3].innerHTML;
             document.getElementById("issuedBy").value = this.cells[4].innerHTML;
             document.getElementById("dateIssued").value = this.cells[5].innerHTML;
             document.getElementById("dateUpdated").value = this.cells[6].innerHTML;
             document.getElementById("issueUntil").value = this.cells[7].innerHTML;
             document.getElementById("dateReturned").value = this.cells[8].innerHTML;
             document.getElementById("remarks").value = this.cells[9].innerHTML;

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
    function DoSubmit(){
      var item = $(equipment).val();
      document.getElementById("equipment").value = $('#items [value="' + item + '"]').data('customvalue');
      var employee = $(issued_to).val();
      document.getElementById("issued_to").value = $('#employee [value="' + employee + '"]').data('customvalue');
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

@stop
