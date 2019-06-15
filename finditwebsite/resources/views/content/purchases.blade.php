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
                <li class="nav-item text-uppercase" style="margin-right: 5px;">
                  <a class="nav-link active" href="{!! url('/purchases') !!}">Purchases</a>
                </li>
                <li class="nav-item text-uppercase" style="background: #DEDEDE; margin-right: 5px;">
                  <a class="nav-link" href="{!! url('/receivedPurchases') !!}">Received Purchases</a>
                </li>
                <!-- <li class="nav-item" style="background: #DEDEDE; margin-right: 5px;">
                  <a class="nav-link" href="{!! url('/incompleteOrders') !!}">Incomplete Orders</a>
                </li> -->
                <li class="nav-item text-uppercase" style="background: #DEDEDE; margin-right: 5px; ">
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
            <label for="subtype">Subtype: </label>
            <select id="subtypes" name="subtypes" style="height: 1.8rem; margin-right: 1rem;">
              <option value="any">Any</option>
              <option value="PC_SystemUnit">System Unit</option>
              @foreach ($subtypesSel as $subtypesSel)
              <option value="{{$subtypesSel->name}}{{$subtypesSel->id}}">{{$subtypesSel->name}}</option>
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
        <label for="brand">Status: </label>
        <select id="brand" name="brand" style="height: 1.8rem;">
          <option value="any">Any</option>
          <option value="any">Completed</option>
          <option value="">Incomplete<option>
        </select>
      </th>
      <th>
      </th>
      <th></th>
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
      <div class="modal fade bd-example-modal-lg" id="purchasesmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="">
          <div class="modal-dialog modal-xxl">
              <div class="modal-content" style="width: 1000px;">
                  <div class="modal-header">
                      <div class="container">
                          <h5>New Purchase: Purchase Number {{$purchase->count()+1}}</h5>
                      </div>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>

                  <div class="modal-body">
                    <button type="button" id="addMorePurchase" onclick='add()' class="btn btn-info p-2 text-uppercase" style="margin-bottom: 1rem;">
                      <span class="fas fa-plus-circle" style="padding-right: 5px"></span>Add More
                    </button>

                    <button type="button" class="btn btn-info p-2 text-uppercase" data-toggle="modal" data-target="#systemUnit" style="margin-bottom: 1rem;">
                      <span class="fas fa-plus-circle" style="padding-right: 5px"></span>Add PC
                    </button>
                    <form action="{!! url('/addpurchase'); !!}" enctype="multipart/form-data" method="post" role="form" id="singleAddForm">
                    {!! csrf_field() !!}
                    <div class="input-group col-2" style="margin-top: 1rem; margin-bottom: 2rem;">
                      <div class="">
                        <p class="card-title text-dark" style="font-size: 14px;">Supplier:</p>
                        <input  list="suppliers" name="supplier" required style="width: 9rem;">
                          <datalist id="suppliers">
                            <select>
                            @foreach ($supplier as $supplier)
                            <option value="{{ $supplier->supplier_name}}">
                            @endforeach
                          </select>
                          </datalist>
                      </div>
                    </div>

                    <input name="purchase_no" value="{{$purchase->count()+1}}" hidden>
                      <div class="addss container-fluid" style="background: #d3d3d3; margin-bottom: 2rem; padding-top: 1rem; padding-bottom: 1rem;">
                          <div class="adds row" style="">
                              <div class="input-group col-2" style="margin-top: 1rem; margin-bottom: 2rem;">
                                <div class="">
                                  <p class="card-title text-dark" style="font-size: 14px;">Subtype:</p>
                                  <select id="subtypes" name="purchase[subtype_id][]" style="height: 1.8rem; width: 9rem;">
                                    @foreach ($subtypes as $subtypes)
                                    <option value="{{$subtypes->id}}">{{$subtypes->name}}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>

                                <div class="input-group col-2" style="margin-top: 1rem;">
                                  <div class="">
                                    <p class="card-title text-dark" style="font-size: 14px;">Brand:</p>
                                    <input name="purchase[brand][]" type="text" size="25" style="height: 2rem; width:9rem;" required>
                                  </div>
                                </div>

                                <div class="input-group col-2" style="margin-top: 1rem;">
                                  <div class="">
                                    <p class="card-title text-dark" style="font-size: 14px;">Model:</p>
                                    <input name="purchase[model][]" type="text" size="25" style="height: 2rem; width:9rem;" required>
                                  </div>
                                </div>

                                <div class=" col-3" style="margin-top: 1rem;">
                                  <div class="">
                                    <p class="card-title text-dark" style="font-size: 14px;">Details:</p>
                                    <textarea name="purchase[details][]" type="text" size="25" style="height: 4rem; width: 14rem;">
                                    </textarea>
                                  </div>
                                </div>



                                <div class="input-group col-1" style="margin-top: 1rem; margin-bottom: 2rem;">
                                  <div class="">
                                    <p class="card-title text-dark" style="font-size: 14px;">Quantity:</p>
                                    <input name="purchase[qty][]" type="number" size="25" style="height: 2rem; width:3rem;" required>
                                  </div>
                                </div>
                            </div>

                                <table id="addMoreList">
                                      <tbody>
                                      </tbody>
                                </table>

                      </div>
                  </div>

                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary text-uppercase">ADD</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                  </div>
                </form>
              </div>
          </div>
      </div>

      <!-- Add System Unit Modal-->
      <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="systemUnit">
          <div class="modal-dialog modal-xxl">
              <div class="modal-content" style="height:75%;">

                  <div id="addSystemUnit" class="modal-header">
                      <h5 class="modal-title" id="ModalTitle"><i class="fas fa-plus-square"></i>&nbsp;Purchase System Unit</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>

                  <div class="modal-body">
                      <form action="{!! url('/purchasePC'); !!}" enctype="multipart/form-data" method="post" role="form">
                        {!! csrf_field() !!}
                          <div class="row">
                              <div class="col-sm">

                                  <table class="table table-borderless table-striped table-hover table-responsive table-condensed" style="width:100%; ">
                                      <thead>
                                          <tr>
                                              <th>Quantity:</th>
                                              <th>Supplier:</th>
                                          </tr>
                                      </thead>

                                      <tbody>
                                          <tr>
                                              <td><input type="number" name="qty" value="" min="1" style="width: 3rem;"></td>
                                               <td>
                                               <input  list="suppliers" name="supplier" required style="width: 9rem;">
                                                 <datalist id="suppliers">
                                                   <select>
                                                   @foreach ($supp as $sup)
                                                   <option value="{{ $sup->supplier_name}}">
                                                   @endforeach
                                                 </select>
                                                 </datalist></td>
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
                                              <td>Motherboard<input type="text" name="sub[]" value="1" hidden></td>
                                              <td> <input type="text" name="component[1][brand]" required></td>
                                              <td> <input type="text" name="component[1][model]" required></td>
                                              <td><textarea name="component[1][details]" rows="2" cols="22"></textarea></td>
                                          </tr>

                                          <tr>
                                              <td>CPU<input type="text" name="sub[]" value="2" hidden></td>
                                              <td> <input type="text" name="component[2][brand]" required></td>
                                              <td> <input type="text" name="component[2][model]" required></td>
                                              <td><textarea name="component[2][details]" cols="22"></textarea></td>
                                          </tr>

                                          <tr>
                                              <td>Storage<input type="text" name="sub[]" value="3" hidden></td>
                                              <td> <input type="text" name="component[3][brand]" required></td>
                                              <td> <input type="text" name="component[3][model]" required></td>
                                              <td><textarea  name="component[3][details]" cols="22"></textarea></td>

                                          <tr>
                                              <td>RAM<input type="text" name="sub[]" value="4" hidden></td>
                                              <td> <input type="text" name="component[4][brand]" required></td>
                                              <td> <input type="text" name="component[4][model]" required></td>
                                              <td><textarea name="component[4][details]" cols="22"></textarea></td>
                                          </tr>

                                          <tr>
                                              <td>GPU<input type="text" name="sub[]" value="5" hidden></td>
                                              <td> <input type="text" name="component[5][brand]" required></td>
                                              <td> <input type="text" name="component[5][model]" required></td>
                                              <td><textarea name="component[5][details]" cols="22"></textarea></td>
                                          </tr>

                                          <tr>
                                              <td>Case<input type="text" name="sub[]" value="7" hidden></td>
                                              <td> <input type="text" name="component[7][brand]" required></td>
                                              <td> <input type="text" name="component[7][model]" required></td>
                                              <td><textarea name="component[7][details]" cols="22"></textarea></td>
                                          </tr>

                                          <tr>
                                              <td>Heat Sink Fan<input type="text" name="sub[]" value="8" hidden></td>
                                              <td> <input type="text" name="component[8][brand]" required></td>
                                              <td> <input type="text" name="component[8][model]" required></td>
                                              <td><textarea name="component[8][details]" cols="22"></textarea></td>
                                          </tr>

                                          <tr>
                                              <td>Sound Card<input type="text" name="sub[]" value="18" hidden></td>
                                              <td> <input type="text" name="component[18][brand]" required></td>
                                              <td> <input type="text" name="component[18][model]" required></td>
                                              <td><textarea name="component[18][details]" cols="22"></textarea></td>
                                          </tr>
                                      </tbody>
                                    </table>
                                 </div>
                                </div>


                              </div>

                          <div class="modal-footer">
                              <button id="save" class="btn btn-success" type="submit"> <span class="fas fa-plus-square"></span>&nbsp;Purchase System Unit</button>
                              <button id="cancel" type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                          </div>
                          </form>
              </div>
          </div>
      </div>



