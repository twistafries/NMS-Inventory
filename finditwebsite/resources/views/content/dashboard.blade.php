<?php
  use Carbon\Carbon;
  $session=Session::get('loggedIn');
  $user_id = $session['id'];
  $fname = $session['fname'];
  $lname = $session['lname'];
  // $img_path = $session['img_path'];
?>

@extends('../template') @section('css')
<link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
<link rel="stylesheet" href="{{ asset('css/font-awesome/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
<link rel="stylesheet" href="{{ asset('css/custom.css') }}"> @stop @section('title') Dashboard @stop @section('content')

<!--  -->
<div class="container-fluid">
    <div class="row card-row pl-0">
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 p-1">
            <div class="card">
                <div class="card-header text-white mb-3" id="card-header">
                    <i class="far fa-check-circle"></i> Available Issuable Units
                </div>
                <center>
                <form action="{!! url('/reInventory'); !!}" method="post">
                    {!! csrf_field() !!}
                    <input name="has_system_unit" type="hidden" value="1">
                    <input name="has_mobile_phones" type="hidden" value="1">
                    <input name="has_laptops" type="hidden" value="1">
                    <input name="status_filter" type="hidden" value="1">

                    <button type="submit" href="{!! url('/reInventorySummary') !!}" class="btn btn-link">
                        <h4>
                            {{ $available_sys_units + $available_phone + $available_laptop}}
                        </h4>
                    </button>
                </form>
                </center>

                <div class="card-body p-0">
                    <div class="card p-3">
                        <table class="table table-borderless text-left text-break">
                            <tbody>
                                <tr>
                                    <form action="{!! url('/reInventory'); !!}" method="post">
                                    {!! csrf_field() !!}
                                    <td class="align-bottom">
                                        <h6>Available System Units</h6>
                                    </td>
                                        <input name="status_filter" type="hidden" value="1">
                                        <input name="type_filter" type="hidden" value="system_unit">

                                        <td>
                                            <button type="submit" href="" class="btn btn-link">{{ $available_sys_units }}</button>
                                        </td>
                                    </form>
                                </tr>
                                <tr>
                                    <form action="{!! url('/reInventory'); !!}" method="post">
                                    <td class="align-bottom">
                                        <h6>Available Mobile Phones</h6>
                                    </td>
                                        {!! csrf_field() !!}
                                        <input name="status_filter" type="hidden" value="1">
                                        <input name="subtype_filter" type="hidden" value="14">
                                        <input name="type_filter" type="hidden" value="3">

                                        <td>
                                            <button type="submit" href="" class="btn btn-link">{{ $available_phone }}</button>
                                        </td>
                                    </form>
                                </tr>
                                <tr>
                                    <form action="{!! url('/reInventory'); !!}" method="post">
                                        {!! csrf_field() !!}
                                        <input name="status_filter" type="hidden" value="1">
                                        <input name="subtype_filter" type="hidden" value="12">
                                        <input name="type_filter" type="hidden" value="3">
                                    <td class="align-bottom">
                                        <h6>Available Laptops</h6>
                                    </td>
                                    <td>
                                        <button type="submit" href="" class="btn btn-link">{{ $available_laptop }}</button>
                                    </td>
                                    </form>
                                </tr>

                            </tbody>

                        </table>
                        <form action="{!! url('/reInventory'); !!}" method="post">
                            {!! csrf_field() !!}
                            <input name="type_filter" type="hidden" value="all">
                            <input name="status_filter" type="hidden" value="1">
                            <button type="submit" class="btn btn-light btn-sm btn-block">View all</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 p-1">
            <div class="card">
                <div class="card-header text-white mb-3" id="card-header">
                    <i class="fas fa-tools"></i> Total Items in Repair
                </div>
                <center>
                <form action="{!! url('/reInventory'); !!}" method="post">
                    {!! csrf_field() !!}
                    <button type="submit" href="" class="btn btn-link">
                        <h4>
                            {{ $countHardwareForRepair + $repair_sys_units }}
                        </h4>
                    </button>
                </form>
                </center>

                <div class="card-body p-0">
                    <div class="card p-3">
                        <table class="table table-borderless text-justify text-break">
                            <tbody>
                                <tr>
                                    <form action="{!! url('/reInventory'); !!}" method="post">
                                    {!! csrf_field() !!}
                                    <input name="status_filter" type="hidden" value="3">
                                    <input name="type_filter" type="hidden" value="system_unit">
                                    <td class="align-bottom">
                                        <h6>System Units</h6>
                                    </td>
                                    <td class="text-justify">
                                        <button type="submit" href="" class="btn btn-link">{{ $repair_sys_units }}</button></td>
                                    </form>

                                </tr>
                                <tr>
                                    <form action="{!! url('/reInventory'); !!}" method="post">
                                        {!! csrf_field() !!}
                                        <input name="status_filter" type="hidden" value="3">
                                        <input name="subtype_filter" type="hidden" value="12">
                                        <input name="type_filter" type="hidden" value="3">
                                    <td class="align-bottom">
                                            <h6>Mobile Phones</h6>
                                        </td>
                                        <td class="text-justify">
                                            <button type="submit" href="" class="btn btn-link">{{ $repair_phone }}</button>
                                        </td>
                                    </form>
                                </tr>
                                <tr>
                                    <form action="{!! url('/reInventory'); !!}" method="post">
                                        {!! csrf_field() !!}
                                        <input name="status_filter" type="hidden" value="3">
                                        <input name="subtype_filter" type="hidden" value="12">
                                        <input name="type_filter" type="hidden" value="3">
                                    <td class="align-bottom">
                                        <h6>Laptops</h6>
                                    </td>
                                    <td class="text-justify">
                                        <button type="submit" href="" class="btn btn-link">{{ $repair_laptop }}</button>
                                    </form>
                                </tr>
                            </tbody>
                        </table>

                        <form action="{!! url('/reInventory'); !!}" method="post">
                            {!! csrf_field() !!}
                            <input name="type_filter" type="hidden" value="all">
                            <input name="status_filter" type="hidden" value="3">
                            <button type="submit" class="btn btn-light btn-sm btn-block">View all</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 p-1">
            <div class="card">
                <div class="card-header text-white mb-3" id="card-header">
                    <i class="fas fa-desktop"></i> Total Issued Units
                </div>
                <center>
                    <form action="{!! url('/reInventory'); !!}" method="post">
                        {!! csrf_field() !!}
                        <button type="submit" href="" class="btn btn-link">
                            <h4>
                                {{ $countHardwareIssued + $issued_sys_units}}
                            </h4>
                        </button>
                    </form>
                </center>
                <div class="card-body p-0">
                    <div class="card p-3">
                        <table class="table table-borderless text-justify text-break">
                            <tbody>
                                <tr>
                                    <form action="{!! url('/reInventory'); !!}" method="post">
                                        <input name="type_filter" type="hidden" value="system_unit">
                                        <input name="status_filter" type="hidden" value="2">
                                        {!! csrf_field() !!}
                                        <td class="align-bottom">
                                            <h6>System Units</h6>
                                        </td>

                                        <td>
                                            <button type="submit" href="" class="btn btn-link">{{ $issued_sys_units }}</button>
                                        </td>
                                </tr>

                                <tr>
                                    <form action="{!! url('/reInventory'); !!}" method="post">
                                        {!! csrf_field() !!}
                                        <input name="status_filter" type="hidden" value="2">
                                        <input name="subtype_filter" type="hidden" value="14">
                                        <input name="type_filter" type="hidden" value="3">
                                    <td class="align-bottom">
                                        <h6>Mobile Phones</h6>
                                    </td>
                                    <td class="text-justify">
                                        <button type="submit" href="" class="btn btn-link">{{ $issued_phone }}</button>
                                    </td>
                                    </form>
                                </tr>
                                <tr>
                                    <form action="{!! url('/reInventory'); !!}" method="post">
                                    {!! csrf_field() !!}
                                        <input name="status_filter" type="hidden" value="2">
                                        <input name="subtype_filter" type="hidden" value="12">
                                        <input name="type_filter" type="hidden" value="3">
                                    <td class="align-bottom">
                                            <h6>Laptops</h6>
                                        </td>

                                        <td class="text-justify">
                                            <button type="submit" href="" class="btn btn-link">{{ $issued_laptop }}</button>
                                        </td>
                                    </form>
                                </tr>
                            </tbody>
                        </table>
                        <form action="{!! url('/reInventory'); !!}" method="post">
                            {!! csrf_field() !!}
                            <input name="type_filter" type="hidden" value="all">
                            <input name="status_filter" type="hidden" value="2">
                            <button type="submit" class="btn btn-light btn-sm btn-block">View all</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 p-1">
            <div class="card">
                <div class="card-header text-white mb-3" id="card-header"><i class="fas fa-cash-register"></i> Recent Purchases </div>

                    <div class="card p-3">
                        <table class="table table-borderless text-justify text-break">
                            <tbody>
                                @foreach($recent_purchases as $purchase)
                                    <tr>
                                        <td>{{$purchase->brand}} {{$purchase->model}}</td>
                                        <td>{{$purchase->qty}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <form action="{!! url('/purchases'); !!}" method="get">
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-light btn-sm btn-block">View all</button>
                        </form>
                    </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 p-1">
            <div class="card">
                <div class="card-header text-white mb-3" id="card-header"><i class="fas fa-shopping-cart">
                    </i>Components in Stock</div>
                <div class="card-body ">
                    <h4>
                        <center>{{ $available_component }}</center>
                    </h4>
                </div>
                <div class="card p-3">
                    <table class="table table-borderless text-justify text-break">
                        <tbody>
                            @foreach( $available_component_qty as $component )
                            <tr>
                                <td>{{ $component->name }}</td>

                            <form action="{!! url('/reInventory'); !!}" method="post">
                                {!! csrf_field() !!}
                                <input name="subtype_filter" type="hidden" value="1">
                                <input name="type_filter" type="hidden" value="{!! $component->subtype_id !!}">
                                <input name="status_filter" type="hidden" value="1">

                                <td>
                                    <button type="submit" href="" class="btn btn-link">{{ $component->qty }}</button>

                                </td>
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <form action="{!! url('/reInventory'); !!}" method="post">
                        {!! csrf_field() !!}
                        <input name="type_filter" type="hidden" value="1">
                        <input name="subtype_filter" type="hidden" value="">
                        <input name="status_filter" type="hidden" value="1">
                        <button type="submit" class="btn btn-light btn-sm btn-block">View all</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 p-1">
            <div class="card">
                <div class="card-header text-white mb-3" id="card-header"> <i class="fas fa-clipboard-list"> Incomplete | Pending Orders</i></div>
                <div class="card-body ">
                    <ul class="list-group list-group-flush">
                        @foreach($inc_orders as $order)
                            <li class="list-group-item">{{$order->brand}} {{$order->model}} | OR No.:{{$order->or_no}} | Supplier: {{$order->supplier}}</li>
                        @endforeach
                    </ul>
                    <form action="{!! url('/incompleteOrders'); !!}" method="get">
                        {!! csrf_field() !!}
                        <button type="submit" class="btn btn-light btn-sm btn-block">View all</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 p-1">
            <div class="card">
                <div class="card-header text-white mb-3" id="card-header"><i class="fas fa-exchange-alt"></i> Items
                    Returned | For Return</div>
                <div class="card-body ">
                    <ul class="list-group list-group-flush">
                        @foreach($returned_items as $returns)
                            <li class="list-group-item">{{$returns->brand}} {{$returns->model}} | OR No.:{{$returns->or_no}} | Supplier: {{$returns->supplier}}</li>
                        @endforeach
                    </ul>
                    <form action="{!! url('/returns'); !!}" method="get">
                        {!! csrf_field() !!}
                        <button type="submit" class="btn btn-light btn-sm btn-block">View all</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<br>


@stop @section('script')

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
    $(document).ready(function () {
        $('#dashboard').addClass('active');
    });

</script>

@stop
