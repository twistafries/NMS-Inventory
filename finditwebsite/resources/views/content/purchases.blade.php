<?php
//   use Carbon\Carbon;
//   $session=Session::get('loggedIn');
//   $user_id = $session['id'];
//   $fname = $session['fname'];
//   $lname = $session['lname'];
//   // $img_path = $session['img_path'];
?>

@extends('../template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
    <link rel="stylesheet"  href="{{ asset('css/custom.css') }}">

@stop

@section('title')
    purchases
@stop

@section('../layout/breadcrumbs')
    @section('breadcrumbs-title')

    @stop
@stop

@section('content')
<div class="container">
  <!-- <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand mb-0 h1">PURCHASES</span>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb arr-right">
                <li class="breadcrumb-item ">
                        <a href="{!! url('/purchaseHistory') !!}"  class="text-dark active" aria-current="page">History</a>
                    </li>
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/purchasenumber') !!}" class="text-warning">Purchase Number</a>
                    </li>
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/ornumber') !!}" class="text-warning">OR Number</a>
                    </li>
                </ol>
            </nav>
    </nav> -->

<form action="" id="form1">
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
                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
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

    <!-- tabs -->
    <div class="container" style="margin-bottom: 3rem;">
        <div class="row">
            <div class="container">
              <ul class="nav nav-pills nav-justified">
                <li class="nav-item">
                  <a class="nav-link active" href="{!! url('/purchases') !!}">Purchases</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{!! url('/incompleteOrders') !!}">Incomplete Orders</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{!! url('/returns') !!}">Returns</a>
                </li>
              </ul>
            </div>
        </div>
    </div>


<!--Filter-->
  <div class="card" style="margin-top: 1rem; margin-bottom: 1rem; padding-top: 1.5rem; padding-bottom: 10px;">
    <table style="margin: auto;width: 100%; text-align: right; ">
      <thead>
        <tr>
          <th>
            <label for="types" id="labelTypes">Types: </label>
            <select id="types" name="types" style="width: 10rem; height: 1.8rem;">
              <option value="any">Any</option>
              @foreach ($typesSel as $typesSel)
              <option value="{{$typesSel->name}}">{{$typesSel->name}}</option>
              @endforeach
            </select>
          </th>
          <th>
            <label for="subtypes">Subtype: </label>
            <select id="subtypes" name="subtypes" style="height: 1.8rem;">
              <option value="any">Any</option>
              @foreach ($subtypesSel as $subtypesSel)
              <option value="{{$subtypesSel->name}}">{{$subtypesSel->name}}</option>
              @endforeach
            </select>
        </th>
        <th>
          <label for="supplier">Supplier: </label>
          <select id="supplier" name="supplier" style="height: 1.8rem;">
            <option value="any">Any</option>
            @foreach ($suppliers as $suppliers)
            <option value="{{$suppliers->supplier_name}}">{{$suppliers->supplier_name}}</option>
            @endforeach
          </select>
      </th>
      <th>
        <label for="brand">Brand: </label>
        <select id="brand" name="brand" style="height: 1.8rem;">
          <option value="any">Any</option>
          @foreach ($brands as $brands)
          <option value="{{$brands->brand}}">{{$brands->brand}}</option>
          @endforeach
        </select>
      </th>
      <th>
        <label for="status">Status: </label>
        <select id="status" name="status" style="height: 1.8rem;">
          <option value="any">Any</option>
          @foreach ($status as $status)
          <option value="{{$status->name}}">{{$status->name}}</option>
          @endforeach
        </select>
      </th>
      <th></th><th></th>
        <th>
          <button class="btn btn-secondary text-uppercase p-2 btn-sm" type="button" onclick="reset()" style="margin-right: 5px;">Reset</button>
      </th>
      </thead>
      <tr height="10px"></tr>
    </table>
  </div>

    <!--Tab Content-->
    <div class="text-right">
      <button type="button" id="" class="btn btn-info p-2 text-uppercase" style="margin-top: 1rem;" data-toggle="modal" data-target="#purchasesmodal">
        <span class="fas fa-plus-circle" style="padding-right: 5px"></span>New Purchase
      </button>
    </div>

      <div class="navbar" id="purchase" data-toggle="collapse" data-target="#pills-tabContent" aria-expanded="false" aria-controls="collapseExample" style="margin-top: 1rem; background: rgba(0,0,0,0.3); color: white; cursor: pointer; height: 45px;">
          <div class="fas fa-angle-right" style="font-size: 16px;"><span style="margin-left: 1rem; fnt-family: sans-serif;">PURCHASE 1</span></div>
          <div class="" style="font-size: 16px;">Date: 5/29/2019</div>
      </div>

      <!-- purchases modal -->
      <div class="modal fade bd-example-modal-lg" id="purchasesmodal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" style="">
          <div class="modal-dialog modal-xxl" role="document" style=" width: 1000px;">
              <div class="modal-content">
                  <div class="modal-header">
                      <div class="container">
                          <h5>Add Purchase</h5>
                      </div>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>

                  <div class="modal-body">
                    <button type="button" id="addMorePurchase" onclick='add()' class="btn btn-info p-2 text-uppercase" data-toggle="" data-target="#addpurchase" aria-expanded="false" aria-controls="" style="margin-bottom: 1rem;">
                      <span class="fas fa-plus-circle" style="padding-right: 5px"></span>Add More
                    </button>
                    <button type="button" class="btn btn-info p-2 text-uppercase" data-toggle="modal" data-target="#systemUnit" style="margin-bottom: 1rem;">
                      <span class="fas fa-plus-circle" style="padding-right: 5px"></span>Add PC
                    </button>
                      <div class="container-fluid" style="background: #d3d3d3; margin-bottom: 2rem; padding-top: 1rem; padding-bottom: 1rem;">
                          <div class="row">
                                <div class="input-group col-2" style="margin-top: 1rem;">
                                  <div class="">
                                    <p class="card-title text-dark" style="font-size: 14px;">Brand:</p>
                                    <input name="model" type="text" size="25" style="height: 2rem; width:9rem;">
                                  </div>
                                </div>

                                <div class="input-group col-2" style="margin-top: 1rem;">
                                  <div class="">
                                    <p class="card-title text-dark" style="font-size: 14px;">Model:</p>
                                    <input name="model" type="text" size="25" style="height: 2rem; width:9rem;">
                                  </div>
                                </div>

                                <div class="input-group col-3" style="margin-top: 1rem;">
                                  <div class="">
                                    <p class="card-title text-dark" style="font-size: 14px;">Details:</p>
                                    <textarea name="model" type="text" size="25" style="height: 4rem; width: 14rem;"></textarea>
                                  </div>
                                </div>
                                <div class="input-group col-2" style="margin-top: 1rem; margin-bottom: 2rem;">
                                  <div class="">
                                    <p class="card-title text-dark" style="font-size: 14px;">Subtype:</p>
                                    <!-- <input name="model" type="text" size="25" style="height: 2rem; width:9rem;"> -->
                                    <select id="subtypes" name="subtypes" style="width: 9rem; height:2rem;">
                                      <option value="">Hardware</option>
                                      <option value="">Software</option>
                                    </select>
                                  </div>
                                </div>

                                <div class="input-group col-2" style="margin-top: 1rem; margin-bottom: 2rem;">
                                  <div class="">
                                    <p class="card-title text-dark" style="font-size: 14px;">Supplier:</p>
                                    <input name="model" type="text" size="25" style="height: 2rem; width:9rem;">
                                  </div>
                                </div>

                                <div class="input-group col-1" style="margin-top: 1rem; margin-bottom: 2rem;">
                                  <div class="">
                                    <p class="card-title text-dark" style="font-size: 14px;">Quantity:</p>
                                    <input name="model" type="text" size="25" style="height: 2rem; width:3rem;">
                                    <!-- <select class="custom-select" id="subtypes" name="subtypes" style="width: 9rem; height:2rem;">
                                      <option value="" size="25">1</option>
                                      <option value="" size="25">2</option>
                                    </select> -->
                                  </div>
                                </div>
                            </div>
                      </div>
                  </div>

                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary text-uppercase">ADD</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
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
                      <form id="addSystemUnitForm" action="{!! url('/'); !!}" enctype="multipart/form-data" method="post" role="form">
                          <div class="row">
                              <div class="col-sm">

                                  <table class="table table-borderless table-striped table-hover table-responsive table-condensed" style="width:100%; ">
                                      <thead>
                                          <tr>
                                              <th>PC Description</th>
                                              <th>Supplier</th>
                                          </tr>
                                      </thead>

                                      <tbody>
                                          <tr>
                                              <td> <input type="text" name=""></td>
                                              <td><input type="text" name=""><br></td>
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
                                              <th>Details</th>
                                          </tr>
                                      </thead>

                                      <tbody>
                                          <tr>
                                              <td>Motherboard <input type="text" name="" value="1" hidden></td>
                                              <td> <input type="text" name="" required></td>
                                              <td> <input type="text" name="" required></td>
                                              <td><textarea name="" rows="2" cols="22"></textarea></td>
                                          </tr>

                                          <tr>
                                              <td>CPU<input type="text" name="" value="2" hidden></td>
                                              <td> <input type="text" name="" required></td>
                                              <td> <input type="text" name="" required></td>
                                              <td><textarea name="" rows="2" cols="22"></textarea></td>
                                          </tr>

                                          <tr>
                                              <td>Storage<input type="text" name="" value="3" hidden></td>
                                              <td> <input type="text" name="" required></td>
                                              <td> <input type="text" name="" required></td>
                                              <td><textarea name="" rows="2" cols="22"></textarea></td>

                                          <tr>
                                              <td>RAM<input type="text" name="" value="4" hidden></td>
                                              <td> <input type="text" name="" required></td>
                                              <td> <input type="text" name="" required></td>
                                              <td><textarea name="" rows="2" cols="22"></textarea></td>
                                          </tr>

                                          <tr>
                                              <td>GPU<input type="text" name="" value="5" hidden></td>
                                              <td> <input type="text" name="" required></td>
                                              <td> <input type="text" name="" required></td>
                                              <td><textarea name="" rows="2" cols="22"></textarea></td>
                                          </tr>

                                          <tr>
                                              <td>Case<input type="text" name="" value="7" hidden></td>
                                              <td> <input type="text" name="" required></td>
                                              <td> <input type="text" name="" required></td>
                                              <td><textarea name="" rows="2" cols="22"></textarea></td>
                                          </tr>

                                          <tr>
                                              <td>Heat Sink Fan<input type="text" name="" value="8" hidden></td>
                                              <td> <input type="text" name=""></td>
                                              <td> <input type="text" name=""></td>
                                              <td><textarea name="" rows="2" cols="22"></textarea></td>
                                          </tr>

                                          <tr>
                                              <td>Sound Card<input type="text" name="" value="18" hidden></td>
                                              <td> <input type="text" name=""></td>
                                              <td> <input type="text" name=""></td>
                                              <td><textarea name="" rows="2" cols="22"></textarea></td>
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

    <div class="tab-content collapse" id="purchaseTable">
      <div class="tab-pane fade show active" id="pills-0" role="tabpanel" aria-labelledby="pills-0-tab">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Brand</th>
              <th scope="col">Model</th>
              <th scope="col">Details</th>
              <th scope="col">Subtype</th>
              <th scope="col">Supplier</th>
              <th scope="col">Qty</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>ASUS</th>
              <td></td>
              <td>Computer Computer</td>
              <td>Hardware</td>
              <td>Keyboard</td>
              <td>10</td>
              <td class="text-right">
                <button type="button" id="" class="btn btn-info p-2">
                  <span class="fas fa-plus-circle" style="padding-right: 5px"></span>Add to inventory
                </button>
              </td>
            </tr>
            <tr>
              <th>Logitech</th>
              <td></td>
              <td>Computer Peripherals</td>
              <td>Hardware</td>
              <td>Mouse</td>
              <td>10</td>
              <td class="text-right">
                <button type="button" id="" class="btn btn-info p-2">
                  <span class="fas fa-plus-circle" style="padding-right: 5px"></span>Add to inventory
                </button>
              </td>
            </tr>
            <tr>
              <th>ASUS</th>
              <td></td>
              <td>Computer Computer</td>
              <td>Hardware</td>
              <td>Keyboard</td>
              <td>10</td>
              <td class="text-right">
                <button type="button" id="" class="btn btn-info p-2">
                  <span class="fas fa-plus-circle" style="padding-right: 5px"></span>Add to inventory
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
</div>


</form>
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
      $('#purchases').addClass('active');
      });
    </script>

