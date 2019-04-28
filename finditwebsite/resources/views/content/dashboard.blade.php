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


    <style>


    </style>
    <div class="container p-lg-2 p-md-1 p-sm-0">
        <div class="cards-component">

            <!-- Inventory Concerns Row  -->
            <div class="row card-row">

                <!-- To be Returned -->
                <div class="col-md">
                    <div class="card">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-6">
                                    <div class="icon-big text-center" style="font-size: 3em;min-height:64px;">
                                        <i class="fas fa-exchange-alt rounded-circle" style="border-style: solid;border-color:#4caf50;  border-width:.80rem; background-color:#4caf50"></i>
                                    </div>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <div class="numbers">
                                        <p class="">To be Returned</p>
                                        <h3 class="font-weight-bold">{{$for_return->count()}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- To be Repaired Card -->
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="icon-big text-center" style="font-size: 3em;min-height: 64px;">
                                        <i class="fas fa-tools rounded-circle bg-warning" style=" border-style: solid;border-color: #ffbb33;  border-width: .80rem"></i>
                                    </div>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <div class="numbers">
                                        <p class="">To be Repaired</p>
                                        <h3 class="font-weight-bold">{{$for_repair->count()}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Decommissioned Card -->
                <div class="col-md">
                    <div class="card pb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="icon-big text-center" style="font-size: 3em;min-height: 64px;">
                                        <i class="fas fa-trash-alt rounded-circle " style=" border-style: solid;border-color: #9e9e9e;  border-width: .80rem;border-height:12px;background-color:#9e9e9e;"></i>
                                    </div>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <div class="numbers">
                                        <p class="" style="font-size:9px;">Decommissioned</p>

                                        <h3 class="font-weight-bold">{{$decommissioned->count()}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Low in Stock Card -->
                <div class="col-md">
                    <div class="card pb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="icon-big text-center" style="font-size: 3em;min-height: 64px;">

                                        <i class="fas fa-users fa-s rounded-circle" ></i>

                                        <!--<img class="tool-item" src="{{ asset('assets/icons/dashboard-icons/low-in-stock.png') }}" style="height:4rem; width:4rem; margin:5px; ">-->
                                    </div>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <div class="numbers">
                                        <p class="">Employees</p>
                                        <h3 class="font-weight-bold">{{$employees->count()}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- On Hand Card -->
                <div class="col-md">
                    <div class="card pb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="icon-big text-center" style="font-size: 3em;min-height: 64px;">

                                        <i class="fas fa-boxes rounded-circle" ></i>

                                        <!--<img class="tool-item" src="{{ asset('assets/icons/dashboard-icons/low-in-stock.png') }}" style="height:4rem; width:4rem; margin:5px; ">-->
                                    </div>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <div class="numbers">
                                        <p class="">On Hand</p>
                                        <h3 class="font-weight-bold">{{$equipment->count() + $system_units->count()}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>


        <div class="row card-row ">
            <div class="col-8">

                <div class="row">
                    <div class="col">

                        <div class="card">
                            <div class="card-header text-white mb-3" id="card-header"><i class="far fa-arrow-alt-circle-down"></i>
                                Low in Stock</div>



									<div class="card-body">
										<div class="progress-card">
                      @if($lowStackView->count()!=0)
											<div class="d-flex justify-content-between mb-1">
												<span class="text-muted">Equipment Subtype:</span>
												<span class="text-muted fw-bold">Available Quantity:</span>
											</div>
                      @endif
											<div class="progress mb-2" style="height: 7px;">
<!--                                        <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="" data-original-title="65%"></div>-->

											</div>
										</div>
                    @if($lowStackView->count()==0)
                    <div class="progress-card">
											<div class="d-flex justify-content-between mb-1">
                        <span class="text-muted">Good! No notable issues.</span>
                        </div>
                      </div>
                    @endif
                    @foreach($lowStackView as $lowStackView)
										<div class="progress-card">
											<div class="d-flex justify-content-between mb-1">
												<span class="text-muted">{{$lowStackView->name}}</span>
												<span class="text-muted fw-bold">{{$lowStackView->available}}</span>
											</div>
											<div class="progress mb-2" style="height: 7px;">

											</div>
										</div>
                    @endforeach

									</div>




                            <div class="card card-stats p-3">
                                <div class="card-body">
                                    <!--<p class="fw-bold mt-1">Statistic</p>-->
<!--
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center icon-warning">
                                                <i class="fas fa-people-carry fa-3x"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex align-items-center">
                                            <div class="numbers">
                                                <p class="card-category">On Hand</p>
                                                <h4 class="card-title">250</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="fas fa-users fa-3x"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex align-items-center">
                                            <div class="numbers">
                                                <p class="card-category">Employees</p>
                                                <h4 class="card-title">400</h4>
                                            </div>
                                        </div>
                                    </div>
-->
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col">


                        <div class="card">
                            <div class="card-header text-white mb-3" id="card-header">Most Issued Items</div>
                            <table class="table table-borderless text-justify text-break">
                                <tbody>
                                    <th>Equipment</th>
                                    <th>Status</th>
                                    <th>Quantity</th>
                                    <tr>
                                        <td>Computer Units</td>
                                        <td class="text-justify">Available</td>
                                        <td>15</td>
                                    </tr>
                                    <tr>
                                        <td>Mouse</td>
                                        <td>Available</td>
                                        <td>25</td>
                                    </tr>
                                    <tr>
                                        <td>iPhone</td>
                                        <td>Available</td>
                                        <td>15</td>
                                    </tr>
                                    <tr>
                                        <td>Mac Book Air</td>
                                        <td>Available</td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <td>Monitor</td>
                                        <td>Available</td>
                                        <td>10</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col pt-3">
                        <div class="card">
                            <div class="card-header text-white mb-3" id="card-header">Frequent Repair Request From</div>
                            <table class="table table-borderless text-justify text-break ">
                                <tbody>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Equipment Destroyed</th>

                                    <tr>
                                        <td>Employee 1</td>
                                        <td>Available:</td>
                                        <td>150</td>
                                    </tr>
                                    <tr>
                                        <td>Employee 2</td>
                                        <td>Available:</td>
                                        <td>25</td>
                                    </tr>
                                    <tr>
                                        <td>Employee 3</td>
                                        <td>Available:</td>
                                        <td>25</td>
                                    </tr>
                                    <tr>
                                        <td>Employee 4</td>
                                        <td>Available:</td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <td>Employee 5</td>
                                        <td>Available:</td>
                                        <td>12</td>
                                    </tr>


                                </tbody>
                            </table>


                        </div>



                    </div>

                </div>
            </div>
            <div class="col-4 ">


                <div class="card">
                    <!--Third card-->
                    <div class="card-header text-white mb-3" id="card-header">Recent Associate Activity
                    </div>
                    <div class="card-body height">
                        <table class="table table-borderless table-responsive">
                            <tbody>
                              @foreach ($recent_activities as $recent_activities)
                                <tr>
                                    <td>{{$recent_activities->firstname}} {{$recent_activities->lastname}} {{$recent_activities->action}} {{$recent_activities->efname}} {{$recent_activities->elname}} {{$recent_activities->model}} {{$recent_activities->brand}}
                                      {{$recent_activities->unit_description}} {{$recent_activities->unit}} {{$recent_activities->userfname}} {{$recent_activities->userlname}} {{$recent_activities->dept_name}} {{$recent_activities->status_name}} {{$recent_activities->subtype_name}} {{$recent_activities->type_name}}
                              @if($recent_activities->action=="issued")
                                  @foreach($issuance as $issuance)
                                      @if($recent_activities->issuance_id == $issuance->id)
                                        {{$issuance->brand}} {{$issuance->model}} {{$issuance->unit_name}} to {{$issuance->givenname}} {{$issuance->surname}}
                                      @endif
                                  @endforeach
                              @endif
                              @if($recent_activities->action=="changed the status of")

                              @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><button class="row view2 justify-content-center center-block btn btn-light">View All</button></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

<!--        modals-->



    </div>
    </div>
    </div>
    </div>
    </div>
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
            $('#dashboard').addClass('active');
        });

    </script>
    @stop