<div class="" style="margin-top: 2rem;">
          <table class="table" id="purchasesTable">
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
                    <th scope="col">Model/Label</th>
                    <th scope="col">Details</th>
                    <th scope="col">Subtype</th>
                    <th scope="col" hidden></th>
                    <th scope="col">Supplier</th>
                    <th scope="col">Qty</th>
                    <th scope="col"></th>
                    <th hidden></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($purchases[$purchase->purchase_no] as $item)
                  @if ($item->unit_number==null)
                  <tr>
                    <td data-toggle="modal" data-target="#item{{$item->id}}" style="cursor: pointer;">{{$item->brand}}</td>
                    <td data-toggle="modal" data-target="#item{{$item->id}}" style="cursor: pointer;">{{$item->model}}</td>
                    <td data-toggle="modal" data-target="#item{{$item->id}}" style="cursor: pointer;">{{$item->details}}</td>
                    <td data-toggle="modal" data-target="#item{{$item->id}}" style="cursor: pointer;">{{$item->subtype}}</td>
                    <td hidden>{{$item->subtype}}{{$item->subtype_id}}</td>
                    <td data-toggle="modal" data-target="#item{{$item->id}}" style="cursor: pointer;">{{$item->supplier}}</td>
                    <td data-toggle="modal" data-target="#item{{$item->id}}" style="cursor: pointer;">{{$item->qty}}</td>
                    @if($purchase->or_no!=null && $item->qty_added == $item->qty)
                    <td class="text-right table-success">
                        <span class="fas fa-check" style="padding-right: 5px"></span>Already Added To The Inventory
                    </td>
                    @elseif($purchase->or_no!=null && $item->qty_added < $item->qty)
                    <td><a href="{!! url('/fetchID/'.$item->id); !!}" class="btn btn-info p-2">Add Pending Items ({{$item->qty - $item->qty_added}} of {{$item->qty}}) left</a></td>
                    @else
                    <td class="text-right">
                      <a href="{!! url('/fetchID/'.$item->id); !!}" class="btn btn-info p-2">Add To Inventory</a>
                    </td>
                    @endif
                  </tr>
                  @endif
                  @endforeach
                  @foreach($unit_number as $unit)
                  @if ($unit->p_id==$purchase->purchase_no)
                  <tr>
                    <td data-toggle="modal" data-target="#pc{{$unit->unit_number}}" style="cursor: pointer;">N/A</td>
                    <td data-toggle="modal" data-target="#pc{{$unit->unit_number}}" style="cursor: pointer;">PC - {{$unit->unit_number}}</td>
                    <td data-toggle="modal" data-target="#pc{{$unit->unit_number}}" style="cursor: pointer;">N/A</td>
                    <td data-toggle="modal" data-target="#pc{{$unit->unit_number}}" style="cursor: pointer;">PC</td>
                    <td data-toggle="modal" data-target="#pc{{$unit->unit_number}}" style="cursor: pointer;">{{$unit->supplier_name}}</td>
                    <td data-toggle="modal" data-target="#pc{{$unit->unit_number}}" style="cursor: pointer;">{{$unit->qty}}</td>
                    <td hidden>PC_SystemUnit</td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </td>
        </tr>
      @endforeach
