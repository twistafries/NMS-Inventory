<!-- 
INSERT INTO `findit`.`it_equipment` 
(`type_id`, `name_or_model`, `details`, `serial_no`, 
`or_no`, `unit_id`, `status_id`) 
VALUES ('1', 'Keyboard', 'Logitech', '897adP', '7984563', '2', '1'); 
-->

@extends('../template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/awesome-bootstrap-checkbox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
@stop
    
@section('title')
    Inventory-Temp Add
@stop

@section('../layout/breadcrumbs')
    @section('breadcrumbs-title')
    <i class="fas fa-chart-line">Inventory-Temp Add
    @stop
@stop
    
@section('content')
<form action="{!! url('/addEquipment'); !!}" enctype="multipart/form-data" method="post" id="addEquipment" role="form">
{!! csrf_field() !!}
    <div class="col-sm-6">
        <p class="card-title">Equipment Type</p>
        <select name="type_id" class="custom-select">
        @foreach ($equipment_types as $equipment_types)
            <option value="{!! $equipment_types->id !!}">
                {{ $equipment_types->name }}
            </option>
        @endforeach
        </select>
        
        <hr>
        
        <p class="card-title">Name and Model</p>
        <div class="input-group mb-3">
        <input name="name_or_model" type="text" class="form-control">
        </div>
        
        <p class="card-title">Details</p>
        <div class="input-group mb-3">
        <input name="details" type="text" class="form-control">
        </div>
        
        <p class="card-title">Serial Number</p>
        <div class="input-group mb-3">
        <input name="serial_no" type="text" class="form-control">
        </div>
        
        <p class="card-title">Official Receipt Numbers</p>
        <div class="input-group mb-3">
        <input name="or_no" type="text" class="form-control">
        </div>

        <p class="card-title">System Unit Assigned To</p>
        <select name="unit_id" class="custom-select">
        @foreach ($system_units as $system_units)
        <option value="{!! $system_units->id !!}">
            {{ $system_units->description }}
        </option>
        @endforeach
        </select>
        <hr>
        <button class="btn btn-info" type="submit" value="Add Equipment" id="AddEquipment">
    </div>
</form>
@stop