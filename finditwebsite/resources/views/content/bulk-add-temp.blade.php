<?php
  use Carbon\Carbon;
  $session=Session::get('loggedIn');
  $user_id = $session['id'];
  $fname = $session['fname'];
  $lname = $session['lname'];
  // $img_path = $session['img_path'];
?>

@extends('../template')

@section('title')
Temporary Bulk-Add Page
@endsection


@section('content')
<h3 align="center">Temporary Bulk Add Page</h3>
<br>

<div align="right" style="margin-bottom:5px;">
    <button type="button" name="add" id="add" data-toggle="modal" data-target="#bulkAddModal" class="btn btn-success btn-xs">Add</button>
</div>
<br>

<!-- Table Form -->
<div class="col-12 card">
    <div class="card-body">
        <form method="post" id="bulk_form">
            {!! csrf_field() !!}
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Subtype ID</th>
                            <th>Name</th>
                            <th>Details</th>
                            <th>Serial No.</th>
                            <th>OR No.</th>
                            <th>Supplier</th>
                            <th>Warranty Details</th>
                            <th>MAC or IMEI</th>
                            <th>Unit ID</th>
                            <th>Supplier</th>
                            <th>Warranty Details</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="equipment_data">
        
                    </tbody>
                </table>
            </div>
            <div align="center">
                <input type="submit" id="insert" class="btn btn-primary" value="Insert" />
            </div>
        </form>
    </div>
</div>