</tbody>
</table>
</div>
@foreach($items as $item)
    <div class="modal fade" id="item{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
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
                        <input type="text" name="brand" value="{{$item->brand}}" style="padding-left: 5px;">
                      </div>
                      <div class="col-6">
                        <label>Model:</label>
                        <input type="text" name="model" value="{{$item->model}}" style="padding-left: 5px;">
                      </div>
                    </div>
                    <div class="row" style="margin-top: 1rem;">
                      <div class="col-6">
                        <label>Subtype:</label>
                        <input type="text" name="subtype_id" value="{{$item->subtype}}" style="padding-left: 5px;">
                      </div>
                      <div class="col-6">
                        <label>Supplier:</label>
                        <input type="text" name="supplier" value="{{$item->supplier}}" style="padding-left: 5px;">
                      </div>
                    </div>
                    <div class="row" style="margin-top: 1rem;">
                      <div class="col-8">
                        <label>Details:</label>
                        <textarea name="details" type="text" size="25" style="height: 6rem; width: 18rem;">{{$item->details}}</textarea>
                      </div>
                      <div class="col-3" style="margin-right: 1rem; margin-left: 1rem;">
                        <label>Quantity:</label>
                        <input type="number" name="qty" value="{{$item->qty}}" style="width: 3rem;">
                      </div>
                    </div>
                </div>

                <div class="text-center mt-2">
                  @if(is_null($item->or_no))
                    {{$item->or_no}}
                    <a href="{!! url('/fetchID/'.$item->id); !!}" class="btn btn-info p-2">Add To Inventory</a>
                  @endif
                </div>

              </div>

              <div class="modal-footer">
                  @if($item->or_no === null)
                  <button type="button" class="btn btn-primary text-uppercase" data-dismiss="modal" data-toggle="modal" data-target="#">Save Changes</button>
                  @endif
                  <button type="button" class="btn btn-danger text-uppercase" data-dismiss="modal" data-toggle="modal" data-target="#">Cancel</button>
              </div>
        </div>
    </div>
