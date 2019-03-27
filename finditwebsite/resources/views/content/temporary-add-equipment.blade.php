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
<form action="{!! url('/addequipment'); !!}" enctype="multipart/form-data" method="post" id="addEquipment" role="form">
{!! csrf_field() !!}
    <div class="col-sm-6">
        <!-- Equipment Subtype -->
        <p class="card-title">Equipment Subype</p>
        <select name="subtype_id" class="custom-select">
        @foreach ($equipment_subtypes as $equipment_subtypes)
            <option value="{!! $equipment_subtypes->id !!}">
                {{ $equipment_subtypes->name }}
            </option>
        @endforeach
        </select>
    
        <hr>
        <!-- Name -->
        <p class="card-title">Name</p>
        <div class="input-group mb-3">
        <input name="name" type="text" class="form-control">
        </div>
        
        <!-- Details -->
        <p class="card-title">Details</p>
        <div class="input-group mb-3">
        <input name="details" type="text" class="form-control">
        </div>
        
        <!-- Serial Number -->
        <p class="card-title">Serial Number</p>
        <div class="input-group mb-3">
        <input name="serial_no" type="text" class="form-control">
        </div>
        
        <!-- OR Number -->
        <p class="card-title">Official Receipt Numbers</p>
        <div class="input-group mb-3">
        <input name="or_no" type="text" class="form-control">
        </div>
        
        <!-- OR Number -->
        <p class="card-title">Mac Address or IMEI</p>
        <div class="input-group mb-3">
        <input name="imei_or_macaddress" type="text" class="form-control">
        </div>

        <p class="card-title">System Unit Assigned To</p>
        <select name="unit_id" class="custom-select">
            <option value="NULL">Not Assigned</option>
        @foreach ($system_units as $system_units)
        <option value="{!! $system_units->id !!}">
            {{ $system_units->description }}-{{ $system_units->id }}
        </option>
        @endforeach
        </select>  
        <hr>
        <button class="btn btn-info" type="submit" value="Add Equipment" id="AddEquipment">
    </div>
</form>
@stop