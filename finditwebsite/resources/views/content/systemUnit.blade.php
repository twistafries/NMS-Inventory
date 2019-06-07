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
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}"> @stop @section('title') Inventory @stop @section('../layout/breadcrumbs') @section('breadcrumbs-title')
    <i class="fas fa-chart-line">Inventory
    @stop
@stop

@section('content')
<div class="container-fluid">
<nav class="navbar navbar-light">
        <span class="navbar-brand mb-0 h1">INVENTORY</span>
@include('content.toolbar')
        <nav aria-label="breadcrumb" style="font-size:16px; font-weight:bold;">
                <ol class="breadcrumb arr-right">
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/inventory') !!}" class="text-dark" aria-current="page">Items</a>
                    </li>
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/systemUnit') !!}" class="text-warning" aria-current="page">System Unit</a>
                    </li>
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/repair') !!}" class="text-dark" >For Repair</a>
                    </li>


                    <li class="breadcrumb-item ">
                        <a href="{!! url('/decommissioned') !!}" class="text-dark">Decommissioned</a>
                    </li>
                </ol>
        </nav>
</nav>

                        <hr>



<!--Information Technology Development Department Datatable-->
          <h5 class="font-weight-bold">Information Technology Development Department</h5>
                <table id="myDataTable" class="table table-borderless table-hover" style="width:100%;cursor:pointer;">
                    <thead class="thead-dark">
                         <tr>
                            <th>ID</th>
                            <th>Department</th>
                            <th>Issued To</th>
                            <th>Mark As</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($it_dep as $unit)
                            <tr>
                                <td>ID: {{$unit->su_id}}</td>
                                <td>
                                    <button type="button" class="btn btn-link text-info" data-toggle="collapse" data-target="#itDepartment{{$unit->su_id}}" style="text-decoration: none"  onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='#00F'" >
                                            <a onMouseOver="this.style.color='#33b5e5'" onMouseOut="this.style.color='#0099CC'" >
                                                <i class="fas fa-angle-down">
                                                </i> {{$unit->name}} {{$unit->su_id}}
                                            </a>
                                    </button>
                                    <div class="collapse" id="itDepartment{{$unit->su_id}}">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Component</th>
                                                        <th scope="col">Brand/Name</th>
                                                        <th scope="col">Details</th>
                                                        <th scope="col">Serial No.</th>
                                                        <th scope="col">Warranty</th> 
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
                                                            </tr>
                                                             @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                    </div> 
                                    
                                </td>
                                        @if($unit->issued_to != null)
                                            <td>{{$unit->fname}} {{$unit->lname}}</td>
                                        @else 
                                            <td> None </td>
                                        @endif
                                    <td>
                                        @if($unit->status_id == 1)
                                            <button type="button" class="btn btn-warning rounded btn-sm" data-toggle="modal" data-target="#forRepairModal"><i class="fas fa-tools"></i> For Repair</button>
                                            <button type="button" class="btn btn-primary rounded btn-sm" data-toggle="modal" data-target="#forReturnModal"><i class="fas fa-undo-alt"></i> For Return</button>
                                            <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#decommissionedModal"><i class="fas fa-trash-alt"></i> Decommissioned</button>
                                            <button type="button" class="btn btn-info rounded btn-sm" data-toggle="modal" data-target="#singleIssue"><i class="fas fa-hand-holding"></i> Issue</button>
                                        @elseif($unit->status_id == 2)
                                            <button type="button" class="btn btn-success rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" ><i class="fas fa-check"></i> Make Available</button>
                                            <button type="button" class="btn btn-warning rounded btn-sm" data-toggle="modal" data-target="#forRepairModal"><i class="fas fa-tools"></i> For Repair</button>
                                            <button type="button" class="btn btn-primary rounded btn-sm" data-toggle="modal" data-target="#forReturnModal"><i class="fas fa-undo-alt"></i> For Return</button>
                                            <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#decommissionedModal"><i class="fas fa-trash-alt"></i> Decommissioned</button>
                                        @elseif($unit->status_id == 3)
                                            <button type="button" class="btn btn-success rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" ><i class="fas fa-check"></i> Make Available</button>
                                            <button type="button" class="btn btn-primary rounded btn-sm" data-toggle="modal" data-target="#forReturnModal"><i class="fas fa-undo-alt"></i> For Return</button>
                                            <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#decommissionedModal"><i class="fas fa-trash-alt"></i> Decommissioned</button>
                                            <button type="button" class="btn btn-info rounded btn-sm" data-toggle="modal" data-target="#singleIssue"><i class="fas fa-hand-holding"></i> Issue</button>
                                        @elseif($unit->status_id == 4)
                                            <button type="button" class="btn btn-success rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" ><i class="fas fa-check"></i> Make Available</button>
                                            <button type="button" class="btn btn-warning rounded btn-sm" data-toggle="modal" data-target="#forRepairModal"><i class="fas fa-tools"></i> For Repair</button>
                                            <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#decommissionedModal"><i class="fas fa-trash-alt"></i> Decommissioned</button>
                                            <button type="button" class="btn btn-info rounded btn-sm" data-toggle="modal" data-target="#singleIssue"><i class="fas fa-hand-holding"></i> Issue</button>
                                        @endif
                                    </td> 
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        <br>
<!--Production Development Table-->
          <h5 class="font-weight-bold">Production Development</h5>
          <table id="myDataTablePD" class="table table-borderless table-hover" style="width:100%;cursor:pointer;">
                    <thead class="thead-dark">
                         <tr>
                            <th>ID</th>
                            <th>Department</th>
                            <th>Issued To</th>
                            <th>Mark As</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($prod_dep as $unit)
                                <tr>
                                    <td>ID: {{$unit->su_id}}</td>
                                    <td>
                                        <button type="button" class="btn btn-link text-info" data-toggle="collapse" data-target="#itDepartment{{$unit->su_id}}" style="text-decoration: none"  onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='#00F'" >
                                                <a onMouseOver="this.style.color='#33b5e5'" onMouseOut="this.style.color='#0099CC'" >
                                                    <i class="fas fa-angle-down">
                                                    </i> {{$unit->name}} {{$unit->su_id}}
                                                </a>
                                        </button>
                                        <div class="collapse" id="itDepartment{{$unit->su_id}}">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Component</th>
                                                            <th scope="col">Brand/Name</th>
                                                            <th scope="col">Details</th>
                                                            <th scope="col">Serial No.</th>
                                                            <th scope="col">Warranty</th> 
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
                                                                </tr>
                                                                 @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                        </div> 
                                        
                                        </td>
                                            @if($unit->issued_to != null)
                                                <td>{{$unit->fname}} {{$unit->lname}}</td>
                                            @else 
                                                <td> None </td>
                                            @endif
                                        <td>
                                            @if($unit->status_id == 1)
                                                <button type="button" class="btn btn-warning rounded btn-sm" data-toggle="modal" data-target="#forRepairModal"><i class="fas fa-tools"></i> For Repair</button>
                                                <button type="button" class="btn btn-primary rounded btn-sm" data-toggle="modal" data-target="#forReturnModal"><i class="fas fa-undo-alt"></i> For Return</button>
                                                <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#decommissionedModal"><i class="fas fa-trash-alt"></i> Decommissioned</button>
                                                <button type="button" class="btn btn-info rounded btn-sm" data-toggle="modal" data-target="#singleIssue"><i class="fas fa-hand-holding"></i> Issue</button>
                                            @elseif($unit->status_id == 2)
                                                <button type="button" class="btn btn-success rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" ><i class="fas fa-check"></i> Make Available</button>
                                                <button type="button" class="btn btn-warning rounded btn-sm" data-toggle="modal" data-target="#forRepairModal"><i class="fas fa-tools"></i> For Repair</button>
                                                <button type="button" class="btn btn-primary rounded btn-sm" data-toggle="modal" data-target="#forReturnModal"><i class="fas fa-undo-alt"></i> For Return</button>
                                                <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#decommissionedModal"><i class="fas fa-trash-alt"></i> Decommissioned</button>
                                            @elseif($unit->status_id == 3)
                                                <button type="button" class="btn btn-success rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" ><i class="fas fa-check"></i> Make Available</button>
                                                <button type="button" class="btn btn-primary rounded btn-sm" data-toggle="modal" data-target="#forReturnModal"><i class="fas fa-undo-alt"></i> For Return</button>
                                                <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#decommissionedModal"><i class="fas fa-trash-alt"></i> Decommissioned</button>
                                                <button type="button" class="btn btn-info rounded btn-sm" data-toggle="modal" data-target="#singleIssue"><i class="fas fa-hand-holding"></i> Issue</button>
                                            @elseif($unit->status_id == 4)
                                                <button type="button" class="btn btn-success rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" ><i class="fas fa-check"></i> Make Available</button>
                                                <button type="button" class="btn btn-warning rounded btn-sm" data-toggle="modal" data-target="#forRepairModal"><i class="fas fa-tools"></i> For Repair</button>
                                                <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#decommissionedModal"><i class="fas fa-trash-alt"></i> Decommissioned</button>
                                                <button type="button" class="btn btn-info rounded btn-sm" data-toggle="modal" data-target="#singleIssue"><i class="fas fa-hand-holding"></i> Issue</button>
                                            @endif
                                        </td> 
                                </tr>
                            @endforeach
    
                    </tbody>

                                    </div>
                            </div>

                        </div>

                        <hr>
            </table>
          <br>
          
