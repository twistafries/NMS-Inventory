<?php
  use Carbon\Carbon;
?>
@extends('../template')
@section('title') Trial-Get @stop

@section('content')
<input type='text' id='search' name='search' placeholder='Enter userid 1-27'><input type='button' value='Search'
    id='but_search'>
<br />
<input type='button' value='Fetch all records' id='but_fetchall'>

<!-- DataTable Filter -->
<table style="margin: auto;width: 100%; text-align: right; " id="filter">
    <thead>
        <tr>
            <th>
                <label for="types">Types: </label>
                <select id="types" name="types">
                    <option value="any">Any</option>
                </select>
            </th>
            <th>
                <label for="subtypes">Subtypes: </label>
                <select id="subtypes" name="subtypes">
                    <option value="any">Any</option>
                </select>
            </th>
            <th>
                <label for="supplier">Supplier: </label>
                <select id="supplier" name="supplier">
                    <option value="any">Any</option>

                </select>
            </th>
            <th>
                <label for="brand">Brand: </label>
                <select id="brand" name="brand">
                    <option value="any">Any</option>

                </select>
            </th>
            <th>
                <label for="status">Status: </label>
                <select id="status" name="status">
                    <option value="any">Any</option>
                    
                </select>
            </th>
        </tr>
    </thead>

<table id="myDataTable" class="table table-borderless table-striped table-hover" style="width:100%;cursor:pointer;">
    <thead class="thead-dark">
        <tr>
            <th>Model</th>
            <th>Brand</th>
            <th>Types</th>
            <th>Subtype</th>
            <th>Serial No</th>
            <th>Supplier</th>
            <th>Added by</th>
            <th>Date Added</th>
            <th>Status</th>

        </tr>
    </thead>
    <tbody>


        @foreach ($equipment as $equipment)
        <tr id="row-{!! $equipment->id !!}" data-toggle="modal" data-target="#view-modal">
            <input type="hidden" name="id" value="{!! $equipment->id !!}">
            <td> {{ $equipment->model }} </td>
            <td> {{ $equipment->brand }} </td>
            <td> {{ $equipment->type_name }} </td>
            <td> {{ $equipment->subtype_name }} </td>
            <td> {{ $equipment->serial_no }} </td>
            <td> {{ $equipment->supplier }} </td>
            <td> {{ $equipment->firstname }} {{ $equipment->lastname }} </td>
            <td> {{ $equipment->added_at }} </td>
            <td> {{ $equipment->status_name }} </td>
        </tr>
        @endforeach    
    </tbody>
</table>


<!-- View Details All Modal -->
<div class="modal fade" id="view-modal" tabindex="-1" role="dialog"
    aria-labelledby="modal-view" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style=" width: 1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="container" id="modal-header-info">
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container-fluid" id="modal-body-info">
                    <!-- Details -->
                    

                    

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary text-uppercase" data-dismiss="modal" data-toggle="modal"
                    data-target="#edit-{!! $equipment->id !!}">Edit Values</button>

                <button type="button" class="btn btn-danger text-uppercase" data-dismiss="modal" data-toggle="modal"
                    data-target="#deleteModal">Delete Entry</button>
            </div>
        </div>
    </div>
</div>



@stop

