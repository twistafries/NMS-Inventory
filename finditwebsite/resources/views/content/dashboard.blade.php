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
        <div class="col-3 p-1">
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
                                    <td>
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
                                    <td>
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
                                    <td>
                                        <h6>Available Laptops</h6>
                                    </td>
                                    <td>
                                        <button type="submit" href="" class="btn btn-link">{{ $available_laptop }}</button>
                                    </td>
                                    </form>
                                </tr>

                            </tbody>

                        </table>
                        <button type="button" class="btn btn-light btn-sm">View all</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-3 p-1">
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
                                    <td>
                                        <h6>System Units</h6>
                                    </td>
                                    <td class="text-justify">{{ $repair_sys_units }}</td>
                                    <td><button type="submit" class="btn btn-primary btn-sm">View more</button></td>
                                </tr>
                                <tr>
                                    <form action="{!! url('/reInventory'); !!}" method="post">
                                        {!! csrf_field() !!}
                                        <input name="status_filter" type="hidden" value="3">
                                        <input name="subtype_filter" type="hidden" value="12">
                                        <input name="type_filter" type="hidden" value="3">
                                        <td>
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
                                    <td>
                                        <h6>Laptops</h6>
                                    </td>
                                    <td class="text-justify">
                                        <button type="submit" href="" class="btn btn-link">{{ $repair_laptop }}</button>
                                    </form>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-light btn-sm">View All</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-3 p-1">
            <div class="card">
                <div class="card-header text-white mb-3" id="card-header">
                    <i class="fas fa-tools"></i> Total Issued Units
                </div>
                <h4>
                    <center>{{ $countHardwareIssued + $issued_sys_units}}</center>
                </h4>
                <div class="card-body p-0">
                    <div class="card p-3">
                        <table class="table table-borderless text-justify text-break">
                            <tbody>
                                <tr>
                                    <form action="{!! url('/reInventory'); !!}" method="post">
                                        <input name="type_filter" type="hidden" value="system_unit">
                                        <input name="status_filter" type="hidden" value="2">
                                        {!! csrf_field() !!}
                                        <td>
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
                                    <td>
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
                                        <td>
                                            <h6>Laptops</h6>
                                        </td>
                                        
                                        <td class="text-justify">
                                            <button type="submit" href="" class="btn btn-link">{{ $issued_laptop }}</button>
                                        </td>
                                    </form>
                                </tr>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-light btn-sm">View All</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-3 p-1">
            <div class="card">
                <div class="card-header text-white mb-3" id="card-header"><i class="fas fa-cash-register"></i> Purchases
                    This Month</div>
                <div class="card-body ">

                </div>
                <div class="card p-3">
                    <table class="table table-borderless text-justify text-break">
                        <tbody>
                            <th>Purchase #</th>
                            <th>Qty</th>
                            <th></th>
                            <tr>
                                <td>
                                    <h6>System Units</h6>
                                </td>
                                <td class="text-justify">{{ $repair_sys_units }}</td>
                                <td><button type="submit" class="btn btn-primary btn-sm">View more</button></td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>Mobile Phones</h6>
                                </td>
                                <td class="text-justify">{{ $repair_phone }}</td>
                                <td><button type="submit" class="btn btn-primary btn-sm">View more</button></td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>Laptops</h6>
                                </td>
                                <td class="text-justify">{{ $repair_laptop }}</td>
                                <td><button type="submit" class="btn btn-primary btn-sm">View more</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-light btn-sm">View All</button>
                </div>
            </div>
        </div>
        <div class="col-4 p-1">
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
                                <td>{{ $component->qty }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-light btn-sm">View All</button>
                </div>
            </div>
        </div>
        <div class="col-4 p-1">
            <div class="card">
                <div class="card-header text-white mb-3" id="card-header"> Incomplete Orders</div>
                <div class="card-body ">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Order #1</li>
                        <li class="list-group-item">Order #2</li>
                        <li class="list-group-item">Order #3</li>
                        <li class="list-group-item">Order #4</li>
                        <button type="submit" class="btn btn-light btn-sm">View all</button>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-4 p-1">
            <div class="card">
                <div class="card-header text-white mb-3" id="card-header"><i class="fas fa-exchange-alt"></i> Items
                    Returned</div>
                <div class="card-body ">

                </div>
            </div>
        </div>
    </div>



    <div class="row card-row pl-0">
        <div class="col-6 p-1">
            <div class="card">
                <div class="card-header text-white mb-3" id="card-header"> Zero Availability Items </div>
                <h4>
                    <center>10</center>
                </h4>

            </div>
        </div>

        <div class="col-6 p-1">
            <div class="card">
                <div class="card-header text-white mb-3" id="card-header"> Low Availability Items </div>
                <h4>
                    <center>10</center>
                </h4>
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