<!--Financial Department Table-->
          <h5 class="font-weight-bold">Financial Department</h5>
          <table id="myDataTableFD" class="table table-borderless table-hover" style="width:100%;cursor:pointer;">
                    <thead class="thead-dark">
                         <tr>
                            <th>ID</th>
                            <th>Department</th>
                            <th>Issued To</th>
                            <th>Mark As</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($fin_dep as $unit)
                                <tr>
                                    <td>ID: {{$unit->su_id}}</td>
                                    <td>
                                        <button type="button" class="btn btn-link text-info" data-toggle="collapse" data-target="#itDepartment{{$unit->su_id}}" style="text-decoration: none"  onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='#00F'" >
                                                <a onMouseOver="this.style.color='#33b5e5'" onMouseOut="this.style.color='#0099CC'" >
                                                    <i class="fas fa-angle-down">
                                                    </i> {{$unit->name}} {{$unit->su_id}}
                                                </a>
                                        </button>
                                        <div class="collapse" id="itDepartment{{$unit->su_id}}">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Component</th>
                                                            <th scope="col">Brand/Name</th>
                                                            <th scope="col">Details</th>
                                                            <th scope="col">Serial No.</th>
                                                            <th scope="col">Warranty</th> 
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
                                                                </tr>
                                                                 @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                        </div> 
                                        
                                        </td>
                                            @if($unit->issued_to != null)
                                                <td>{{$unit->fname}} {{$unit->lname}}</td>
                                            @else 
                                                <td> None </td>
                                            @endif
                                        <td>
                                            @if($unit->status_id == 1)
                                                <button type="button" class="btn btn-warning rounded btn-sm" data-toggle="modal" data-target="#forRepairModal"><i class="fas fa-tools"></i> For Repair</button>
                                                <button type="button" class="btn btn-primary rounded btn-sm" data-toggle="modal" data-target="#forReturnModal"><i class="fas fa-undo-alt"></i> For Return</button>
                                                <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#decommissionedModal"><i class="fas fa-trash-alt"></i> Decommissioned</button>
                                                <button type="button" class="btn btn-info rounded btn-sm" data-toggle="modal" data-target="#singleIssue"><i class="fas fa-hand-holding"></i> Issue</button>
                                            @elseif($unit->status_id == 2)
                                                <button type="button" class="btn btn-success rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" ><i class="fas fa-check"></i> Make Available</button>
                                                <button type="button" class="btn btn-warning rounded btn-sm" data-toggle="modal" data-target="#forRepairModal"><i class="fas fa-tools"></i> For Repair</button>
                                                <button type="button" class="btn btn-primary rounded btn-sm" data-toggle="modal" data-target="#forReturnModal"><i class="fas fa-undo-alt"></i> For Return</button>
                                                <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#decommissionedModal"><i class="fas fa-trash-alt"></i> Decommissioned</button>
                                            @elseif($unit->status_id == 3)
                                                <button type="button" class="btn btn-success rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" ><i class="fas fa-check"></i> Make Available</button>
                                                <button type="button" class="btn btn-primary rounded btn-sm" data-toggle="modal" data-target="#forReturnModal"><i class="fas fa-undo-alt"></i> For Return</button>
                                                <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#decommissionedModal"><i class="fas fa-trash-alt"></i> Decommissioned</button>
                                                <button type="button" class="btn btn-info rounded btn-sm" data-toggle="modal" data-target="#singleIssue"><i class="fas fa-hand-holding"></i> Issue</button>
                                            @elseif($unit->status_id == 4)
                                                <button type="button" class="btn btn-success rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" ><i class="fas fa-check"></i> Make Available</button>
                                                <button type="button" class="btn btn-warning rounded btn-sm" data-toggle="modal" data-target="#forRepairModal"><i class="fas fa-tools"></i> For Repair</button>
                                                <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#decommissionedModal"><i class="fas fa-trash-alt"></i> Decommissioned</button>
                                                <button type="button" class="btn btn-info rounded btn-sm" data-toggle="modal" data-target="#singleIssue"><i class="fas fa-hand-holding"></i> Issue</button>
                                            @endif
                                        </td> 
                                </tr>
                            @endforeach
    
                        </tbody>
                </table>
                <br>

          <!--Human Resources Table-->
          
          <h5 class="font-weight-bold">Human Resources Department</h5>
          <table id="myDataTableHR" class="table table-borderless table-hover" style="width:100%;cursor:pointer;">
                    <thead class="thead-dark">
                         <tr>
                            <th>ID</th>
                            <th>Department</th>
                            <th>Issued To</th>
                            <th>Mark As</th>




                        </tr>
                    </thead>

                    <tbody>
                            @foreach($hr_dep as $unit)
                                <tr>
                                    <td>ID: {{$unit->su_id}}</td>
                                    <td>
                                        <button type="button" class="btn btn-link text-info" data-toggle="collapse" data-target="#itDepartment{{$unit->su_id}}" style="text-decoration: none"  onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='#00F'" >
                                                <a onMouseOver="this.style.color='#33b5e5'" onMouseOut="this.style.color='#0099CC'" >
                                                    <i class="fas fa-angle-down">
                                                    </i> {{$unit->name}} {{$unit->su_id}}
                                                </a>
                                        </button>
                                        <div class="collapse" id="itDepartment{{$unit->su_id}}">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Component</th>
                                                            <th scope="col">Brand/Name</th>
                                                            <th scope="col">Details</th>
                                                            <th scope="col">Serial No.</th>
                                                            <th scope="col">Warranty</th> 
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
                                                                </tr>
                                                                 @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                        </div> 
                                        
                                        </td>
                                            @if($unit->issued_to != null)
                                                <td>{{$unit->fname}} {{$unit->lname}}</td>
                                            @else 
                                                <td> None </td>
                                            @endif
                                        <td>
                                            @if($unit->status_id == 1)
                                                <button type="button" class="btn btn-warning rounded btn-sm" data-toggle="modal" data-target="#forRepairModal"><i class="fas fa-tools"></i> For Repair</button>
                                                <button type="button" class="btn btn-primary rounded btn-sm" data-toggle="modal" data-target="#forReturnModal"><i class="fas fa-undo-alt"></i> For Return</button>
                                                <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#decommissionedModal"><i class="fas fa-trash-alt"></i> Decommissioned</button>
                                                <button type="button" class="btn btn-info rounded btn-sm" data-toggle="modal" data-target="#singleIssue"><i class="fas fa-hand-holding"></i> Issue</button>
                                            @elseif($unit->status_id == 2)
                                                <button type="button" class="btn btn-success rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" ><i class="fas fa-check"></i> Make Available</button>
                                                <button type="button" class="btn btn-warning rounded btn-sm" data-toggle="modal" data-target="#forRepairModal"><i class="fas fa-tools"></i> For Repair</button>
                                                <button type="button" class="btn btn-primary rounded btn-sm" data-toggle="modal" data-target="#forReturnModal"><i class="fas fa-undo-alt"></i> For Return</button>
                                                <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#decommissionedModal"><i class="fas fa-trash-alt"></i> Decommissioned</button>
                                            @elseif($unit->status_id == 3)
                                                <button type="button" class="btn btn-success rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" ><i class="fas fa-check"></i> Make Available</button>
                                                <button type="button" class="btn btn-primary rounded btn-sm" data-toggle="modal" data-target="#forReturnModal"><i class="fas fa-undo-alt"></i> For Return</button>
                                                <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#decommissionedModal"><i class="fas fa-trash-alt"></i> Decommissioned</button>
                                                <button type="button" class="btn btn-info rounded btn-sm" data-toggle="modal" data-target="#singleIssue"><i class="fas fa-hand-holding"></i> Issue</button>
                                            @elseif($unit->status_id == 4)
                                                <button type="button" class="btn btn-success rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" ><i class="fas fa-check"></i> Make Available</button>
                                                <button type="button" class="btn btn-warning rounded btn-sm" data-toggle="modal" data-target="#forRepairModal"><i class="fas fa-tools"></i> For Repair</button>
                                                <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#decommissionedModal"><i class="fas fa-trash-alt"></i> Decommissioned</button>
                                                <button type="button" class="btn btn-info rounded btn-sm" data-toggle="modal" data-target="#singleIssue"><i class="fas fa-hand-holding"></i> Issue</button>
                                            @endif
                                        </td> 
                                </tr>
                            @endforeach
    
                        </tbody>

                </table>
          <br>

           <!--No Department Table-->
          <h5 class="font-weight-bold">No Department</h5>
          <table id="myDataTableND" class="table table-borderless table-hover" style="width:100%;cursor:pointer;">
                    <thead class="thead-dark">
                         <tr>
                            <th>ID</th>
                            <th>Department</th>
                            <th>Issued To</th>
                            <th>Mark As</th>




                        </tr>
                    </thead>
                    <tbody>

                            @foreach($no_dep as $unit)
                                <tr>
                                    <td>ID: {{$unit->su_id}}</td>
                                    <td>
                                        <button type="button" class="btn btn-link text-info" data-toggle="collapse" data-target="#itDepartment{{$unit->su_id}}" style="text-decoration: none"  onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='#00F'" >
                                                <a onMouseOver="this.style.color='#33b5e5'" onMouseOut="this.style.color='#0099CC'" >
                                                    <i class="fas fa-angle-down">
                                                    </i> {{$unit->name}} {{$unit->su_id}}
                                                </a>
                                        </button>
                                        <div class="collapse" id="itDepartment{{$unit->su_id}}">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Component</th>
                                                            <th scope="col">Brand/Name</th>
                                                            <th scope="col">Details</th>
                                                            <th scope="col">Serial No.</th>
                                                            <th scope="col">Warranty</th> 
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
                                                                </tr>
                                                                 @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                        </div> 
                                        
                                        </td>
                                            @if($unit->issued_to != null)
                                                <td>{{$unit->fname}} {{$unit->lname}}</td>
                                            @else 
                                                <td> None </td>
                                            @endif
                                        <td>
                                            @if($unit->status_id == 1)
                                                <button type="button" class="btn btn-warning rounded btn-sm" data-toggle="modal" data-target="#forRepairModal"><i class="fas fa-tools"></i> For Repair</button>
                                                <button type="button" class="btn btn-primary rounded btn-sm" data-toggle="modal" data-target="#forReturnModal"><i class="fas fa-undo-alt"></i> For Return</button>
                                                <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#decommissionedModal"><i class="fas fa-trash-alt"></i> Decommissioned</button>
                                                <button type="button" class="btn btn-info rounded btn-sm" data-toggle="modal" data-target="#singleIssue"><i class="fas fa-hand-holding"></i> Issue</button>
                                            @elseif($unit->status_id == 2)
                                                <button type="button" class="btn btn-success rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" ><i class="fas fa-check"></i> Make Available</button>
                                                <button type="button" class="btn btn-warning rounded btn-sm" data-toggle="modal" data-target="#forRepairModal"><i class="fas fa-tools"></i> For Repair</button>
                                                <button type="button" class="btn btn-primary rounded btn-sm" data-toggle="modal" data-target="#forReturnModal"><i class="fas fa-undo-alt"></i> For Return</button>
                                                <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#decommissionedModal"><i class="fas fa-trash-alt"></i> Decommissioned</button>
                                            @elseif($unit->status_id == 3)
                                                <button type="button" class="btn btn-success rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" ><i class="fas fa-check"></i> Make Available</button>
                                                <button type="button" class="btn btn-primary rounded btn-sm" data-toggle="modal" data-target="#forReturnModal"><i class="fas fa-undo-alt"></i> For Return</button>
                                                <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#decommissionedModal"><i class="fas fa-trash-alt"></i> Decommissioned</button>
                                                <button type="button" class="btn btn-info rounded btn-sm" data-toggle="modal" data-target="#singleIssue"><i class="fas fa-hand-holding"></i> Issue</button>
                                            @elseif($unit->status_id == 4)
                                                <button type="button" class="btn btn-success rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" ><i class="fas fa-check"></i> Make Available</button>
                                                <button type="button" class="btn btn-warning rounded btn-sm" data-toggle="modal" data-target="#forRepairModal"><i class="fas fa-tools"></i> For Repair</button>
                                                <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#decommissionedModal"><i class="fas fa-trash-alt"></i> Decommissioned</button>
                                                <button type="button" class="btn btn-info rounded btn-sm" data-toggle="modal" data-target="#singleIssue"><i class="fas fa-hand-holding"></i> Issue</button>
                                            @endif
                                        </td> 
                                </tr>
                            @endforeach
    
                        </tbody>

                </table>
          <br>
