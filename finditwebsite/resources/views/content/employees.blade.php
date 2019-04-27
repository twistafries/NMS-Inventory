<?php
  use Carbon\Carbon;
  $session=Session::get('loggedIn');
  $user_id = $session['id'];
  $fname = $session['fname'];
  $lname = $session['lname'];
  // $img_path = $session['img_path'];
?>

    @extends('../template') @section('css')
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/awesome-bootstrap-checkbox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="{{ asset('css/animate/animate.css') }}"> @stop @section('title') Employees @stop @section('../layout/breadcrumbs') @section('breadcrumbs-title')
    <i class="fas fa-chart-line">Inventory
    @stop
@stop

@section('content')
    <div class="container">
      <div style="height:10px"></div>
      <div class="d-flex flex-row-reverse">
                                <div class="p-2">

      <div class="btn-group" role="group" aria-label="Basic example">
          
                                    <button type="button" class="btn" data-toggle="modal" data-target="#addAssociate" style="padding-left: 15px;"><span class="fas fa-user-plus" data-toggle="tooltip" title="Add Associate" ></span>Add </button>
                                    <button type="button" class="btn " data-toggle="modal" data-target="#removeEmployee"><span class="fas fa-user-minus" data-toggle="tooltip" title="Remove Associate"></span>Remove</button>

                                </div>
                              </div>
                            </div>
        <table id="myDataTable" class="table table-borderless table-striped table-hover" style="width:100%; cursor:pointer;">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Status</th>
                    
                </tr>
            </thead>

            <tbody>
                @foreach ($employees as $employee)
                <tr data-toggle="modal" data-target="#modal-{!! $employee->id !!}">

                    <td>{{ $employee->fname  }} {{ $employee->lname }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->department }}</td>
                    <td>{{ $employee->status }}</td>
                
                </tr>

                
                <!-- View Details Modal -->
                <div class="modal fade" id="modal-{!! $employee->id !!}" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg row">
                        <div class="modal-content">
                            <div class="modal-body row" style="padding: 0 !important; height: 37rem;">
                                <div class="col col-4" style="background: #555555;">
                                    <hr style="color: #FDAD4E; background: #FDAD4E; height: 1px; margin-top: 4.5rem;">
                                    <div class="profile-pic text-center" style="margin-top: 2.5rem; margin-bottom: 5px;">
                                        <img src="../assets/images/user/user.png" class="img-avatar" alt="avatar" srcset=""
                                            style="width: 5rem; height: 5rem; border-width: 2px;">
                                    </div>
                                    <div class="text-center" style="color: white; font-size: 18px; margin-bottom: 0 !important;">
                                        {{ $employee->fname  }} {{ $employee->lname }}
                                        <p class="text-uppercase">{{ $employee->status  }}</p>
                                    </div>
                                    <hr style="color: #FDAD4E; background: #FDAD4E; height: 1px;">
                                    <div class="">
                                    </div>
                                </div>
                                <div class="col col-8" style="padding: 1rem;">
                                    <div class="" style="margin-top: 1rem; margin-left: 1rem;">
                                        <span class="fas fa-times-circle" data-dismiss="modal" aria-label="Close"
                                            aria-hidden="true"></span>
                                        <h5 class="account-settings">Account Settings</h5>
                                        <hr style="color: #FDAD4E; background: #FDAD4E; height: 1px; margin-right: 2rem;">
                                    </div>
                                    
                                    <div class="" style="margin-left: 1rem; margin-right: 2rem;">
                                        <form action="{!! url('/editEmployee'); !!}" class="profile-form" id="profile-form" method="post">
                                            <input type="hidden" name="id" value="{!! $employee->id !!}">
                                            {!! csrf_field() !!}
                                            <!--name-->
                                            <div class="" id="divname">
                                                <div class="row row-details">
                                                    <div class="col col-4 detail-header">NAME</div>
                                                    <div class="col col-7 details" id="fullname">{{ $employee->fname  }} {{ $employee->lname }}</div>
                                                    <div class="col col-1 edit" id="name-edit"><u>Edit</u></div>
                                                </div>

                                                <div class="display" id="name">
                                                    <div class="margin row">
                                                        <div class="form-group col col-6">
                                                            <label for="label" class="col-form-label label">First Name</label>
                                                            <input type="text" name="fname" class="form-inline input" value="{!! $employee->fname  !!}">
                                                        </div>
                                                        <div class="form-group col col-6">
                                                            <label for="label" class="col-form-label label">Last Name</label>
                                                            <input type="text" name="lname" class="form-inline input"  value="{!! $employee->lname  !!}">
                                                        </div>
                                                        <div class="form-group col col-12">
                                                            <button type="submit" class="btn btn-primary text-uppercase">Save Changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Department-->
                                            <div id="divdepartment">
                                                <div class="row row-details">
                                                    <div class="col col-4 detail-header">DEPARTMENT</div>
                                                    <div class="col col-7 details" id="department-info">IT Department</div>
                                                    <div class="col col-1 edit" id="department-edit"><u>Edit</u></div>
                                                </div>
                                                <!--department collapse-->
                                                <div class="display" id="department"> 
                                                    <div class="margin">
                                                        <div class="form-group row">
                                                            <select class="department-select" name="department">
                                                                <option></option>
                                                                <option value="dept1">Information Technology Development Department</option>
                                                                <option value="dept2">Production Development Department</option>
                                                                <option value="dept3">Financial Department</option>
                                                                <option value="dept4">Human Resources Department</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!--Email-->
                                            <div id="divemail">
                                                <div class="row row-details">
                                                    <div class="col col-4 detail-header">EMAIL</div>
                                                    <div class="col col-7 details" id="email-add">{{ $employee->email }}</div>
                                                    <div class="col col-1 edit" id="email-edit"><u>Edit</u></div>
                                                </div>
                                                <!--email collapse-->
                                                <div class="text-center display remove-padding" id="email">
                                                    <div class="margin">
                                                        <div class="form-group row">
                                                            <div class="col col-2">
                                                                <label for="label" class="col-form-label label">Email</label>
                                                            </div>
                                                            <div class="col col-10">
                                                                <input type="email" name="email" class="form-inline input" value="{!! $employee->email !!}">
                                                            </div>
                                                            <div class="form-group col col-12">
                                                                <button type="submit" class="btn btn-primary text-uppercase">Save Changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--password-->
                                            <div id="divpassword">
                                                <div class="row row-details">
                                                    <div class="col col-4 detail-header">PASSWORD</div>
                                                    <div class="col col-7 details" id="password-info">***********</div>
                                                    <div class="col col-1 edit" id="password-edit"><u>Reset</u></div>
                                                </div>
                                                <!--password modal-->
                                                <div class="text-center display remove-padding" id="password">
                                                    <div class="margin">
                                                        <div class="form-group row">
                                                            <div class="col col-4">
                                                                <label for="" class="col-form-label label">Old Password</label>
                                                            </div>
                                                            <div class="col col-8">
                                                                <input type="password" class="form-inline input" id=""
                                                                    name="oldPassword">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="margin">
                                                        <div class="form-group row">
                                                            <div class="col col-4">
                                                                <label for="" class="col-form-label label">New Password</label>
                                                            </div>
                                                            <div class="col col-8">
                                                                <input type="password" class="form-inline input" id=""
                                                                    name="newPassword">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="margin">
                                                        <div class="form-group row">
                                                            <div class="col col-4">
                                                                <label for="" class="col-form-label label">Repeat Password</label>
                                                            </div>
                                                            <div class="col col-8">
                                                                <input type="password" class="form-inline input" id="" name="repeat">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center display" id="cancel-save">
                                                    <button type="button" class="btn btn-danger b password-cancel cancel" id="buttons"
                                                        name="">Cancel</button>
                                                    <button type="button" class="btn btn-success b cancel" id="buttons">Save</button>
                                                </div>
                                            </div>

                                            <div id="divstatus">
                                                @if( $employee->status == "active")
                                                <button class="btn btn-secondary" id="deactivate" type="submit">
                                                    <input type="hidden" name="status" value="inactive">
                                                    Deactivate
                                                </button>
                                                @else
                                                <button class="btn btn-info" id="activate" type="submit">
                                                    <input type="hidden" name="status" value="active">
                                                    Activate
                                                </button>
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </tbody>

        </table>

                                            <!-- Add Employee Modal -->
                                            <div class="modal fade" id="addAssociate" tabindex="-1" role="dialog" aria-labelledby="addAssociateTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div id="addAssociateHeader" class="modal-header">
                                                            <h5 class="modal-title" id="ModalTitle"><i class="fas fa-user-plus"></i>&nbsp;Add Employee</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <form action="{!! url('/addEmployee'); !!}" enctype="multipart/form-data" method="post" role="form">
        {!! csrf_field() !!}
        <div class="modal-body" style="height: auto">
            <div class="row">
                <div class="col-3">
                  <label class="label">Id No.</label><p>1</p>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <label class="label">First Name: </label>
                    <br>
                    <input type="text" name="fname">
                    <br>
                </div>
                <div class="col-6">
                    <label class="label">Last Name: </label>
                    <br>
                    <input type="text" name="lname">
                    <br>
                </div>
            </div>
            <div class="row-12">
                <label class="label">Email:</label>
                <br>
                <input type="text" name="email" size="43">
                <br>
            </div>
            <div class="row">
                
                <div class="col-12">
                    <label class="label">Department:</label>
                    <div class="form-group">
                        <select class="exampleFormControlSelect1" name="dept_id" style="width:380px;">
                                                                            <option value="1">Information Technology Development Department</option>
                                                                            <option value="2">Production Development Department</option>
                                                                            <option value="3">Financial Department</option>
                                                                            <option value="4">Human Resources Department</option>
                                                                            </select>
                    </div>
                </div>
      
              
            </div>
        </div>
        <div class="modal-footer">
            <button id="save" type="submit" class="btn-success"> <span class="fas fa-plus"></span>ADD</button>
            <button id="cancel" type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
        </div>
        </div>
    </form>
    </div>
    </div>


    <!-- Remove Employee Modal -->
    <div class="modal fade" id="removeEmployee" tabindex="-1" role="dialog" aria-labelledby="addAssociateTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div id="addAssociateHeader" class="modal-header">
                    <h5 class="modal-title" id="ModalTitle"><i class="fas fa-user-plus"></i>&nbsp;Remove Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{!! url('/removeEmployee'); !!}" enctype="multipart/form-data" method="post" role="form">
                    {!! csrf_field() !!}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <label class="label">Name:</label>
                                <br>
                                <div class="form-group">
                                    <select class="selectpicker" data-live-search="true" name="employee_id">
                                                              @foreach ($employees as $employee)
                                                                <option value="{{$employee->id}}">{{$employee->fname}} {{$employee->lname}} ID:{{$employee->id}}</option>
                                                              @endforeach

                                                            </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="label">Details </label>
                                <br>
                                <div class="container">


                                    <table style="width:100%">
                                        <tr>
                                            <th>ID Number</th>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Email</th>
                                            <th>Department</th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                    </table>



                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button id="save" type="submit" class="btn btn-success"> <span class="fas fa-save"></span>SAVE</button>
                        <button id="cancel" type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>


    @stop @section('script')

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
        $(function() {
            $('select').selectpicker();
        });

    </script>
    <script>
        $(document).ready(function() {
            $('#employees').addClass('active');
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('input').attr('autocomplete', 'off');
        });

    </script>
    <script>
        $(document).ready(function() {
            $('#myDataTable').DataTable({
                "pagingType": "full_numbers",
                responsive: true,
                "order": []
            });
        });

    </script>

    <script>
        $(function() {
            $.fn.showInfo = function(elementsHideID, elementsShowID) {
                $("#" + elementsHideID + " > .display").show();
                $.each(elementsShowID, function(index, value) {
                    $("#" + value + " > .display").hide();
                });
            }

            $("#divname .edit").click(function() {
                $.fn.showInfo("divname", ["divdepartment", "divemail", "divpassword"]);
                $("#cancel-save").show();
                $(".password-cancel").click(function() {
                    $("#name").hide();
                    $("#cancel-save").hide();
                });
            });

            $("#divdepartment .edit").click(function() {
                $.fn.showInfo("divdepartment", ["divname", "divemail", "divpassword"]);
                $("#cancel-save").show();
                $(".password-cancel").click(function() {
                    $("#department").hide();
                    $("#cancel-save").hide();
                });
            });

            $("#divemail .edit").click(function() {
                $.fn.showInfo("divemail", ["divname", "divdepartment", "divpassword"]);
                $("#cancel-save").show();
                $(".password-cancel").click(function() {
                    $("#email").hide();
                    $("#cancel-save").hide();
                });
            });

            $("#divpassword .edit").click(function() {
                $.fn.showInfo("divpassword", ["divname", "divdepartment", "divemail"]);
                $("#cancel-save").show();
                $(".password-cancel").click(function() {
                    $("#password").hide();
                    $("#cancel-save").hide();
                });
            });
        });

    </script>


    @stop
