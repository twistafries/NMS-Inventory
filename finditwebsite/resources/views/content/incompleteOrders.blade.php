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
    <div class="container" style="margin-bottom: 3rem; margin-top: 2rem;">
        <div class="row">
            <div class="container">
              <ul class="nav nav-pills nav-justified">
                <li class="nav-item">
                  <a class="nav-link" href="{!! url('/purchases') !!}">Purchases</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{!! url('/receivedPurchases') !!}">Received Purchases</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="{!! url('/incompleteOrders') !!}">Incomplete Orders</a>
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
            <option value="{{$suppliers->supplier}}">{{$suppliers->supplier}}</option>
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
    <!-- <div class="text-right">
      <button type="button" id="" class="btn btn-info p-2 text-uppercase" style="margin-top: 1rem;" data-toggle="modal" data-target="#purchasesmodal">
        <span class="fas fa-plus-circle" style="padding-right: 5px"></span>New Purchase
      </button>
    </div> -->

      <div class="navbar" id="purchase" data-toggle="collapse" data-target="#pills-tabContent" aria-expanded="false" aria-controls="collapseExample" style="margin-top: 4rem; background: #585858; color: white; cursor: pointer; height: 45px;">
          <a class="fas fa-angle-right" style="font-size: 16px;"><span style="margin-left: 1rem; font-family: sans-serif; font-weight: lighter;">PURCHASE 1</span></a>
          <div class="" style="font-size: 16px;">OR No.: 123456789</div>
          <div class="" style="font-size: 16px;">Date: 5/29/2019</div>
      </div>

    <div class="tab-content collapse" id="purchaseTable">
      <div class="tab-pane fade show active" id="pills-0" role="tabpanel" aria-labelledby="pills-0-tab">
        <table class="table table-hover" id="dataTable">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Brand</th>
              <th scope="col">Model</th>
              <th scope="col">Details</th>
              <th scope="col">Subtype</th>
              <th scope="col">Supplier</th>
              <th scope="col">Serial Number</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th data-toggle="modal" data-target="#purchasedetail" style="cursor: pointer;"></th>
              <td data-toggle="modal" data-target="#purchasedetail" style="cursor: pointer;"></td>
              <td data-toggle="modal" data-target="#purchasedetail" style="cursor: pointer;"></td>
              <td data-toggle="modal" data-target="#purchasedetail" style="cursor: pointer;"></td>
              <td data-toggle="modal" data-target="#purchasedetail" style="cursor: pointer;"></td>
              <td data-toggle="modal" data-target="#purchasedetail" style="cursor: pointer;"></td>
              <td class="text-right">
                <button type="button" id="" class="btn btn-info p-2">
                  <span class="fas fa-plus-circle" style="padding-right: 5px"></span>Add to inventory
                </button>
              </td>
            </tr>
            <tr>
              <th data-toggle="modal" data-target="#purchasedetail" style="cursor: pointer;"></th>
              <td data-toggle="modal" data-target="#purchasedetail" style="cursor: pointer;"></td>
              <td data-toggle="modal" data-target="#purchasedetail" style="cursor: pointer;"></td>
              <td data-toggle="modal" data-target="#purchasedetail" style="cursor: pointer;"></td>
              <td data-toggle="modal" data-target="#purchasedetail" style="cursor: pointer;"></td>
              <td data-toggle="modal" data-target="#purchasedetail" style="cursor: pointer;"></td>
              <td class="text-right">
                <button type="button" id="" class="btn btn-info p-2">
                  <span class="fas fa-plus-circle" style="padding-right: 5px"></span>Add to inventory
                </button>
              </td>
            </tr>
            <tr>
              <th data-toggle="modal" data-target="#purchasedetail" style="cursor: pointer;"></th>
              <td data-toggle="modal" data-target="#purchasedetail" style="cursor: pointer;"></td>
              <td data-toggle="modal" data-target="#purchasedetail" style="cursor: pointer;"></td>
              <td data-toggle="modal" data-target="#purchasedetail" style="cursor: pointer;"></td>
              <td data-toggle="modal" data-target="#purchasedetail" style="cursor: pointer;"></td>
              <td data-toggle="modal" data-target="#purchasedetail" style="cursor: pointer;"></td>
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


        <!-- View Details All Modal -->
        <div class="modal fade" id="purchasedetail" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document" style=" width: 1000px;">
                <div class="modal-content" style="height: 35rem;">
                    <div class="modal-header">
                        <div class="">PURCHASE 1</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body" >
                      <div class="container-fluid" style="">
                        <div class="row">
                          <div class="col-6">
                            <label>Brand:</label>
                            <input type="text" name="" value="ASUS" style="padding-left: 5px;">
                          </div>
                          <div class="col-6">
                            <label>Model:</label>
                            <input type="text" name="" value="Model" style="padding-left: 5px;">
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
                            <input type="text" name="" value="Model" style="padding-left: 5px;">
                          </div>
                        </div>
                        <div class="row" style="margin-top: 2rem;">
                          <div class="col-6">
                            <label>Details:</label>
                            <textarea name="model" type="text" size="25" style="height: 4rem; width: 14rem;"></textarea>
                          </div>
                          <div class="col-6">
                            <label>Quantity:</label>
                            <input type="text" name="" style="padding-left: 5px;">
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
            $("a", this).toggleClass("fas fa-angle-right fas fa-angle-down");
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTable').DataTable({
              "paging":   false,
              "info":   false,
              "bFilter": false
            });
        } );
    </script>
@stop
