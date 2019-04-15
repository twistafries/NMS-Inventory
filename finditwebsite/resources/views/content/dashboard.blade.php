<?php
  use Carbon\Carbon;
  $session=Session::get('loggedIn');
  $user_id = $session['id'];
  $firstname = $session['firstname'];
  $lastname = $session['lastname'];
  // $img_path = $session['img_path'];
?>

@extends('../template')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
    <link rel="stylesheet"  href="{{ asset('css/custom.css') }}">
@stop


@section('title')
    dashboard
@stop


@section('content')

<div class="container p-lg-2 p-md-1 p-sm-0">
                    <div class="cards-component">
                        <div class="row card-row">
                            <div class="col col-sm-12 col-xs-12 col-lg-6">
                                <div class="card">
                                    <div class="card-header text-white mb-3" id="card-header">Most Issued Items</div>
                                    <table class="table table-borderless text-justify text-break">
                                        <tbody>
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
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col col-lg-6 col-sm-12 col-xs-12">
                                <div class="card inventory-concern">
                                    <!--Second card-->
                                    <div class="card-header text-white mb-4" id="card-header">Inventory Concerns</div>
                                    <div class="card-body">
                                        <div class="row d-flex justify-content-center m-4">
                                            <div class="repaired">
                                                <div class="box col">
                                                    <span class="fas fa-tools fa-lg">
                                                    </span>20<br>To be Repaired
                                                </div>
                                            </div>
                                            <div class="disposed">
                                                <div class="box col">
                                                    <span class="fas fa-trash-alt fa-lg">
                                                    </span>15<br>To be Disposed
                                                </div>
                                            </div>
                                            <div class="returned">
                                                <div class="box col">
                                                    <span class="fas fa-undo-alt fa-lg">
                                                    </span>200<br>To be Returned
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row card-row">
                            <div class="col col-lg-6 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="card-header text-white mb-3" id="card-header">Frequent Repair Request From</div>
                                    <div class="card-body">
                                        <table class="table table-borderless overflow-auto">
                                            <tbody>
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
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-lg-6 col-sm-12 col-xs-12">
                                <div class="card">
                                    <!--Third card-->
                                    <div class="card-header text-white mb-3" id="card-header">Recent Associate Activity
                                    </div>
                                    <div class="card-body height">
                                        <table class="table table-borderless third-card">
                                            <tbody>
                                                <tr>
                                                    <td>Chris issued item PC002 to jane a few minutes ago</td>
                                                </tr>
                                                <tr>
                                                    <td>Chris added associate John 10 hours ago</td>
                                                </tr>
                                                <tr>
                                                    <td>Chris issued item PC001 to John 5 minutes ago</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td><button class="row view2 justify-content-center center-block">View
                                                            All</button></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>



                            <div class="row card-row mx-auto">
                                <div class="col col-lg-4 col-sm-12 col-xs-12">
                                    <div class="card">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h3 class="card-title"> <span class="fas fa-desktop fa-2x">  </span> Equipment Due for Return</h3>
                                                <table class="table table-borderless table-sm text-justify text-break">
                                                    <tr>
                                                        <td><p>98721 Biday Manang , iPhoneX</p></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p>98721 Biday Manang , iPhoneX</p></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p>98721 Biday Manang , iPhoneX</p></td>
                                                    </tr>
                                                </table>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col col-lg-4 col-sm-12 col-xs-12">
                                    <div class="card">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h3 class="card-title"><span class="fas fa-arrow-alt-circle-down fa-2x"> </span> Low in Stock</h3>
                                                <table class="table table-borderless table-sm text-justify text-break">
                                                    <tr>
                                                        <td><p>item1</p></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p>item2</p></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p>item3</p></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col col-lg-4 col-sm-12 col-xs-12 ">
                                    <div class="card">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h3 class="card-title"> <span class="fas fa-tasks fa-2x">  </span> Pending Equipment</h3>
                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                            </div>
                                        </div>

                                    </div>
                                </div>
								<!-- <div class="col col-lg-3 col-sm-12 col-xs-12 "> -->
                                    <!-- <div class="card"> -->
                                        <!-- <div class="card h-100"> -->
                                            <!-- <div class="card-body"> -->
                                                <!-- <h3 class="card-title"> <span class="fas fa-tasks fa-2x">  </span> Pending Equipment</h3> -->
                                                <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                                                <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                                                <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->

                                            <!-- </div> -->
                                        <!-- </div> -->

                                    <!-- </div> -->
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
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
  $('#dashboard').addClass('active');
  });
</script>
@stop
