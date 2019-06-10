<?php
  use Carbon\Carbon;
  $session=Session::get('loggedIn');
  $user_id = $session['id'];
  $fname = $session['fname'];
  $lname = $session['lname'];
  // $img_path = $session['img_path'];
?>

@extends('../template')
@section('title') Build PC @stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/awesome-bootstrap-checkbox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
@stop


@section('content')
<h1>Add System Units to Inventory</h1>
<p class="card-title">For Purchase No.</p>
{{$pID}}
 <hr>
<form method="post">
  @for($count = 0; $qty > $count; $count++)
      <div class="form-group">
            <div class="form-row">
              <div class="col-md-1">
                  <p class="card-title">Unit Label</p>
                  <input name="name" type="text" class="form-control" placeholder="PC" required>    
              </div>
              <div class="col-md-1">
                  <p class="card-title">Supplier</p>
                  {{$supplier}}    
              </div>
              <div class="col-md-1">
                  <p class="card-title">Number</p>
                  {{$count + 1}} of {{$qty}} 
              </div>
            </div>

            @foreach($components as $component)
            <p>
              <div class="form-row">
                <div class="col-md-1">
                    <p class="card-title">Component Type </p>
                    {{$component->subtype}}  
                </div>

                <div class="col-md-1">
                    <p class="card-title">Brand </p>
                    {{$component->brand}}    
                </div>

                <div class="col-md-1">
                    <p class="card-title">Model </p>
                    {{$component->model}}    
                </div>

                <div class="col-md-2">
                  <p class="card-title">Serial No. </p>
                  <input name="serial_no" type="text" class="form-control" required>    
                </div>

              </div>
            </p>
            @endforeach
          <hr>
      </div>
    @endfor
</form>
<button type="button text-uppercase" name="save" id="save" class="btn btn-info" data-dismiss="modal">Add</button>
@endsection