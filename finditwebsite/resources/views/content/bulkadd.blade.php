@extends('../template') @section('css')
<link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
<link rel="stylesheet" href="{{ asset('css/font-awesome/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}"> @stop @section('title') Inventory @stop @section('../layout/breadcrumbs') @section('breadcrumbs-title')
<i class="fas fa-chart-line">Inventory
@stop

@section('content')
<div class="container">
    <form method="post" id="bulk_form" action="{!! url('/temp-bulk-add-post'); !!}">
    {!! csrf_field() !!}
    item1
    <input name="bulk[brand][]" type="text" class="form-control" id="item1_brand">
    <input name="bulk[model][]" type="text" class="form-control" id="item1_model">
    <input name="bulk[details][]" type="text" class="form-control" id="item1_details">
    <input name="bulk[serial_no][]" type="text" class="form-control" id="item1_serial_no">
    <input name="bulk[or_no][]" type="text" class="form-control" id="item1_no">
    <input type="hidden" name="user_id" value="{!!  !!}">
    
    item2
        <input name="bulk[brand][]" type="text" class="form-control" id="item2_brand">
        <input name="bulk[model][]" type="text" class="form-control" id="item2_model">
        <input name="bulk[details][]" type="text" class="form-control" id="item2_details">
        <input name="bulk[serial_no][]" type="text" class="form-control" id="item2_serial_no">
        <input name="bulk[or_no][]" type="text" class="form-control" id="item2_no">


        <div align="center">
            <input type="submit" id="insert" class="btn btn-primary" value="Insert" />
        </div>
    </form>

</div>

@endsection

@section('script')

@endsection