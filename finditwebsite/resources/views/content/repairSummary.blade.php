<?php
//   use Carbon\Carbon;
//   $session=Session::get('loggedIn');
//   $user_id = $session['id'];
//   $fname = $session['fname'];
//   $lname = $session['lname'];
  // $img_path = $session['img_path'];
?>

@extends('../template')
    @section('css')
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/awesome-bootstrap-checkbox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
    @stop
    @section('title') Repair @stop
    @section('../layout/breadcrumbs')
    @section('breadcrumbs-title')
    <i class="fas fa-chart-line">REPAIR
    @stop
@stop

@section('content')
<div class="container-fluid">
<!--breadcrumbs navigation-->
<nav class="navbar">
        <span class="navbar-brand mb-0 h1">FOR REPAIR</span>
              <nav aria-label="breadcrumb" style="font-size:16px; font-weight:bold;">
                <ol class="breadcrumb arr-right">
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/inventory') !!}" class="text-dark" aria-current="page">Items</a>
                    </li>
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/systemUnit') !!}" class="text-dark" aria-current="page">System Unit</a>
                    </li>
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/repair') !!}" class="text-warning" >For Repair</a>
                    </li>


                    <li class="breadcrumb-item ">
                        <a href="{!! url('/Decommission') !!}" class="text-dark">Decommission</a>
                    </li>
                </ol>
            </nav>
    </nav>

    <!-- Toolbox -->
    <div class="d-flex flex-row-reverse">
        <div class="p-2">
            <!-- Single Add Modal -->
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                        </div>

                        <div class="modal-body">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-info"> <span class="fas fa-plus"></span> ADD ITEM</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <div class="container-fluid">

                            <div class="row">
                                <div class="container-fluid">
                                <ul class="nav nav-pills nav-justified">
                                <li class="nav-item" style="border-top-left-radius:25px;">
                                  <a class="nav-link active font-weight-bolder" href="{!! url('/repairSummary') !!}">FROM ISSUANCE</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link  font-weight-bolder" href="{!! url('/repair') !!}">REPAIR ITEMS LIST</a>
                                </li>



                              </ul>
                                    </div>
                            </div>

                        </div>
                        <hr>

    <!-- Tabs -->
    <div class="container-fluid">

        <div class="tab-content" id="pills-tabContent">
<!-- All Items in the Inventory -->
            <div class="tab-pane fade show active" id="pills-0" role="tabpanel" aria-labelledby="pills-0-tab">

                <div class="row">

<div class="container-fluid">
     <h4 class="font-weight-bold">System Units</h4>



                <!--Departments collapse-->
                    <div class="panel panel-default pl-2">
                        <div class="panel-heading" role="tab" id="">
                            <h5 class="panel-title">
                                <a role="button" data-toggle="collapse" href="#collapseIT" aria-expanded="true" aria-controls="collapseIT" class="trigger collapsed" id="collapsedownIT"><i class="fas fa-arrow-circle-down"></i></i> Information Technology Development Department ({{ count($it_dep) }})</a>
                            </h5>
                        </div>
                        <div id="collapseIT" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingIT">
                            @if(count($it_dep) == 0)
                            <div class="container-fluid border-secondary border-0 text-center" >
                                <div class="card-header">No System Units For Repair</div>
                            </div>
                            @else
                            <div class="panel-body">
                                <div class="container-fluid">
                                        <ul class="list-unstyled">
                                            <!--List item--> 
                                            @foreach($it_dep as $unit)
                                            <li> <button type="button" class="btn btn-link text-info" data-toggle="collapse" data-target="#item1" style="text-decoration: none"  onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='#00F'" >
                                            <a onMouseOver="this.style.color='#33b5e5'" onMouseOut="this.style.color='#0099CC'" >
                                            <i class="fas fa-angle-down"></i> {{$unit->name}}{{$unit->su_id}}</a>
                                              <button type="button" class="btn btn-success rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal"><i class="fas fa-check"></i> Make Available</button>
                                              <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#DecommissionModal"><i class="fas fa-trash-alt"></i> Decommission</button> </button>