<!--Button Prompts Modals-->


          <!-- Make Available prompt-->
<div class="modal fade" id="makeAvailableModal" tabindex="-1" role="dialog" aria-labelledby="makeAvailableModalTitle"
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
                       <p class="text-uppercase font-weight-bold text-warning"><i class="fas fa-exclamation-circle"></i> Warning!</p>
                      <h5 class="text-center">Are you sure you want the item to be <b>Available</b> ? </h5>
                    </div>
                      <div class="btn-group" role="group">
                                        <button class="btn btn-secondary text-uppercase" data-toggle="collapse"
                                            data-target="#remarksRepair" aria-expanded="false" aria-controls="collapseExample" type="button">
                                            Add Remarks
                                        </button>
                                        <div class="collapse" id="remarksRepair">
                                            <textarea class="form-control" name="remarks" placeholder="Place remarks" cols="50" rows="4"></textarea>
                                        </div>

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
<div class="modal fade" id="forReturnModal" tabindex="-1" role="dialog" aria-labelledby="decommissionedModalTitle"
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
                    <p class="text-uppercase font-weight-bold text-warning"><i class="fas fa-exclamation-circle"></i> Warning!</p>
                    <h5 class="text-center">Are you sure you want to mark the item as <b>"For Return"</b> ? </h5>
                  </div>
                    <div class="btn-group" role="group">
                                        <button class="btn btn-secondary text-uppercase" data-toggle="collapse"
                                            data-target="#remarksRepair" aria-expanded="false" aria-controls="collapseExample" type="button">
                                            Add Remarks
                                        </button>
                                        <div class="collapse" id="remarksRepair">
                                            <textarea class="form-control" name="remarks" placeholder="Place remarks" cols="50" rows="4"></textarea>
                                        </div>

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
<div class="modal fade" id="forRepairModal" tabindex="-1" role="dialog" aria-labelledby="decommissionedModalTitle"
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
                      <p class="text-uppercase font-weight-bold text-warning"><i class="fas fa-exclamation-circle"></i> Warning!</p>
                      <h5 class="text-center">Are you sure you want to mark the item as <b>"For Repair"</b> ? </h5>
                      <br>

                  </div>
                     <div class="btn-group" role="group">
                                        <button class="btn btn-secondary text-uppercase" data-toggle="collapse"
                                            data-target="#remarksRepair" aria-expanded="false" aria-controls="collapseExample" type="button">
                                            Add Remarks
                                        </button>
                                        <div class="collapse" id="remarksRepair">
                                            <textarea class="form-control" name="remarks" placeholder="Place remarks" cols="50" rows="4"></textarea>
                                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary text-uppercase p-2">Return to supplier</button>
                                </form>
                                    <button type="button" class="btn btn-warning text-uppercase" data-dismiss="modal">Mark for repair</button>
                                    <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