</div>
@endforeach


@foreach ($items as $item)
    <div class="modal fade" id="add{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered lg" role="document" style=" width: 1000px;">
            <div class="modal-content" style="height: 45rem; width: 60rem; ">
                <div class="modal-header">
                    <div class="">ADD TO INVENTORY </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{!! url('/addToInventory'); !!}" enctype="multipart/form-data" method="post" role="form" id="singleAddForm">
                {!! csrf_field() !!}
                <div class="modal-body" >
                  <div class="container-fluid" style="">
                    <div class="row" style="margin-top: 1rem;">

                      <div class="col-6">
                      <input type="number" name="p_id" value="{{$item->p_id}}" style="width: 3rem;" hidden>
                      <label>Quantity:</label>
                      <input type="number" name="qty" id="itemQuantity" value="{{$item->qty}}" style="width: 3rem;">
                      </div>
                      <div class="col-6">
                        <label>Serial Number:</label>
                        <br>
                        <input type="text" name="serial_no" value="" >
                      </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label for="details" class="card-title text-dark">Warranty Start:</label>
                            <input type="date" id="start" name="warranty_start">
                        </div>

                        <div class="col">
                            <label for="details" class="card-title text-dark">Warranty End:</label>
                            <input type="date" id="start" name="warranty_end">
                        </div>
                    </div>

                    <div class="row" style="margin-top: 1rem;">
                      <div class="col-6">
                        <label>Official Receipt Numbers:</label>
                        <input type="text" name="or_no" value="" >
                      </div>
                      <div class="col-6">
                        <label>IMEI/MAC Address:</label>
                        <br>
                        <input type="text" name="model" value="" >
                      </div>

                    </div>
                    <div class="row" style="margin-top: 1rem;">
                      <div class="col-6">
                        <label>Brand:</label>
                        <br>
                        <input type="text" name="brand" value="{{$item->brand}}" style="padding-left: 5px;">
                      </div>
                      <div class="col-6">
                        <label>Model:</label>
                        <br>
                        <input type="text" name="model" value="{{$item->model}}" style="padding-left: 5px;">
                      </div>
                    </div>
                    <div class="row" style="margin-top: 1rem;">
                      <div class="col-6">
                        <label>Subtype:</label>
                        <br>
                        <input type="text" name="subtype" value="{{$item->subtype}}" style="padding-left: 5px;">
                        <input type="text" name="subtype_id" value="{{$item->subtype_id}}" style="padding-left: 5px;" hidden>
                      </div>
                      <div class="col-6">
                        <label>Supplier:</label>
                        <br>
                        <input type="text" name="supplier" value="{{$item->supplier}}" style="padding-left: 5px;">
                        <input type="text" name="supplier_id" value="{{$item->supplier_id}}" style="padding-left: 5px;" hidden>
                      </div>
                    </div>

                    <div class="row" style="margin-top: 1rem;">
                      <div class="col-8">
                        <label>Details:</label>
                        <br>
                        <textarea name="details" type="text" size="25" style="height: 8rem; width: 45rem;" rows="5" cols="50">{{$item->details}}</textarea>
                      </div>
                      <div class="col-3" style="margin-right: 1rem; margin-left: 1rem;">

                      </div>
                    </div>
                </div>

                <div class="text-center mt-2">

                </div>

              </div>

              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary text-uppercase" >Add to Inventory</button>
                  <button type="button" class="btn btn-danger text-uppercase" data-dismiss="modal" data-toggle="modal" data-target="#">Cancel</button>
              </div>
            </form>
        </div>
    </div>