<!--Accordion Content-->
                                                <div class="collapse" id="item1">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Component</th>
                                                                <th scope="col">Brand/Name</th>
                                                                <th scope="col">Details</th>
                                                                <th scope="col">Serial No.</th>
                                                                <th scope="col">Warranty</th>
                                                                <th scope="col">Mark As</th>


                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @if(count($components) == 0)
                                                        <tr class="text-center">
                                                            <td colspan="6">No Components Inside System Unit</td>
                                                        </tr>
                                                        @else
                                                        @foreach($components as $component)
                                                            @if($component->unit_id == $unit->su_id)
                                                            <tr>
                                                                <td>{{$component->name}}</td>
                                                                <td>{{$component->brand}} {{$component->name}}</td>
                                                                <td>{{$component->details}}</td>
                                                                <td>{{$component->serial_no}}</td>
                                                                <td>{{$component->warranty_start}} - {{$component->warranty_end}}</td>
                                                                <td>
                                                                    <button type="button" class="btn btn-success rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal"><i class="fas fa-check"></i> Make Available</button>
                                                                    <button type="button" class="btn btn-warning rounded btn-sm" data-toggle="modal" data-target="#forRepairModal"><i class="fas fa-tools"></i> For Repair</button>
                                                                    <button type="button" class="btn btn-primary rounded btn-sm" data-toggle="modal" data-target="#forReturnModal"><i class="fas fa-undo-alt"></i> For Return</button>
                                                                    <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#DecommissionModal"><i class="fas fa-trash-alt"></i> Decommission</button>
                                                                    @if($component->status_id == 3)
                                                                    <button type="button" class="btn btn-danger rounded btn-sm" data-toggle="modal" data-target="#DecommissionModal"><i class="fas fa-tools"></i> Replace Component</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            @endif
                                                        @endforeach
                                                        @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                <div class="panel panel-default pl-2">
                    <div class="panel-heading" role="tab" id="">
                        <h5 class="panel-title">
                            <a role="button" data-toggle="collapse" href="#collapsePD" aria-expanded="true" aria-controls="collapsePD" class="trigger collapsed" id="collapsedownPD"><i class="fas fa-arrow-circle-down"></i> Production Development Department ({{ count($pd_dep) }})</a>
                        </h5>
                    </div>
                <div id="collapsePD" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingPD">
                    
                    @if(count($pd_dep) == 0)
                            <div class="container-fluid border-secondary border-0 text-center" >
                                <div class="card-header">No System Units For Repair</div>
                            </div>
                    @else
                        <div class="panel-body">
                            <div class="container-fluid">
                                <ul class="list-unstyled">
                                <!--PD PC items list -->
                                    <!--List item-->
                                    @foreach($pd_dep as $unit)
                                    <li> 
                                        <button type="button" class="btn btn-link text-info" data-toggle="collapse" data-target="#pd1" style="text-decoration: none"  onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='#00F'" >
                                                <a onMouseOver="this.style.color='#33b5e5'" onMouseOut="this.style.color='#0099CC'" ><i class="fas fa-angle-down">
                                                    </i>{{$unit->name}}{{$unit->su_id}}
                                                </a>
                                                <button type="button" class="btn btn-success rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal">
                                                    <i class="fas fa-check"></i> Make Available
                                                </button>
                                                <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#DecommissionModal">
                                                    <i class="fas fa-trash-alt"></i> Decommission
                                                </button> 
                                        </button>
                                
                                    <!--Accordion Content-->
                                        <div class="collapse" id="pd1">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Component</th>
                                                            <th scope="col">Brand/Name</th>
                                                            <th scope="col">Details</th>
                                                            <th scope="col">Serial No.</th>
                                                            <th scope="col">Warranty</th>
                                                            <th scope="col">Mark As</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($components as $component)
                                                            @if($component->unit_id == $unit->su_id)
                                                            <tr>
                                                                <td>{{$component->name}}</td>
                                                                <td>{{$component->brand}} {{$component->name}}</td>
                                                                <td>{{$component->details}}</td>
                                                                <td>{{$component->serial_no}}</td>
                                                                <td>{{$component->warranty_start}} - {{$component->warranty_end}}</td>
                                                                <td>
                                                                    <button type="button" class="btn btn-success rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal"><i class="fas fa-check"></i> Make Available</button>
                                                                    <button type="button" class="btn btn-warning rounded btn-sm" data-toggle="modal" data-target="#forRepairModal"><i class="fas fa-tools"></i> For Repair</button>
                                                                    <button type="button" class="btn btn-primary rounded btn-sm" data-toggle="modal" data-target="#forReturnModal"><i class="fas fa-undo-alt"></i> For Return</button>
                                                                    <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#DecommissionModal"><i class="fas fa-trash-alt"></i> Decommission</button>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif        
                </div>
                    </div>
                    <div class="panel panel-default pl-2">
                        <div class="panel-heading" role="tab" id="">
                            <h5 class="panel-title">
                                <a role="button" data-toggle="collapse" href="#collapseFD" aria-expanded="true" aria-controls="collapseFD" class="trigger collapsed" id="collapsedownFD"><i class="fas fa-arrow-circle-down"></i> Financial Department ({{ count($fin_dep) }})</a>
                            </h5>
                        </div>
                        <div id="collapseFD" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFD">
                            @if(count($fin_dep) == 0)
                            <div class="container-fluid border-secondary border-0 text-center" >
                                <div class="card-header">No System Units For Repair</div>
                            </div>
                            @else
                            <div class="panel-body">
                                <div class="container-fluid">
                                     <ul class="list-unstyled">