</div>


<!-- Decommissioned prompt-->
<div class="modal fade" id="decommissionedModal" tabindex="-1" role="dialog" aria-labelledby="decommissionedModalTitle"
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
                    <p class="text-uppercase font-weight-bold text-warning"><i class="fas fa-exclamation-circle"></i> Warning!</p>
                    <h5 class="text-center">Are you sure you want to mark the item as <b>"Decommissioned"</b> ? </h5>
                  </div>
                    <div class="btn-group" role="group">
                                        <button class="btn btn-secondary text-uppercase" data-toggle="collapse"
                                            data-target="#remarksRepair" aria-expanded="false" aria-controls="collapseExample" type="button">
                                            Add Remarks
                                        </button>
                                        <div class="collapse" id="remarksRepair">
                                            <textarea class="form-control" name="remarks" placeholder="Place remarks" cols="50" rows="4"></textarea>
                                        </div>

                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary text-uppercase">Save Changes</button>
                    <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
</div>
<!-- Assign Department modal-->
<div class="modal fade" id="assignDepartmentModal" tabindex="-1" role="dialog" aria-labelledby="assignDepartementModalTitle"
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
            <div class="container pb-2">
             <div class="row pt-2">
                        <div class="col">
                        <p class="card-title text-dark">Department:</p>
                        <select class="exampleFormControlSelect1" name="dept_id" style="width:380px;">
                            <option value="1">Information Technology Development Department</option>
                            <option value="2">Production Development Department</option>
                            <option value="3">Financial Department</option>
                            <option value="4">Human Resources Department</option>
                        </select>
                        </div>
                    </div>

                </div>
              </div>
             <div class="modal-footer">
                            <button id="save" class="btn btn-success" type="submit"> Assign Department </button>
                            <button id="cancel" type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                        </div>

            </div>
        </div>
