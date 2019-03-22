@extends('../template')

@section('css')

@stop

@section('title')
    dashboard
@stop

@section('../layout/breadcrumbs')
    @section('breadcrumbs-title')
        <i class="fas fa-chart-line">Dashboard
    @stop
@stop

@section('content')
<div class="cards-component">
    <!-- first cards row -->
    <div class="row card-row">
        <div class="col col-sm-12 col-xs-12 col-lg-3">
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
        <div class="col col-lg-5 col-sm-12 col-xs-12">
            <div class="card">
                <!--Second card-->
                <div class="card-header text-white mb-3" id="card-header">Inventory Concerns</div>
                <div class="card-body">
                    <div class="row d-flex justify-content-center">
                        <div class="repaired">
                            <div class="box col">
                                <span class="fas fa-tools fa-lg">
                                </span>{{ $for_repair->count()}}<br>To be Repaired
                            </div>
                            <div class="col view">View Details</div>
                        </div>
                        <div class="disposed">
                            <div class="box col">
                                <span class="fas fa-trash-alt fa-lg">
                                </span>{{ $for_disposal->count()}}<br>To be Disposed
                            </div>
                            <div class="col view">View Details</div>
                        </div>
                        <div class="returned">
                            <div class="box col">
                                <span class="fas fa-undo-alt fa-lg">
                                </span>{{ $for_return->count()}}<br>To be Returned
                            </div>
                            <div class="col view">View Details</div>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-center">
                        <div class="col box2 d-flex justify-content-center">
                            50 Mac Desktop Computers <br>
                            4 BenQ Speakers<br>
                            27 ASUS Hard Drives
                        </div>
                        <div class="w-100"></div>
                        <button class="col view1 d-flex justify-content-center">View All</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col col-lg-4 col-sm-12 col-xs-12">
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
                                <td><button
                                        class="row view2 justify-content-center center-block">View
                                        All</button></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- second cards row -->
    <div class="row card-row">
        <div class="col col-lg-7 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header text-white mb-3" id="card-header">Employees Prone to
                    Destruction of Company Equipment</div>
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
        <!--Second-->
        <div class="col col-lg-5 col-sm-12 col-xs-12">
            <div class="row margin">
                <div class="return-equipment">
                    <div class="box col">
                        <span class="fas fa-desktop fa-2x"> </span>
                    </div>
                    <div class="col view">Equipment Due for Return</div>
                </div>
                <div class="col card background">
                    <table class="table table-borderless">
                        <tr>
                            <td>98721 Biday Manang , iPhoneX</td>
                        </tr>
                        <tr>
                            <td>98721 Biday Manang , iPhoneX</td>
                        </tr>
                    </table>
                    <button class="row view4 d-flex justify-content-center">View All</button>
                </div>
            </div>
            <div class="row margin">
                <div class="low-stock">
                    <div class="box col">
                        <span class="fas fa-arrow-alt-circle-down fa-2x"> </span>
                    </div>
                    <div class="col view">Low in Stock</div>
                </div>
                <div class="col card background">
                    <table class="table table-borderless">
                        <tr>
                            <td>Office Supplies , Markers, 2</td>
                        </tr>
                        <tr>
                            <td>Office Supplies , Markers, 2</td>
                        </tr>
                    </table>
                    <button class="row view5 d-flex justify-content-center">View All</button>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('script')


<script>
  $(document).ready(function(){
  $('#dashboard').addClass('active');
  });
</script>
@stop
