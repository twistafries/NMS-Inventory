<?php
use Carbon\Carbon;
$session=Session::get('loggedIn');
$user_id = $session['id'];
$fname = $session['fname'];
$lname = $session['lname'];
// $img_path = $session['img_path'];
?>

@extends('../template')
@section('title') Bulk Add System Units @stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/awesome-bootstrap-checkbox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('js/datatable/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('js/Buttons/css/buttons.dataTables.min.css')}}">
@stop


@section('content')
<h1>Add System Units to Inventory</h1>

<form action="{!! url('/tempBulkPC'); !!}" id="form" method="post">
    {!! csrf_field() !!}
  <div class="row">
    <div class="col-sm-2">
    <p class="card-title">For Purchase No.</p>
    {{$pID}}
    </div>
    <div class="col-sm-2">
        <p class="card-title">OR_No</p>
        <input type="text" name="or_no" required>
        <input type="hidden" name="qty" value={{$qty}}>
        <input type="hidden" name="supplier_id" value={{$supplier_id}}>
    </div>
    <div class="col-sm-2">
      <p class="card-title">Warranty</p>
      <input type="date" name="warranty_start">
    </div>
    <div class="col-sm-2">
      <p class="card-title">Warranty End</p>
      <input type="date" name="warranty_end">
    </div>
  </div>
  <hr>

  <div class="container">
  <table id="unitDataTable" class="table table-borderless table-striped" style="width:100%;cursor:pointer;">
    <thead class="thead-dark">
      <tr>
        <th>Subtype</th>
        <th>Brand</th>
        <th>Model</th>
        <th>S/N</th>
        <th>Details</th>
        <!--<th>Option</th>-->
      </tr>
    </thead>
        <tbody>
          
          <input type="hidden" name="supplier" value={{$supplier_id}}>
          @for($count = 0; $qty > $count; $count++)

            @foreach($components as $component)
            <tr>
              <td>
                {{$component->subtype}} <input type="hidden" name="subtype[]" value="{{$component->subtype_id}}">
                <input type="hidden" name="subtype[]" value="{{$component->subtype_id}}">
              </td>
              <td>
                {{$component->brand}}
                <input type="hidden" name="brand[]" value="{{$component->brand}}">
              </td>
              <td>
                {{$component->model}}
                <input type="hidden" name="model[]" value="{{$component->model}}">
              </td>
              <td>
              <input type="text" id="comp{{$component->subtype_id}}" name="serial_no{{$component->subtype_id}}[]" required>
              </td>
              <td>
                  <input type="text" name="dets{{$component->subtype_id}}[]" required>
              </td>
              <!--
              <td title="Click this if serial#s and details are similar or consecutive">
                  <button type="button" class="btn btn-outline-secondary">Consecutive</button>
              </td>
              -->
            </tr>
            @endforeach
            <tr class="font-weight-bold">
                <td >Supplier:</td>
                <td>{{$supplier}}</td>
                <td>Unit Label</td>
                <td><input name="name[]" type="text" placeholder="PC" required></td>
                <td>Unit {{$count + 1}} of {{$qty}}</td>
              </tr>
            @endfor
        </tbody>
  </table>
  
  </div>
  <button id="subm" type="submit" class="btn btn-info">Add All Units</button>
</form>

@stop

@section('script')
    <script type="text/javascript" src="{{ asset('js/datatable/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/datatable/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script>
  $(document).ready(function(){
    
      $('#unitDataTable').DataTable({
          "pageLength": {{$rows}} + 1,
          "order": [],
          "info": false,
          "ordering": false,
          "searching": false,
          "bLengthChange": false,
      });


      $('#subm').click(function(e){
        //e.preventDefault();
        var data = tbl.$('input').serializeArray();

        data.unshift({name:'or_no', value:$("input[name=or_no]").val()});
        data.unshift({name:'qty', value:$("input[name=qty]").val()});
        data.unshift({name:'warranty_start', value:$("input[name=warranty_start]").val()});
        data.unshift({name:'warranty_end', value:$("input[name=waranty_end]").val()});
        data.unshift({name:'supplier_id', value:$("input[name=supplier_id]").val()});
        
        $.post({
          url:'/tempBulkPC',
          data: data,
          success: function(response){
              /*
              unsure of redirecting thing. normally goes to /tempBulkPC
              which is 'PCBuildController@insertBulkPC'. Saves successfully on dbase
              though.*/
              
              var message = 'Units added.';
              window.location.href = '/systemUnit';
          },
          error: function(jqXHR, textStatus, errorThrown) {
              console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
              alert(JSON.stringify(jqXHR));
          }
        }) 
      });

      tbl = $('#unitDataTable').dataTable();

  });

</script>
@stop