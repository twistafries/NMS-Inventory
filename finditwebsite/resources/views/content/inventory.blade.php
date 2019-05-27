<?php
//   use Carbon\Carbon;
//   $session=Session::get('loggedIn');
//   $user_id = $session['id'];
//   $fname = $session['fname'];
//   $lname = $session['lname'];
  // $img_path = $session['img_path'];
?>

    @extends('../template') @section('css')
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}"> @stop @section('title') Inventory @stop @section('../layout/breadcrumbs') @section('breadcrumbs-title')
    <i class="fas fa-chart-line">Inventory
    @stop
@stop

@section('content')
<div class="container-fluid">
<nav class="navbar navbar-light">
        <span class="navbar-brand mb-0 h1">INVENTORY</span>
        <nav aria-label="breadcrumb" style="font-size:23px; font-weight:bold;">
                <ol class="breadcrumb arr-right">
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/inventory') !!}" class="text-warning" aria-current="page">Items</a>
                    </li>
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/repair') !!}" class="text-dark" >For Repair</a>
                    </li>
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/return') !!}" class="text-dark">For Return</a>
                    </li>
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/return') !!}" class="text-dark">Pending</a>
                    </li>
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/decommissioned') !!}" class="text-dark">Decommissioned</a>
                    </li>
                </ol>
            </nav>
    </nav>

<!--
     Pills Tabs
    <ul class="nav nav-pills p-3 nav-justified nav-fill font-weight-bold" id="pills-tab" role="tablist" style="background-color:white;">
        <li class="nav-item text-uppercase" >
            <a class="nav-link active" id="pills-0-tab" onclick="restore(true)" data-toggle="pill" href="#pills-0" role="tab" aria-controls="pills-0" aria-selected="true">
              IT Equipments
            </a>
        </li>
        <li class="nav-item text-uppercase">
        <a class="nav-link" id="pills-5-tab" data-toggle="pill" href="#pills-5" role="tab" onclick="changeFilter()" aria-controls="pills-6" aria-selected="false"> System Unit
        </a>
      </li>

         <li class="nav-item text-uppercase">
            <a class="nav-link" id="pills-2-tab" data-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-2" aria-selected="false">
                Computer Peripherals</a>
        </li>
        <li class="nav-item text-uppercase">
            <a class="nav-link" id="pills-3-tab" data-toggle="pill" href="#pills-3" role="tab" aria-controls="pills-3" aria-selected="false">
                Mobile Devices</a>
        </li>
        <li class="nav-item text-uppercase">
            <a class="nav-link" id="pills-4-tab" data-toggle="pill" href="#pills-4" role="tab" aria-controls="pills-4" aria-selected="false">tab 4</a>
        </li>
    </ul>
-->


<!--    PAGE CONTENT -->
      <div class="container-fluid">
                        <div class="container-fluid">

                            <div class="row">
                                <div class="container-fluid">
                                <ul class="nav nav-pills nav-justified">
                                <li class="nav-item">
                                  <a class="nav-link active font-weight-bolder" href="{!! url('/inventory') !!}">SUMMARY</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link  font-weight-bolder" href="{!! url('/inventoryAll') !!}">INVENTORY ITEMS LIST</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link  font-weight-bolder" href="{!! url('/systemUnit') !!}">SYSTEM UNITS</a>
                                </li>


                              </ul>
                                    </div>
                            </div>

                        </div>

                        <hr>

                        <br>

                        <div class="container-fluid">
                            <div class="row">
                                <h4>IT EQUIPMENT ({{ $total_equipment + count($system_units) }})</h4>
                                <div class="container-fluid">
                                    <!--
                                    <div class="collapse-group">

                                        <div class="controls">
                                            <button class="btn btn-primary open-button" type="button">
      Open all
    </button>
                                            <button class="btn btn-primary close-button" type="button">
      Close all
    </button>

                                    </div>