@section('script')
<script>
    $(document).ready(function () {
        
        fetchFilterOptions();
        $('tr').click(function(){
            var rowId = $(this).find("input:hidden").val();
            fetchRecords(rowId);
            console.log('Clicked row equipment ' + $(this).find("input:hidden").val());
        })

        // Fetch all records
        $('#but_fetchall').click(function () {
            fetchRecords(0);
        });//end fetch all function

        // Search by userid
        $('#but_search').click(function () {
            var userid = Number($('#search').val().trim());

            if (userid > 0) {
                fetchRecords(userid);
            }//end if

        });//end search function    
    });

    function fetchFilterOptions(){
        $.ajax({
            url: '/getFilterOption',
            type: 'get',
            dataType: 'json',
            success: function (response) {
                if(response['type'] != null) {
                   typeLength = response['type'].length;                     
                }//end if
                if(typeLength > 0){
                    for (var i = 0; i < typeLength; i++) {
                        var typeID = response['type'][i].id;
                        var typeName = response['type'][i].name;

                        var typeOptions = 
                            '<option value="'+typeName+'">'+ typeName +'</option>'; 
                        $('select#types').append(typeOptions);
                    }
                }

                if(response['subtype'] != null) {
                   subtypeLength = response['subtype'].length;                     
                }//end if
                if(subtypeLength > 0){
                    for (var i = 0; i < subtypeLength; i++) {
                        var subtypeID = response['subtype'][i].id;
                        var subtypeName = response['subtype'][i].name;

                        var subtypeOptions = 
                            '<option value="'+subtypeName+'">'+ subtypeName +'</option>'; 
                        $('select#subtypes').append(subtypeOptions);
                    }
                }

                if(response['status'] != null) {
                   statusLength = response['status'].length;                     
                }//end if
                if(statusLength > 0){
                    for (var i = 0; i < statusLength; i++) {
                        var statusID = response['status'][i].id;
                        var statusName = response['status'][i].name;

                        var statusOptions = 
                            '<option value="'+statusName+'">'+ statusName +'</option>'; 
                        $('select#status').append(statusOptions);
                    }
                }

                if(response['supplier'] != null) {
                   supplierLength = response['supplier'].length;                     
                }//end if
                if(supplierLength > 0){
                    for (var i = 0; i < supplierLength; i++) {
                        var supplierID = response['supplier'][i].id;
                        var supplierName = response['supplier'][i].supplier_name;

                        var supplierOptions = 
                            '<option value="'+supplierName+'">'+ supplierName +'</option>'; 
                        $('select#supplier').append(supplierOptions);
                    }
                }

                if(response['brand'] != null) {
                   brandLength = response['brand'].length;                     
                }//end if
                if(brandLength > 0){
                    for (var i = 0; i < brandLength; i++) {
                        var brandID = response['brand'][i].id;
                        var brandName = response['brand'][i].brand;

                        var brandOptions = 
                            '<option value="'+brandName+'">'+ brandName +'</option>'; 
                        $('select#brand').append(brandOptions);
                    }
                }
                
            }//end success
        })//end ajax
    }//end function fetchFilterOptions
                
    function checkNull(params){
        if(params === null){
            params = "None";
        }
        return params;
    }

    function fetchRecords(id) {
        // id=1;
        $.ajax({
            url: 'getInfo/' + id,
            type: 'get',
            dataType: 'json',
            success: function (response) {
                console.log(response['data']);
                var len = 0;
                $('#modal-header-info').empty();
                $('#modal-body-info').empty();
                // console.log("display data div null");

                if (response['data'] != null) {
                    len = response['data'].length;
                    console.log("response[] not null");
                    console.log("len: " + len);
                }

                if (len > 0) {
                    console.log("len > 0");

                    for (var i = 0; i < len; i++) {
                        var id = response['data'][i].id;
                        var subtype_id = response['data'][i].subtype_id;
                        var brand = response['data'][i].brand;
                        var model = response['data'][i].model;
                        var details = response['data'][i].details;
                        var serial_no = response['data'][i].serial_no;
                        var or_no = response['data'][i].or_no;
                        var supplier_id = response['data'][i].supplier_id;
                        var warranty_start = response['data'][i].warranty_start;
                        var warranty_end = response['data'][i].warranty_end;
                        var created_at = response['data'][i].created_at;
                        var updated_at = response['data'][i].updated_at;
                        var user_id = response['data'][i].user_id;
                        var status_id = response['data'][i].status_id;
                        var status_name = response['data'][i].status_name;
                        var subtype_name = response['data'][i].subtype_name;
                        var imei_or_macaddress = response['data'][i].imei_or_macaddress;
                        var type_name = response['data'][i].type_name;
                        var type_id = response['data'][i].type_id;
                        var firstname = response['data'][i].firstname;
                        var lastname = response['data'][i].lastname;
                        var supplier = response['data'][i].supplier;
                        var supplier_id = response['data'][i].supplier_id;
                        var added_at = response['data'][i].added_at;
                        var updated_at = response['data'][i].updated_at;

                        console.log(checkNull(imei_or_macaddress));
                        console.log(checkNull(id));
                        var tr_header =
                            '<div class="col-12"><p> Official Receipt No: ' + or_no+'</p></div>' + 
                            '<div class="col col-8"><h5 class="modal-title"> ' + model +' '+'brand </h5></div>' + 
                            '<div class="col col-4"><p class="text-light"> ID: ' + id+'</p></div>' 
                            '<div class="col col-4"><p class="text-light"> ID: ' + id+'</p></div>' 
                        
                        $('#modal-header-info').append(tr_header);
                        var tr_body = 
                            '<div class="row row-details"><div class="col col-4 detail-header text-uppercase"> Equipment Details</div>' + 
                            '<div class="col col-7 details" id="fullname">' + details + '</div></div><hr>' +
                            '<div class="row row-details"><div class="col col-2 detail-header text-uppercase">Type:</div>' +
                            '<div class="col col-4 details" id="fullname">' + type_name + '</div>' +
                            '<div class="col col-2 detail-header text-uppercase">Subtype:</div>' +
                            '<div class="col col-4 details" id="fullname">' + subtype_name + '</div>' +
                            '<div class="col col-2 detail-header text-uppercase">Supplier:</div>' +
                            '<div class="col col-4 details" id="fullname">' + checkNull(supplier) + '</div>' +
                            '<div class="col col-2 detail-header text-uppercase">IMEI or MAC:</div>' +
                            '<div class="col col-4 details" id = "fullname">' + checkNull(imei_or_macaddress) + '</div></div><hr>' + 
                            '<div class="row row-details"><div class="col col-2 detail-header text-uppercase">Added At</div>' + 
                            '<div class="col col-4 details" id="fullname">' + added_at + '</div>' +
                            '<div class="col col-2 detail-header text-uppercase">Added By</div>' + 
                            '<div class="col col-4 details" id="fullname">' + checkNull(firstname) + ' ' + checkNull(lastname) + '</div>' +
                            '<div class="col col-2 detail-header text-uppercase">Edited At</div>' + 
                            '<div class="col col-4 details" id = "fullname">' + updated_at + '</div></div>' + 
                            '<div class="row row-details"><div class="col col-4 detail-header text-uppercase"> Warranty Period:</div>' + 
                            '<div class="col col-7 details" id="fullname">' + checkNull(warranty_start) + ' - ' + checkNull(warranty_end) + '</div></div>'
                        $('#modal-body-info').append(tr_body);

                    }//end for
                } else if (response['data'] != null) {
                    var tr_str =
                        "<p>" + response['data'].id + "</p></br>" +
                        "<p> Brand: " + response['data'].brand + "</p></br>" +
                        "<p> Model: " + response['data'].model + "</p></br>" +
                        "<p> Subtype: " + response['data'].subtype_name + "</p></br>" +
                        "<p> Supplier: " + response['data'].supplier + "</p></br>"

                    $('#display').append(tr_str);
                }//end else if
                else {
                    var tr_str = "<tr>" +
                        "<p align='center' colspan='4'>No record found.</p>";
                    $('#display').append(tr_str);
                }//end else

            }//end success
        })//end ajax
    }//end function

</script>

@stop