<!--FD PC items list -->
                                            <!--List item-->
                                            @foreach($fin_dep as $unit)
                                            <li> <button type="button" class="btn btn-link text-info" data-toggle="collapse" data-target="#fd1" style="text-decoration: none"  onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='#00F'" ><a onMouseOver="this.style.color='#33b5e5'" onMouseOut="this.style.color='#0099CC'" ><i class="fas fa-angle-down"></i>{{$unit->name}}{{$unit->su_id}}</a>
                                              <button type="button" class="btn btn-success rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal"><i class="fas fa-check"></i> Make Available</button>
                                              <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#DecommissionModal"><i class="fas fa-trash-alt"></i> Decommission</button> </button>
<!--Accordion Content-->
                                                <div class="collapse" id="fd1">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Component</th>
                                                                <th scope="col">Brand/Name</th>
                                                                <th scope="col">Details</th>
                                                                <th scope="col">Serial No.</th>
                                                                <th scope="col">Warranty</th>
                                                                <th scope="col">Mark As</th>


                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($components as $component)
                                                                @if($component->unit_id == $unit->su_id)
                                                                <tr>
                                                                    <td>{{$component->name}}</td>
                                                                    <td>{{$component->brand}} {{$component->name}}</td>
                                                                    <td>{{$component->details}}</td>
                                                                    <td>{{$component->serial_no}}</td>
                                                                    <td>{{$component->warranty_start}} - {{$component->warranty_end}}</td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-success rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal"><i class="fas fa-check"></i> Make Available</button>
                                                                        <button type="button" class="btn btn-warning rounded btn-sm" data-toggle="modal" data-target="#forRepairModal"><i class="fas fa-tools"></i> For Repair</button>
                                                                        <button type="button" class="btn btn-primary rounded btn-sm" data-toggle="modal" data-target="#forReturnModal"><i class="fas fa-undo-alt"></i> For Return</button>
                                                                        <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#DecommissionModal"><i class="fas fa-trash-alt"></i> Decommission</button>
                                                                    </td>
                                                                </tr>
                                                                @endif
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>

                    <div class="panel panel-default pl-2">
                        <div class="panel-heading" role="tab" id="">
                            <h5 class="panel-title">
                                <a role="button" data-toggle="collapse" href="#collapseHR" aria-expanded="true" aria-controls="collapseHR" class="trigger collapsed" id="collapsedownHR"><i class="fas fa-arrow-circle-down"></i>  Human Resources Department ({{ count($hr_dep) }})</a>
                            </h5>
                        </div>
                        <div id="collapseHR" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingHR">
                            @if(count($hr_dep) == 0)
                            <div class="container-fluid border-secondary border-0 text-center" >
                                <div class="card-header">No System Units For Repair</div>
                            </div>
                            @else
                            <div class="panel-body">
                                <div class="container-fluid">

                                    <ul class="list-unstyled">
<!--HR PC items list -->
                                            <!--List item-->
                                            @foreach($hr_dep as $unit)
                                            <li> <button type="button" class="btn btn-link text-info" data-toggle="collapse" data-target="#hr1" style="text-decoration: none"  onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='#00F'" ><a onMouseOver="this.style.color='#33b5e5'" onMouseOut="this.style.color='#0099CC'" ><i class="fas fa-angle-down"></i> {{$unit->name}}{{$unit->su_id}}</a>
                                              <button type="button" class="btn btn-success rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal"><i class="fas fa-check"></i> Make Available</button>
                                              <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#DecommissionModal"><i class="fas fa-trash-alt"></i> Decommission</button> </button>
<!--Accordion Content-->
                                                <div class="collapse" id="hr1">
                                                    <table class="table table-striped">
                                                        </tbody>
                                                        @foreach($components as $component)
                                                                @if($component->unit_id == $unit->su_id)
                                                                <tr>
                                                                    <td>{{$component->name}}</td>
                                                                    <td>{{$component->brand}} {{$component->name}}</td>
                                                                    <td>{{$component->details}}</td>
                                                                    <td>{{$component->serial_no}}</td>
                                                                    <td>{{$component->warranty_start}} - {{$component->warranty_end}}</td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-success rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal"><i class="fas fa-check"></i> Make Available</button>
                                                                        <button type="button" class="btn btn-warning rounded btn-sm" data-toggle="modal" data-target="#forRepairModal"><i class="fas fa-tools"></i> For Repair</button>
                                                                        <button type="button" class="btn btn-primary rounded btn-sm" data-toggle="modal" data-target="#forReturnModal"><i class="fas fa-undo-alt"></i> For Return</button>
                                                                        <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#DecommissionModal"><i class="fas fa-trash-alt"></i> Decommission</button>
                                                                    </td>
                                                                </tr>
                                                                @endif
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="panel panel-default pl-2">
                        <div class="panel-heading" role="tab" id="">
                            <h5 class="panel-title">
                                <a role="button" data-toggle="collapse" href="#collapseND" aria-expanded="true" aria-controls="collapseHR" class="trigger collapsed" id="collapsedownHR"><i class="fas fa-arrow-circle-down"></i>  No Assigned Department ({{ count($no_dep) }})</a>
                            </h5>
                        </div>
                        <div id="collapseND" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingHR">
                            @if(count($no_dep) == 0)
                            <div class="container-fluid border-secondary border-0 text-center" >
                                <div class="card-header">No System Units For Repair</div>
                            </div>
                            @else
                            <div class="panel-body">
                                <div class="container-fluid">

                                    <ul class="list-unstyled">
