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
<link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">

<!-- jquery validation -->
<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">

<!-- jquery editable dropdown plugin -->

<link href="https://rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.css"
    rel="stylesheet">

<link rel="stylesheet" href="{{ asset('css/custom.css')}}">
@stop

@section('title')
Inventory-Temp Add
@stop

@section('../layout/breadcrumbs')
@section('breadcrumbs-title')
<i class="fas fa-chart-line">Bulk Add Equipment
    @stop
    @stop

    @section('content')
    <div class="text-right build">
        <button id="buttons1" type="button" class="btn btn-secondary p-2 px-3 my-1 text-uppercase text-lg-center">
            <span class="fas fa-desktop" style="padding-right: 5px"></span>Build A Pc</button>
        <button id="buttons1" type="button" class="btn btn-info p-2 px-3 my-1 text-uppercase text-lg-center">
            <span class="fas fa-file-csv" style="padding-right: 5px"></span>Import CSV</button>
    </div>
    <div class="card bulk" id="inputType1">
        <div class="card-body">
            <div class="row">
                <div class="col col-lg-3 col-md col-sm col-xs">
                    <p class="card-title">Category</p>
                    <select id="category-select" class="custom-select">
                        <option id="initial-category-value">Category</option>
                        <option class="option" value="Computer Peripherals">Computer Peripherals</option>
                        <option class="option" value="Mobile Devices">Mobile Devices</option>
                        <option class="option" value="3">Option 3</option>
                        <option class="option" value="4">Option 4</option>
                    </select>
                </div>
                <div class="col col-lg-6 col-md col-sm col-xs">
                    <p class="card-title">Quantity</p>
                    <select id="quantity-select" class="custom-select">
                        <option></option>
                        <option class="option" value="10">10</option>
                        <option class="option" value="20">20</option>
                        <option class="option" value="30">30</option>
                        <option class="option" value="40">40</option>
                        <option class="option" value="50">50</option>
                        <option class="option" value="60">60</option>
                        <option class="option" value="70">70</option>
                        <option class="option" value="80">80</option>
                        <option class="option" value="90">90</option>
                        <option class="option" value="100">100</option>
                    </select>
                </div>
            </div>
            <div class="card add">
                <div class="row">
                    <div class="col col-lg-11 col-md-11 col-sm-11 col-xs">
                        <p class="card-title">Row Values</p>
                    </div>
                </div>
                <div class="card add collapse" id="computer-peripheral">
                    <form id="myform">
                        <div class="row">
                            <div class="col col-lg-4 col-md col-sm col-xs">
                                <p class="card-title">Offcial Receipt Number</p>
                                <div class="form-group">
                                    <input id="official-receipt-number" name="field" type="text">
                                    <button id="lock-unlock-button" onclick="lock()"><span id="lock-unlock"
                                            class="fas fa-lock-open"></span></button>
                                </div>
                            </div>
                            <div class="col col-lg-4 col-md col-sm col-xs">
                                <p class="card-title">Status</p>
                                <div class="form-group">
                                    <select id="status" class="exampleFormControlSelect1" name="status">
                                        <option></option>
                                        <option value="In Stock">In Stock</option>
                                        <option value="Repair">Repair</option>
                                        <option value="Return">Return</option>
                                    </select>
                                    <button id="lock-unlock-button2" onclick="lock2()"><span id="lock-unlock2"
                                            class="fas fa-lock-open"></span></button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-lg-4 col-md col-sm col-xs">
                                <p class="card-title">Type</p>
                                <div class="form-group">
                                    <select id="monitor" class="exampleFormControlSelect1" name="type">
                                        <option></option>
                                        <option value="Monitor">Monitor</option>
                                        <option value="Mouse">Mouse</option>
                                        <option value="Keyboard">Keyboard</option>
                                        <option value="Printer">Printer</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-lg-4 col-md col-sm col-xs">
                                <p class="card-title">Brand</p>
                                <div class="form-group">
                                    <select id="brand" class="exampleFormControlSelect1" name="brand">
                                        <option></option>
                                        <option value="BenQ">BenQ</option>
                                        <option value="HP">HP</option>
                                        <option value="Dell">Dell</option>
                                        <option value="ASUS">ASUS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col col-lg-4 col-md col-sm col-xs">
                                <p class="card-title">Model</p>
                                <div class="form-group">
                                    <select id="model" class="exampleFormControlSelect1" name="model">
                                        <option></option>
                                        <option value="IR-98263">IR-98263</option>
                                        <option value="LG Flatron W3261VG">LG Flatron W3261VG</option>
                                        <option value="HPEESVPRE">HPEESVPRE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col col-lg-4 col-md col-sm col-xs">
                                <p class="card-title">Screen Resolution</p>
                                <div class="form-group">
                                    <select id="screen-resolution" class="exampleFormControlSelect1" name="resolution">
                                        <option></option>
                                        <option value="1280x720">1280x720</option>
                                        <option value="1920x1080">1920x1080</option>
                                        <option value="1024x768">1024x768</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-danger b" id="buttons">Clear Data</button>
                            <button id="comp-per-add-button" type="submit" class="btn btn-success b add-button">Add
                                Item</button>
                        </div>
                    </form>
                </div>

                <!--Mobile Devices-->
                <div class="card add collapse" id="mobile-device">
                    <form id="myform2">
                        <div class="row">
                            <div class="col col-lg-4 col-md col-sm col-xs">
                                <p class="card-title">Offcial Receipt Number</p>
                                <div class="form-group">
                                    <input id="text" type="text" name="or">
                                    <button id="lock-unlock-button" onclick="lock()"><span id="lock-unlock"
                                            class="fas fa-lock-open"></span></button>
                                </div>
                            </div>
                            <div class="col col-lg-4 col-md col-sm col-xs">
                                <p class="card-title">Status</p>
                                <div class="form-group">
                                    <select class="exampleFormControlSelect1" id="status2" name="status">
                                        <option></option>
                                        <option value="In Stock">In Stock</option>
                                        <option value="Repair">Repair</option>
                                        <option value="Return">Return</option>
                                    </select>
                                    <button id="lock-unlock-button2" onclick="lock2()"><span id="lock-unlock2"
                                            class="fas fa-lock-open"></span></button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-lg-4 col-md col-sm col-xs">
                                <p class="card-title">Initial Serial Number</p>
                                <div class="form-group">
                                    <input id="serial-number" name="serial">
                                </div>
                            </div>
                            <div class="col col-lg-4 col-md col-sm col-xs">
                                <p class="card-title">Type</p>
                                <div class="form-group">
                                    <select class="exampleFormControlSelect1" id="monitor2" name="type">
                                        <option></option>
                                        <option value="Phone">Phone</option>
                                        <option value="Tablet">Tablet</option>
                                        <option value="iPad">iPad</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-lg-4 col-md col-sm col-xs">
                                <p class="card-title">OS</p>
                                <div class="form-group">
                                    <select class="exampleFormControlSelect1" name="os" id="os">
                                        <option></option>
                                        <option value="Android Marshmallow">Android Marshmallow</option>
                                        <option value="iOS">iOS</option>
                                        <option value="webOS">webOS</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-lg-4 col-md col-sm col-xs">
                                <p class="card-title">Brand</p>
                                <div class="form-group">
                                    <select class="exampleFormControlSelect1" id="brand2" name="brand">
                                        <option></option>
                                        <option value="Samsung">Samsung</option>
                                        <option value="Nokia">Nokia</option>
                                        <option value="Apple">Apple</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col col-lg-4 col-md col-sm col-xs">
                                <p class="card-title">Model</p>
                                <div class="form-group">
                                    <select class="exampleFormControlSelect1" id="model2" name="model">
                                        <option></option>
                                        <option value="Samsung Galaxy J3 Pro">Samsung Galaxy J3 Pro</option>
                                        <option value="Nokia 7 plus">Nokia 7 plus</option>
                                        <option value="iPhone 8 plus">iPhone 8 plus</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-lg-4 col-md col-sm col-xs">
                                <p class="card-title">Processor</p>
                                <div class="form-group">
                                    <input id="processor" type="text" name="processor">
                                </div>
                            </div>
                            <div class="col col-lg-4 col-md col-sm col-xs">
                                <p class="card-title">RAM</p>
                                <div class="form-group">
                                    <input id="ram" type="text" name="ram">
                                </div>
                            </div>
                            <div class="col col-lg-4 col-md col-sm col-xs">
                                <p class="card-title">Internal Storage</p>
                                <div class="form-group">
                                    <input id="internal-storage" type="text" name="storage">
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-danger b" id="buttons">Clear Data</button>
                            <button id="mob-dev-add-button" type="submit" class="btn btn-success b add-button">Add
                                Item</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card bulk add panel-collapse collapse show" id="cp">
        <div class="card-body">
            <div class="row">
                <div class="col col-11">
                    <p class="card-title">Computer Peripheral</p>
                </div>
                <div class="col col-1 text-right">
                    <span class="fas fa-minus btn btn-danger" data-toggle="collapse" data-target="#cp"></span>
                </div>
            </div>
            <hr style="border: 1px solid #ffbb33;">
            <div class="row">
                <div class="col col-lg-4">
                    <table class="table table-borderless third-card">
                        <tbody>
                            <tr>
                                <td>Type:</td>
                                <td id="type-comp-per"></td>
                            </tr>
                            <tr>
                                <td>Status:</td>
                                <td id="status-comp-per"></td>
                            </tr>
                            <tr>
                                <td>Serial Number:</td>
                                <td>Missing Data</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col col-lg-4">
                </div>
                <div class="col col-lg-4">
                    <table class="table table-borderless third-card">
                        <tbody>
                            <tr>
                                <td>Brand:</td>
                                <td id="brand-comp-per"></td>
                            </tr>
                            <tr>
                                <td>Model:</td>
                                <td id="model-comp-per"></td>
                            </tr>
                            <tr>
                                <td>Screen Resolution:</td>
                                <td id="screen-res-comp-per"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="text-right">
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#demo1"
                    aria-haspopup="true" aria-expanded="false">Display Table</button>
            </div>
            <div class="card add collapse" id="demo1">
                <div class="card-body">
                    <div class="d-flex flex-row-reverse">
                        <button id="buttons2" type="button" class="btn btn-success p-2 text-lg-center">Save
                            Changes</button>
                        <button id="buttons2" type="button" class="btn btn-secondary p-2"> <span
                                class="fas fa-redo-alt"></span></button>
                        <button id="buttons2" type="button" class="btn btn-secondary p-2"> <span
                                class="fas fa-undo-alt"></span></button>
                    </div>
                    <table id="comp-per-edit-table" class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Serial Number</th>
                                <th scope="col">Type</th>
                                <th scope="col">Category</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Model</th>
                                <th scope="col">Specs</th>
                            </tr>
                        </thead>
                        <tbody id="comp-per-table-body">
                        </tbody>
                    </table>
                    <div class="text-right">
                        <button type="button" class="btn btn-danger b" id="buttons">Cancel</button>
                        <button type="button" class="btn b save" id="buttons">Save All</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Mobile devices summary-->
    <div class="card bulk add panel-collapse collapse show" id="md">
        <div class="card-body">
            <div class="row">
                <div class="col col-11">
                    <p class="card-title">Mobile Device</p>
                </div>
                <div class="col col-1 text-right">
                    <span class="fas fa-minus btn btn-danger" data-toggle="collapse" data-target="#md"></span>
                </div>
            </div>
            <hr style="border: 1px solid #ffbb33;">
            <div class="row">
                <div class="col col-lg-4">
                    <table class="table table-borderless third-card">
                        <tbody>
                            <tr>
                                <td>Type:</td>
                                <td id="type-comp-per"></td>
                            </tr>
                            <tr>
                                <td>Status:</td>
                                <td id="status-comp-per"></td>
                            </tr>
                            <tr>
                                <td>Serial Number:</td>
                                <td>Missing Data</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col col-lg-4">
                </div>
                <div class="col col-lg-4">
                    <table class="table table-borderless third-card">
                        <tbody>
                            <tr>
                                <td>Brand:</td>
                                <td id="brand-comp-per"></td>
                            </tr>
                            <tr>
                                <td>Model:</td>
                                <td id="model-comp-per"></td>
                            </tr>
                            <tr>
                                <td>Screen Resolution:</td>
                                <td id="screen-res-comp-per"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="text-right">
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#demo3"
                    aria-haspopup="true" aria-expanded="false">Display Table</button>
            </div>
            <div class="card add collapse" id="demo3">
                <div class="card-body">
                    <div class="d-flex flex-row-reverse">
                        <button id="buttons2" type="button" class="btn btn-success p-2 text-lg-center">Save
                            Changes</button>
                        <button id="buttons2" type="button" class="btn btn-secondary p-2"> <span
                                class="fas fa-redo-alt"></span></button>
                        <button id="buttons2" type="button" class="btn btn-secondary p-2"> <span
                                class="fas fa-undo-alt"></span></button>
                    </div>
                    <table id="mob-dev-edit-table" class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Serial Number</th>
                                <th scope="col">Type</th>
                                <th scope="col">Category</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Model</th>
                                <th scope="col">Specs</th>
                            </tr>
                        </thead>
                        <tbody id="#mob-dev-table-body">
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col col-3">
                            <p>Selected Items:</p>
                            <p>Showing 10 out of 50 items</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-danger b" id="buttons">Cancel</button>
                        <button type="button" class="btn b save" id="buttons">Save All</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @stop
    @section('script')
    <!--JQuery form validation plugin-->
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <!--JQuery editable table plugin-->
    <script
        src="https://rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.js"></script>
    <script type="text/javascript" src="../lib/dist/popper/popper.min.js"></script>
    <!-- Bootstrap -->
    <script type="text/javascript" src="{{ asset('js/bootstrap/bootstrap.js') }}"></script>
    
    <!--Custom-->
    <script type="text/javascript" src="{{ asset('js/custom-Mehanie.js') }}"></script>
    <script type="text/javascript" src="../lib/custom/js/custom-Mehanie.js"></script>


    <script>
        $(document).ready(function () {
            $('#inventory').addClass('active');
        });
    </script>