</div>



                <div class="modal fade" id="viewItemModal" tabindex="-1" role="dialog" aria-labelledby="decommissionedModalTitle"
                        aria-hidden="true">

                            <div class="modal-dialog" role="document">
                                <div class="modal-content" style="height:600px; width: 600px;">
                                    <div class="modal-header">
                                    <h5 class="modal-title"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                      <div class="row">

                                          <div class="col-sm-4"><div class="detail-header text-uppercase">ID:</div></div>

                                          <div class="col-sm-4"><div class="detail-header text-uppercase">Name:</div></div>

                                          <div class="col-sm-4"><div class="detail-header text-uppercase">Added By:</div></div>
                                      </div>
                                      <div class="row">

                                          <div class="col-sm-4">1</div>

                                          <div class="col-sm-4">ITPC</div>

                                          <div class="col-sm-4">Justine Garcia</div>
                                      </div>

                                      <div class="row">

                                          <div class="col-sm-4"><div class="detail-header text-uppercase">Added At:</div></div>

                                          <div class="col-sm-4"><div class="detail-header text-uppercase">Last updated At:</div></div>

                                          <div class="col-sm-4"><div class="detail-header text-uppercase">Status:</div></div>
                                      </div>

                                      <div class="row">

                                          <div class="col-sm-4">01/22/19</div>

                                          <div class="col-sm-4">01/22/19</div>

                                          <div class="col-sm-4">Available</div>
                                      </div>

                                      <div class="row">
                                          <div class="col-sm-12"><div class="detail-header text-uppercase">Department:</div></div>
                                      </div>
                                      <div class="row">
                                          <div class="col-sm-12">Information Technology Development Department</div>
                                      </div>

                                      <div class="row">
                                          <hr>
                                      </div>

                                      <div class="row">
                                          <hr>
                                      </div>


                                      <div class="row">
                                          <div class="col-sm-4"><div class="detail-header text-uppercase">Components</div>
                                            <div class="row">
                                                <div class="col-sm-4"><div class="detail-header text-uppercase">Motherboard:</div></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4"><div class="detail-header text-uppercase">CPU:</div></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4"><div class="detail-header text-uppercase">Storage:</div></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4"><div class="detail-header text-uppercase">RAM:</div></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4"><div class="detail-header text-uppercase">GPU:</div></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4"><div class="detail-header text-uppercase">Power Supply:</div></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4"><div class="detail-header text-uppercase">Case:</div></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4"><div class="detail-header text-uppercase">Heat Sink Fan:</div></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4"><div class="detail-header text-uppercase">Soundcard:</div></div>
                                            </div>
                                          </div>

                                          <div class="col-sm-4"><div class="detail-header text-uppercase">Name</div>
                                             <div class="row">
                                                <div class="col-sm-4"><div class="detail-header">Qwerty</div></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4"><div class="detail-header">Qwerty</div></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4"><div class="detail-header">Qwerty</div></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4"><div class="detail-header">Qwerty</div></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4"><div class="detail-header">Qwerty</div></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4"><div class="detail-header">Qwerty</div></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4"><div class="detail-header">Qwerty</div></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4"><div class="detail-header">Qwerty</div></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4"><div class="detail-header">Qwerty</div></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4"><div class="detail-header">Qwerty</div></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4"><div class="detail-header">Qwerty</div></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4"><div class="detail-header">Qwerty</div></div>
                                            </div>
                                          </div>

                                          <div class="col-sm-4"><div class="detail-header text-uppercase">Serial Number</div>
                                            <div class="row">
                                                <div class="col-sm-4"><div class="detail-header">1234</div></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4"><div class="detail-header">1234</div></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4"><div class="detail-header">1234</div></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4"><div class="detail-header">1234</div></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4"><div class="detail-header">1234</div></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4"><div class="detail-header">1234</div></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4"><div class="detail-header">1234</div></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4"><div class="detail-header">1234</div></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4"><div class="detail-header">1234</div></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4"><div class="detail-header">1234</div></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4"><div class="detail-header">1234</div></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4"><div class="detail-header">1234</div></div>
                                            </div>
                                        </div>

                                      </div>

                                        <div class="row row-details">
                                           <div class="col col-3 detail-header text-uppercase">Mark As: </div>
                                            <button type="button" class="btn btn-warning text-uppercase pr-2" data-dismiss="modal" data-toggle="modal" data-target="#forRepair">For Repair</button>
                                             <button type="button" class="btn btn-info text-uppercase" data-dismiss="modal" data-toggle="modal" data-target="#forReturn">For Return</button>
                                            <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal" data-toggle="modal" data-target="#decommissionedModal">Decommissioned</button>
                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary text-uppercase">Save Changes</button>
                                        <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                    </div>


                    <div class="modal fade" id="decommissionedModal" tabindex="-1" role="dialog" aria-labelledby="decommissionedModalTitle"
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
                                          <p>Are you sure you want to change the status of this item to Decommissioned?</p>
                                      </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary text-uppercase">Save Changes</button>
                                        <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="modal fade" id="forReturn" tabindex="-1" role="dialog" aria-labelledby="returnModalTitle"
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
                                          <p>Are you sure you want to change the status of this item to "For Return"?</p>
                                      </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary text-uppercase">Save Changes</button>
                                        <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                    </div>


                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">

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
                                          <p>Are you sure you want to Delete this item?</p>
                                      </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary text-uppercase">Delete</button>
                                        <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                    </div>


