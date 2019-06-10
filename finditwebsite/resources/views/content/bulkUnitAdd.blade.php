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
@stop


@section('content')
<h1>Add System Units to Inventory</h1>

<form action="{!! url('/tempBulkPC'); !!}" method="post">
    {!! csrf_field() !!}
  <div class="row">
    <div class="col-sm-2">
    <p class="card-title">For Purchase No.</p>
    {{$pID}}
    </div>
    <div class="col-sm-2">
        <p class="card-title">OR_No</p>
        <input type="text" name="or_no">
    </div>
  </div>
  <hr>
  @for($count = 0; 1 > $count; $count++)
      <div class="form-group">
            <div class="form-row">
              <div class="col-md-1">
                  <p class="card-title">Unit Label</p>
                  <input name="name[]" type="text" class="form-control" placeholder="PC" required>    
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
                    <input type="hidden" name="subtype[]" value="{{$component->subtype_id}}">
                </div>

                <div class="col-md-1">
                    <p class="card-title">Brand </p>
                    {{$component->brand}}
                    <input type="hidden" name="brand[]" value="{{$component->brand}}">   
                </div>

                <div class="col-md-1">
                    <p class="card-title">Model </p>
                    {{$component->model}} 
                    <input type="hidden" name="model[]" value="{{$component->model}}">  
                </div>

                <div class="col-md-2">
                  <p class="card-title">Serial No. </p>
                  <input name="serial_no{{$component->subtype_id}}[]" type="text" class="form-control" required>    
                </div>

                <div class="col-md-2">
                    <p class="card-title">Details </p>
                    @if($component->subtype == 'Motherboard')
                      <textarea name="details{{$component->subtype}}[]">Socket:
Chipset:
Size:
RAM:
</textarea>  
                    @elseif($component->subtype == 'CPU')
                      <textarea name="details{{$component->subtype}}[]">Socket:</textarea>
                    @else
                      <textarea name="details$component->subtype[]"></textarea>
                    @endif  
                  </div>
              </div>
            </p>
            @endforeach
          <hr>
      </div>
    @endfor
    <button type="submit" class="btn btn-info">Add</button>
</form>

@endsection