<!-- 
INSERT INTO `findit`.`it_equipment` (`type_id`, `name_or_model`, `details`, `serial_no`, `or_no`, `unit_id`, `status_id`) 
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

    <div class="col-sm-6">
        <p class="card-title">Equipment Type</p>
        <select class="custom-select">
        <option value="0">Item 1</option>
        <option value="1">Item 2</option>
        <option value="2">Item 3</option>
        <option value="3">Item 4</option>
        </select>
    </div>
@stop