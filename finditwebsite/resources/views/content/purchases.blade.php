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

<div class="container-fluid">
    <!-- tabs -->
    <div class="container-fluid card" style="margin-top: 2rem; padding: 2rem;">
        <div class="row">
            <div class="container-fluid">
              <ul class="nav nav-pills nav-justified">
                <li class="nav-item">
                  <a class="nav-link active" href="{!! url('/purchases') !!}">Purchases</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{!! url('/receivedPurchases') !!}">Received Purchases</a>
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
<div class="container-fluid row">
  <div class="card col-10" style="margin-top: 1rem;  margin-bottom: 1rem; padding-top: 1.5rem; padding-bottom: 10px;">
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
            <label for="subtype">Subtype: </label>
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
            <option value="{{$suppliers->id}}">{{$suppliers->supplier_name}}</option>
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
  <div class="col-2" style="margin-top: 1.5rem;">
    <button type="button" id="" class="btn btn-info p-2 text-uppercase" style="margin-top: 1rem;" data-toggle="modal" data-target="#purchasesmodal">
      <span class="fas fa-plus-circle" style="padding-right: 5px"></span>New Purchase
    </button>
  </div>
</div>
    <!--Tab Content-->


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
                                  <table class="table table-borderless table-hover " style="width:100%">
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
<div class="" style="margin-top: 2rem;">
          <table class="table table-hover" id="purchasesTable">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Purchases</th>
              </tr>
            </thead>
            <tbody>


      @foreach($purchase as $purchase)
        <tr>
          <td> <p hidden>{{$purchase->date_of_purchase}}</p>
      <div class="navbar" id="purchase{{$purchase->purchase_no}}" data-toggle="collapse" data-target="#pills-tabContent" aria-expanded="false" aria-controls="collapseExample" style="margin-top: 1rem; background: #585858; color: white; cursor: pointer; height: 45px;">
          <a class="fas fa-angle-right" style="font-size: 16px;"><span style="margin-left: 1rem; font-family: sans-serif; font-weight: lighter;">PURCHASE {{$purchase->purchase_no}}</span></a>
          <div class="" style="font-size: 16px;">Date: {{$purchase->date_of_purchase}}</div>
      </div>

    <div class="tab-content collapse" id="purchaseTable{{$purchase->purchase_no}}">
      <div class="tab-pane fade show active" id="pills-0" role="tabpanel" aria-labelledby="pills-0-tab">
        <table class="table table-hover" id="dataTable">
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
            @foreach($purchases[$purchase->purchase_no] as $item)
            <tr>
              <td data-toggle="modal" data-target="#purchasedetail" style="cursor: pointer;">{{$item->brand}}</td>
              <td data-toggle="modal" data-target="#purchasedetail" style="cursor: pointer;">{{$item->model}}</td>
              <td data-toggle="modal" data-target="#purchasedetail" style="cursor: pointer;">{{$item->details}}</td>
              <td data-toggle="modal" data-target="#purchasedetail" style="cursor: pointer;">{{$item->subtype}}</td>
              <td data-toggle="modal" data-target="#purchasedetail" style="cursor: pointer;">{{$item->supplier}}</td>
              <td data-toggle="modal" data-target="#purchasedetail" style="cursor: pointer;">{{$item->qty}}</td>
              <td class="text-right">
                <button type="button" id="" class="btn btn-info p-2">
                  <span class="fas fa-plus-circle" style="padding-right: 5px"></span>Add to inventory
                </button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </td>
</tr>
@endforeach
</tbody>
</table
</div>
    <div class="modal fade" id="purchasedetail" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document" style=" width: 1000px;">
            <div class="modal-content" style="height: 35rem;">
                <div class="modal-header">
                    <div class="">PURCHASE </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" >
                  <div class="container-fluid" style="">
                    <div class="row" style="margin-top: 1rem;">
                      <div class="col-6">
                        <label>Brand:</label>
                        <input type="text" name="" value="ASUS" style="padding-left: 5px;">
                      </div>
                      <div class="col-6">
                        <label>Model:</label>
                        <input type="text" name="" value="" style="padding-left: 5px;">
                      </div>
                    </div>
                    <div class="row" style="margin-top: 2rem;">
                      <div class="col-6">
                        <label>Subtype:</label>
                        <select style="width: 12.5rem; height: 1.8rem;">
                          <option>Hardware</option>
                          <option>Software</option>
                        </select>
                      </div>
                      <div class="col-6">
                        <label>Supplier:</label>
                        <input type="text" name="" value="" style="padding-left: 5px;">
                      </div>
                    </div>
                    <div class="row" style="margin-top: 2rem;">
                      <div class="col-9">
                        <label>Details:</label>
                        <textarea name="model" type="text" size="25" style="height: 6rem; width: 20rem;"></textarea>
                      </div>
                      <div class="col-2" style="margin-right: 1rem;">
                        <label>Quantity:</label>
                        <input type="text" name="" style="width: 4rem;">
                      </div>
                    </div>
                </div>
              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-primary text-uppercase" data-dismiss="modal" data-toggle="modal" data-target="#">Save Changes</button>
                  <button type="button" class="btn btn-danger text-uppercase" data-dismiss="modal" data-toggle="modal" data-target="#">Cancel</button>
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
            $('#purchases').addClass('active');
        });
    </script>

    <script>
      @foreach($purchasescript as $purchase)
        $('#purchase{{$purchase->purchase_no}}').click(function() {
            $('#purchaseTable{{$purchase->purchase_no}}').toggle();
            $("a", this).toggleClass("fas fa-angle-right fas fa-angle-down");
        });
        @endforeach
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTable').DataTable({
              "paging":   false,
              "info":   false,
              "bFilter": false
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#purchasesTable').DataTable({
                "pagingType": "full_numbers",
                  "order": []
            });
        });

    </script>
@stop
