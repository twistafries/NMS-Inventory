<?php
//   use Carbon\Carbon;
//   $session=Session::get('loggedIn');
//   $user_id = $session['id'];
//   $fname = $session['fname'];
//   $lname = $session['lname'];
//   // $img_path = $session['img_path'];
?>

@extends('../template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
    <link rel="stylesheet"  href="{{ asset('css/custom.css') }}">

@stop

@section('title')
    Returns
@stop

@section('../layout/breadcrumbs')
    @section('breadcrumbs-title')

    @stop
@stop

@section('content')
<div class="container-fluid">
    <!-- tabs -->
    <div class="container-fluid card" style="margin-top: 2rem; padding: 2rem;">
        <div class="row">
            <div class="container-fluid">
              <ul class="nav nav-pills nav-justified">
                <li class="nav-item" style="background: #DEDEDE; margin-right: 5px;">
                  <a class="nav-link" href="{!! url('/purchases') !!}">Ordered Items</a>
                </li>
                <li class="nav-item" style="background: #DEDEDE; margin-right: 5px;">
                  <a class="nav-link" href="{!! url('/receivedPurchases') !!}">Received Items</a>
                </li>
                <li class="nav-item" style="margin-right: 5px;">
                  <a class="nav-link active" href="{!! url('/returns') !!}">Returns to Supplier</a>
                </li>
              </ul>
            </div>
        </div>
    </div>


<!--Filter-->
  <div class="card" style="margin-top: 1rem; margin-bottom: 1rem; padding-top: 1.5rem; padding-bottom: 10px;">
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
            <label for="subtypes">Subtype: </label>
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
            <option value="{{$suppliers->supplier_name}}">{{$suppliers->supplier_name}}</option>
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

      <th></th><th></th>
        <th>
          <button class="btn btn-secondary p-2 btn-sm" type="button" onclick="reset()" style="margin-right: 5px;">Reset</button>
      </th>
      </thead>
      <tr height="10px"></tr>
    </table>
  </div>


    <!-- <div class="navbar" id="purchase" data-toggle="collapse" data-target="#pills-tabContent" aria-expanded="false" aria-controls="collapseExample" style="margin-top: 1rem; background: #585858; color: white; cursor: pointer; height: 45px;">
        <a class="fas fa-angle-right" style="font-size: 16px;"><span style="margin-left: 1rem; font-family: sans-serif; font-weight: lighter;">PURCHASE 1</span></a>
        <div class="" style="font-size: 16px;">OR No.: 123456789</div>
        <div class="" style="font-size: 16px;">Date: 5/29/2019</div>
    </div> -->

    <div class="tab-content" id="purchaseTable" style="margin-top: 4rem; margin-bottom: 2rem;">
      <div class="tab-pane fade show active" id="pills-0" role="tabpanel" aria-labelledby="pills-0-tab">
        <table id="myDataTable" class="table table-borderless table-hover" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Type</th>
                    <th>Subtype</th>
                    <th>Serial No</th>
                    <th>OR No</th>
                    <th>Supplier</th>
                    <th>Date Added</th>
                    <th>Added By</th>
                    <th width="15%">Date Edited</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($for_return as $for_return)
                <tr>
                    <td> {{ $for_return->id }} </td>
                    <td> {{ $for_return->brand }}</td>
                    <td> {{ $for_return->model }} </td>
                    <td> {{ $for_return->type }} </td>
                    <td> {{ $for_return->subtype }} </td>
                    <td> {{ $for_return->serial_no }} </td>
                    <td> {{ $for_return->or_no }} </td>
                    <td>{{ $for_return->supplier}}</td>
                    <td> {{ $for_return->created_at }} </td>
                    <td>{{ $for_return->firstname}} {{ $for_return->lastname}}</td>
                    <td>{{ $for_return->updated_at }} </td>

                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>
</div>

    <!-- View Details All Modal -->
    <div class="modal fade" id="purchasedetail" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document" style=" width: 1000px;">
            <div class="modal-content" style="height: 35rem;">
                <div class="modal-header">
                    <div class="">PURCHASE 1</div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" >
                  <div class="container-fluid" style="">
                    <div class="row">
                      <div class="col-6">
                        <label>Brand:</label>
                        <input type="text" name="" value="ASUS" style="padding-left: 5px;">
                      </div>
                      <div class="col-6">
                        <label>Model:</label>
                        <input type="text" name="" value="Model" style="padding-left: 5px;">
                      </div>
                    </div>
                    <div class="row" style="margin-top: 2rem;">
                      <div class="col-6">
                        <label>Subtype:</label>
                        <select style="width: 12.5rem; height: 1.8rem;">
                          <option>Hardware</option>
                          <option>Software</option>
                        </select>
                      </div>
                      <div class="col-6">
                        <label>Supplier:</label>
                        <input type="text" name="" value="Model" style="padding-left: 5px;">
                      </div>
                    </div>
                    <div class="row" style="margin-top: 2rem;">
                      <div class="col-6">
                        <label>Details:</label>
                        <textarea name="model" type="text" size="25" style="height: 4rem; width: 14rem;"></textarea>
                      </div>
                      <div class="col-6">
                        <label>Quantity:</label>
                        <input type="text" name="" style="padding-left: 5px;">
                      </div>
                    </div>
                </div>
              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#">Save Changes</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" data-target="#">Cancel</button>
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
            $('#returns').addClass('active');
        });
    </script>

    <script>
        $('#purchase').click(function() {
            $('#purchaseTable').toggle();
            $("a", this).toggleClass("fas fa-angle-right fas fa-angle-down");
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myDataTable1').DataTable({
            });
        });
    </script>

    <script>
    $.fn.dataTable.ext.search.push(
function( settings, data, dataIndex ) {
var type =  $('#types').val();
var subtype =  $('#subtypes').val();
var supplier =  $('#supplier').val();
var brand =  $('#brand').val();
var types = data[3]; // use data for the age column
var subtypes = data[4];
var suppliers = data[7];
var brands = data[1];

function subtypeUnblock(element) {
    $("#subtypes option:nth-child("+element+")").show();
}

function subtypeBlockAll(){
    $("#subtypes > option").hide();
}

function subtypeUnBlockAll(){
    $("#subtypes > option").show();
}

if( type == "Computer Component" ){
    subtypeBlockAll();

    for (var i = 1; i <= 9; i++) {
        subtypeUnblock(i);
    }
}
else if ( type == "Computer Peripheral"){
    subtypeBlockAll();
    subtypeUnblock(1);

    for(var i=10; i<=12; i++){
        subtypeUnblock(i);
    }
}
else if( type == "Mobile Device" ){
    subtypeBlockAll();
    subtypeUnblock(1);

    for (var i = 13; i <= 15; i++) {
        subtypeUnblock(i);
    }
}
else if (type == "Software License") {
    subtypeBlockAll();
    subtypeUnblock(1);

    for (var i = 16; i <= 18; i++) {
        subtypeUnblock(i);
    }
}else{
    subtypeUnBlockAll();
}

if ( type == types || type == "any"){
  if (subtype == subtypes || subtype == "any"){
    if (supplier == suppliers || supplier == "any"){
      if (brand == brands || brand == "any"){
          return true;
      }
    }
  }

}
return false;
}
);

$(document).ready(function() {
var table = $('#myDataTable').DataTable();

// Event listener to the two range filtering inputs to redraw on input
$('#subtypes').on('keyup change',  function() {
    table.draw();
    } );
    $('#types').on('keyup change',  function() {
        table.draw();
    } );
    $('#supplier').on('keyup change',  function() {
        table.draw();
    } );
    $('#brand').on('keyup change',  function() {
        table.draw();
    } );
} );

        function reset(){
          document.getElementById("subtypes").selectedIndex = "0";
          document.getElementById("types").selectedIndex = "0";
          document.getElementById("supplier").selectedIndex = "0";
          document.getElementById("brand").selectedIndex = "0";
          document.getElementById("status").selectedIndex = "0";
          $('#myDataTable').DataTable().search('').draw();

          // $('#myDataTable5').DataTable().search('').draw();

        }
        function restore(option){
          if(option== false){
              $("#types").hide();
            $("#labelTypes").hide();
            reset()
          } else{
            $("#types").show();
            $("#labelTypes").show();
            reset()

          }
        };


    </script>
@stop