<script>
    $('#purchase').click(function() {
        $('#purchaseTable').toggle();
        $("div", this).toggleClass("fas fa-angle-right fas fa-angle-down");
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

    <script>
    function add() {
      $('#addpurchase').append("                      <div class="container-fluid" style="background: #d3d3d3; margin-bottom: 2rem;">
                                <div class="row">
                                      <div class="input-group col-4" style="margin-top: 1rem;">
                                        <div class="" style="margin-right: 2rem;">
                                          <p class="card-title text-dark" style="font-size: 16px;">Brand:</p>
                                        </div>
                                        <div class="">
                                          <input name="model" type="text" size="25" style="height: 2.2rem;">
                                        </div>
                                      </div>

                                      <div class="input-group col-4" style="margin-top: 1rem;">
                                        <div class="" style="margin-right: 2rem;">
                                          <p class="card-title text-dark" style="font-size: 16px;">Name:</p>
                                        </div>
                                        <div class="">
                                          <input name="model" type="text" size="25" style="height: 2.2rem;">
                                        </div>
                                      </div>

                                      <div class="input-group col-4" style="margin-top: 1rem;">
                                        <div class="" style="margin-right: 2rem;">
                                          <p class="card-title text-dark" style="font-size: 16px;">Category:</p>
                                        </div>
                                        <div class="">
                                          <input name="model" type="text" size="25" style="height: 2.2rem;">
                                        </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="input-group col-4" style="margin-top: 1rem; margin-bottom: 2rem;">
                                        <div class="" style="margin-right: 2rem;">
                                          <p class="card-title text-dark" style="font-size: 16px;">Type:</p>
                                        </div>
                                        <div class="">
                                          <input name="model" type="text" size="25" style="height: 2.2rem;">
                                        </div>
                                      </div>

                                      <div class="input-group col-4" style="margin-top: 1rem; margin-bottom: 2rem;">
                                        <div class="" style="margin-right: 2rem;">
                                          <p class="card-title text-dark" style="font-size: 16px;">Subtype:</p>
                                        </div>
                                        <div class="">
                                          <input name="model" type="text" size="25" style="height: 2.2rem;">
                                        </div>
                                      </div>

                                      <div class="input-group col-4" style="margin-top: 1rem; margin-bottom: 2rem;">
                                        <div class="" style="margin-right: 2rem;">
                                          <p class="card-title text-dark" style="font-size: 16px;">Quantity:</p>
                                        </div>
                                        <div class="">
                                          <input name="model" type="text" size="25" style="height: 2.2rem;">
                                        </div>
                                      </div>
                                  </div>
                            </div>");
    }
    </script>
@stop