<!-- Issue modal -->
<div class="modal fade bd-example-modal-lg" id="singleIssue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="ModalTitle">Issue Item</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
              </button>
          </div>
      <div class="modal-body">
          <form action="{!! url('/issuanceSystemUnit'); !!}" enctype="multipart/form-data" onsubmit="DoSubmit()" method="post"  role="form">
              <table>
                  <div class="row">
                      <tr>
                          <div class="col-md-8">
                              <td><p class="card-title">Issue Item:</p></td>
                          </div>
                          <div class="col-md-4">
                              <td><p class="card-title">Issued Until:</p></td>
                          </div>
                      </tr>

                      <tr>
                          <td>
                            <div class="col-md-4" style="padding: 25px 15px;">
                                <input  list="items" name="items" id="equipment" onblur="CheckListed(this.value);" required style=" text-indent: 50px;">
                                <datalist id="items">
                                    <select>
                                        <option data-customvalue="" value=""></option>
                                        <option data-customvalue="" value="">System Unit</option>
                                    </select>
                                </datalist>
                            </div>
                          </td>

                          <td>
                              <div class="col-md-10" style="padding: 30px 15px;">
                                  <div class="input-group mb-3">
                                      <input  name="issued_until" type="date" class="form-control" required>
                                  </div>
                              </div>
                          </td>
                      </tr>
                  </div>
              </table>


              <table id="addMoreList">
                  <tbody>
                  </tbody>
              </table>

              <br>
              <div class="row">
                  <div class="col-md-4">
                      <button id="addMore" type="button" class="btn btn-warning btn-xs" onclick='add()'> <span class="fas fa-plus"></span>ADD MORE</button>
                  </div>
              </div>

              <br>
              <div class="row">
                  <div class="col-md-5">
                      <p class="card-title">Issue to:</p>
                      <input list="employee" name="issued_to" id="issued_to" onblur="CheckListedEmployee(this.value)" required>
                      <datalist id="employee">
                          <option data-customvalue="" value="">
                          </option>
                      </datalist>
                  </div>
              </div>
              <br>
              <div class="row">
                  <div class="col">
                      <label for="details">Remarks:</label>
                      <div class="input-group mb-1">
                          <textarea maxlength="50" rows="4" cols="50" name="remarks" class="form-control" aria-label="With textarea" style="border-style: solid; border-width: 1px;"></textarea>
                      </div>
                  </div>
              </div>
        </form>
      </div>
      <div class="modal-footer text-uppercase">
          <button class="btn btn-info">Add</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