<!--HR PC items list -->
                                            <!--List item-->
                                            @foreach($no_dep as $unit)
                                            <li> <button type="button" class="btn btn-link text-info" data-toggle="collapse" data-target="#hr1" style="text-decoration: none"  onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='#00F'" ><a onMouseOver="this.style.color='#33b5e5'" onMouseOut="this.style.color='#0099CC'" ><i class="fas fa-angle-down"></i> {{$unit->name}}{{$unit->su_id}}</a>
                                              <button type="button" class="btn btn-success rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal"><i class="fas fa-check"></i> Make Available</button>
                                              <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#DecommissionModal"><i class="fas fa-trash-alt"></i> Decommission</button> </button>
<!--Accordion Content-->
                                                <div class="collapse" id="hr1">
                                                    <table class="table table-striped">
                                                        </tbody>
                                                        @foreach($components as $component)
                                                                @if($component->unit_id == $unit->su_id)
                                                                <tr>
                                                                    <td>{{$component->name}}</td>
                                                                    <td>{{$component->brand}} {{$component->name}}</td>
                                                                    <td>{{$component->details}}</td>
                                                                    <td>{{$component->serial_no}}</td>
                                                                    <td>{{$component->warranty_start}} - {{$component->warranty_end}}</td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-success rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal"><i class="fas fa-check"></i> Make Available</button>
                                                                        <button type="button" class="btn btn-warning rounded btn-sm" data-toggle="modal" data-target="#forRepairModal"><i class="fas fa-tools"></i> For Repair</button>
                                                                        <button type="button" class="btn btn-primary rounded btn-sm" data-toggle="modal" data-target="#forReturnModal"><i class="fas fa-undo-alt"></i> For Return</button>
                                                                        <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#DecommissionModal"><i class="fas fa-trash-alt"></i> Decommission</button>
                                                                    </td>
                                                                </tr>
                                                                @endif
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </li>
                                            @endforeach

                                        </ul>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>






    <hr>
    <h4 class="font-weight-bold">Computer Peripheral ({{ count($for_repair_mice) + count($for_repair_keyboards) + count($for_repair_monitors)}})</h4>
     <div class="panel panel-default pl-2">
        <div class="panel-heading" role="tab" id="headingTwo">
            <h5 class="panel-title">
                <a role="button" data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" class="trigger collapsed" id="collapsedown2">
                    <i class="fas fa-arrow-circle-down"></i> Mouse({{count($for_repair_mice)}})</a>
            </h5>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
                <div class="container-fluid">

                    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Brand/Name</th>
                            <th scope="col">Details</th>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Warranty</th>
                            <th scope="col">Mark Item As</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if(count($for_repair_mice) == 0)
                        <tr class="text-center">
                            <td colspan="6">No Mouse for Repair</td>

                        </tr>
                        @else
                        @foreach($for_repair_mice as $for_repair_mouse)
                        <tr>
                            <td>{{$for_repair_mouse->id}}</td>
                            <td>{{$for_repair_mouse->brand}}</td>
                            <td>{{$for_repair_mouse->details}}</td>
                            <td>{{$for_repair_mouse->serial_no}}</td>
                            <td>{{$for_repair_mouse->warranty_start}}-{{$for_repair_mouse->warranty_end}}</td>
                            <td>
                            <button type="button" class="btn btn-success rounded" data-toggle="modal" data-target="#makeAvailableModal-{!! $for_repair_mouse->id !!}">
                                 <i class="fas fa-check"></i> Make Available</button>
                            <button type="button" class="btn btn-secondary rounded" data-toggle="modal" data-target="#DecommissionModal"><i class="fas fa-trash-alt"></i> Decommission</button>
                          </td>
                           <!-- Make Available prompt-->
                            <div class="modal fade" id="makeAvailableModal-{!! $for_repair_mouse->id !!}" tabindex="-1" role="dialog"
                                aria-hidden="true">

                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content" style="height:450px;">
                                            <div class="modal-header">
                                            <h5 class="modal-title"></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form action="{!! url('/add-to-concerns-equipment'); !!}" method="post">
                                                {!! csrf_field() !!}
                                                <div class="modal-body">
                                                    <div class="warning-content">
                                                        <p>Are you sure you want to make equipment,
                                                            <b>{{ $for_repair_mouse->model }} {{ $for_repair_mouse->brand }} available in the inventory?</b>
                                                        </p>
                                                    </div>
                                                    <div class="btn-group" role="group">
                                                        <button class="btn btn-warning text-uppercase" data-toggle="collapse"
                                                            data-target="#remarks-4-{!! $for_repair_mouse->id !!}" aria-expanded="false" aria-controls="collapseExample" type="button">
                                                            Add Remarks
                                                        </button>
                                                        <div class="collapse" id="remarks-4-{!! $for_repair_mouse->id !!}">
                                                            <textarea class="form-control" name="remarks" placeholder="Place remarks"></textarea>
                                                        </div>

                                                    </div>

                                                    <input type="hidden" name="id" value="{!! $for_repair_mouse->id !!}">
                                                    <input type="hidden" name="status_id" value="1">
                                                    <input type="hidden" name="orig_status_id" value="{!! $for_repair_mouse->status_id !!}">
                                                </div>


                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-success text-uppercase">Yes</button>
                                            </form>

                                                <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

     <div class="panel panel-default pl-2">
        <div class="panel-heading" role="tab" id="headingThree">
            <h5 class="panel-title">
                <a role="button" data-toggle="collapse" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree" class="trigger collapsed" id="collapsedown3">
                    <i class="fas fa-arrow-circle-down"></i> Keyboard({{count($for_repair_keyboards)}}) </a>
            </h5>
        </div>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body">
                <div class="container-fluid">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Brand/Name</th>
                            <th scope="col">Details</th>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Warranty</th>
                            <th scope="col">Mark Item As</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if(count($for_repair_keyboards) == 0)
                        <tr class="text-center">
                            <td colspan="6">No Keyboards for Repair</td>

                        </tr>
                        @else
                        @foreach($for_repair_keyboards as $for_repair_keyboard)
                        <tr>
                            <td>{{$for_repair_keyboard->id}}</td>
                            <td>{{$for_repair_keyboard->brand}}</td>
                            <td>{{$for_repair_keyboard->brand}}</td>
                            <td>{{$for_repair_keyboard->details}}</td>
                            <td>{{$for_repair_keyboard->serial_no}}</td>
                            <td>{{$for_repair_keyboard->warranty_start}}-{{$for_repair_keyboard->warranty_end}}</td>
                            <td>
                             <button type="button" class="btn btn-success rounded" data-toggle="modal" data-target="#makeAvailableModal-{!! $for_repair_keyboard->id !!}"><i class="fas fa-check"></i> Make Available</button>
                            <button type="button" class="btn btn-secondary rounded" data-toggle="modal" data-target="#DecommissionModal"><i class="fas fa-trash-alt"></i> Decommission</button>
                            </td>
                            <!-- Make Available prompt-->
                            <div class="modal fade" id="makeAvailableModal-{!! $for_repair_keyboard->id !!}" tabindex="-1" role="dialog"
                                aria-hidden="true">

                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content" style="height:450px;">
                                            <div class="modal-header">
                                            <h5 class="modal-title"></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form action="{!! url('/add-to-concerns-equipment'); !!}" method="post">
                                                {!! csrf_field() !!}
                                                <div class="modal-body">
                                                    <div class="warning-content">
                                                        <p>Are you sure you want to make equipment,
                                                            <b>{{ $for_repair_keyboard->model }} {{ $for_repair_keyboard->brand }} available in the inventory?</b>
                                                        </p>
                                                    </div>
                                                    <div class="btn-group" role="group">
                                                        <button class="btn btn-warning text-uppercase" data-toggle="collapse"
                                                            data-target="#remarks-4-{!! $for_repair_keyboard->id !!}" aria-expanded="false" aria-controls="collapseExample" type="button">
                                                            Add Remarks
                                                        </button>
                                                        <div class="collapse" id="remarks-4-{!! $for_repair_keyboard->id !!}">
                                                            <textarea class="form-control" name="remarks" placeholder="Place remarks"></textarea>
                                                        </div>

                                                    </div>

                                                    <input type="hidden" name="id" value="{!! $for_repair_keyboard->id !!}">
                                                    <input type="hidden" name="status_id" value="1">
                                                    <input type="hidden" name="orig_status_id" value="{!! $for_repair_keyboard->status_id !!}">
                                                </div>


                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-success text-uppercase">Yes</button>
                                            </form>

                                                <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
     <div class="panel panel-default pl-2">
        <div class="panel-heading" role="tab" id="headingFour">
            <h5 class="panel-title">
                <a role="button" data-toggle="collapse" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour" class="trigger collapsed" id="collapsedown4">
                    <i class="fas fa-arrow-circle-down"></i> Monitor({{count($for_repair_monitors)}})</a>
            </h5>
        </div>
        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
            <div class="panel-body">
                <div class="container-fluid">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Brand/Name</th>
                            <th scope="col">Details</th>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Warranty</th>
                            <th scope="col">Mark Item As</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if(count($for_repair_monitors) == 0)
                        <tr class="text-center">
                            <td colspan="6">No Monitors for Repair</td>

                        </tr>
                        @else
                        @foreach($for_repair_monitors as $for_repair_monitor)
                        <tr>
                            <td>{{$for_repair_monitor->id}}</td>
                            <td>{{$for_repair_monitor->brand}}</td>
                            <td>{{$for_repair_monitor->details}}</td>
                            <td>{{$for_repair_monitor->serial_no}}</td>
                            <td>{{$for_repair_monitor->warranty_start}}-{{$for_repair_monitor->warranty_end}}</td>
                            <td>
                             <button type="button" class="btn btn-success rounded" data-toggle="modal" data-target="#makeAvailableModal-{!! $for_repair_monitor->id !!}"><i class="fas fa-check"></i> Make Available</button>
                            <button type="button" class="btn btn-secondary rounded" data-toggle="modal" data-target="#DecommissionModal"><i class="fas fa-trash-alt"></i> Decommission</button>
                            <!-- Make Available prompt-->
                            <div class="modal fade" id="makeAvailableModal-{!! $for_repair_monitor->id !!}" tabindex="-1" role="dialog"
                                aria-hidden="true">

                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content" style="height:450px;">
                                            <div class="modal-header">
                                            <h5 class="modal-title"></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form action="{!! url('/add-to-concerns-equipment'); !!}" method="post">
                                                {!! csrf_field() !!}
                                                <div class="modal-body">
                                                    <div class="warning-content">
                                                        <p>Are you sure you want to make equipment,
                                                            <b>{{ $for_repair_monitor->model }} {{ $for_repair_monitor->brand }} available in the inventory?</b>
                                                        </p>
                                                    </div>
                                                    <div class="btn-group" role="group">
                                                        <button class="btn btn-warning text-uppercase" data-toggle="collapse"
                                                            data-target="#remarks-4-{!! $for_repair_monitor->id !!}" aria-expanded="false" aria-controls="collapseExample" type="button">
                                                            Add Remarks
                                                        </button>
                                                        <div class="collapse" id="remarks-4-{!! $for_repair_monitor->id !!}">
                                                            <textarea class="form-control" name="remarks" placeholder="Place remarks"></textarea>
                                                        </div>

                                                    </div>

                                                    <input type="hidden" name="id" value="{!! $for_repair_monitor->id !!}">
                                                    <input type="hidden" name="status_id" value="1">
                                                    <input type="hidden" name="orig_status_id" value="{!! $for_repair_monitor->status_id !!}">
                                                </div>


                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-success text-uppercase">Yes</button>
                                            </form>

                                                <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>




     <h4 class="font-weight-bold">Mobile Device ({{ count($for_repair_laptops) + count($for_repair_phones) + count($for_repair_phones) }})</h4>
       <div class="panel panel-default pl-2">
            <div class="panel-heading" role="tab" id="headingFive">
                <h5 class="panel-title">
                    <a role="button" data-toggle="collapse" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive" class="trigger collapsed" id="collapsedown5">
                        <i class="fas fa-arrow-circle-down"></i> Laptop({{count($for_repair_laptops)}})</a>
                </h5>
            </div>
            <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                <div class="panel-body">
                    <div class="container-fluid">
                     <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Brand/Name</th>
                            <th scope="col">Details</th>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Warranty</th>
                            <th scope="col">Mark Item As</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if(count($for_repair_laptops) == 0)
                        <tr class="text-center">
                            <td colspan="6">No Laptops for Repair</td>
                        </tr>
                        @else
                        @foreach($for_repair_laptops as $for_repair_laptop)
                        <tr>
                            <td>{{$for_repair_laptop->id}}</td>
                            <td>{{$for_repair_laptop->brand}}</td>
                            <td>{{$for_repair_laptop->details}}</td>
                            <td>{{$for_repair_laptop->serial_no}}</td>
                            <td>{{$for_repair_laptop->warranty_start}}-{{$for_repair_laptop->warranty_end}}</td>
                            <td>
                             <button type="button" class="btn btn-success rounded" data-toggle="modal" data-target="#makeAvailableModal-{!! $for_repair_laptop->id !!}">
                                 <i class="fas fa-check"></i> Make Available</button>
                            <button type="button" class="btn btn-secondary rounded" data-toggle="modal" data-target="#DecommissionModal"><i class="fas fa-trash-alt"></i> Decommission</button>
                            <!-- Make Available prompt-->
                            <div class="modal fade" id="makeAvailableModal-{!! $for_repair_laptop->id !!}" tabindex="-1" role="dialog"
                                aria-hidden="true">

                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content" style="height:450px;">
                                            <div class="modal-header">
                                            <h5 class="modal-title"></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form action="{!! url('/add-to-concerns-equipment'); !!}" method="post">
                                                {!! csrf_field() !!}
                                                <div class="modal-body">
                                                    <div class="warning-content">
                                                        <p>Are you sure you want to make equipment,
                                                            <b>{{ $for_repair_laptop->model }} {{ $for_repair_laptop->brand }} available in the inventory?</b>
                                                        </p>
                                                    </div>
                                                    <div class="btn-group" role="group">
                                                        <button class="btn btn-warning text-uppercase" data-toggle="collapse"
                                                            data-target="#remarks-4-{!! $for_repair_laptop->id !!}" aria-expanded="false" aria-controls="collapseExample" type="button">
                                                            Add Remarks
                                                        </button>
                                                        <div class="collapse" id="remarks-4-{!! $for_repair_laptop->id !!}">
                                                            <textarea class="form-control" name="remarks" placeholder="Place remarks"></textarea>
                                                        </div>

                                                    </div>

                                                    <input type="hidden" name="id" value="{!! $for_repair_laptop->id !!}">
                                                    <input type="hidden" name="status_id" value="1">
                                                    <input type="hidden" name="orig_status_id" value="{!! $for_repair_laptop->status_id !!}">
                                                </div>


                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary text-uppercase">Yes</button>
                                            </form>

                                                <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                    </div>
                </div>
            </div>
        </div>

         <div class="panel panel-default pl-2">
            <div class="panel-heading" role="tab" id="headingSix">
                <h5 class="panel-title">
                    <a role="button" data-toggle="collapse" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix" class="trigger collapsed" id="collapsedown6">
                        <i class="fas fa-arrow-circle-down"></i> Tablet({{ count($for_repair_tablets) }})</a>
                </h5>
            </div>
            <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                <div class="panel-body">
                    <div class="container-fluid">
                        <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Brand/Name</th>
                            <th scope="col">Details</th>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Warranty</th>
                            <th scope="col">Mark Item As</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if(count($for_repair_tablets) == 0)
                        <tr class="text-center">
                            <td colspan="6">No Tablets for Repair</td>

                        </tr>
                        @else
                        @foreach($for_repair_tablets as $for_repair_tablet)
                        <tr>
                            <td>{{$for_repair_tablet->id}}</td>
                            <td>{{$for_repair_tablet->brand}}</td>
                            <td>{{$for_repair_tablet->details}}</td>
                            <td>{{$for_repair_tablet->serial_no}}</td>
                            <td>{{$for_repair_tablet->warranty_start}}-{{$for_repair_tablet->warranty_end}}</td>
                            <td>
                            <button type="button" class="btn btn-success rounded" data-toggle="modal" data-target="#makeAvailableModal-$for_repair_tablet"><i class="fas fa-check"></i> Make Available</button>
                            <button type="button" class="btn btn-secondary rounded" data-toggle="modal" data-target="#DecommissionModal"><i class="fas fa-trash-alt"></i> Decommission</button>
                            <!-- Make Available prompt-->
                            <div class="modal fade" id="makeAvailableModal-{!! $for_repair_tablet->id !!}" tabindex="-1" role="dialog"
                                aria-hidden="true">

                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content" style="height:450px;">
                                            <div class="modal-header">
                                            <h5 class="modal-title"></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form action="{!! url('/add-to-concerns-equipment'); !!}" method="post">
                                                {!! csrf_field() !!}
                                                <div class="modal-body">
                                                    <div class="warning-content">
                                                        <p>Are you sure you want to make equipment,
                                                            <b>{{ $for_repair_tablet->model }} {{ $for_repair_tablet->brand }} available in the inventory?</b>
                                                        </p>
                                                    </div>
                                                    <div class="btn-group" role="group">
                                                        <button class="btn btn-warning text-uppercase" data-toggle="collapse"
                                                            data-target="#remarks-4-{!! $for_repair_tablet->id !!}" aria-expanded="false" aria-controls="collapseExample" type="button">
                                                            Add Remarks
                                                        </button>
                                                        <div class="collapse" id="remarks-4-{!! $for_repair_tablet->id !!}">
                                                            <textarea class="form-control" name="remarks" placeholder="Place remarks"></textarea>
                                                        </div>

                                                    </div>

                                                    <input type="hidden" name="id" value="{!! $for_repair_tablet->id !!}">
                                                    <input type="hidden" name="status_id" value="1">
                                                    <input type="hidden" name="orig_status_id" value="{!! $for_repair_tablet->status_id !!}">
                                                </div>


                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-success text-uppercase">Yes</button>
                                            </form>

                                                <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </tr>


                        @endforeach
                        @endif
                    </tbody>
                </table>
                    </div>
                </div>
            </div>
        </div>

             <div class="panel panel-default pl-2">
            <div class="panel-heading" role="tab" id="headingSeven">
                <h5 class="panel-title">
                    <a role="button" data-toggle="collapse" href="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven" class="trigger collapsed" id="collapsedown7">
                        <i class="fas fa-arrow-circle-down"></i> Mobile Phone({{ count($for_repair_phones) }})</a>
                </h5>
            </div>
            <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                <div class="panel-body">
                    <div class="container-fluid">
                       <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Brand/Name</th>
                            <th scope="col">Details</th>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Warranty</th>
                            <th scope="col">Mark Item As</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if(count($for_repair_phones) == 0)
                        <tr class="text-center">
                            <td colspan="6">No Mobile Phones for Repair</td>

                        </tr>
                        @else
                        @foreach($for_repair_phones as $for_repair_phone)
                        <tr>
                            <td>{{$for_repair_phone->id}}</td>
                            <td>{{$for_repair_phone->brand}} {{$for_repair_phone->model}}</td>
                            <td>{{$for_repair_phone->details}}</td>
                            <td>{{$for_repair_phone->serial_no}}</td>
                            <td>{{$for_repair_phone->warranty_start}}-{{$for_repair_phone->warranty_end}}</td>
                            <td>
                            <button type="button" class="btn btn-success rounded" data-toggle="modal" data-target="#makeAvailableModal"><i class="fas fa-check"></i> Make Available</button>
                            <button type="button" class="btn btn-secondary rounded" data-toggle="modal" data-target="#DecommissionModal"><i class="fas fa-trash-alt"></i> Decommission</button>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

    <!-- Decomissioned prompt-->
    <div class="modal fade" id="DecommissionModal" tabindex="-1" role="dialog" aria-labelledby="DecommissionModalTitle"
        aria-hidden="true">

            <div class="modal-dialog" role="document">
                <div class="modal-content" style="height:450px;">
                    <div class="modal-header">
                    <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                      <div class="warning-content">
                          <p>Warning!</p>
                          <p>Are you sure you want to change the status of this item to Decommission?</p>
                      </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary text-uppercase">Save Changes</button>
                        <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
    </div>




    <!-- For Repair prompt-->
    <div class="modal fade" id="forRepairModal" tabindex="-1" role="dialog" aria-labelledby="DecommissionModalTitle"
        aria-hidden="true">

            <div class="modal-dialog" role="document">
                <div class="modal-content" style="height:450px;">
                    <div class="modal-header">
                    <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                      <div class="warning-content">
                          <p>Warning!</p>
                          <p>Are you sure you want to change the status of this item to For Repair?</p>
                      </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary text-uppercase">Save Changes</button>
                        <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
    </div>


    <!-- For Return prompt-->
    <div class="modal fade" id="forReturnModal" tabindex="-1" role="dialog" aria-labelledby="DecommissionModalTitle"
        aria-hidden="true">

            <div class="modal-dialog" role="document">
                <div class="modal-content" style="height:450px;">
                    <div class="modal-header">
                    <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                      <div class="warning-content">
                          <p>Warning!</p>
                          <p>Are you sure you want to change the status of this item to For Return?</p>
                      </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary text-uppercase">Save Changes</button>
                        <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
    </div>











