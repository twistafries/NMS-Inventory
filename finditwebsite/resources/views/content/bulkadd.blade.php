@extends('../template') @section('css')
<link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
<link rel="stylesheet" href="{{ asset('css/font-awesome/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
<style>
body{
    overflow-x: hidden;
}
</style>
@stop

@section('title') Bulk Add
@stop

@section('content')
<div class="container-fluid m-0">
    <form method="post" id="bulk_form" action="{!! url('/temp-bulk-add-post'); !!}">
    {!! csrf_field() !!}
        <div align="right" style="margin-bottom:5px;">
            <button type="button" name="add" id="add" data-toggle="modal" data-target="#bulkAddModal"
                class="btn btn-success btn-xs">Add More Items</button>
        </div>

        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    @if( $item_id != 0)
                        <th>Purchase Item ID.</th>
                    @endif
                    <th>Serial No.</th>
                    <th>Subtype</th>
                    <th>Status</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Details</th>
                    <th>MAC or IMEI</th>
                    <th>OR No.</th>
                    <th>Supplier</th>
                    <th>Warranty Start</th>
                    <th>Warranty End</th>
                    <!-- <th>Action</th> -->
                </tr>
            </thead>
<!-- subtype_id`, `brand`, `model`, `details`, `serial_no`, `or_no`, `supplier`, `warranty_start`, `warranty_end`, `user_id`,
`status_id` -->
            <tbody id="equipment_data">

            </tbody>

        </table>

        <div align="center" id="submit_div">

        </div>
    </form>

    <div class="modal fade" id="bulkAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalTitle">Bulk Add Equipment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="user_dialog" title="Add Data">
                        <div class="alert alert-warning" id="error_messages">
                            <li>Please fill up all the fields</li>
                        </div>

                        <div class="row">
                            <!-- Quantity -->
                            <div class="col col-lg-2 col-md col-sm col-xs">
                                <p class="card-title">Quantity</p>
                                <input type="number" class="form-control text-center" name="quantity" id="quantity" min="1" max="250" style="padding: 0;">
                            </div>

                            <!-- Subtype -->
                            <div class="col col-lg-5 col-md col-sm col-xs">
                                <div class="form-group">
                                @if($item_id != 0)
                                <fieldset disabled>
                                @else
                                <fieldset>
                                @endif
                                    <p class="card-title">Subtype</p>
                                    <select id="subtype" class="custom-select">
                                        @foreach ($equipment_subtypes as $equipment_subtypes)
                                        <option class="option" value="{!! $equipment_subtypes->id !!}">{{ $equipment_subtypes->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                </fieldset>
                            </div>

                            <div class="col col-lg-5 col-md col-sm col-xs">
                                <div class="form-group">
                                @if($item_id != 0)
                                <fieldset disabled>
                                @else
                                <fieldset>
                                @endif
                                    <p class="card-title">Status</p>
                                    <select id="status" class="custom-select">
                                        @foreach ($equipment_status as $equipment_status)
                                        <option class="option" value="{!! $equipment_status->id !!}">{{ $equipment_status->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                </fieldset>
                            </div>

                            <!-- Brand -->
                            <div class="col col-lg-6 col-md col-sm col-xs">
                            @if($item_id != 0)
                            <fieldset disabled>
                            @else
                            <fieldset>
                            @endif
                                <div class="form-group">
                                    <p class="card-title">Brand</p>
                                    <input type="text" name="brand" id="brand" class="form-control" required/>
                                </div>
                            </div>

                            <!-- Model -->
                            <div class="col col-lg-6 col-md col-sm col-xs">
                            @if($item_id != 0)
                            <fieldset disabled>
                            @else
                            <fieldset>
                            @endif
                                <div class="form-group">
                                    <p class="card-title">Model</p>
                                    <input type="text" name="model" id="model" class="form-control" required/>
                                </div>
                            </div>

                            <!-- Details -->
                            <div class="col col-lg-12 col-md col-sm col-xs">
                            @if($item_id != 0)
                            <fieldset disabled>
                            @else
                            <fieldset>
                            @endif
                                <div class="form-group">
                                    <p class="card-title">Details</p>
                                    <textarea name="details" id="details" class="form-control" required></textarea>
                                    <!-- <input type="text" name="details" id="details" class="form-control" /> -->
                                    <span id="error_details" class="text-danger"></span>
                                </div>
                            </div>

                            <!-- <div class="col col-lg-6 col-md col-sm col-xs">
                                <div class="form-group">
                                    <p class="card-title">Serial Number</p>
                                    <input type="text" name="serial_no" id="serial_no" class="form-control" />
                                    <span id="error_serial_no" class="text-danger"></span>
                                </div>
                            </div> -->

                            <div class="col col-lg-6 col-md col-sm col-xs">
                            <fieldset>
                                <div class="form-group">
                                    <p class="card-title">OR Number</p>
                                    <input type="text" name="or_no" id="or_no" class="form-control" required/>
                                    <span id="error_or" class="text-danger"></span>
                                </div>
                            </div>

                            <div class="col col-lg-6 col-md col-sm col-xs">
                            @if($item_id != 0)
                            <fieldset disabled>
                            @else
                            <fieldset>
                            @endif
                                <div class="form-group">
                                    <p class="card-title">Supplier</p>
                                    <select id="supplier" class="custom-select">
                                        @foreach ($suppliers as $supplier)
                                        <option class="option" value="{!! $supplier->id !!}">{{ $supplier->supplier_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <span id="error_supplier" class="text-danger"></span>
                                </div>
                            </div>

                            <div class="col col-lg-6 col-md col-sm col-xs">
                                <div class="form-group">
                                    <p class="card-title">Warranty Start</p>
                                    <input type="date" name="warranty_start" id="warranty_start" class="form-control" required/>
                                    <span id="error_warranty_start" class="text-danger"></span>
                                </div>
                            </div>

                            <div class="col col-lg-6 col-md col-sm col-xs">
                                <div class="form-group">
                                    <p class="card-title">Warranty End</p>
                                    <input type="date" name="warranty_end" id="warranty_end" class="form-control" required/>
                                    <span id="error_warranty_end" class="text-danger"></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer align-content-center">
                    <div class="form-group">
                        <input type="hidden" name="row_id" id="hidden_row_id" />
                        <button type="button" name="save" id="save" class="btn btn-info">Save</button>
                </div>
                    </div>

            </div>
        </div>
    </div>
</div>


@endsection

@section('script')

<script>
    $(document).ready(function () {
        @if( $item_id != 0)
            fetchRecords({{ $item_id }})
            console.log( {{ $item_id }})
            allFilled();
            // eachFieldValidate();
            $('#bulkAddModal').modal('show')
            var rowCount = $('#equipment_data tr').length;
            $('.form-control').keyup(function(){
                eachFieldValidate();
            })
            anyEmpty();
            allFilled();

        @else
        $('#bulkAddModal').modal('show')
        var rowCount = $('#equipment_data tr').length;
        
        
        
        
        $('.form-control').keyup(function(){
            // console.log("keyup form-control")
            // console.log("If all is empty")
            eachFieldValidate();
        
            
            
        })
        anyEmpty();
        allFilled();
        
        @endif
            // fetchRecords(97)
        // $('#save').hide();
        function anyEmpty(){
            if($('#brand').val() == ''
            || $('#model').val() == ''
            || $('#details').val() == ''
            || $('#or_no').val() == ''
            || $('#quantity').val() == ''
            ){    
            $('#save').hide()
            $('#save').removeAttr("data-dismiss")
            $('#error_messages').show();
            }
        }

        function allFilled(){
            if($('#brand').val() != ''
            && $('#model').val() != ''
            && $('#details').val() != ''
            && $('#or_no').val() != ''
            && $('#quantity').val() != ''
            ){
            $('#save').show()
            $('#save').attr("data-dismiss" , "modal")
            $('#error_messages').hide();
            console.log("If all is completely filled")
            return true;
            }
        }

        function eachFieldValidate(){
            if($('#quantity').val() == ''){
                $('#quantity').css('background-color', '#fff3cd');
                
            }else{
                console.log("Empty quantity")
                $('#quantity').removeAttr("style");
                $('#quantity').css('background-color', 'fff');
            }

            if($('#brand').val() == ''){
                $('#brand').css('background-color', '#fff3cd');
                
            }else{
                console.log("Empty brand")
                $('#brand').removeAttr("style");
                $('#brand').css('background-color', 'fff');
                // error_brand = '';
                // $('#error_brand').hide().text(error_brand);
            }
            
            if($('#model').val() == ''){
                $('#model').css('background-color', '#fff3cd');
                
            }else{
                console.log("Empty model")
                $('#model').removeAttr("style");
                $('#model').css('background-color', 'fff');
                // error_brand = '';
                // $('#error_brand').hide().text(error_brand);
            }
            
            if($('#details').val() == ''){
                $('#details').css('background-color', '#fff3cd');
                
            }else{
                console.log("Empty details")
                $('#details').removeAttr("style");
                $('#details').css('background-color', 'fff');
                // error_brand = '';
                // $('#error_brand').hide().text(error_brand);
            }
            
            if($('#or_no').val() == ''){
                $('#or_no').css('background-color', '#fff3cd');
                
            }else{
                console.log("Empty details")
                $('#or_no').removeAttr("style");
                $('#or_no').css('background-color', 'fff');
            }
            
            
            // $('#save').removeAttr("data-dismiss");
            // $('#save').hide();

            if($('#brand').val() != ''
            && $('#model').val() != ''
            && $('#details').val() != ''
            && $('#or_no').val() != ''
            && $('#quantity').val() != ''
            ){
            $('#save').show()
            $('#save').attr("data-dismiss" , "modal")
            $('#error_messages').hide();
            console.log("If all is completely filled")
            }
        }

        $('#save').click(function () {
            var count = 1;
            var quantity = $('#quantity').val();
            var error_brand = '';
            var error_model = '';
            var error_details = '';
            var error_serial_no = '';
            var error_or = '';
            var error_supplier = '';
            var error_warranty_start = '';
            var error_warranty_end = '';
            var buttonCount = $('#submit_div').children().length;

               

                if($('#save').text() == 'Save') {
                    var subtype_id = $('#subtype').val();
                    var status_id = $('#status').val();
                    // console.log(subtype_name);

                    var subtype_name = $("select#subtype").change().children("option:selected").text();
                    var status_name = $("select#status").change().children("option:selected").text();
                    var brand = $('#brand').val();
                    var model = $('#model').val();
                    var details = $('#details').val();
                    var or_no = $('#or_no').val();
                    var supplier_id = $('#supplier').val();
                    var supplier_name =  $("select#supplier").change().children("option:selected").text();
                    var warranty_start = $('#warranty_start').val();
                    var warranty_end = $('#warranty_end').val();
                    for (count = 1; count <= quantity; count++) {
                        // console.log(name);
                        output = '<tr id="row_' + count + '">';
                        output += '<td>' + count + '</td>';
                        @if( $item_id != 0)
                        output += '<td>' + {{ $item_id }} + ' <input type="hidden" name="bulk[item_id][]" id="item_id' + count + '" class="name" value="' +  {{ $item_id }}  + '" /></td>';
                        @endif
                        output += '<td>' + ' <input type="text" name="bulk[serial_no][]" id="serial_no' + count + '" class="serial_no" required/></td>';
                        output += '<td> <input type="hidden" name="bulk[subtype_id][]" id="subtype_id' + count + '" class="subtype_id" value="' + subtype_id + '" />' + subtype_name + '</td>';
                        output += '<td> <input type="hidden" name="bulk[status_id][]" id="status_id' + count + '" class="status_id" value="' + status_id + '" />' + status_name + '</td>';
                        output += '<td>' + brand + ' <input type="hidden" name="bulk[brand][]" id="brand' + count + '" class="name" value="' + brand + '" /></td>';
                        output += '<td>' + model + ' <input type="hidden" name="bulk[model][]" id="model' + count + '" class="name" value="' + model + '" /></td>';
                        output += '<td>' + details + ' <input type="hidden" name="bulk[details][]" id="details' + count + '" class="details" value="' + details + '" /></td>';
                        output += '<td>'  + ' <input type="text" name="bulk[imei_or_macaddress][]" id="imei_or_macaddress' + count + '" class="imei_or_macaddress"/></td>';
                        output += '<td>' + or_no + ' <input type="hidden" name="bulk[or_no][]" id="or_no' + count + '" class="or_no" value="' + or_no + '" /></td>';
                        output += '<td>' + supplier_name + ' <input type="hidden" name="bulk[supplier_id][]" id="supplier' + count + '" class="supplier" value="' + supplier_id + '" /></td>';
                        output += '<td>' + warranty_start + ' <input type="hidden" name="bulk[warranty_start][]" id="warranty_start' + count + '" class="warranty_start" value="' + warranty_start + '" /></td>';
                        output += '<td>' + warranty_end + ' <input type="hidden" name="bulk[warranty_end][]" id="warranty_end' + count + '" class="warranty_end" value="' + warranty_end + '" /></td>';

                        // output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="' + count + '">View</button>';
                        // output += '<button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="' + count + '">Remove</button></td>';
                        output += '</tr>';
                        $('#equipment_data').append(output);

                    }


                }

                if (buttonCount == 0) {
                    console.log("Empty Div " + buttonCount);
                    output_submit = '<input type="submit" id="insert" class="btn btn-primary" value="Add to Inventory" />'
                    $('#submit_div').append(output_submit);
                }
            });
            

        
            // Fetch Data for View Modal
        function fetchRecords(id) {
            // id=1;
            $.ajax({
                url: 'getPurchases/' + id,
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    //console.log(response['purchases']);
                    
                    var len = 0;
                    // console.log("display data div null");

                    if (response['purchases'] != null) {
                        len = response['purchases'].length;
                        console.log(response['purchases']);
                        console.log("len: " + len);
                    }

                    if (len > 0){
                        console.log("len > 0");
                        for(var i = 0; i < len; i++){
                            var id = response['purchases'][i].id;
                            var p_id = response['purchases'][i].p_id;
                            var subtype_id = response['purchases'][i].subtype_id;
                            var brand = response['purchases'][i].brand;
                            var model = response['purchases'][i].model;
                            var details = response['purchases'][i].details;
                            var qty = response['purchases'][i].qty;
                            var qty_a = response['purchases'][i].qty_added;
                            var or_no= response['purchases'][i].or_no;
                            var is_part = response['purchases'][i].is_part;
                            var unit_number = response['purchases'][i].unit_number;
                            var supplier_id = response['purchases'][i].supplier_id;
                            var subtype = response['purchases'][i].unit_number;
                            
                            $('#quantity').attr({"max": qty-qty_a});
                            $('#quantity').val(qty-qty_a);
                            $('#subtype').val(subtype_id);
                            $('#brand').val(brand);
                            $('#model').val(model);
                            $('#details').val(details);
                            $('#supplier').val(supplier_id);
                            if(or_no != null){
                                $('#or_no').val(or_no);
                            }
                        }


                    }
                }
            })
        }    
                




    });
    
    // $('#subtype').on('change', function(){
    //     console.log($('#subtype option:selected').text());
    //     if($('#subtype option:selected').text() == 'Motherboard'){
    //         $('textarea#details').val('Socket:\r\nChipset:\r\nSize:\r\nRAM:');
    //     } else if ($('#subtype option:selected').text() == 'CPU')  {
    //         $('textarea#details').val('Socket:\r\nChipset:');
    //     } else {
    //         $('textarea#details').val("Enter Details:");
    //     }
    // });

</script>

@endsection