</div>
@endforeach

                  @foreach($pc as $pc)
                  <div class="modal fade" id="pc{{$pc->unit_number}}" tabindex="-1" role="dialog" aria-labelledby=""
                        aria-hidden="true">

                            <div class="modal-dialog" role="document">
                                <div class="modal-content" style="height:750px; width: 600px;">
                                    <div class="modal-header">
                                    <h5 class="modal-title"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <form action="{!! url('/bulkUnitAdd'); !!}" enctype="multipart/form-data" method="post" role="form" id="bulkAddForm">
                                          {!! csrf_field() !!}
                                      <div class="row">

                                          <div class="col-sm-4"><div class="detail-header text-uppercase">Supplier:</div></div>

                                          <div class="col-sm-4"><div class="detail-header text-uppercase">Quantity:</div></div>

<!-- Marker: button for adding pc -->
                                         <div class="col-sm-4"><div class="detail-header text-uppercase">  </div></div>


                                      </div>
                                      <div class="row">

                                          <div class="col-sm-4">{{$pc->supplier_name}}</div>
                                          <input type="hidden" name="pcID" value={{$pc->p_id}}>
                                          <input type="hidden" name="unit_number" value={{$pc->unit_number}}>
                                          <div class="col-sm-4">{{$pc->qty}}</div>


                                      </div>




                                      <div class="row">
                                          <hr>
                                      </div>

                                      <div class="row p-2">
                                        <table class="table">
                                      <thead>
                                        <tr>
                                          <th scope="col">Component</th>
                                          <th scope="col">Brand</th>
                                          <th scope="col">Model</th>

                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($pc_component as $component)
                                        @if($component->p_id == $pc->p_id)
                                        <tr>
                                          <td>{{$component->subtype}}</td>
                                          <td>{{$component->brand}}</td>
                                          <td>{{$component->model}}</td>
                                        </tr>
                                        @endif
                                        @endforeach
                                        @if($pc->or_no == null)
                                        <tr>
                                          <p class="card-title">Qty. to Add
                                          <input type="number" name="comp_qty" min='1' max={{$pc->qty}} required></p>
                                        </tr>
                                        @elseif($pc->qty > $pc->qty_added)
                                        <tr>
                                          <p class="card-title">Remaining Qty.
                                          <input type="number" name="comp_qty" min='1' max='{{$pc->qty}}-{{$pc->qty_added}}' required></p>
                                        </tr>
                                        @endif
                                      </tbody>
                                      </table>

                                    </div>

                                    <div class="modal-footer">
                                        @if($pc->or_no == null)
                                        <button type="submit" class="btn btn-primary text-uppercase">Add Items To Inventory</button>
                                        @endif
                                        <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal">Cancel</button>
                                    </div>
                                  </form>
                                </div>
                            </div>
                    </div>
                  </div>
