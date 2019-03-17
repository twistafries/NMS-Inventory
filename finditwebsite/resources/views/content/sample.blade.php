@extends('layout/template')

@section('css')

@stop

@section('title')
    Sample Page
@stop

@section('content')
<div class="cards-component">
    <!-- first card -->
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
                                </span>20<br>To be Repaired
                            </div>
                            <div class="col view">View Details</div>
                        </div>
                        <div class="disposed">
                            <div class="box col">
                                <span class="fas fa-trash-alt fa-lg">
                                </span>15<br>To be Disposed
                            </div>
                            <div class="col view">View Details</div>
                        </div>
                        <div class="returned">
                            <div class="box col">
                                <span class="fas fa-undo-alt fa-lg">
                                </span>200<br>To be Returned
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
</div>
@stop