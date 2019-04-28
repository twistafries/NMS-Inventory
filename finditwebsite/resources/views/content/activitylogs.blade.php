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
    Activity Logs
@stop

@section('../layout/breadcrumbs')
    @section('breadcrumbs-title')
    <i class="fas fa-chart-line">Activity Logs
    @stop
@stop

@section('content')
<div class="container">
    <!-- Toolbox -->
    <div class="d-flex flex-row-reverse">
        <div class="p-2">
            <!-- Single Add Modal -->
        </div>
    </div>

		<div class="tab-content" id="pills-tabContent">
            <!-- All Items in the Inventory -->
			<div class="tab-pane fade show active" id="pills-0" role="tabpanel" aria-labelledby="pills-0-tab">
                <table id="myDataTable" class="table table-borderless table-hover" style="width:100%;cursor:pointer;">
                    <thead class="thead-dark">
                        <tr>

                            <th>Activities</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($logs as $log)
                          <tr>
                              <td>{{$log->firstname}} {{$log->lastname}} {{$log->action}} {{$log->efname}} {{$log->elname}} {{$log->model}} {{$log->brand}}
                                {{$log->unit_description}} {{$log->unit}} {{$log->userfname}} {{$log->userlname}} {{$log->dept_name}} {{$log->status_name}} {{$log->subtype_name}} {{$log->type_name}}
                              @if($log->action == "issued")
                                @foreach($issuance as $issuance)
                                  @if($log->issuance_id == $issuance->id)
                                    {{$issuance->brand}} {{$issuance->model}} {{$issuance->unit_name}} to {{$issuance->givenname}} {{$issuance->surname}}
                                  @endif
                                @endforeach
                              @endif
                              </td>
                              <td>
                                {{$log->date}}
                              </td>
                          </tr>
                          @endforeach

                    </tbody>


                </table>
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

        <form action="{!! url('/addSystemUnit'); !!}" enctype="multipart/form-data" method="post" role="form">
            {!! csrf_field() !!}
          <div class="row">
            <div class="col"><p class="card-title text-dark">Equipment Issued:</p><input type="text" name="equipmentIssued" id="equipmentIssued" disabled></div>
            <div class="col"><p class="card-title text-dark">Equipment Subtype:</p><input type="text" name="equipmentSubtype" id="equipmentSubtype" disabled></div>
               <div class="col"><p class="card-title text-dark"> System Unit Issued:</p><input type="text" name="unitIssued" id="unitIssued" disabled></div>
          </div>

           <div class="row pt-4">
               <div class="col"><p class="card-title text-dark">Issued To:</p><input type="text" name="issuedTo" id="issuedTo" size="25" disabled></div>
                <div class="col"><p class="card-title text-dark">Issued By:</p><input type="text" name="issuedBy" id="issuedBy" size="25" disabled></div>
          </div>

          <div class="row pt-4">
               <div class="col"><p class="card-title text-dark">Date Issued:</p>
                   <input type="text" name="dateIssued" id="dateIssued" disabled>
              </div>
                <div class="col"><p class="card-title text-dark">Date Updated:</p><input type="date" name="dateUpdated" id="dateUpdated" disabled></div>

          </div>
          <div class="row pt-4">

              <div class="col"><p class="card-title text-dark">Issued Until:</p><input type="date" value="" name="issueUntil" id="issueUntil" disabled></div>
              <div class="col"><p class="card-title text-dark">Date Returned:</p><input type="date" name="dateReturned" id="dateReturned" disabled></div>
          </div>
           <div class="row pt-4">

              <div class="col"><p class="card-title text-dark">Remarks:</p> <textarea name="remarks" id="remarks" rows="2" cols="22" disabled></textarea></div>

          </div>




    </form>
      </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-primary" class="btn btn-success" id="editButton" onclick="editValues()">Edit Values</button>
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

                                      <table id="addMoreList">
                                                 <tbody>
                                                 </tbody>
                                             </table>


                                     <br>

                                      <br>
                                      <div class="row">

                                              <div class="col-md-4">
                                                  <button id="addMore" type="button" class="btn btn-warning btn-xs" onclick='add()'> <span class="fas fa-plus"></span>ADD MORE</button>
                                              </div>
                                      </div>

                                      <br>


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
             document.getElementById("equipmentIssued").setAttribute('value', this.cells[0].innerHTML);
             document.getElementById("equipmentSubtype").setAttribute('value', this.cells[1].innerHTML);
             document.getElementById("unitIssued").setAttribute('value', this.cells[2].innerHTML);
             document.getElementById("issuedTo").setAttribute('value', this.cells[3].innerHTML);
             document.getElementById("issuedBy").setAttribute('value', this.cells[4].innerHTML);
             document.getElementById("dateIssued").setAttribute('value', this.cells[5].innerHTML);
             document.getElementById("dateUpdated").setAttribute('value', this.cells[6].innerHTML);
             document.getElementById("issueUntil").setAttribute('value', this.cells[7].innerHTML);
             document.getElementById("dateReturned").setAttribute('value', this.cells[8].innerHTML);
             document.getElementById("remarks").innerHTML=this.cells[9].innerHTML;

        };
    }

</script>

    <script>
      $(document).ready(function(){
      $('#activityLogs').addClass('active');
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
  <script>function rm() {
  $(event.target).closest("tr").remove();
}

function add() {
                $('#addMoreList > tbody:last-child').append("<tr><div class=\"row\"><td>  <div class=\"col-md-5\"><input list=\"items\" name=\"items\" id=\"inputItems\"></div></td><td><div class=\"col-xl-11\"><input name=\"issued_until\" type=\"date\" class=\"form-control\"></div></td><td><div class=\"col-sm-0\"><button onclick='rm()'>remove</button></td></div></div></tr><br>");
            }
    </script>



@stop
