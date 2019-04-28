<?php
  use Carbon\Carbon;
  $session=Session::get('loggedIn');
  $user_id = $session['id'];
  $fname = $session['fname'];
  $lname = $session['lname'];
  // $img_path = $session['img_path'];
?>

@extends('../template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/awesome-bootstrap-checkbox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
@stop

@section('title')
    Generate Report
@stop

@section('../layout/breadcrumbs')
    @section('breadcrumbs-title')
    <i class="fas fa-chart-line">Inventory
    @stop
@stop


@section('content')
<div class="container">
    <!-- Page Content -->
   <div class="container p-lg-3 p-md-1 p-sm-0">
                      <div class="container row build">
                        <div class="col col-lg-9 col-sm-12 col-xs-12 col-md-6" style="overflow:hidden;">
                          <label class="label-date">Category</label>
                          <select class="selectpicker input-date2" id="category-select2" onchange="ShowLocalDate()">
                            <option id="initial-category-value"></option>
                            <option selected="selected" value="Inventory Concerns">Inventory Concerns</option>
                            <option value="Inventory Operations">Inventory Operations</option>
                            <option value="Inventory Equipment Type">Inventory Equipment Type</option>
                            <option value="Inventory Equipment Status">Inventory Equipment Status</option>
                            <option value="Office Equipment">Office Equipment</option>
                            <option value="Issuance">Issuance</option>
                          </select>
                          <select class="selectpicker input-date2" id="category-select5" data-container="body">
                            <option disabled selected hidden>Status Type</option>
                            <option value="All">All</option>
                            <option value="For Repair">For Repair</option>
                            <option value="To Be Returned">To be Returned</option>
                            <option value="Decommissioned">Decommissioned</option>
                            <option value="Pending">Pending</option>
                          </select>
                          <select class="selectpicker input-date2 collapse" id="category-select6" data-container="body">
                            <option disabled selected hidden>Type of Operations</option>
                            <option value="All2">All</option>
                            <option value="Items Added">Items Added</option>
                            <option value="Items Edited">Items Edited</option>
                            <option value="Items Deleted">Items Deleted</option>
                          </select>
                          <select class="selectpicker input-date2 collapse" id="category-select7" data-container="body">
                            <option disabled selected hidden>Type</option>
                            <option value="All3">All</option>
                            <option value="Computer Components">Computer Components</option>
                            <option value="Computer Peripherals">Computer peripherals</option>
                            <option value="Mobile Devices">Mobile Devices</option>
                          </select>
                          <select class="selectpicker input-date2 collapse" id="category-select8" data-container="body">
                            <option disabled selected hidden>Issuance Category</option>
                            <option value="All4">All</option>
                            <option value="Associates">Associates</option>
                            <option value="Admin">Admin</option>
                            <option value="Admin and Associates">Admin and Associates</option>
                            <option value="User">User</option>
                          </select>
                          <select class="selectpicker input-date2 collapse" id="category-select9" data-container="body">
                            <option disabled selected hidden>Type</option>
                            <option value="All5">All</option>
                            <option value="Items">Items</option>
                            <option value="Associate Issuance">Associate Issuance</option>
                            <option value="Approved Users">Approved Users</option>
                          </select>
                        </div>
                        <!--Export/Print-->
                        <div class="selectpicker" style="margin-left: 2.3rem;">
                          <button type="button" id="export" class="btn btn-secondary p-2 text-uppercase">
                            <span class="fas fa-file-export" style="padding-right: 5px"></span>Export
                          </button>
                        </div>
                        <div class="selectpicker">
                          <button type="button" id="print" onclick="printContent('sample')" class="btn btn-info p-2 text-uppercase">
                            <span class="fas fa-print" style="padding-right: 5px"></span>Print
                          </button>
                        </div>
                      </div>
                      <!--inventory concerns-->
                      <div class="card add" id="inventoryConcernsFilter" style="padding-top: 3rem; padding-bottom: 2rem;">
                        <!--Filter-->
                        <div class="row">
                          <div class="col col-lg-4 input-date2" style="margin-left: 2rem;">
                            <label class="label-date" style="margin-right: 1rem;">Components Added</label>
                            <select class="category-select4" id="category-select4" class="" style="width: 10rem; height: 1.9rem;">
                              <option id="initial-category-value"></option>
                              <option value="Time Unit">For the (time unit) of</option>
                              <option value="Month">For the Month of</option>
                              <option value="Year">For the Year of</option>
                              <option value="Day">For the Day of</option>
                            </select>
                          </div>
                          <!--For the Time Value Collapse-->
                            <div class="col col-lg-3 input-date2 collapse" id="timeValue1" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <input type="text" class="form-control" placeholder="Input time value" style="width: 10rem; height: 1.9rem; font-size: 12px;">
                            </div>
                            <p class="collapse" id="to">To</p>
                            <div class="col col-lg-3 input-date2 collapse" id="timeValue2" style="padding-right: 0!important; padding-left: 1.5rem;">
                              <input type="text" class="form-control" placeholder="Input time value" style="width: 10rem; height: 1.9rem; font-size: 12px;">
                            </div>
                          <!--For the mmonth of-->
                            <div class="col col-lg-2 input-date2 collapse" id="selectMonth" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden>Month</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                              </select>
                            </div>
                            <div class="col col-lg-2 input-date2 collapse" id="selectYear" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden>Year</option>
                                <option value="1">2017</option>
                                <option value="2">2018</option>
                                <option value="3">2019</option>
                              </select>
                            </div>
                          <!--For the year of-->
                            <div class="col col-lg-2 input-date2 collapse" id="selectYear2" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden>Year</option>
                                <option value="1">2017</option>
                                <option value="2">2018</option>
                                <option value="3">2019</option>
                              </select>
                            </div>
                          <!--For the day of-->
                            <div class="col col-lg-2 input-date2 collapse" id="selectMonth2" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden>Month</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                              </select>
                            </div>
                            <div class="col col-lg-2 input-date2 collapse" id="selectDay" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden>Day</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                              </select>
                            </div>
                            <div class="col col-lg-2 input-date2 collapse" id="selectYear3" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden> Year</option>
                                <option value="1">2017</option>
                                <option value="2">2018</option>
                                <option value="3">2019</option>
                              </select>
                            </div>
                        </div>
                        <div class="card add" id="sample" style="margin-left: 2rem; margin-right: 2rem;">
                        
                          <div class="" style=" margin-top: 1rem;">
                            <p class="card-title text-right date">Date:</p>
                            <p class="card-title text-center" style="font-size: 24px; color: #555555; margin-bottom: 0 !important;">NEW MEDIA SERVICES</p>
                            <p class="card-title text-center" style="font-size: 20px; color: #555555;">Inventory Concerns Report as of January 2019</p>
                          </div>
                          <!--For repair table-->
                          <div class="collapse all" id="inventoryTable">
                            <div class="inventory">
                              <p class="card-title text-center" style="color: #555555; margin-bottom: 2rem;">For Repair Items</p>
                            </div>
                            <table class="table examples" id="example">
                              <thead class="thead-dark" style="font-size: 14px;">
                                <tr>
                                  <tr>

                                      <th>Name</th>
                                      <th>Details</th>
                                      <th>Serial No</th>
                                      <th>OR No</th>
                                      <th>Supplier</th>
                                      <th>Date Added</th>
                                      <th width="15%">Date Edited</th>
                                      <th>Added By</th>
                                      <th>Last User</th>
                                      <th>Warranty</th>


                                  </tr>
                              </thead>
                              <tbody>

                                  @foreach ($for_repair as $for_repair)
                                  <tr>

                                      <td> {{ $for_repair->model }} {{ $for_repair->model }} </td>
                                      <td> {{ $for_repair->details }} </td>
                                      <td> {{ $for_repair->serial_no }} </td>
                                      <td> {{ $for_repair->or_no }} </td>
                                      <td> {{ $for_repair->supplier }} </td>
                                      <td> {{ $for_repair->created_at }} </td>
                                      <td> {{ $for_repair->firstname}} {{ $for_repair->lastname}}  </td>
                                      <td></td>
                                      <td>{{ $for_repair->warranty_start }}-{{ $for_repair->warranty_start }}</td>

                                  </tr>

                                  @endforeach
                                  @foreach ($for_repair_units as $for_repair_units)
                                  <tr>

                                      <td> {{ $for_repair_units->description }}  {{ $for_repair_units->id }} </td>
                                      <td> No Details </td>
                                      <td> None </td>
                                      <td> None </td>
                                      <td> None </td>
                                      <td> {{ $for_repair_units->created_at }} </td>
                                      <td> {{ $for_repair_units->updated_at }} </td>
                                      <td> {{ $for_repair_units->firstname}} {{ $for_repair_units->lastname}}  </td>
                                      <td></td>
                                      <td> None </td>
                                  </tr>

                                  @endforeach
                              </tbody>

                          </table>
                          </div>
                          <!--To be returned-->
                          <div class="collapse all" id="inventoryTable2">
                            <div class="inventory">
                              <p class="card-title text-center" style="color: #555555; margin-bottom: 2rem;">To be Returned Items</p>
                            </div>
                            <table class="table">
                              <thead class="thead-dark" style="font-size: 14px;">
                                <tr>
                                  <th scope="col">Item Name </th>
                                  <th scope="col">Type</th>
                                  <th scope="col">Subtype</th>
                                  <th scope="col">Description</th>
                                  <th scope="col">Serial No.</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Date</th>
                                  <th scope="col">Added By</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  @foreach ($for_return as $for_return)
                                  <tr>

                                      <td> {{ $for_return->model }} {{ $for_return->brand }} </td>
                                      <td> {{ $for_return->type }}</td>
                                      <td> {{ $for_return->subtype }} </td>
                                      <td > {{ $for_return->details }} </td>
                                      <td> {{ $for_return->serial_no }} </td>
                                      <td> {{ $for_return->stat }} </td>
                                      <td > {{ $for_return->created_at }} </td>
                                      <td> {{ $for_return->firstname }} {{ $for_return->lastname }}</td>

                                  </tr>
                                  @endforeach
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <!--Decommissioned-->
                          <div class="collapse all" id="inventoryTable3">
                            <div class="inventory">
                              <p class="card-title text-center" style="color: #555555; margin-bottom: 2rem;">Decommissioned Items</p>
                            </div>
                            <table class="table">
                              <thead class="thead-dark" style="font-size: 14px;">
                                <tr>

                                    <th>Name</th>
                                    <th>Details</th>
                                    <th>Serial No</th>
                                    <th>OR No</th>
                                    <th>Supplier</th>
                                    <th>Date Added</th>
                                    <th width="15%">Date Edited</th>
                                    <th>Added By</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($pending as $pending)
                                <tr>

                                    <td> {{ $pending->name }} </td>
                                    <td width="30%"> {{ $pending->details }} </td>
                                    <td> {{ $pending->serial_no }} </td>
                                    <td> {{ $pending->or_no }} </td>
                                    <td> {{ $pending->supplier }} </td>
                                    <td> {{ $pending->created_at }} </td>
                                    <td> {{ $pending->updated_at }} </td>
                                    <td> {{ $pending->firstname}} {{ $pending->lastname}}  </td>
                                    <td> <!--{{ $pending->remarks }}--> </td>
                                </tr>

                                @endforeach
                            </tbody>
                            </table>
                          </div>
                          <!--Pending-->
                          <div class="collapse all" id="inventoryTable4">
                            <div class="inventory">
                              <p class="card-title text-center" style="color: #555555; margin-bottom: 2rem;">Pending Items</p>
                            </div>
                            <table class="table">
                              <thead class="thead-dark" style="font-size: 14px;">
                                <tr>        <tr>

                                            <th>Name</th>
                                            <th>Details</th>
                                            <th>Serial No</th>
                                            <th>OR No</th>
                                            <th>Supplier</th>
                                            <th>Date Added</th>
                                            <th width="15%">Edited At</th>
                                            <th>Date Added</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($for_disposal as $for_disposal)
                                        <tr>

                                            <td> {{ $for_disposal->model }} {{ $for_disposal->brand }} </td>
                                            <td width="30%"> {{ $for_disposal->details }} </td>
                                            <td> {{ $for_disposal->serial_no }} </td>
                                            <td> {{ $for_disposal->or_no }} </td>
                                            <td> {{ $for_disposal->supplier }} </td>
                                            <td> {{ $for_disposal->created_at }} </td>
                                            <td> {{ $for_disposal->updated_at }} </td>
                                            <td> {{ $for_disposal->firstname}} {{ $for_disposal->lastname}}  </td>

                                        </tr>

                                        @endforeach
                                    </tbody>

                                </table>
                          </div>
                        </div>
                      </div>
                      <!--inventory operations-->
                      <div class="card add collapse" id="inventoryOperationsFilter" style="padding-top: 3rem; padding-bottom: 2rem;">
                        <!--Filter-->
                        <div class="row">
                          <div class="col col-lg-4 input-date2" style="margin-left: 2rem;">
                            <label class="label-date" style="margin-right: 1rem;">Components Added</label>
                            <select class="filter_InventoryOperation" id="" class="" style="width: 10rem; height: 1.9rem;">
                              <option class="initial-category-value" id="initial-category-value"></option>
                              <option value="Time Unit">For the (time unit) of</option>
                              <option value="Month">For the Month of</option>
                              <option value="Year">For the Year of</option>
                              <option value="Day">For the Day of</option>
                            </select>
                          </div>
                          <!--For the Time Value Collapse-->
                            <div class="col col-lg-3 input-date2 collapse " id="timeValue-operations" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <input type="text" class="form-control" placeholder="Input time value" style="width: 10rem; height: 1.9rem; font-size: 12px;">
                            </div>
                            <p class="collapse " id="to-operations">To</p>
                            <div class="col col-lg-3 input-date2 collapse " id="timeValue2-operations" style="padding-right: 0!important; padding-left: 1.5rem;">
                              <input type="text" class="form-control" placeholder="Input time value" style="width: 10rem; height: 1.9rem; font-size: 12px;">
                            </div>
                          <!--For the mmonth of-->
                            <div class="col col-lg-2 input-date2 collapse" id="month-operations" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden>Month</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                              </select>
                            </div>
                            <div class="col col-lg-2 input-date2 collapse" id="year-operations" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden>Year</option>
                                <option value="1">2017</option>
                                <option value="2">2018</option>
                                <option value="3">2019</option>
                              </select>
                            </div>
                          <!--For the year of-->
                            <div class="col col-lg-2 input-date2 collapse" id="year2-operations" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden>Year</option>
                                <option value="1">2017</option>
                                <option value="2">2018</option>
                                <option value="3">2019</option>
                              </select>
                            </div>
                          <!--For the day of-->
                            <div class="col col-lg-2 input-date2 collapse" id="month2-operations" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden>Month</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                              </select>
                            </div>
                            <div class="col col-lg-2 input-date2 collapse" id="day-operations" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden>Day</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                              </select>
                            </div>
                            <div class="col col-lg-2 input-date2 collapse" id="year3-operations" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden> Year</option>
                                <option value="1">2017</option>
                                <option value="2">2018</option>
                                <option value="3">2019</option>
                              </select>
                            </div>
                        </div>
                        <div class="card add" style="margin-left: 2rem; margin-right: 2rem;">
                          <div class="" style=" margin-top: 1rem; margin-bottom: 1rem;">
                            <p class="card-title text-right date" >Date:</p>
                            <p class="card-title text-center" style="font-size: 24px; color: #555555; margin-bottom: 0 !important;">NEW MEDIA SERVICES</p>
                            <p class="card-title text-center" style="font-size: 20px; color: #555555;">Inventory Operations Report as of January 2019</p>
                          </div>
                          <!--Items Added-->
                          <div class="collapse all" id="add">
                            <div class="inventory">
                              <p class="card-title text-center" style="color: #555555; margin-bottom: 2rem;">Items Added</p>
                            </div>
                            <table class="table">
                              <thead class="thead-dark" style="font-size: 14px;">
                                <tr>
                                  <th scope="col">Item Name </th>
                                  <th scope="col">Type</th>
                                  <th scope="col">Description</th>
                                  <th scope="col">Serial No.</th>
                                  <th scope="col">OR No.</th>
                                  <th scope="col">Added At</th>
                                  <th scope="col">Added By</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <!--Items Edited-->
                          <div class="collapse all" id="edit">
                            <div class="inventory">
                              <p class="card-title text-center" style="color: #555555; margin-bottom: 2rem;">Items Edited</p>
                            </div>
                            <table class="table">
                              <thead class="thead-dark" style="font-size: 14px;">
                                <tr>
                                  <th scope="col">Item Name </th>
                                  <th scope="col">Type</th>
                                  <th scope="col">Description</th>
                                  <th scope="col">Serial No.</th>
                                  <th scope="col">OR No.</th>
                                  <th scope="col">Added At</th>
                                  <th scope="col">Edited At</th>
                                  <th scope="col">Added By</th>
                                  <th scope="col">Edited By</th>
                                  <th scope="col">Remarks</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <!--Items Deleted-->
                          <div class="collapse all" id="delete">
                            <div class="inventory">
                              <p class="card-title text-center" style="color: #555555; margin-bottom: 2rem;">Items Deleted</p>
                            </div>
                            <table class="table">
                              <thead class="thead-dark" style="font-size: 14px;">
                                <tr>
                                  <th scope="col">Item Name </th>
                                  <th scope="col">Type</th>
                                  <th scope="col">Description</th>
                                  <th scope="col">Serial No.</th>
                                  <th scope="col">OR No.</th>
                                  <th scope="col">Added At</th>
                                  <th scope="col">Added By</th>
                                  <th scope="col">Deleted By</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!--inventory equipment type-->
                      <div class="card add collapse" id="inventoryEquipmentTypeFilter" style="padding-top: 3rem; padding-bottom: 2rem;">
                        <!--filter-->
                        <div class="row">
                          <div class="col col-lg-4 input-date2" style="margin-left: 2rem;">
                            <label class="label-date" style="margin-right: 1rem;">Components Added</label>
                            <select class="filter_EquipmentType" id="" class="" style="width: 10rem; height: 1.9rem;">
                              <option id="initial-category-value"></option>
                              <option value="Time Unit">For the (time unit) of</option>
                              <option value="Month">For the Month of</option>
                              <option value="Year">For the Year of</option>
                              <option value="Day">For the Day of</option>
                            </select>
                          </div>
                          <!--For the Time Value Collapse-->
                            <div class="col col-lg-3 input-date2 collapse" id="timeValue-type" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <input type="text" class="form-control" placeholder="Input time value" style="width: 10rem; height: 1.9rem; font-size: 12px;">
                            </div>
                            <p class="collapse" id="to-type">To</p>
                            <div class="col col-lg-3 input-date2 collapse" id="timeValue2-type" style="padding-right: 0!important; padding-left: 1.5rem;">
                              <input type="text" class="form-control" placeholder="Input time value" style="width: 10rem; height: 1.9rem; font-size: 12px;">
                            </div>
                          <!--For the mmonth of-->
                            <div class="col col-lg-2 input-date2 collapse" id="month-type" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden>Month</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                              </select>
                            </div>
                            <div class="col col-lg-2 input-date2 collapse" id="year-type" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden>Year</option>
                                <option value="1">2017</option>
                                <option value="2">2018</option>
                                <option value="3">2019</option>
                              </select>
                            </div>
                          <!--For the year of-->
                            <div class="col col-lg-2 input-date2 collapse" id="year2-type" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden>Year</option>
                                <option value="1">2017</option>
                                <option value="2">2018</option>
                                <option value="3">2019</option>
                              </select>
                            </div>
                          <!--For the day of-->
                            <div class="col col-lg-2 input-date2 collapse" id="month2-type" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden>Month</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                              </select>
                            </div>
                            <div class="col col-lg-2 input-date2 collapse" id="day-type" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden>Day</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                              </select>
                            </div>
                            <div class="col col-lg-2 input-date2 collapse" id="year3-type" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden> Year</option>
                                <option value="1">2017</option>
                                <option value="2">2018</option>
                                <option value="3">2019</option>
                              </select>
                            </div>
                        </div>
                        <div class="card add" style="margin-left: 2rem; margin-right: 2rem;">
                          <div class="" style=" margin-top: 1rem; margin-bottom: 1rem;">
                            <p class="card-title text-right date" >Date:</p>
                            <p class="card-title text-center" style="font-size: 24px; color: #555555; margin-bottom: 0 !important;">NEW MEDIA SERVICES</p>
                            <p class="card-title text-center" style="font-size: 20px; color: #555555;">Inventory Equipment Type Report as of January 2019</p>
                          </div>
                          <!--Computer Components-->
                          <div class="collapse all" id="components">
                            <div class="inventory">
                              <p class="card-title text-center" style="color: #555555; margin-bottom: 2rem;">Computer Components</p>
                            </div>
                            <table class="table">
                              <thead class="thead-dark" style="font-size: 14px;">
                                <tr>
                                  <th scope="col">Item Name </th>
                                  <th scope="col">Details</th>
                                  <th scope="col">Serial No.</th>
                                  <th scope="col">OR No.</th>
                                  <th scope="col">Added At</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Date</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <!--Computer Peripherals-->
                          <div class="collapse all" id="peripherals">
                            <div class="inventory">
                              <p class="card-title text-center" style="color: #555555; margin-bottom: 2rem;">Computer Peripherals</p>
                            </div>
                            <table class="table">
                              <thead class="thead-dark" style="font-size: 14px;">
                                <tr>
                                  <th scope="col">Item Name </th>
                                  <th scope="col">Details</th>
                                  <th scope="col">Serial No.</th>
                                  <th scope="col">OR No.</th>
                                  <th scope="col">Added At</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Date</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <!--Mobile Devices-->
                          <div class="collapse all" id="mobile">
                            <div class="inventory">
                              <p class="card-title text-center" style="color: #555555; margin-bottom: 2rem;">Mobile Devices</p>
                            </div>
                            <table class="table">
                              <thead class="thead-dark" style="font-size: 14px;">
                                <tr>
                                  <th scope="col">Item Name </th>
                                  <th scope="col">Details</th>
                                  <th scope="col">Serial No.</th>
                                  <th scope="col">OR No.</th>
                                  <th scope="col">Added At</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Date</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!--inventory equipment Status-->
                      <div class="card add collapse" id="inventoryEquipmentStatusFilter" style="padding-top: 3rem; padding-bottom: 2rem;">
                        <!--filter-->
                        <div class="row">
                          <div class="col col-lg-4 input-date2" style="margin-left: 2rem;">
                            <label class="label-date" style="margin-right: 1rem;">Components Added</label>
                            <select class="filter_EquipmentStatus" id="" class="" style="width: 10rem; height: 1.9rem;">
                              <option id="initial-category-value"></option>
                              <option value="Time Unit">For the (time unit) of</option>
                              <option value="Month">For the Month of</option>
                              <option value="Year">For the Year of</option>
                              <option value="Day">For the Day of</option>
                            </select>
                          </div>
                          <!--For the Time Value Collapse-->
                            <div class="col col-lg-3 input-date2 collapse" id="timeValue-status" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <input type="text" class="form-control" placeholder="Input time value" style="width: 10rem; height: 1.9rem; font-size: 12px;">
                            </div>
                            <p class="collapse" id="to-status">To</p>
                            <div class="col col-lg-3 input-date2 collapse" id="timeValue2-status" style="padding-right: 0!important; padding-left: 1.5rem;">
                              <input type="text" class="form-control" placeholder="Input time value" style="width: 10rem; height: 1.9rem; font-size: 12px;">
                            </div>
                          <!--For the mmonth of-->
                            <div class="col col-lg-2 input-date2 collapse" id="month-status" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden>Month</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                              </select>
                            </div>
                            <div class="col col-lg-2 input-date2 collapse" id="year-status" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden>Year</option>
                                <option value="1">2017</option>
                                <option value="2">2018</option>
                                <option value="3">2019</option>
                              </select>
                            </div>
                          <!--For the year of-->
                            <div class="col col-lg-2 input-date2 collapse" id="year2-status" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden>Year</option>
                                <option value="1">2017</option>
                                <option value="2">2018</option>
                                <option value="3">2019</option>
                              </select>
                            </div>
                          <!--For the day of-->
                            <div class="col col-lg-2 input-date2 collapse" id="month2-status" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden>Month</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                              </select>
                            </div>
                            <div class="col col-lg-2 input-date2 collapse" id="day-status" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden>Day</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                              </select>
                            </div>
                            <div class="col col-lg-2 input-date2 collapse" id="year3-status" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden> Year</option>
                                <option value="1">2017</option>
                                <option value="2">2018</option>
                                <option value="3">2019</option>
                              </select>
                            </div>
                        </div>
                        <div class="card add" style="margin-left: 2rem; margin-right: 2rem;">
                          <div class="" style=" margin-top: 1rem; margin-bottom: 1rem;">
                            <p class="card-title text-right date" >Date:</p>
                            <p class="card-title text-center" style="font-size: 24px; color: #555555; margin-bottom: 0 !important;">NEW MEDIA SERVICES</p>
                            <p class="card-title text-center" style="font-size: 20px; color: #555555;">Inventory Equipment Status Report as of January 2019</p>
                          </div>
                          <!--table-->
                          <div class="all" id="">
                            <div class="inventory">
                              <p class="card-title text-center" style="color: #555555; margin-bottom: 2rem;">Equipment Status</p>
                            </div>
                            <table class="table">
                              <thead class="thead-dark" style="font-size: 14px;">
                                <tr>
                                  <th scope="col">Item Name </th>
                                  <th scope="col">Type</th>
                                  <th scope="col">Subtype</th>
                                  <th scope="col">Description</th>
                                  <th scope="col">OR No.</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Remarks</th>
                                  <th scope="col">Date</th>
                                  <th scope="col">Issued By</th>
                                  <th scope="col">Issued To</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!--Office Equipment-->
                      <div class="card add collapse" id="officeEquipment" style="padding-top: 3rem; padding-bottom: 2rem;">
                        <!--filter-->
                        <div class="row">
                          <div class="col col-lg-4 input-date2" style="margin-left: 2rem;">
                            <label class="label-date" style="margin-right: 1rem;">Components Added</label>
                            <select class="filter_OfficeEquipment" id="" class="" style="width: 10rem; height: 1.9rem;">
                              <option id="initial-category-value"></option>
                              <option value="Time Unit">For the (time unit) of</option>
                              <option value="Month">For the Month of</option>
                              <option value="Year">For the Year of</option>
                              <option value="Day">For the Day of</option>
                            </select>
                          </div>
                          <!--For the Time Value Collapse-->
                            <div class="col col-lg-3 input-date2 collapse" id="timeValue1-office" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <input type="text" class="form-control" placeholder="Input time value" style="width: 10rem; height: 1.9rem; font-size: 12px;">
                            </div>
                            <p class="collapse" id="to-office">To</p>
                            <div class="col col-lg-3 input-date2 collapse" id="timeValue2-office" style="padding-right: 0!important; padding-left: 1.5rem;">
                              <input type="text" class="form-control" placeholder="Input time value" style="width: 10rem; height: 1.9rem; font-size: 12px;">
                            </div>
                          <!--For the mmonth of-->
                            <div class="col col-lg-2 input-date2 collapse" id="month-office" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden>Month</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                              </select>
                            </div>
                            <div class="col col-lg-2 input-date2 collapse" id="year-office" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden>Year</option>
                                <option value="1">2017</option>
                                <option value="2">2018</option>
                                <option value="3">2019</option>
                              </select>
                            </div>
                          <!--For the year of-->
                            <div class="col col-lg-2 input-date2 collapse" id="year2-office" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden>Year</option>
                                <option value="1">2017</option>
                                <option value="2">2018</option>
                                <option value="3">2019</option>
                              </select>
                            </div>
                          <!--For the day of-->
                            <div class="col col-lg-2 input-date2 collapse" id="month2-office" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden>Month</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                              </select>
                            </div>
                            <div class="col col-lg-2 input-date2 collapse" id="day-office" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden>Day</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                              </select>
                            </div>
                            <div class="col col-lg-2 input-date2 collapse" id="year3-office" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden> Year</option>
                                <option value="1">2017</option>
                                <option value="2">2018</option>
                                <option value="3">2019</option>
                              </select>
                            </div>
                        </div>
                        <div class="card add" style="margin-left: 2rem; margin-right: 2rem;">
                          <div class="" style=" margin-top: 1rem; margin-bottom: 1rem;">
                            <p class="card-title text-right date" >Date:</p>
                            <p class="card-title text-center" style="font-size: 24px; color: #555555; margin-bottom: 0 !important;">NEW MEDIA SERVICES</p>
                            <p class="card-title text-center" style="font-size: 20px; color: #555555;">Inventory of Office Equipment Report as of January 2019</p>
                          </div>
                          <!--table-->
                          <div class="all" id="">
                            <div class="inventory">
                              <p class="card-title text-center" style="color: #555555; margin-bottom: 2rem;">Office Equipment</p>
                            </div>
                            <table class="table">
                              <thead class="thead-dark" style="font-size: 14px;">
                                <tr>
                                    <th scope="col">Model</th>
                                    <th scope="col">Brand</th>
                                    <th scope="col">Types</th>
                                    <th scope="col">Subtype</th>
                                    <th scope="col">Supplier</th>
                                    <th scope="col">Serial No</th>
                                    <th scope="col">OR No</th>
                                    <th scope="col">Added by</th>
                                    <th scope="col">Date Added</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($equipment as $equipment)
                                <tr >
                                    <td> {{ $equipment->model }} </td>
                                    <td> {{ $equipment->brand }} </td>
                                    <td> {{ $equipment->type_name }} </td>
                                    <td> {{ $equipment->subtype_name }} </td>
                                    <td> {{ $equipment->supplier }} </td>
                                    <td> {{ $equipment->serial_no }} </td>
                                    <td> {{ $equipment->or_no }} </td>
                                    <td> {{ $equipment->firstname }} {{ $equipment->lastname }} </td>
                                    <td> {{ $equipment->created_at }} </td>
                                    <td> {{ $equipment->status_name }} </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!--issuance-->
                      <div class="card add collapse" id="Issuance" style="padding-top: 3rem; padding-bottom: 2rem;">
                        <!--filter-->
                        <div class="row">
                          <div class="col col-lg-4 input-date2" style="margin-left: 2rem;">
                            <label class="label-date" style="margin-right: 1rem;">Components Added</label>
                            <select class="filter_Issuance" id="filter_Issuance" class="" style="width: 10rem; height: 1.9rem;">
                              <option id="initial-category-value"></option>
                              <option value="Time Unit">For the (time unit) of</option>
                              <option value="Month">For the Month of</option>
                              <option value="Year">For the Year of</option>
                              <option value="Day">For the Day of</option>
                            </select>
                          </div>
                          <!--For the Time Value Collapse-->
                            <div class="col col-lg-3 input-date2 collapse" id="timeValue-issuance" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <input type="text" class="form-control" placeholder="Input time value" style="width: 10rem; height: 1.9rem; font-size: 12px;">
                            </div>
                            <p class="collapse" id="to-issuance">To</p>
                            <div class="col col-lg-3 input-date2 collapse" id="timeValue2-issuance" style="padding-right: 0!important; padding-left: 1.5rem;">
                              <input type="text" class="form-control" placeholder="Input time value" style="width: 10rem; height: 1.9rem; font-size: 12px;">
                            </div>
                          <!--For the mmonth of-->
                            <div class="col col-lg-2 input-date2 collapse" id="month-issuance" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden>Month</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                              </select>
                            </div>
                            <div class="col col-lg-2 input-date2 collapse" id="year-issuance" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden>Year</option>
                                <option value="1">2017</option>
                                <option value="2">2018</option>
                                <option value="3">2019</option>
                              </select>
                            </div>
                          <!--For the year of-->
                            <div class="col col-lg-2 input-date2 collapse" id="year2-issuance" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden>Year</option>
                                <option value="1">2017</option>
                                <option value="2">2018</option>
                                <option value="3">2019</option>
                              </select>
                            </div>
                          <!--For the day of-->
                            <div class="col col-lg-2 input-date2 collapse" id="month2-issuance" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden>Month</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                              </select>
                            </div>
                            <div class="col col-lg-2 input-date2 collapse" id="day-issuance" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden>Day</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                              </select>
                            </div>
                            <div class="col col-lg-2 input-date2 collapse" id="year3-issuance" style="padding-right: 0!important; padding-left: 3.5rem;">
                              <select id="" class="" style="width: 10rem; height: 1.9rem;">
                                <option disabled selected hidden> Year</option>
                                <option value="1">2017</option>
                                <option value="2">2018</option>
                                <option value="3">2019</option>
                              </select>
                            </div>
                        </div>
                        <div class="card add" style="margin-left: 2rem; margin-right: 2rem;">
                          <div class="" style=" margin-top: 1rem; margin-bottom: 1rem;">
                            <p class="card-title text-right date">Date:</p>
                            <p class="card-title text-center" style="font-size: 24px; color: #555555; margin-bottom: 0 !important;">NEW MEDIA SERVICES</p>
                            <p class="card-title text-center" style="font-size: 20px; color: #555555;">Issuance Report as of January 2019</p>
                          </div>
                          <!--Admin - Items-->
                          <div class="collapse allIsuance" id="items">
                            <div class="inventory">
                              <p class="card-title text-center" style="color: #555555; margin-bottom: 2rem;">Admin - Issuance of Items</p>
                            </div>

                            <table id="myDataTable" class="table table-borderless table-hover" style="width:100%;cursor:pointer;">
                              <thead class="thead-dark" style="font-size: 14px;">
                                <tr>
                                  <th scope="col">Item Name</th>
                                  <th scope="col">Type</th>
                                  <th scope="col">Subtype</th>
                                  <th scope="col">Serial No.</th>
                                  <th scope="col">Or No.</th>
                                  <th scope="col">Issued to</th>
                                  <th scope="col">Issued By</th>
                                  <th scope="col">Issued at</th>
                                  <th scope="col">Issued Until </th>
                                  <th scope="col">Returned At</th>
                                  <th scope="col">Remarks</th>
                                </tr>
                              </thead>
                                  <tbody>
                                    @foreach ($issuance as $issuance)
                                    <tr>

                                          <td> {{ $issuance->model}} {{ $issuance->brand}}{{ $issuance->unit_name }} {{ $issuance->pc_number }} </td>
                                          <td>{{ $issuance->type}}  </td>
                                          <td> {{ $issuance->subtype}} </td>
                                          <td width="30%"> {{ $issuance->serial_no}}</td>
                                          <td>{{ $issuance->or_no}} </td>
                                          <td> {{ $issuance->givenname }} {{ $issuance->surname }} </td>
                                          <td> {{ $issuance->userfname }} {{ $issuance->userlname }}  </td>
                                          <td>{{ $issuance->created_at }}</td>
                                          <td>{{ $issuance->issued_until }}</td>
                                          <td> {{ $issuance->returned_at }} </td>
                                          <td> {{ $issuance->remarks }} </td>

                                      </tr>
                                      @endforeach
                                  </tbody>
                            </table>
                          </div>
                          <!--Admin - AssociateIssuance-->
                          <div class="collapse allIsuance" id="associateIssuance">
                            <div class="inventory">
                              <p class="card-title text-center" style="color: #555555; margin-bottom: 2rem;">Admin - Associate Issuance</p>
                            </div>
                            <table class="table">
                              <thead class="thead-dark" style="font-size: 14px;">
                                <tr>
                                  <th scope="col">Name</th>
                                  <th scope="col">Item Name</th>
                                  <th scope="col">Issued to</th>
                                  <th scope="col">Issued Until</th>
                                  <th scope="col">Equipment Status</th>
                                  <th scope="col">Returned At</th>
                                  <th scope="col">Updated at</th>
                                  <th scope="col">Remarks</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <!--Admin - Approved Users-->
                          <div class="collapse allIsuance" id="approvedUsers">
                            <div class="inventory">
                              <p class="card-title text-center" style="color: #555555; margin-bottom: 2rem;">Admin - Approved Users</p>
                            </div>
                            <table class="table">
                              <thead class="thead-dark" style="font-size: 14px;">
                                <tr>
                                  <th scope="col">Name</th>
                                  <th scope="col">First Name</th>
                                  <th scope="col">Last Name</th>
                                  <th scope="col">Department</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Approved/Created At</th>
                                  <th scope="col">Status(User)</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <!--Associates-->
                          <div class="collapse allIsuance" id="associates">
                            <div class="inventory">
                              <p class="card-title text-center" style="color: #555555; margin-bottom: 2rem;">Associates</p>
                            </div>
                            <table class="table">
                              <thead class="thead-dark" style="font-size: 14px;">
                                <tr>
                                  <th scope="col">Equipment Status</th>
                                  <th scope="col">Issued to </th>
                                  <th scope="col">Issued Until</th>
                                  <th scope="col">Returned At</th>
                                  <th scope="col">Updated at</th>
                                  <th scope="col">Remarks</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <!--Admin and Associate-->
                          <div class="collapse allIsuance" id="AdminAndAssociate">
                            <div class="inventory">
                              <p class="card-title text-center" style="color: #555555; margin-bottom: 2rem;">Admin and Associates</p>
                            </div>
                            <table class="table">
                              <thead class="thead-dark" style="font-size: 14px;">
                                <tr>
                                  <th scope="col">User Type</th>
                                  <th scope="col">Issued by (UserName)</th>
                                  <th scope="col">Item Name</th>
                                  <th scope="col">Item Type</th>
                                  <th scope="col">Serial No.</th>
                                  <th scope="col">Or No.</th>
                                  <th scope="col">Equipment Status</th>
                                  <th scope="col">Issued to</th>
                                  <th scope="col">Issued At</th>
                                  <th scope="col">Issued Until</th>
                                  <th scope="col">Returned At</th>
                                  <th scope="col">Updated at</th>
                                  <th scope="col">Remarks</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <!--Users-->
                          <div class="collapse allIsuance" id="users">
                            <div class="inventory">
                              <p class="card-title text-center" style="color: #555555; margin-bottom: 2rem;">Users</p>
                            </div>
                            <table class="table">
                              <thead class="thead-dark" style="font-size: 14px;">
                                <tr>
                                  <th scope="col">Item Type</th>
                                  <th scope="col">Serial No.</th>
                                  <th scope="col">Or No.</th>
                                  <th scope="col">Equipment Status</th>
                                  <th scope="col">Issued to</th>
                                  <th scope="col">Issued by (UserName)</th>
                                  <th scope="col">Issued At</th>
                                  <th scope="col">Issued Until</th>
                                  <th scope="col">Returned At</th>
                                  <th scope="col">Updated at</th>
                                  <th scope="col">Remarks</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                </tr>
                              </tbody>
                            </table>
                          </div></div></div>
                      <!--Graph-->
                      <div class="row">
                        <div class="col col-6" id="container2" style="height: 300px; margin-top: 2rem;"></div>
                        <div class="col col-6" id="container3" style="height: 300px; margin-top: 2rem;"></div>
                      </div>
        </div>
</div>
@stop

@section('script')
        <!-- JQuery Core -->

        <script src="{{ asset('js/highcharts/code/highcharts.js') }}"></script>
        <script src="{{ asset('js/highcharts/code/modules/exporting.js') }}"></script>
        <script src="{{ asset('js/highcharts/code/modules/export-data.js') }}"></script>

        <!--JQuery form validation plugin-->
        <script src="{{ asset('js/jqueryvalidation/dist/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('js/jqueryvalidation/dist/additional-methods.min.js') }}"></script>

        <!-- JQuery Core -->
        <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('js/popper/popper.min.js') }}"></script>

        <!-- Bootstrap -->
        <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>

        <!-- DataTables -->
        <!-- Datatable -->
        <link rel="stylesheet" href="{{ asset('css/datatable/dataTables.bootstrap4.min.css') }}">
        <!-- Datatable -->
       <script type="text/javascript" src="{{ asset('js/datatable/jquery.dataTables.min.js') }}"></script>
       <script type="text/javascript" src="{{ asset('js/datatable/datatables.min.js') }}"></script>
       <script type="text/javascript" src="{{ asset('js/datatable/dataTables.bootstrap4.min.js') }}"></script>

        <!-- <script src="https://cdn.jsdelivr.net/jspdf/1.2.61/jspdf.min.js"></script> -->

        <!--dashboard icon sidenav collapse-->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#sidebarCollapse').on('click', function() {
                    $('#sidebar').toggleClass('active');
                    var icon = $(this).parent().find(".fas")
                    if (icon.hasClass('fas fa-chevron-left'))
                        icon.removeClass('fas fa-chevron-left').addClass("fas fa-chevron-right");
                    else
                        icon.removeClass('fas fa-chevron-right').addClass("fas fa-chevron-left");
                });
            });

        </script>
        <!--user profile input validation-->
        <script>
                    $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            });
        </script>
        <!--category select-->
        <script>
          $(document).ready(function(){
            $("#category-select2").on('change', function() {
                var category = $("#category-select2").val();
                switch (category) {
                    case "Inventory Concerns":
                        $("#inventoryConcernsFilter, #container2, #container3, #category-select5").show();
                        $("#inventoryOperationsFilter, #inventoryEquipmentTypeFilter, #inventoryEquipmentStatusFilter, #officeEquipment, #Issuance, #category-select6, #category-select7, #category-select8").hide();
                        break;
                    case "Inventory Operations":
                        $("#inventoryOperationsFilter, #container2, #container3, #category-select6").show();
                        $("#inventoryConcernsFilter, #inventoryEquipmentTypeFilter, #inventoryEquipmentStatusFilter, #officeEquipment, #Issuance, #category-select5, #category-select7, #category-select8").hide();
                        break;
                    case "Inventory Equipment Type":
                        $("#inventoryEquipmentTypeFilter, #container2, #container3, #category-select7").show();
                        $("#inventoryConcernsFilter, #inventoryOperationsFilter, #inventoryEquipmentStatusFilter, #officeEquipment, #Issuance, #category-select5, #category-select6, #category-select8").hide();
                        break;
                    case "Inventory Equipment Status":
                        $("#inventoryEquipmentStatusFilter, #container2, #container3").show();
                        $("#inventoryConcernsFilter, #inventoryOperationsFilter, #inventoryEquipmentTypeFilter, #officeEquipment, #Issuance, #category-select5, #category-select6, #category-select7, #category-select8").hide();
                        break;
                    case "Office Equipment":
                        $("#officeEquipment, #container2, #container3").show();
                        $("#inventoryConcernsFilter, #inventoryOperationsFilter, #inventoryEquipmentTypeFilter, #inventoryEquipmentStatusFilter, #Issuance, #category-select5, #category-select6, #category-select7, #category-select8").hide();
                        break;
                    case "Issuance":
                        $("#Issuance, #container2, #container3, #category-select8").show();
                        $("#inventoryConcernsFilter, #inventoryOperationsFilter, #inventoryEquipmentTypeFilter, #inventoryEquipmentStatusFilter, #officeEquipment, #category-select5, #category-select6, #category-select7").hide();
                        break;
                    default:
                }
            });
          });
        </script>

        <!--filter select-->
        <script>
          $(document).ready(function(){
            // Inventory Concerns Filter
            $(".category-select4").on('change', function() {
                var category = $(".category-select4").val();
                switch (category) {
                    case "Time Unit":
                        $("#timeValue1, #to, #timeValue2").show();
                        $("#selectMonth, #selectMonth2, #selectYear, #selectYear2, #selectDay").hide();
                        break;
                    case "Month":
                        $("#selectMonth, #selectYear").show();
                        $("#timeValue1, #to, #timeValue2, #selectMonth2, #selectYear2, #selectDay").hide();
                        break;
                    case "Year":
                        $("#selectYear2").show();
                        $("#selectMonth, #selectYear, #selectYear3, #selectMonth2, #selectDay, #timeValue1, #to, #timeValue2").hide();
                        break;
                    case "Day":
                        $("#selectMonth2, #selectDay, #selectYear3").show();
                        $("#selectYear2, #selectMonth, #selectYear, #timeValue1, #to, #timeValue2").hide();
                        break;
                    default:
                }
            });
          });

          // Inventory Operations Filter
          $(document).ready(function(){
            $(".filter_InventoryOperation").on('change', function() {
                var category = $(".filter_InventoryOperation").val();
                switch (category) {
                    case "Time Unit":
                        $("#timeValue-operations, #to-operations, #timeValue2-operations").show();
                        $("#month-operations, #month2-operations, #year-operations, #year2-operations, #day-operations").hide();
                        break;
                    case "Month":
                        $("#month-operations, #year-operations").show();
                        $("#timeValue-operations, #to-operations, #timeValue2-operations, #month2-operations, #year2-operations, #day-operations").hide();
                        break;
                    case "Year":
                        $("#year2-operations").show();
                        $("#month-operations, #year-operations, #year3-operations, #month2-operations, #day-operations, #timeValue-operations, #to-operations, #timeValue2-operations").hide();
                        break;
                    case "Day":
                        $("#month2-operations, #day-operations, #year3-operations").show();
                        $("#year2-operations, #month-operations, #year-operations, #timeValue-operations, #to-operations, #timeValue2-operations").hide();
                        break;
                    default:
                }
            });

            // Inventory Equipment Type Filter
            $(document).ready(function(){
              $(".filter_EquipmentType").on('change', function() {
                  var category = $(".filter_EquipmentType").val();
                  switch (category) {
                      case "Time Unit":
                          $("#timeValue-type, #to-type, #timeValue2-type").show();
                          $("#month-type, #month2-type, #year-type, #year2-type, #day-type").hide();
                          break;
                      case "Month":
                          $("#month-type, #year-type").show();
                          $("#timeValue-type, #to-type, #timeValue2-type, #month2-type, #year2-type, #day-type").hide();
                          break;
                      case "Year":
                          $("#year2-type").show();
                          $("#month-type, #year-type, #year3-type, #month2-type, #day-type, #timeValue-type, #to-type, #timeValue2-type").hide();
                          break;
                      case "Day":
                          $("#month2-type, #day-type, #year3-type").show();
                          $("#year2-type, #month-type, #year-type, #timeValue-type, #to-type, #timeValue2-type").hide();
                          break;
                      default:
                  }
              });
            });

            // Inventory Equipment Status Filter
            $(document).ready(function(){
              $(".filter_EquipmentStatus").on('change', function() {
                  var category = $(".filter_EquipmentStatus").val();
                  switch (category) {
                      case "Time Unit":
                          $("#timeValue-status, #to-status, #timeValue2-status").show();
                          $("#month-status, #month2-status, #year-status, #year2-status, #day-status").hide();
                          break;
                      case "Month":
                          $("#month-status, #year-status").show();
                          $("#timeValue-status, #to-status, #timeValue2-status, #month2-status, #year2-status, #day-status").hide();
                          break;
                      case "Year":
                          $("#year2-status").show();
                          $("#month-status, #year-status, #year3-status, #month2-status, #day-status, #timeValue-status, #to-status, #timeValue2-status").hide();
                          break;
                      case "Day":
                          $("#month2-status, #day-status, #year3-status").show();
                          $("#year2-status, #month-status, #year-status, #timeValue-status, #to-status, #timeValue2-status").hide();
                          break;
                      default:
                  }
              });
            });

            // Office Equipment Filter
            $(document).ready(function(){
              $(".filter_OfficeEquipment").on('change', function() {
                  var category = $(".filter_OfficeEquipment").val();
                  switch (category) {
                      case "Time Unit":
                          $("#timeValue-office, #to-office, #timeValue2-office").show();
                          $("#month-office, #month2-office, #year-office, #year2-office, #day-office").hide();
                          break;
                      case "Month":
                          $("#month-office, #year-office").show();
                          $("#timeValue-office, #to-office, #timeValue2-office, #month2-office, #year2-office, #day-office").hide();
                          break;
                      case "Year":
                          $("#year2-office").show();
                          $("#month-office, #year-office, #year3-office, #month2-office, #day-office, #timeValue-office, #to-office, #timeValue2-office").hide();
                          break;
                      case "Day":
                          $("#month2-office, #day-office, #year3-office").show();
                          $("#year2-office, #month-office, #year-office, #timeValue-office, #to-office, #timeValue2-office").hide();
                          break;
                      default:
                  }
              });
            });

            // Issuance Filter
            $(document).ready(function(){
              $(".filter_Issuance").on('change', function() {
                  var category = $(".filter_Issuance").val();
                  switch (category) {
                      case "Time Unit":
                          $("#timeValue-issuance, #to-issuance, #timeValue2-issuance").show();
                          $("#month-issuance, #month2-issuance, #year-issuance, #year2-issuance, #day-issuance").hide();
                          break;
                      case "Month":
                          $("#month-issuance, #year-issuance").show();
                          $("#timeValue-issuance, #to-issuance, #timeValue2-issuance, #month2-issuance, #year2-issuance, #day-issuance").hide();
                          break;
                      case "Year":
                          $("#year2-issuance").show();
                          $("#month-issuance, #year-issuance, #year3-issuance, #month2-issuance, #day-issuance, #timeValue-issuance, #to-issuance, #timeValue2-issuance").hide();
                          break;
                      case "Day":
                          $("#month2-issuance, #day-issuance, #year3-issuance").show();
                          $("#year2-issuance, #month-issuance, #year-issuance, #timeValue-issuance, #to-issuance, #timeValue2-issuance").hide();
                          break;
                      default:
                  }
              });
            });
          });
        </script>
        <!--graph-->
        <script>
          Highcharts.chart('container2', {
          chart: {
              type: 'column'
          },
          title: {
              text: 'Inventory Concerns Report in January, 2019'
          },
          xAxis: {
              categories: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
              crosshair: true
          },
          yAxis: {
              min: 0,
              title: {
                  text: 'Quantity'
              }
          },
          tooltip: {
              headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
              pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' + '<td style="padding:0"><b>{point.y:.1f} items</b></td></tr>',
              footerFormat: '</table>',
              shared: true,
              useHTML: true
          },
          plotOptions: {
              column: {
                  pointPadding: 0.2,
                  borderWidth: 0
              }
          },
          series: [{
              name: 'For Repair',
              data: [{{$JanuaryRepair->count()}}, {{$FebruaryRepair->count()}}, {{$MarchRepair->count()}}, {{$AprilRepair->count()}}, {{$MayRepair->count()}}, {{$JuneRepair->count()}}, {{$JulyRepair->count()}}, {{$AugustRepair->count()}}, {{$SeptemberRepair->count()}}, {{$OctoberRepair->count()}}, {{$NovemberRepair->count()}}, {{$DecemberRepair->count()}}]

          }, {
              name: 'To be Returned',
              data: [{{$JanuaryReturn->count()}}, {{$FebruaryReturn->count()}}, {{$MarchReturn->count()}}, {{$AprilReturn->count()}}, {{$MayReturn->count()}}, {{$JuneReturn->count()}}, {{$JulyReturn->count()}}, {{$AugustReturn->count()}}, {{$SeptemberReturn->count()}}, {{$OctoberReturn->count()}}, {{$NovemberReturn->count()}}, {{$DecemberReturn->count()}}]

          }, {
              name: 'Decommissioned',
              data: [{{$JanuaryDecom->count()}}, {{$FebruaryDecom->count()}}, {{$MarchRDecom->count()}}, {{$AprilDecom->count()}}, {{$MayDecom->count()}}, {{$JuneDecom->count()}}, {{$JulyDecom->count()}}, {{$AugustDecom->count()}}, {{$SeptemberDecom->count()}}, {{$OctoberDecom->count()}}, {{$NovemberDecom->count()}}, {{$DecemberDecom->count()}}]

          }, {
              name: 'Pending',
              data: [{{$JanuaryPending->count()}}, {{$FebruaryPending->count()}}, {{$MarchPending->count()}}, {{$AprilPending->count()}}, {{$MayPending->count()}}, {{$JunePending->count()}}, {{$JulyPending->count()}}, {{$AugustPending->count()}}, {{$SeptemberPending->count()}}, {{$OctoberPending->count()}}, {{$NovemberPending->count()}}, {{$DecemberPending->count()}}]

             }]
          });
        </script>
        <script>
          Highcharts.chart('container3', {
          chart: {
              plotBackgroundColor: null,
              plotBorderWidth: null,
              plotShadow: false,
              type: 'pie'
          },
          title: {
              text: 'Inventory Concerns Report in January, 2019'
          },
          tooltip: {
              pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
          },
          plotOptions: {
              pie: {
                  allowPointSelect: true,
                  cursor: 'pointer',
                  dataLabels: {
                      enabled: true,
                      format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                      style: {
                          color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                      }
                  }
              }
          },
          series: [{
              name: 'Inventory Concerns',
              colorByPoint: true,
              data: [{
                  name: 'For Repair',
                  y: {{$ThisMonthRepair->count()}},
                  sliced: true,
                  selected: true
              }, {
                  name: 'To be Returned',
                  y: {{$ThisMonthReturn->count()}}
              }, {
                  name: 'Decommissioned',
                  y: {{$ThisMonthDecom->count()}}
,              }, {
                  name: 'Pending',
                  y: {{$ThisMonthPending->count()}}
              }]
            }]
          });
        </script>
        <!--Table select-->
        <script>
          $(document).ready(function(){
            $("#category-select5").on('change', function() {
                var category = $("#category-select5").val();
                switch (category) {
                    case "For Repair":
                        $("#inventoryTable").show();
                        $("#inventoryTable2, #inventoryTable3, #inventoryTable4").hide();
                        break;
                    case "To Be Returned":
                        $("#inventoryTable2").show();
                        $("#inventoryTable, #inventoryTable3, #inventoryTable4").hide();
                        break;
                    case "Decommissioned":
                        $("#inventoryTable3").show();
                        $("#inventoryTable, #inventoryTable2, #inventoryTable4").hide();
                        break;
                    case "Pending":
                        $("#inventoryTable4").show();
                        $("#inventoryTable, #inventoryTable2, #inventoryTable3").hide();
                        break;
                    case "All":
                        $("#inventoryTable, #inventoryTable2, #inventoryTable3, #inventoryTable4").show();
                        break;
                    default:
                }
            });
            $("#category-select6").on('change', function() {
                var category = $("#category-select6").val();
                switch (category) {
                    case "Items Added":
                        $("#add").show();
                        $("#edit, #delete").hide();
                        break;
                    case "Items Edited":
                        $("#edit").show();
                        $("#add, #delete").hide();
                        break;
                    case "Items Deleted":
                        $("#delete").show();
                        $("#add, #edit").hide();
                        break;
                    case "All2":
                        $("#add, #edit, #delete").show();
                        break;
                    default:
                }
            });
            $("#category-select7").on('change', function() {
                var category = $("#category-select7").val();
                switch (category) {
                    case "Computer Components":
                        $("#components").show();
                        $("#peripherals, #mobile").hide();
                        break;
                    case "Computer Peripherals":
                        $("#peripherals").show();
                        $("#components, #mobile").hide();
                        break;
                    case "Mobile Devices":
                        $("#mobile").show();
                        $("#components, #peripherals").hide();
                        break;
                    case "All3":
                        $("#components, #peripherals, #mobile").show();
                        break;
                    default:
                }
            });
            $("#category-select8").on('change', function() {
                var category = $("#category-select8").val();
                switch (category) {
                    case "Associates":
                        $("#associates").show();
                        $("#category-select9, #AdminAndAssociate, #users, #items, #associateIssuance, #approvedUsers").hide();
                        break;
                    case "Admin":
                        $("#category-select9").show();
                        $("#associates, #AdminAndAssociate, #users").hide();
                        break;
                    case "Admin and Associates":
                        $("#AdminAndAssociate").show();
                        $("#associates, #category-select9, #users, #items, #associateIssuance, #approvedUsers").hide();
                        break;
                    case "User":
                        $("#users").show();
                        $("#associates, #category-select9, #AdminAndAssociate, #items, #associateIssuance, #approvedUsers").hide();
                        break;
                    case "All4":
                        $("#associates, #AdminAndAssociate, #users, #category-select9, #items, #associateIssuance, #approvedUsers").show();
                        $("#category-select9").hide();
                        break;
                    default:
                }
            });
            $("#category-select9").on('change', function() {
                var category = $("#category-select9").val();
                switch (category) {
                    case "Items":
                        $("#items").show();
                        $("#associateIssuance, #approvedUsers").hide();
                        break;
                    case "Associate Issuance":
                        $("#associateIssuance").show();
                        $("#items, #approvedUsers").hide();
                        break;
                    case "Approved Users":
                        $("#approvedUsers").show();
                        $("#items, #associateIssuance").hide();
                        break;
                    case "All5":
                        $("#items, #associateIssuance, #approvedUsers").show();
                        $("#associates, #AdminAndAssociate, #users#users").hide();
                        break;
                    default:
                }
            });
          });
        </script>
        <!-- date -->
        <script>
          function ShowLocalDate(){
            var dNow = new Date();
            var localdate = 'Date:' + (dNow.getMonth()+1) + '/'
                            + dNow.getDate() + '/'
                            + dNow.getFullYear() + ' '
                            + dNow.getHours() + ':'
                            + dNow.getMinutes();
            $('.date').text(localdate)
          }
        </script>
        <!--Export sample-->
        <script type="text/javascript">
          $(document).ready(function() {
              var printCounter = 0;
              var title1 = '<h5 style="color: #555555; font-size: 25px; margin-left: 35%;">NEW MEDIA SERVICES</h5>';
                var title = 'NEW MEDIA SERVICES';

              $('#example').DataTable( {
                  "searching": false,
                  "paging": false,
                  "info": false,
                  "bSort": false,
                  dom: 'Bfrtip',
                  buttons: [
                      'copy',
                      {
                          extend: 'excel',
                          title: title1
                      },
                      {
                          extend: 'pdf',
                          title: title
                      },
                      {
                          extend: 'print',
                          title: title,
                          message: '<h5 style="color: #555555; font-size: 20px; margin-left: 30%;">Inventory Concerns Report as of January 2019</h5>',
                          messageTop: function () {
                              printCounter++;

                              if ( printCounter === 1 ) {
                                  return 'This is the first time you have printed this document.';
                              }
                              else {
                                  return 'You have printed this document '+printCounter+' times';
                              }
                          },
                      }
                  ]
              } );
          } );
        </script>
        <script>
          $(document).ready(function(){
          $('#report').addClass('active');
          });
        </script>

            <script type="text/javascript">
                $(document).ready(function () {
                    $('#sidebarCollapse').on('click', function () {
                        $('#sidebar').toggleClass('active');
                    });
                });
            </script>
            <script type="text/javascript">
      function printContent(el){
        var restorepage = $('body').html();
        var printcontent = $('#' + el).clone();
        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);
      }
    </script>

@stop