@endforeach

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

    <script>
        $(document).ready(function() {

            $('#purchasesTable').DataTable({
                "pagingType": "full_numbers",
                  "order": []
            });
          }
        )
    </script>

    <script>
      function rm() {
        $(event.target).closest("tr").remove();
      }



      function add() {
        $('#addMoreList > tbody:last-child').append("<tr><td><select id=\'subtypes\' name=\'purchase[subtype_id][]\' style=\'height: 1.8rem; width: 9rem;\'> @foreach ($sub as $sub) <option value='{{$sub->id}}'>{{$sub->name}}</option>@endforeach</select></td><td><div class=\"col-2\"><input name=\"purchase[brand][]\" type=\"text\" size=\"25\" style=\"height: 2rem; width:9rem;\"></td><td><div class=\"input-group col-2\"><input name=\"purchase[model][]\" type=\"text\" size=\"25\" style=\"height: 2rem; width:9rem;\"><div></td><td><textarea name=\"purchase[details][]\" type=\"text\" size=\"25\" style=\"height: 4rem; width: 14rem; margin-left:0.8rem;\"></textarea></td><td><input name=\"purchase[qty][]\" type=\"number\" size=\"25\" style=\"height: 2rem; width:3rem; margin-left: 2rem;\"></td><td><div class=\"btn btn-danger\" onclick='rm()' style=\"margin-left: 1rem;\"><i class=\"fas fa-times\"></i></div></td></tr>");
      }
    </script>

    <script>
    $.fn.dataTable.ext.search.push(
      function( settings, data, dataIndex ) {
      var subtype =  $('#subtypes').val()
      var supplier =  $('#supplier').val();
      var brand =  $('#brand').val();
      var subtypes = data[0];
      var suppliers = data[0];
      var brands = data[0];

        if (subtypes.includes(subtype) || subtype == "any"){
          if (suppliers.includes(supplier)  || supplier == "any"){
            if (brands.includes(brand)  || brand == "any"){
              return true;
            }
          }
        }


      return false;
      }
      );

      $(document).ready(function() {
      var table = $('#purchasesTable').DataTable();

      // Event listener to the two range filtering inputs to redraw on input
      $('#subtypes').on('keyup change',  function() {
          table.draw();
          } );
          $('#supplier').on('keyup change',  function() {
              table.draw();
          } );
          $('#brand').on('keyup change',  function() {
              table.draw();
          } );

      $('select').on('change', function(){
        console.log('hello');
        if($('select #subtypes').val() == 'Motherboard' || $('select #subtypes').val() == 'CPU'){
          $('textarea').val('hello');
        }
      })
      } );

        function reset(){
          document.getElementById("subtypes").selectedIndex = "0";
          document.getElementById("supplier").selectedIndex = "0";
          document.getElementById("brand").selectedIndex = "0";
          $('#purchasesTable').DataTable().search('').draw();

          // $('#myDataTable5').DataTable().search('').draw();

        }


          </script>
@stop