</div>
</div>



    <!--Build From Parts Modal-->

        <div class="p-2">
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="build">

        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div id="buildFromPartsHeader" class="modal-header">
                    <h5 class="modal-title" id="ModalTitle"><i class="fas fa-wrench"></i>&nbsp;Build From Available Parts</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body">
                <div class="container" style="padding:5rem">


                <form action="{!! url('/buildUnit'); !!}" method="post">
                      {!! csrf_field() !!}

                  <p class="card-title text-dark">Name:</p>
                    <div class="input-group">
                        <input name="name" type="text" class="form-control" required>
                    </div>
                    <div class="row">
                      @foreach ($subtypes as $subtypes)
                    <div class="col col-6 mb-2">
                      <p class="card-title">{{$subtypes->name}}: </p>
                      <select name="items[]" class="custom-select">
                        @foreach ($parts as $part)
                        @if ($part->subtype_id==$subtypes->id)
                        <option value="{{ $part->id}} ">{{ $part->model}} {{ $part->brand}} S/N:{{ $part->serial_no}}</option>
                        @endif
                        @endforeach
                      </select>
                    </div>
                @endforeach
                    </div>
                    </form>

                </div>
              </div>


        <div class="modal-footer">

            <button type="submit" class="btn btn-success"><span class="fas fa-wrench"></span> BUILD</button>
            <button id="cancel" type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
        </div>



    </div>
    </div>
    </div>

   <!-- Single Add Modal -->

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="singleAdd">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalTitle">Single Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Add Equipment Form -->
                <div class="modal-body">
                    <form action="{!! url('/addEquipment'); !!}" enctype="multipart/form-data" method="post" role="form" id="singleAddForm">
                    {!! csrf_field() !!}
                    <div class="row pb-2">
                        <div class="col">
                        <p class="card-title text-dark">Equipment Subtype:</p>
                        <select name="subtype_id" class="custom-select">
                        @foreach ($equipment_subtypes as $equipment_subtype)
                            <option  value="{!! $equipment_subtype->id !!}">
                                {{ $equipment_subtype->name }}
                            </option>
                        @endforeach
                        </select>
                        </div>
                    </div>

                    <!-- Model & Brand -->
                    <div class="row">
                        <div class="col-5">
                            <p class="card-title text-dark">Model:</p>
                            <div class="input-group">
                                <input name="model" type="text" size="30">
                            </div>
                        </div>
                        <div class="col-4">
                            <p class="card-title text-dark">Brand:</p>
                            <div class="input-group">
                                <input name="brand" type="text" size="30">
                            </div>
                        </div>
                    </div>

                    <!-- Details -->
                    <div class="row">
                        <div class="col-9">
                            <label for="details" class="card-title text-dark">Details:</label>
                            <div class="input-group">
                                <textarea name="details" rows="3" id="details"></textarea>
                            </div>
                        </div>
                    </div>

                    <br>
                    <!-- Warranty -->
                    <div class="row pb-2">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <label for="details" class="card-title text-dark">Warranty Start:</label>
                                    <input type="date" id="start" name="warranty_start">
                                </div>

                                <div class="col">
                                    <label for="details" class="card-title text-dark">Warranty End:</label>
                                    <input type="date" id="start" name="warranty_end">
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>

                    <!-- Serial and IMEI/MAC -->
                    <div class="row">
                        <div class="col-6">
                            <label for="serial_no" class="card-title text-dark">Serial Number:</label>
                            <div class="input-group mb-1">
                                <input name="serial_no" type="text" size="30" >
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="serial_no" class="card-title text-dark">IMEI/MAC address:</label>
                            <div class="input-group mb-1">
                                <input name="imei_or_macaddress" type="text" size="30">
                            </div>
                        </div>
                    </div>

                    <!-- OR & Supplier -->
                    <div class="row">
                        <div class="col-6">
                            <p class="card-title text-dark">Official Receipt Numbers:</p>
                            <div class="input-group mb-1">
                                <input name="or_no" type="text" size="30">
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="serial_no" class="card-title text-dark">Supplier:</label>
                            <div class="input-group mb-1">
                                <input name="supplier" type="text" size="30">
                            </div>
                        </div>
                    </div>

                    <!-- System Unit & Status -->
                    <div class="row">
                        <div class="col-6">
                            <p class="card-title text-dark">System Unit Assigned To:</p>
                            <select name="unit_id" class="custom-select">
                                <option value="NULL">Not Assigned</option>
                                @foreach ($computers as $unit)
                                <option value="{!! $unit->id !!}">
                                    {{ $unit->name }}-{{ $unit->id }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-6">
                            <p class="card-title text-dark">Status:</p>
                            <select class="custom-select" name="status_id" >
                                <option value="1">Available</option>
                                <option value="4">For return</option>
                                <option value="6">Pending</option>
                                <option value="8">In-use</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="modal-footer text-uppercase">
                    <button type="submit" class="btn btn-primary text-uppercase">ADD</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
                    </form>
            </div>
        </div>
    </div>

    </div>
    </div>
    </div>





    <!-- Add System Unit Modal-->

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="systemUnit">
        <div class="modal-dialog modal-xxl">
            <div class="modal-content">

                <div id="addSystemUnit" class="modal-header">
                    <h5 class="modal-title" id="ModalTitle"><i class="fas fa-plus-square"></i>&nbsp;Add System Unit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body">
                    <form id="addSystemUnitForm" action="{!! url('/addSystemUnit'); !!}" enctype="multipart/form-data" method="post" role="form">
                        {!! csrf_field() !!}

                        <div class="row">
                            <div class="col-sm">

                                <table class="table table-borderless table-striped table-hover table-responsive table-condensed" style="width:100%; ">
                                    <thead>
                                        <tr>
                                            <th>PC Description</th>
                                            <th>Supplier</th>
                                            <th>OR No.</th>
                                            <th>Warranty</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td> <input type="text" name="unit[mac_address]"></td>
                                            <td>
                                                <input type="text" name="unit[supplier]"><br>

                                            </td>
                                            <td> <input type="text" name="unit[or_no]"></td>
                                            <td>
                                                <label for="start">Start date:</label>
                                                <input type="date" id="start" name="unit[warranty_start]">
                                                <br>
                                                <label for="start">End date:</label>
                                                <input type="date" id="start" name="unit[warranty_end]">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                            <div class="col-sm">
                                <table class="table table-borderless table-striped table-hover table-responsive" style="width:100%">
                                    <thead class="">
                                        <tr>
                                            <th>Component</th>
                                            <th>Brand</th>
                                            <th>Model</th>
                                            <th>Serial no.</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>Motherboard <input type="text" name="equipment[subtype_id][]" value="1" hidden></td>
                                            <td> <input type="text" name="equipment[brand][]" required></td>
                                            <td> <input type="text" name="equipment[model][]" required></td>
                                            <td> <input type="text" name="equipment[serial_no][]" required></td>
                                            <td><textarea name="equipment[details][]" rows="2" cols="22"></textarea></td>
                                        </tr>


                                        <tr>
                                            <td>CPU<input type="text" name="equipment[subtype_id][]" value="2" hidden></td>
                                            <td> <input type="text" name="equipment[brand][]" required></td>
                                            <td> <input type="text" name="equipment[model][]" required></td>
                                            <td> <input type="text" name="equipment[serial_no][]" required></td>
                                            <td><textarea name="equipment[details][]" rows="2" cols="22"></textarea></td>
                                        </tr>

                                        <tr>
                                            <td>Storage<input type="text" name="equipment[subtype_id][]" value="3" hidden></td>
                                            <td> <input type="text" name="equipment[brand][]" required></td>
                                            <td> <input type="text" name="equipment[model][]" required></td>
                                            <td> <input type="text" name="equipment[serial_no][]" required></td>

                                            <td><textarea name="equipment[details][]" rows="2" cols="22"></textarea></td>

                                        <tr>
                                            <td>RAM<input type="text" name="equipment[subtype_id][]" value="4" hidden></td>
                                            <td> <input type="text" name="equipment[brand][]" required></td>
                                            <td> <input type="text" name="equipment[model][]" required></td>
                                            <td> <input type="text" name="equipment[serial_no][]" required></td>
                                            <td><textarea name="equipment[details][]" rows="2" cols="22"></textarea></td>
                                        </tr>

                                        <tr>
                                            <td>GPU<input type="text" name="equipment[subtype_id][]" value="5" hidden></td>
                                            <td> <input type="text" name="equipment[brand][]" required></td>
                                            <td> <input type="text" name="equipment[model][]" required></td>
                                            <td> <input type="text" name="equipment[serial_no][]" required> </td>
                                            <td><textarea name="equipment[details][]" rows="2" cols="22"></textarea></td>
                                        </tr>

                                        <tr>
                                            <td>Case<input type="text" name="equipment[subtype_id][]" value="7" hidden></td>
                                            <td> <input type="text" name="equipment[brand][]" required></td>
                                            <td> <input type="text" name="equipment[model][]" required></td>
                                            <td> <input type="text" name="equipment[serial_no][]" required></td>
                                            <td><textarea name="equipment[details][]" rows="2" cols="22"></textarea></td>
                                        </tr>

                                        <tr>
                                            <td>Heat Sink Fan<input type="text" name="equipment[subtype_id][]" value="8" hidden></td>
                                            <td> <input type="text" name="equipment[brand][]"></td>
                                            <td> <input type="text" name="equipment[model][]"></td>
                                            <td> <input type="text" name="equipment[serial_no][]"> </td>
                                            <td><textarea name="equipment[details][]" rows="2" cols="22"></textarea></td>


                                        </tr>

                                        <tr>
                                            <td>Sound Card<input type="text" name="equipment[subtype_id][]" value="18" hidden></td>
                                            <td> <input type="text" name="equipment[brand][]"></td>
                                            <td> <input type="text" name="equipment[model][]"></td>
                                            <td> <input type="text" name="equipment[serial_no][]" ></td>
                                            <td><textarea name="equipment[details][]" rows="2" cols="22"></textarea></td>
                                        </tr>
                                    </tbody>
                                  </table>
                               </div>
                              </div>

                            </form>
                            </div>

                        <div class="modal-footer">
                            <button id="save" class="btn btn-success" type="submit"> <span class="fas fa-plus-square"></span>&nbsp;Add System Unit</button>
                            <button id="cancel" type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                        </div>



            </div>
        </div>
    </div>

                <!-- Soft Delete-->
    <div class="modal fade bd-example-modal-sm" id="softDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalTitle">Soft Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Add system unit Form -->
                <div class="modal-body">
                  <form action="{!! url('/softDeleteEquipment'); !!}" enctype="multipart/form-data" onsubmit="DoSubmit()"  method="post" role="form">
                      {!! csrf_field() !!}
                      <div class="row">
                        <div class="col-md-5">
                            <p class="card-title">Delete Item:</p>
                            <input  list="items" name="items" id="equipment" onblur="CheckListed(this.value);" required>
                              <datalist id="items">
                                <select>
                                @foreach ($equipments as $equipment)
                                <option data-customvalue="Mobile Device-{{ $equipment->id}}" value="{{ $equipment->model}} {{ $equipment->brand}}">{{ $equipment->subtype_name}}</option>
                                @endforeach
                                @foreach ($systemunits as $systemunits)
                                <option data-customvalue="System Unit-{{ $systemunits->id}}" value="{{ $systemunits->description}}-{{ $systemunits->id}}">System Unit</option>
                                @endforeach
                              </select>
                              </datalist>

                        </div>
                      </div>

                  <!-- <button type="button" class="btn btn-info" type="submit" id="addEquipment"> <span class="fas fa-plus"></span>Add Item</button> -->
                  </div>

                  <div class="modal-footer text-uppercase">
                  <button class="btn btn-info" type="submit" id= "deleteEquipment">Delete</button>

                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

                  </div>
                  </form>
</div>
</div>
</div>

<!-- Hard Delete-->
<div class="modal fade bd-example-modal-sm" id="hardDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalTitle">Hard Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Add system unit Form -->
            <div class="modal-body">
              <form action="{!! url('/hardDeleteEquipment'); !!}" enctype="multipart/form-data" onsubmit="DoSubmit()"  method="post" role="form">
                  {!! csrf_field() !!}
                  <div class="row">
                    <div class="col-md-5">
                        <p class="card-title">Delete Item:</p>
                        <input  list="item" name="item" id="hequipment" onblur="CheckListed(this.value);" required>
                          <datalist id="item">
                            <select>
                            @foreach ($equipments as $equipment)
                            <option data-customvalue="Mobile Device-{{ $equipment->id}}" value="{{ $equipment->model}} {{ $equipment->brand}}">{{ $equipment->subtype_name}}</option>
                            @endforeach
                            @foreach ($units_system as $units_system)
                            <option data-customvalue="System Unit-{{ $units_system->id}}" value="{{ $units_system->description}}-{{ $units_system->id}}">System Unit</option>
                            @endforeach
                          </select>
                          </datalist>

                    </div>
                  </div>

              <!-- <button type="button" class="btn btn-info" type="submit" id="addEquipment"> <span class="fas fa-plus"></span>Add Item</button> -->
              </div>

              <div class="modal-footer text-uppercase">
              <button class="btn btn-info" type="submit" id= "deleteEquipment">Delete</button>

              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

              </div>
              </form>
</div>
</div>
</div>




                            <div class="row">

                                <div class="container-fluid">

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
         $(document).ready(function() {
            $('#myDataTablePD').DataTable({
                "pagingType": "full_numbers",
                responsive: true,
                "order": []
            });
        });
         $(document).ready(function() {
            $('#myDataTableFD').DataTable({
                "pagingType": "full_numbers",
                responsive: true,
                "order": []
            });
        });
        $(document).ready(function() {
            $('#myDataTableHR').DataTable({
                "pagingType": "full_numbers",
                responsive: true,
                "order": []
            });
        });
        $(document).ready(function() {
            $('#myDataTableND').DataTable({
                "pagingType": "full_numbers",
                responsive: true,
                "order": []
            });
        });


    </script>

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

                                 <script>
      function CheckListed( txtSearch  ) {
       var objList = document.getElementById("items")  ;
       for (var i = 0; i < objList.options.length; i++) {
        if ( objList.options[i].value.trim().toUpperCase() == txtSearch.trim().toUpperCase() ) {
           return true }
        }
        if(txtSearch==""){
          return true
        }
          alert( 'Input data is not available.') ;
          document.getElementById("equipment").value="";
          return false ; // text does not matched ;
      }
    </script>

    <script>
        function rm() {
            $(event.target).closest("tr").remove();
        }

        function add() {
            $('#addMoreList > tbody:last-child').append("<tr><div class=\"row\"><td><div class=\"col-md-2\"><input list=\"items\" name=\"items\" id=\"inputItems\"></div></td><td><div class=\"col-xl-10\"><input name=\"issued_until\" type=\"date\" class=\"form-control\"></div></td><td><div class=\"col-sm-0\"><button onclick='rm()'>remove</button></td></div></div></tr><br><div class=\"row\"></div>");
        }
    </script>



    @stop