<!-- Bulk Add Modal -->
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
                    <div class="row">
                        <!-- Quantity -->
                        <div class="col col-lg-3 col-md col-sm col-xs">
                            <p class="card-title">Quantity</p>
                            <input type="number" class="form-control" name="quantity" id="quantity" min="1" max="250">
                        </div>
                        
                        <!-- Subtype -->
                        <div class="col col-lg-9 col-md col-sm col-xs">
                            <div class="form-group">
                                <p class="card-title">Subtype</p>
                                <select id="subtype" class="custom-select">
                                    <option id="initial-category-value">Computer Component</option>
                                    @foreach ($component_subtypes as $component_subtypes)
                                    <option class="option" value="{!! $component_subtypes->id !!}">{{ $component_subtypes->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Name -->
                        <div class="col col-lg-12 col-md col-sm col-xs">
                            <div class="form-group">
                                <p class="card-title">Name</p>
                                <input type="text" name="name" id="name" class="form-control" />
                                <span id="error_name" class="text-danger"></span>
                            </div>
                        </div>
                        
                        <!-- Details -->
                        <div class="col col-lg-12 col-md col-sm col-xs">
                            <div class="form-group">
                                <p class="card-title">Details</p>
                                <input type="textarea" name="details" id="details" class="form-control" />
                                <span id="error_details" class="text-danger"></span>
                            </div>
                        </div>
                        
                        <div class="col col-lg-6 col-md col-sm col-xs">
                            <div class="form-group">
                                <p class="card-title">Serial Number</p>
                                <input type="text" name="serial_no" id="serial_no" class="form-control" />
                                <span id="error_serial_no" class="text-danger"></span>
                            </div>
                        </div>
                        
                        <div class="col col-lg-6 col-md col-sm col-xs">
                            <div class="form-group">
                                <p class="card-title">OR Number</p>
                                <input type="text" name="or_no" id="or_no" class="form-control" />
                                <span id="error_or" class="text-danger"></span>
                            </div>
                        </div>

                        <div class="col col-lg-6 col-md col-sm col-xs">
                            <div class="form-group">
                                <p class="card-title">Supplier</p>
                                <input type="text" name="supplier" id="supplier" class="form-control" />
                                <span id="error_supplier" class="text-danger"></span>
                            </div>
                        </div>
                    </div>             
                    
                </div>
            </div>


            <div class="modal-footer align-content-center">
                <div class="form-group">
                    <input type="hidden" name="row_id" id="hidden_row_id" />
                    <button type="button text-uppercase" name="save" id="save" class="btn btn-info">Save</button>                    
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade success-modal" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalTitle"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header success-header">
                <h5 class="modal-title" id="ModalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body success-body" id="success-message">
                <i id="successIcon" class="far fa-check-circle fa-10x"></i>
                <p id="successText">You have sucessfully added ........</p>
            </div>

            <div class="modal-footer success-footer">
                <button id="okSuccessButton" type="button" class="btn btn-success" data-dismiss="modal">Add</button>
            </div>
        </div>
    </div>
</div>

<!-- Empty Modal -->
<div class="modal fade empty-modal" id="emptyModal" tabindex="-1" role="dialog" aria-labelledby="emptyModalTitle"
    aria-hidden="true">

    <div class="modal-sm modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header success-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body empty-body" id="empty-message">
                <p id="successText">Empty fields. No data selected.</p>
            </div>

            <div class="modal-footer success-footer">
                <button id="okSuccessButton" type="button" class="btn btn-success" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
<script>
    $('#save').click(function(){
        var count = 1;
        var quantity = $('#quantity').val();
        var error_name = '';
        var error_details = '';
        var error_serial_no = '';
        var error_or = '';
        var error_supplier = '';
        var error_warranty_details = '';

        // if($('#name').val() == ''){
        //     error_name = 'Name is required';
        //     $('#error_name').text(error_name);
        //     $('#name').css('border-color', '#cc0000');
        //     name = '';
        // }else{
        //     error_first_name = '';
        //     $('#error_first_name').text(error_first_name);
        //     $('#first_name').css('border-color', '');
        //     first_name = $('#first_name').val();
        // }

        if($('#save').text() == 'Save'){
            var subtype_id = $('#subtype').val();
            // console.log(subtype_name);

            var subtype_name = $("select#subtype").change().children("option:selected").text();
            var name = $('#name').val();
            var details = $('#details').val();
            var serial_no = $('#serial_no').val();
            var or_no = $('#or_no').val();
            var supplier = $('#supplier').val();
            var warranty = $('#warranty_details').val();
            for(count = 1; count <= quantity; count++){
                // console.log(name);
                output = '<tr id="row_' + count + '">';
                output += '<td>' + count + '</td>';
                output += '<td> <input type="hidden" name="hidden_subtype_id[]" id="subtype_id'+count+'" class="subtype_id" value="'+subtype_id+'" />' + subtype_name + '</td>';
                output += '<td>'+name+' <input type="hidden" name="hidden_name[]" id="name'+count+'" class="name" value="'+name+'" /></td>';
                output += '<td>'+details+' <input type="hidden" name="hidden_details[]" id="details'+count+'" class="details" value="'+details+'" /></td>';
                output += '<td>'+serial_no+' <input type="hidden" name="hidden_serial_no[]" id="serial_no'+count+'" class="serial_no" value="'+serial_no+'" /></td>';
                output  += '<td>'+or_no+' <input type="hidden" name="hidden_or_no[]" id="or_no'+count+'" class="or_no" value="'+or_no+'" /></td>';
                output  += '<td>'+supplier+' <input type="hidden" name="hidden_supplier[]" id="supplier'+count+'" class="supplier" value="'+supplier+'" /></td>';
                output  += '<td>'+warranty+' <input type="hidden" name="hidden_warranty[]" id="warranty'+count+'" class="warranty" value="'+supplier+'" /></td>';
                
                output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+count+'">View</button>';
                output += '<button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Remove</button></td>';
                output += '</tr>';
                $('#equipment_data').append(output);
            }

        }
    });


    $('#bulk_form').on('submit' , function(event){
        event.preventDefault();

        var count_data = 0;
        $('.name').each(function(){
            count_data = count_data + 1;
        });

        if(count_data > 0){
            var form_data = $(this).serialize();

            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });
            console.log(form_data);
            $.ajax({
                url: "{!! url('/temp-bulk-add-post'); !!}" , 
                method: "POST" ,
                data: {
                    'form_data': form_data,
                },
                success: function(data){
                    $('#equipment_data').find("tr:gt(0)").remove();
                    $('#successModal').modal('show')
                    console.log("Data Inserted Successfully");
                }
            })
        }else{
            $('#emptyModal').modal('show')
            $('#successModal').on('shown.bs.modal', function () {
                $('#myInput').trigger('focus')
            })
        }
    });

</script>


@endsection