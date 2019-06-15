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
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}"> @stop @section('title') System Unit @stop @section('../layout/breadcrumbs') @section('breadcrumbs-title')
    <i class="fas fa-chart-line">Inventory
    @stop
@stop

@section('content')
<div class="container-fluid">
<nav class="navbar navbar-light">
        <span class="navbar-brand mb-0 h1">INVENTORY</span>
@include('content.toolbar')
@include('content.breadcrumb_inventory')
</nav>

                        <hr>



<!--Information Technology Development Department Datatable-->
                                     <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" onclick="makeAvailableSystemUnit({!! $unit->su_id !!} , 7)"><i class="fas fa-trash-alt"></i> Decommissioned</button>
           <!--No Department Table-->
           @foreach ($departments as $dept)
           <h5 class="font-weight-bold">{{$dept->name}}</h5>
           <table id="myDataTable{{$dept->id}}" class="table table-borderless table-hover" style="width:100%;cursor:pointer;">
                     <thead class="thead-dark">
                          <tr>
                             <th>ID</th>
                             <th>Label</th>
                             <th>Status</th>
                             <th>Issued To</th>
                             <th>Mark As</th>

                  <div class="warning-content">
                                            data-target="#remarksRepair" aria-expanded="false" aria-controls="collapseExample" type="button">
            <div class="modal-content" style="height:450px;">
                         </tr>
                     </thead>
                     <tbody>
                      @foreach ($pc[$dept->id] as $unit)
                           @if($unit->status_id == 3)
                           <tr class="table-secondary">
                           @else
                           <tr>
                           @endif
                             <td data-toggle="modal" data-target="#pc{{$unit->su_id}}" >{{$unit->su_id}}</td>
                             <td data-toggle="modal" data-target="#pc{{$unit->su_id}}" >{{$unit->name}}-{{$unit->su_id}}</td>
                             <td data-toggle="modal" data-target="#pc{{$unit->su_id}}" >{{$unit->status_name}}</td>
                             <td data-toggle="modal" data-target="#pc{{$unit->su_id}}" >@if($unit->status_name=="Issued") {{$unit->fname}} {{$unit->lname}} @endif</td>
                             <td>
                                 @if($unit->status_id == 1)
                                     <button type="button" class="btn btn-warning rounded btn-sm" data-toggle="modal"  data-target="#makeAvailableModal" onclick="makeAvailableSystemUnit({!! $unit->su_id !!} , 3)"><i class="fas fa-tools"></i> For Repair</button>
                                     <button type="button" class="btn btn-primary rounded btn-sm" data-toggle="modal"  data-target="#makeAvailableModal" onclick="makeAvailableSystemUnit({!! $unit->su_id !!} , 4)"><i class="fas fa-undo-alt"></i> For Return</button>
                                     <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" onclick="makeAvailableSystemUnit({!! $unit->su_id !!} , 7)"><i class="fas fa-trash-alt"></i> Decommissioned</button>
                                     <button type="button" class="btn btn-info rounded btn-sm" data-toggle="modal" data-target="#issue-modal" onclick="makeAvailableSystemUnit({!! $unit->su_id !!} , 2)"><i class="fas fa-hand-holding"></i> Issue</button>
                                 @elseif($unit->status_id == 2)
                                     <button type="button" class="btn btn-success rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" onclick="makeAvailableSystemUnit({!! $unit->su_id !!} , 1.2)"><i class="fas fa-check"></i> Make Available</button>
                                     <button type="button" class="btn btn-warning rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" onclick="makeAvailableSystemUnit({!! $unit->su_id !!} , 3)"><i class="fas fa-tools"></i> For Repair</button>
                                     <button type="button" class="btn btn-primary rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" onclick="makeAvailableSystemUnit({!! $unit->su_id !!} , 4)"><i class="fas fa-undo-alt"></i> For Return</button>
                                     <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" onclick="makeAvailableSystemUnit({!! $unit->su_id !!} , 7)"><i class="fas fa-trash-alt"></i> Decommissioned</button>
                                 @elseif($unit->status_id == 3)
                                     <button type="button" class="btn btn-success rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" onclick="makeAvailableSystemUnit({!! $unit->su_id !!} , 1)" ><i class="fas fa-check"></i> Make Available</button>
                                     <button type="button" class="btn btn-primary rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" onclick="makeAvailableSystemUnit({!! $unit->su_id !!} , 4)"><i class="fas fa-undo-alt"></i> For Return</button>
                                     <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" onclick="makeAvailableSystemUnit({!! $unit->su_id !!} , 4)"><i class="fas fa-trash-alt"></i> Decommissioned</button>
                                 @elseif($unit->status_id == 4)
                                     <button type="button" class="btn btn-success rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" onclick="makeAvailableSystemUnit({!! $unit->su_id !!} , 1)" ><i class="fas fa-check"></i> Make Available</button>
                                     <button type="button" class="btn btn-warning rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" onclick="makeAvailableSystemUnit({!! $unit->su_id !!} , 3)"><i class="fas fa-tools"></i> For Repair</button>
                                     <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" onclick="makeAvailableSystemUnit({!! $unit->su_id !!} , 7)"><i class="fas fa-trash-alt"></i> Decommissioned</button>
                                 @endif
                             </td>
                          </tr>
                      @endforeach
                     </tbody>
                            <option value="1">Information Technology Development Department</option>
             </table>
               <br>
          @endforeach
                                                  </tr>
                                      </div>
                     <!--No Department Table-->
                     <h5 class="font-weight-bold">No Department</h5>
                     <table id="myDataTableND" class="table table-borderless table-hover" style="width:100%;cursor:pointer;">
                               <thead class="thead-dark">
                                    <tr>
                                       <th>ID</th>
                                       <th>Label</th>
                                       <th>Status</th>
                                       <th>Issued To</th>
                                       <th>Mark As</th>


                            </div>

                                   </tr>
                               </thead>
                               <tbody>
                                @foreach ($no_dept as $unit)
                                     @if($unit->status_id == 3)
                                     <tr class="table-secondary">
                                     @else
                                     <tr>
                                     @endif
                                       <td data-toggle="modal" data-target="#pc{{$unit->su_id}}" >{{$unit->su_id}}</td>
                                       <td data-toggle="modal" data-target="#pc{{$unit->su_id}}" >{{$unit->name}}-{{$unit->su_id}}</td>
                                       <td data-toggle="modal" data-target="#pc{{$unit->su_id}}" >{{$unit->status_name}}</td>
                                       <td data-toggle="modal" data-target="#pc{{$unit->su_id}}" >@if($unit->status_name=="Issued") {{$unit->fname}} {{$unit->lname}} @endif</td>
                                       <td>
                                           @if($unit->status_id == 1)
                                               <button type="button" class="btn btn-warning rounded btn-sm" data-toggle="modal"  data-target="#makeAvailableModal" onclick="makeAvailableSystemUnit({!! $unit->su_id !!} , 3)"><i class="fas fa-tools"></i> For Repair</button>
                                               <button type="button" class="btn btn-primary rounded btn-sm" data-toggle="modal"  data-target="#makeAvailableModal" onclick="makeAvailableSystemUnit({!! $unit->su_id !!} , 4)"><i class="fas fa-undo-alt"></i> For Return</button>
                                               <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" onclick="makeAvailableSystemUnit({!! $unit->su_id !!} , 7)"><i class="fas fa-trash-alt"></i> Decommissioned</button>
                                               <button type="button" class="btn btn-info rounded btn-sm" data-toggle="modal" data-target="#issue-modal" onclick="makeAvailableSystemUnit({!! $unit->su_id !!} , 2)"><i class="fas fa-hand-holding"></i> Issue</button>
                                           @elseif($unit->status_id == 2)
                                               <button type="button" class="btn btn-success rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" onclick="makeAvailableSystemUnit({!! $unit->su_id !!} , 1)"><i class="fas fa-check"></i> Make Available</button>
                                               <button type="button" class="btn btn-warning rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" onclick="makeAvailableSystemUnit({!! $unit->su_id !!} , 3)"><i class="fas fa-tools"></i> For Repair</button>
                                               <button type="button" class="btn btn-primary rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" onclick="makeAvailableSystemUnit({!! $unit->su_id !!} , 4)"><i class="fas fa-undo-alt"></i> For Return</button>
                                               <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" onclick="makeAvailableSystemUnit({!! $unit->su_id !!} , 7)"><i class="fas fa-trash-alt"></i> Decommissioned</button>
                                           @elseif($unit->status_id == 3)
                                               <button type="button" class="btn btn-success rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" onclick="makeAvailableSystemUnit({!! $unit->su_id !!} , 1)" ><i class="fas fa-check"></i> Make Available</button>
                                               <button type="button" class="btn btn-primary rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" onclick="makeAvailableSystemUnit({!! $unit->su_id !!} , 4)"><i class="fas fa-undo-alt"></i> For Return</button>
                                               <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" onclick="makeAvailableSystemUnit({!! $unit->su_id !!} , 4)"><i class="fas fa-trash-alt"></i> Decommissioned</button>
                                           @elseif($unit->status_id == 4)
                                               <button type="button" class="btn btn-success rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" onclick="makeAvailableSystemUnit({!! $unit->su_id !!} , 1)" ><i class="fas fa-check"></i> Make Available</button>
                                               <button type="button" class="btn btn-warning rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" onclick="makeAvailableSystemUnit({!! $unit->su_id !!} , 3)"><i class="fas fa-tools"></i> For Repair</button>
                                               <button type="button" class="btn btn-secondary rounded btn-sm" data-toggle="modal" data-target="#makeAvailableModal" onclick="makeAvailableSystemUnit({!! $unit->su_id !!} , 7)"><i class="fas fa-trash-alt"></i> Decommissioned</button>
                                           @endif
                                       </td>
                                    </tr>
                                @endforeach
                               </tbody>
                                          <p>Warning!</p>
                       </table>
                         <br>


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
              <h5 class="modal-title" id="ModalTitle">Issue System Unit</h5>
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

                <div class="modal fade" id="pc{{$unit->id}}" tabindex="-1" role="dialog" aria-labelledby="decommissionedModalTitle"
                                    <input type="date" id="start" name="warranty_end">
                                    <input type="date" id="start" name="warranty_end">
                                </div>
                                <div class="modal-content" >
                    </div>
                    </div>

                    <br>

                    <!-- Serial and IMEI/MAC -->
                    <div class="row">
                                        {!! csrf_field() !!}
                            <label for="serial_no" class="card-title text-dark">Serial Number:</label>
                            <label for="serial_no" class="card-title text-dark">Serial Number:</label>
                            <div class="input-group mb-1">
                                          <input name="name" value=" {{$unit->name}}" hidden>
                                          <input name="dept_id" value=" {{$unit->dept_id}}" hidden>
                                          <input name="department" value=" {{$unit->department}}" hidden>
                                          <div class="col-sm-6"><div class="" >ID: <span class="" style="font-weight: normal;">{{$unit->id}}</span></div></div>
                                <input name="serial_no" type="text" size="30" >
                                <input name="serial_no" type="text" size="30" >
                        </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-1">
                                <input name="imei_or_macaddress" type="text" size="30">
                                <input name="imei_or_macaddress" type="text" size="30">
                            </div>
                    </div>
                    </div>
                    <!-- OR & Supplier -->
                    <!-- OR & Supplier -->
                        <div class="col-6">
                            <div class="input-group mb-1">
                            <div class="input-group mb-1">
                                <input name="or_no" type="text" size="30">
                        </div>
                        </div>
                            <div class="input-group mb-1">
                            <div class="input-group mb-1">
                                      @if($unit->status=="Issued")
                            </div>
                            </div>
                            <p class="card-title text-dark">System Unit Assigned To:</p>
                            <p class="card-title text-dark">System Unit Assigned To:</p>
                                      <br>
                                <option value="NULL">Not Assigned</option>
                                <option value="NULL">Not Assigned</option>
                                    </div>
                            </select>
                            </select>
                        </div>
                                        <table id="componentTable{{$unit->id}}" class="table table-hover" style="width:100%">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Component</th>
                                                    <th>Label</th>
                                                    <th>Serial Number</th>
                            <p class="card-title text-dark">Status:</p>
                            <p class="card-title text-dark">Status:</p>
                                            </thead>
                                <option value="6">Pending</option>
                                <option value="6">Pending</option>
                                                @foreach($pc_parts as $part)
                                                @if($unit->id==$part->unit_id)
                                                  <tr>
                                                    <td style="font-weight: normal;">{{$part->subtype_name}}</td>
                                                    <td style="font-weight: normal;">{{$part->brand}}-{{$part->model}}</td>
                                                    <td style="font-weight: normal;">{{$part->serial_no}}</td>
                                <option value="8">In-use</option>
                                <option value="8">In-use</option>
                                                  </tr>
                                                @endif
                                                @endforeach
                                              </tbody>
                                          </table>
                                        </div>
                                      </div>
                <!-- Add system unit Form -->
                <!-- Add system unit Form -->
        <div class="modal-content">
                                    <div class="modal-footer" role="document">
                                        <button type="submit" class="btn btn-primary text-uppercase">Edit PC</button>
                                        <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal">Close</button>
                                    </div>
                                    </form>
                                </div>
    </div>
    </div>
            <div class="modal-content">
                    <div class="container">
                    <div class="container">
                <form action="{!! url('/issueEquipment'); !!}" method="post">
                {!! csrf_field() !!}
                {!! csrf_field() !!}
                <div class="modal-body">
                    <div class="container-fluid" id="issueToModalBody">
                        <!-- Issue To  -->
                        <div class="row">
                            <input type="hidden" name="su.id" id="eq_id">
                            <div class="col col-2 detail-header text-uppercase">Issue To</div>
                            <select id="departmentDropdown" class="custom-select">
                                <option value="">Any Department</option>
                                @foreach($departments as $department)
                                <option value="">{{$department->name}}</option>
                                @endforeach
                            </select>
                            <select name="issued_to" id="employeeDropdown" class="custom-select" placeholder="--Select Employee--">
                                @foreach($active_employees as $employee)
                                <option value="{!! $employee->id !!}">ID:{{$employee->id}} | {{$employee->fname}} {{$employee->lname}}</option>
                                @endforeach
                            </select>

                        </div>

                        <hr>
                        <div class="row row-details">
                            <div class="col col-4 detail-header text-uppercase">Issue Until</div>
                            <input type="date" class="form-control" name="issued_until" id="issued_until" >
                            <br>
                        </div>

                        <hr>
                        <div class="row row-details">
                            <div class="col col-4 detail-header text-uppercase">Remarks</div>
                            <textarea rows="4" cols="50" name="remarks" id="remarks"></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary text-uppercase">Issue Item</button>
                </form>
                    <button type="button" class="btn btn-danger text-uppercase" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>