-->

                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h5 class="panel-title">
                                                <a role="button" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed" id="collapsedown1"><i class="fas fa-arrow-circle-down"></i> Computer Component ({{$total_component}})</a>
    </h5>
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
            <div class="container-fluid">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Type</th>
                            <th scope="col">Available ({{ $countComponentAvailableStatus }})</th>
                            <th scope="col">Issued ({{ $countComponentIssuedStatus }})</th>
                            <th scope="col">In-use ({{ $countComponentInUseStatus }})</th>
                            <th scope="col">For Repair ({{ $countComponentForRepair }})</th>
                            <th scope="col">For Return ({{ $countComponentForReturnStatus }})</th>
                            <th scope="col">Pending ({{ $countComponentPendingStatus }})</th>
                            <th scope="col">Decommissioned ({{ $countComponentDecommissionedStatus }})</th>
                            <th scope="col">Total ({{$total_component}})</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><a href="#mo">Motherboard</a></th>

                            <td>{{$Motherboard['Available']}}</td>
                            <td>{{$Motherboard['Issued']}}</td>
                            <td>{{$Motherboard['In-use']}}</td>
                            <td>{{$Motherboard['For repair']}}</td>
                            <td>{{$Motherboard['For return']}}</td>
                            <td>{{$Motherboard['Pending']}}</td>
                            <td>{{$Motherboard['Decommissioned']}}</td>
                            <td>{{$total_Motherboard}}</td>
                        </tr>
                        <tr>
                            <th scope="row">CPU</th>
                            <td>{{$CPU['Available']}}</td>
                            <td>{{$CPU['Issued']}}</td>
                            <td>{{$CPU['In-use']}}</td>
                            <td>{{$CPU['For repair']}}</td>
                            <td>{{$CPU['For return']}}</td>
                            <td>{{$CPU['Pending']}}</td>
                            <td>{{$CPU['Decommissioned']}}</td>
                            <td>{{$total_CPU}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Storage</th>
                            <td>{{$Storage['Available']}}</td>
                            <td>{{$Storage['Issued']}}</td>
                            <td>{{$Storage['In-use']}}</td>
                            <td>{{$Storage['For repair']}}</td>
                            <td>{{$Storage['For return']}}</td>
                            <td>{{$Storage['Pending']}}</td>
                            <td>{{$Storage['Decommissioned']}}</td>
                            <td>{{$total_Storage}}</td>
                        </tr>
                        <tr>
                            <th scope="row">RAM</th>
                            <td>{{$RAM['Available']}}</td>
                            <td>{{$RAM['Issued']}}</td>
                            <td>{{$RAM['In-use']}}</td>
                            <td>{{$RAM['For repair']}}</td>
                            <td>{{$RAM['For return']}}</td>
                            <td>{{$RAM['Pending']}}</td>
                            <td>{{$RAM['Decommissioned']}}</td>
                            <td>{{$total_RAM}}</td>
                        </tr>
                        <tr>
                            <th scope="row">GPU</th>
                            <td>{{$GPU['Available']}}</td>
                            <td>{{$GPU['Issued']}}</td>
                            <td>{{$GPU['In-use']}}</td>
                            <td>{{$GPU['For repair']}}</td>
                            <td>{{$GPU['For return']}}</td>
                            <td>{{$GPU['Pending']}}</td>
                            <td>{{$GPU['Decommissioned']}}</td>
                            <td>{{$total_GPU}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Power Supply</th>
                            <td>{{$PowerSupply['Available']}}</td>
                            <td>{{$PowerSupply['Issued']}}</td>
                            <td>{{$PowerSupply['In-use']}}</td>
                            <td>{{$PowerSupply['For repair']}}</td>
                            <td>{{$PowerSupply['For return']}}</td>
                            <td>{{$PowerSupply['Pending']}}</td>
                            <td>{{$PowerSupply['Decommissioned']}}</td>
                            <td>{{$total_PowerSupply}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Case</th>
                            <td>{{$Case['Available']}}</td>
                            <td>{{$Case['Issued']}}</td>
                            <td>{{$Case['In-use']}}</td>
                            <td>{{$Case['For repair']}}</td>
                            <td>{{$Case['For return']}}</td>
                            <td>{{$Case['Pending']}}</td>
                            <td>{{$Case['Decommissioned']}}</td>
                            <td>{{$total_Case}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Heat Sink Fan</th>
                            <td>{{$HeatSinkFan['Available']}}</td>
                            <td>{{$HeatSinkFan['Issued']}}</td>
                            <td>{{$HeatSinkFan['In-use']}}</td>
                            <td>{{$HeatSinkFan['For repair']}}</td>
                            <td>{{$HeatSinkFan['For return']}}</td>
                            <td>{{$HeatSinkFan['Pending']}}</td>
                            <td>{{$HeatSinkFan['Decommissioned']}}</td>
                            <td>{{$total_HeatSinkFan}}</td>
                        </tr>
                         <tr>
                            <th scope="row">Sound Card</th>
                            <td>{{$HeatSinkFan['Available']}}</td>
                            <td>{{$HeatSinkFan['Issued']}}</td>
                            <td>{{$HeatSinkFan['In-use']}}</td>
                            <td>{{$HeatSinkFan['For repair']}}</td>
                            <td>{{$HeatSinkFan['For return']}}</td>
                            <td>{{$HeatSinkFan['Pending']}}</td>
                            <td>{{$HeatSinkFan['Decommissioned']}}</td>
                            <td></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>




       <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h5 class="panel-title">
                                                <a role="button" data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" class="trigger collapsed" id="collapsedown2"><i class="fas fa-arrow-circle-down"></i> Computer Peripheral ({{$total_peripherals}})</a>
    </h5>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">
            <div class="container-fluid">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Type</th>
                            <th scope="col">Available ({{ $countPeripheralAvailableStatus }})</th>
                            <th scope="col">Issued ({{ $countPeripheralIssuedStatus }})</th>
                            <th scope="col">In-use ({{ $countPeripheralInUseStatus }})</th>
                            <th scope="col">For Repair ({{ $countPeripheralForRepair }})</th>
                            <th scope="col">For Return ({{ $countPeripheralForReturnStatus }})</th>
                            <th scope="col">Pending ({{ $countPeripheralPendingStatus }})</th>
                            <th scope="col">Decommissioned ({{ $countPeripheralDecommissionedStatus }})</th>
                            <th scope="col">Total ({{$total_peripherals}})</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <th scope="row">Mouse</th>
                            <td>{{$Mouse['Available']}}</td>
                            <td>{{$Mouse['Issued']}}</td>
                            <td>{{$Mouse['In-use']}}</td>
                            <td>{{$Mouse['For repair']}}</td>
                            <td>{{$Mouse['For return']}}</td>
                            <td>{{$Mouse['Pending']}}</td>
                            <td>{{$Mouse['Decommissioned']}}</td>
                            <td>{{$total_Mouse}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Keyboard</th>
                            <td>{{$Keyboard['Available']}}</td>
                            <td>{{$Keyboard['Issued']}}</td>
                            <td>{{$Keyboard['In-use']}}</td>
                            <td>{{$Keyboard['For repair']}}</td>
                            <td>{{$Keyboard['For return']}}</td>
                            <td>{{$Keyboard['Pending']}}</td>
                            <td>{{$Keyboard['Decommissioned']}}</td>
                            <td>{{$total_Keyboard}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Monitor</th>
                            <td>{{$Monitor['Available']}}</td>
                            <td>{{$Monitor['Issued']}}</td>
                            <td>{{$Monitor['In-use']}}</td>
                            <td>{{$Monitor['For repair']}}</td>
                            <td>{{$Monitor['For return']}}</td>
                            <td>{{$Monitor['Pending']}}</td>
                            <td>{{$Monitor['Decommissioned']}}</td>
                            <td>{{$total_Monitor}}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>


  <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingThree">
            <h5 class="panel-title">
              <a role="button" data-toggle="collapse" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree" class="trigger collapsed" id="collapsedown3"><i class="fas fa-arrow-circle-down"></i> Mobile Device ({{$total_mobile}})</a>
    </h5>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
            <div class="container-fluid">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Type</th>
                            <th scope="col">Available ({{ $countMobileAvailableStatus }})</th>
                            <th scope="col">Issued ({{ $countMobileIssuedStatus }})</th>
                            <th scope="col">In-use ({{ $countMobileInUseStatus }})</th>
                            <th scope="col">For Repair ({{ $countMobileForRepair }})</th>
                            <th scope="col">For Return ({{ $countMobileForReturnStatus }})</th>
                            <th scope="col">Pending ({{ $countMobilePendingStatus }})</th>
                            <th scope="col">Decommissioned ({{ $countMobileDecommissionedStatus }})</th>
                            <th scope="col">Total ({{$total_mobile}})</th>
                        </tr>
                    </thead>
                    <tbody>


                        <tr>
                            <th scope="row">Laptop</th>
                            <td>{{$Laptop['Available']}}</td>
                            <td>{{$Laptop['Issued']}}</td>
                            <td>{{$Laptop['In-use']}}</td>
                            <td>{{$Laptop['For repair']}}</td>
                            <td>{{$Laptop['For return']}}</td>
                            <td>{{$Laptop['Pending']}}</td>
                            <td>{{$Laptop['Decommissioned']}}</td>
                            <td>{{$total_Laptop}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Tablet</th>
                            <td>{{$Tablet['Available']}}</td>
                            <td>{{$Tablet['Issued']}}</td>
                            <td>{{$Tablet['In-use']}}</td>
                            <td>{{$Tablet['For repair']}}</td>
                            <td>{{$Tablet['For return']}}</td>
                            <td>{{$Tablet['Pending']}}</td>
                            <td>{{$Tablet['Decommissioned']}}</td>
                            <td>{{$total_Tablet}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Mobile Phone</th>
                            <td>{{$MobilePhone['Available']}}</td>
                            <td>{{$MobilePhone['Issued']}}</td>
                            <td>{{$MobilePhone['In-use']}}</td>
                            <td>{{$MobilePhone['For repair']}}</td>
                            <td>{{$MobilePhone['For return']}}</td>
                            <td>{{$MobilePhone['Pending']}}</td>
                            <td>{{$MobilePhone['Decommissioned']}}</td>
                            <td>{{$total_MobilePhone}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>



    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingFour">
            <h5 class="panel-title">
                <a role="button" data-toggle="collapse" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour" class="trigger collapsed" id="collapsedown4"><i class="fas fa-arrow-circle-down"></i>
                                                System Units ({{$total_pc}})</a>
            </h5>
        </div>
        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
            <div class="panel-body">
                <div class="container-fluid">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Available</th>
                                <th scope="col">Issued</th>
                                <th scope="col">For Repair</th>
                                <th scope="col">For Return</th>
                                <th scope="col">Pending</th>
                                <th scope="col">Decommissioned</th>
                                <th scope="col">Total</th>


                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td>{{$available_units}}</td>
                                <td>{{$issued_units}}</td>
                                <td>{{$forRepair_units}}</td>
                                <td>{{$forReturn_units}}</td>
                                <td>{{$pending_units}}</td>
                                <td>{{$decommissioned_units}}</td>
                                <td> {{$total_pc}}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--

                                <div class="collapse-group">
                                    <div class="controls">
                                        <button class="btn btn-primary open-button" type="button">
      Open all
    </button>
                                        <button class="btn btn-primary close-button" type="button">
      Close all
    </button>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingThree">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree" class="trigger">
          Collapsible Group Item #3
        </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi molestiae dolorum, soluta temporibus vero perferendis quo odit eaque cum fugiat nihil earum error vitae libero nostrum sed ipsam, beatae ea.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingFour">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour" class="trigger">
          Collapsible Group Item #4
        </a>
                                            </h4>
                                        </div>
                                        <div id="collapseFour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour">
                                            <div class="panel-body">
                                                Sunt quia aperiam, officiis tempora quis quasi fugit ab ipsa quo expedita reiciendis quod iusto! Enim delectus unde voluptatem officiis molestiae repudiandae.
                                            </div>
                                        </div>
                                    </div>
                                </div>
-->


    </div>


    </div>


    </div>
    <!--    PAGE CONTENT END -->



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
        $(document).ready(function() {
            $('#inventory').addClass('active');
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('input').attr('autocomplete', 'off');
        });

    </script>
    <script>
        $(document).ready(function() {
            $('#myDataTable').DataTable({
                "pagingType": "full_numbers",
                responsive: true,
                "order": []
            });
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myDataTable1').DataTable({
                "pagingType": "full_numbers",
                "order": []
            });
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myDataTable2').DataTable({
                "pagingType": "full_numbers",
                "order": []
            });
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myDataTable3').DataTable({
                "pagingType": "full_numbers",
                "order": []
            });
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myDataTable4').DataTable({
                "pagingType": "full_numbers",
                "order": []
            });
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myDataTable5').DataTable({
                "pagingType": "full_numbers",
                "order": []
            });
        });

    </script>
    <!-- <script>
      $(document).ready(function() {
            $('table.display').DataTable({
              pagingType: "full_numbers",
              scrollY:        "300px",
              scrollX:        true,
              scrollCollapse: true,
              paging:         false,
              fixedColumns:   {
                  leftColumns: 1,
                  rightColumns: 1
              }
            });
        } );
      </script> -->
    <script>
        function DoSubmit() {
            var item = $(equipment).val();
            document.getElementById("equipment").value = $('#items [value="' + item + '"]').data('customvalue');
            var item1 = $(hequipment).val();
            document.getElementById("hequipment").value = $('#item [value="' + item1 + '"]').data('customvalue');
            return true;
        };

    </script>
    <script>
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var type = $('#types').val();
                var subtype = $('#subtypes').val();
                var supplier = $('#supplier').val();
                var brand = $('#brand').val();
                var status = $('#status').val();
                var types = data[3]; // use data for the age column
                var subtypes = data[4];
                var suppliers = data[5];
                var brands = data[2];
                var statuses = data[11];
                if (type == types || type == "any") {
                    if (subtype == subtypes || subtype == "any") {
                        if (supplier == suppliers || supplier == "any") {
                            if (brand == brands || brand == "any") {
                                if (status == statuses || status == "any") {
                                    return true;
                                }
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
            $('#subtypes').on('keyup change', function() {
                table.draw();
            });
            $('#types').on('keyup change', function() {
                table.draw();
            });
            $('#supplier').on('keyup change', function() {
                table.draw();
            });
            $('#brand').on('keyup change', function() {
                table.draw();
            });
            $('#status').on('keyup change', function() {
                table.draw();
            });
        });
        $(document).ready(function() {
            var table = $('#myDataTable1').DataTable();

            // Event listener to the two range filtering inputs to redraw on input
            $('#subtypes').on('keyup change', function() {
                table.draw();
            });
            $('#types').on('keyup change', function() {
                table.draw();
            });
            $('#supplier').on('keyup change', function() {
                table.draw();
            });
            $('#brand').on('keyup change', function() {
                table.draw();
            });
            $('#status').on('keyup change', function() {
                table.draw();
            });
        });

        $(document).ready(function() {
            var table = $('#myDataTable2').DataTable();

            // Event listener to the two range filtering inputs to redraw on input
            $('#subtypes').on('keyup change', function() {
                table.draw();
            });
            $('#types').on('keyup change', function() {
                table.draw();
            });
            $('#supplier').on('keyup change', function() {
                table.draw();
            });
            $('#brand').on('keyup change', function() {
                table.draw();
            });
            $('#status').on('keyup change', function() {
                table.draw();
            });
        });
        $(document).ready(function() {
            var table = $('#myDataTable3').DataTable();

            // Event listener to the two range filtering inputs to redraw on input
            $('#subtypes').on('keyup change', function() {
                table.draw();
            });
            $('#types').on('keyup change', function() {
                table.draw();
            });
            $('#supplier').on('keyup change', function() {
                table.draw();
            });
            $('#brand').on('keyup change', function() {
                table.draw();
            });
            $('#status').on('keyup change', function() {
                table.draw();
            });
        });
        $(document).ready(function() {
            var table = $('#myDataTable4').DataTable();

            // Event listener to the two range filtering inputs to redraw on input
            $('#subtypes').on('keyup change', function() {
                table.draw();
            });
            $('#types').on('keyup change', function() {
                table.draw();
            });
            $('#supplier').on('keyup change', function() {
                table.draw();
            });
            $('#brand').on('keyup change', function() {
                table.draw();
            });
            $('#status').on('keyup change', function() {
                table.draw();
            });
        });
        // $(document).ready(function() {
        //   var table = $('#myDataTable5').DataTable();
        //
        //   // Event listener to the two range filtering inputs to redraw on input
        //   $('#subtypes').on('keyup change',  function() {
        //       table.draw();
        //       } );
        //       $('#types').on('keyup change',  function() {
        //           table.draw();
        //           } );
        //           $('#supplier').on('keyup change',  function() {
        //               table.draw();
        //               } );
        //               $('#brand').on('keyup change',  function() {
        //                   table.draw();
        //                   } );
        //                   $('#status').on('keyup change',  function() {
        //                       table.draw();
        //                       } );
        //           } );
        function reset() {
            document.getElementById("subtypes").selectedIndex = "0";
            document.getElementById("types").selectedIndex = "0";
            document.getElementById("supplier").selectedIndex = "0";
            document.getElementById("brand").selectedIndex = "0";
            document.getElementById("status").selectedIndex = "0";
            $('#myDataTable').DataTable().search('').draw();
            $('#myDataTable1').DataTable().search('').draw();
            $('#myDataTable2').DataTable().search('').draw();
            $('#myDataTable3').DataTable().search('').draw();
            $('#myDataTable4').DataTable().search('').draw();
            // $('#myDataTable5').DataTable().search('').draw();

        }

        function restore(option) {
            if (option == false) {
                $("#types").hide();
                $("#labelTypes").hide();
                reset()
            } else {
                $("#types").show();
                $("#labelTypes").show();
                reset()

            }
        };

    </script>
    <!--
  <script>
        $(".open-button").on("click", function() {
            $(this).closest('.collapse-group').find('.collapse').collapse('show');
        });

        $(".close-button").on("click", function() {
            $(this).closest('.collapse-group').find('.collapse').collapse('hide');
        });

</script>
-->
    <script>
        $('#collapsedown1').click(function() {
            $('#collapseOne').toggle('1000');
            $("i", this).toggleClass("fas fa-arrow-circle-down fas fa-arrow-circle-up");

        });

        $('#collapsedown2').click(function() {
            $('#collapseTwo').toggle('1000');
            $("i", this).toggleClass("fas fa-arrow-circle-down fas fa-arrow-circle-up");

        });

        $('#collapsedown3').click(function() {
            $('#collapseThree').toggle('1000');
            $("i", this).toggleClass("fas fa-arrow-circle-down fas fa-arrow-circle-up");

        });

        $('#collapsedown4').click(function() {
            $('#collapseFour').toggle('1000');
            $("i", this).toggleClass("fas fa-arrow-circle-down fas fa-arrow-circle-up");

        });

    </script>



    @stop