@stop

@section('script')

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
      $(document).ready(function(){
      $('#concerns').addClass('active');
      });
    </script>

    <!-- <script type="text/javascript">
    $(document).ready(function() {
        $('#myDataTable1').DataTable();
    } );
    </script> -->
    <script type="text/javascript">
    $(document).ready(function() {
        $('#myDataTable').DataTable();
    } );
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#myDataTable1').DataTable();
    } );
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#myDataTable2').DataTable();
    } );
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#myDataTable3').DataTable();
    } );
    </script>

         <script>
        $('#collapsedown1').click(function() {
            $('#collapse1').toggle('1000');
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

        $('#collapsedown5').click(function() {
            $('#collapseFive').toggle('1000');
            $("i", this).toggleClass("fas fa-arrow-circle-down fas fa-arrow-circle-up");

        });

        $('#collapsedown6').click(function() {
            $('#collapseSix').toggle('1000');
            $("i", this).toggleClass("fas fa-arrow-circle-down fas fa-arrow-circle-up");

        });

        $('#collapsedown8').click(function() {
         $('#collapseEight').toggle('1000');
         $("i", this).toggleClass("fas fa-arrow-circle-down fas fa-arrow-circle-up");

        });

        $('#collapsedown11').click(function() {
        $('#collapseEleven').toggle('1000');
        $("i", this).toggleClass("fas fa-arrow-circle-down fas fa-arrow-circle-up");

        });

    </script>
        <script>
        $('#collapsedownIT').click(function() {
        $('#collapseIT').toggle('1000');
        $("i", this).toggleClass("fas fa-arrow-circle-down fas fa-arrow-circle-up");

        });
        $('#collapsedownPD').click(function() {
        $('#collapsePD').toggle('1000');
        $("i", this).toggleClass("fas fa-arrow-circle-down fas fa-arrow-circle-up");

        });
        $('#collapsedownFD').click(function() {
        $('#collapseFD').toggle('1000');
        $("i", this).toggleClass("fas fa-arrow-circle-down fas fa-arrow-circle-up");

        });
        $('#collapsedownHR').click(function() {
        $('#collapseHR').toggle('1000');
        $("i", this).toggleClass("fas fa-arrow-circle-down fas fa-arrow-circle-up");

        });



        </script>

@stop