<!-- Empty Modal Prompt -->
    <div class="modal fade" id="makeAvailableModal" tabindex="-1" role="dialog"
    aria-hidden="true">
        <form action="{!! url('/add-to-concerns-system-unit') !!}" method="post">
        {!! csrf_field() !!}
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="height:450px;">
                <div class="modal-header" id="makeAvailableHeader">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="emptyContent()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="warning-content"  id="makeAvailableContent">

                    </div>
                </div>


            <div class="modal-footer" id="makeAvailableFooter">

                </div>
            </div>
        </div>
        </form>
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
    $(document).ready(function() {
        $('#inventory').addClass('active');
    });
    });

    function emptyContent(){
        $('#makeAvailableContent').empty()
        $('#makeAvailableFooter').empty()
    }

    function makeAvailableSystemUnit(sys_id , new_status_id){
        emptyContent();
        var unit_id = sys_id;
        console.log("System" + sys_id);
        if(new_status_id == 1){
            var new_status_name = "Available";
        }else if (new_status_id == 7){
            var new_status_name = "Decommissioned";
        }else if (new_status_id == 3){
            var new_status_name = "For repair";
        }else if (new_status_id == 4){
            var new_status_name = "For return";
        }else if (new_status_id == 1.2){
            var new_status_name = "Available";
        }

        $.ajax({
            url: 'getUnitForRepair/' + unit_id,
            type: 'get',
            dataType: 'json',
            success: function (response){
                len = response['unit'].length;
                if(len > 0){
                    for(var i = 0; i < len; i++){
                        var orig_status_name = response['unit'][i].status_name;
                        // var orig_status_id = response['unit'][i].status_id;
                        var dept = response['unit'][i].dept_name;
                        var name = response['unit'][i].name;
                    }


                    if(new_status_id != 2){
                        var unitContentStr =
                        '<p>Are you sure you want to change the status of ' + name + unit_id +
                        ' from "' + orig_status_name + '" to "' + new_status_name +'" ?</p>' +
                        '</div>' + '<div class="btn-group" role="group">' +
                        '<button class="btn btn-warning text-uppercase" data-toggle="collapse" data-target="#remarks" aria-expanded="false" aria-controls="collapseExample" type="button">' +
                        'Add Remarks' + '</button>' + '<div class="collapse" id="remarks">' +
                        '<textarea class="form-control" name="remarks" placeholder="Place remarks"></textarea>' + '</div></div>';

                        $('#makeAvailableContent').append(unitContentStr);

                        var unitFooterStr =
                        '<input type="hidden" name="id" value="' + unit_id + '" >' +
                        '<input type="hidden" name="status_id" value="' + new_status_id + '" >' +
                        '<button type="submit" class="btn btn-success text-uppercase">Yes</button>' +
                        '<button type="button" class="btn btn-info text-uppercase" data-toggle="modal" data-target="#viewItemModal">View Item Modal</button>' +
                        '<button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal" onclick="emptyContent()">Cancel</button>'

                        ;

                        $('#makeAvailableFooter').append(unitFooterStr);
                    }else{
                        $('#eq_id').val(sys_id);
                    }
                }
            }

        })
    }

</script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('input').attr('autocomplete', 'off');
        });

    </script>
    <script>
    @foreach($depts as $dept)
        $(document).ready(function() {
            $('#myDataTable{{$dept->id}}').DataTable({
                "pagingType": "full_numbers",
                responsive: true,
                "order": []
            });
        });
      @endforeach
        $(document).ready(function() {
            $('#myDataTableND').DataTable({
                "pagingType": "full_numbers",
                responsive: true,
                "order": []
            });
        });
      @foreach($units as $unit)
        $(document).ready(function() {
            $('#componentTable{{$unit->id}}').DataTable({
              "paging":   false,
              "info":   false,
              "sort": false,
              "bFilter": false
            });
        });
      @endforeach


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
