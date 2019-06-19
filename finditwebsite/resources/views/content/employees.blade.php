<?php
  use Carbon\Carbon;
  $session=Session::get('loggedIn');
  $user_id = $session['id'];
  $fname = $session['fname'];
  $lname = $session['lname'];
  $email = $session['email'];
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
@if(Session::has('warning'))
<div class="alert alert-warning" role="alert">
    <h4 class="alert-heading">Warning</h4>
    {{ Session::get('warning') }}
    <button type="button" class="close btn-primary" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(Session::has('error'))
<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Error</h4>
  {{ Session::get('error') }}

  @if(Session::has('error_info'))
    <a class="btn btn-fail" data-toggle="collapse" href="#errorInfoCollapse" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"> <span>▶</span> </a>
      <!-- <span class="glyphicon glyphicon-chevron-down"></span> -->


    <div class="collapse multi-collapse" id="errorInfoCollapse">
      <div class="container">
          <small>{{ Session::get('error_info') }}</small>
      </div>
    </div>
  @endif
  @if(Session::has('target') !== null)
    <a class="alert-link" data-toggle="modal" data-target="{!! Session::get('target') !!}" href="#">Please try again</a>
  @endif

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(Session::has('message'))
<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Success</h4>
  {{ Session::get('message') }}

  @if(Session::has('data'))
  {{ Session::get('message') }}
  @endif
  @if(Session::has('eq_id'))
  <a class="btn btn-success" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"> <span class="glyphicon glyphicon-chevron-down"></span></a>
  <br>
   <div class="collapse multi-collapse" id="multiCollapseExample1">
      <div class="container">
        ID: {{ Session::get('eq_id') }} <br>
        Brand: {{ Session::get('brand') }} <br>
        Model: {{ Session::get('model') }} <br>
        Details: {{ Session::get('details') }} <br>
        Serial Number: {{ Session::get('serial_no') }} <br>
        IMEI or Physical Address: {{ Session::get('imei') }} <br>
        OR: {{ Session::get('or_no') }} <br>
        Warranty Start: {{ Session::get('warranty_start') }} <br>
        Warranty End: {{ Session::get('warranty_end') }} <br>
      </div>
    </div>

  @endif
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

    <div class="container-fluid">
      <div style="height:10px"></div>
      <div class="d-flex flex-row-reverse">
                                <div class="p-2">

      <div class="btn-group" role="group" aria-label="Basic example">


                    <!-- Add -->
                    <button class="btn btn-outline-dark rounded-pill mr-2" type="button" id="addOption" data-toggle="modal" data-target="#addEmployee" daria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-plus"></i> Add Employee
                    </button>

                    <!-- Delete -->




            </div>
            </div>
        </div>
        <table id="employeeTable" class="table table-borderless table-striped table-hover" style="width:100%; cursor:pointer;">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Status</th>
                    <th>Total Issued</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($employees as $employee)
                <tr data-toggle="modal" data-target="#modal-{!! $employee->id !!}">

                    <td>{{ $employee->id  }}</td>
                    <td>{{ $employee->fname  }} {{ $employee->lname }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->department }}</td>
                    <td>{{ $employee->status }}</td>
                    <td>{{$totalIssued[$employee->id]}}</td>
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
                                                    <div class="col col-1 edit" id="name-edit"><a href="#">Edit</a></div>
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
                                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Department-->
                                            <div id="divdepartment">
                                                <div class="row row-details">
                                                    <div class="col col-4 detail-header">DEPARTMENT</div>
                                                    <div class="col col-7 details" id="department-info">{{ $employee->department }}</div>
                                                    <div class="col col-1 edit" id="department-edit"><a href="#">Edit</a></div>
                                                </div>
                                                <!--department collapse-->
                                                <div class="display" id="department">
                                                    <div class="margin">
                                                        <div class="form-group row">
                                                            <select class="department-select" name="dept_id">
                                                                <option value="{!! $employee->dept_id !!}"></option>
                                                                <option value="1">Information Technology Development Department</option>
                                                                <option value="2">Production Development Department</option>
                                                                <option value="3">Financial Department</option>
                                                                <option value="4">Human Resources Department</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group col col-12">
                                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Email-->
                                            <div id="divemail">
                                                <div class="row row-details">
                                                    <div class="col col-4 detail-header">EMAIL</div>
                                                    <div class="col col-7 details" id="email-add">{{ $employee->email }}</div>
                                                    <div class="col col-1 edit" id="email-edit"><a href="#">Edit</a></div>
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
                                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </form>
                                            <div id="divstatus">
                                                @if( $employee->status == "active" && $email != $employee->email )

                                                <button class="btn btn-secondary" data-toggle="modal" data-target="#confirmationDeactivate" type="submit">

                                                    Deactivate
                                                </button>
                                                @elseif($employee->status == "inactive" && $email != $employee->email)
                                                <button class="btn btn-info" id="activate" data-toggle="modal" data-target="#confirmationActivate" >

                                                    Activate
                                                </button>
                                                @endif
                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </tbody>

        </table>

        <div class="modal fade" id="confirmationDeactivate" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content" style="height:450px; width:580px">
              <form action="{!! url('/changeStatusEmployee'); !!}" class="profile-form" id="profile-form" method="post">
                  <input type="hidden" name="id" id="idOfEmployee" value="">
                  <input  type="hidden" type="text" name="name" id="employeeName" class="form-inline input" value="">
                  <input type="hidden" name="status" value="inactive">
                  {!! csrf_field() !!}

                    <div class="modal-header">
                        <div class="container">
                                            <h5 class="modal-title">Confirmation of Deactivation</h5>

                        </div>



                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="container-fluid">
                            <h4 id="nameOfEmployee" class="text-center"> ?</h4>
                            <hr>
                            <h6 id="total_issued" class="text-center"></h6>
                            <hr>
                            <h6 style="color:red"> Note: All items will be mark as available by deactivating this account.</h6>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Yes</button>

                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="confirmationActivate" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content" style="height:300px;width:auto">
              <form action="{!! url('/changeStatusEmployee'); !!}" class="profile-form" id="profile-form" method="post">
                  <input type="hidden" name="id" id="idOfEmployee1" value="">
                  <input  type="hidden" type="text" name="name" id="employeeName1" class="form-inline input" value="">
                  <input type="hidden" name="status" value="active">
                  {!! csrf_field() !!}
                    <div class="modal-header">
                        <div class="container">
                                            <h5 class="modal-title">Confirmation</h5>

                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="container-fluid">
                            <h4 id="nameOfEmployee1" class="text-center"></h4>
                            <hr>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Yes</button>

                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>





<!-- Add Employee Modal -->
<div class="modal fade" id="addEmployee" tabindex="-1" role="dialog" aria-labelledby="addEmployeeTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="height:450px;">
            <div id="addEmployeeHeader" class="modal-header">
                <h5 class="modal-title" id="ModalTitle"><i class="fas fa-user-plus"></i>&nbsp;Add Employee</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <form action="{!! url('/addEmployee'); !!}" enctype="multipart/form-data" method="post" role="form">
        {!! csrf_field() !!}
        <div class="modal-body" style="height: auto">
            <div class="row">
                <div class="col-3">
                  <label class="label">Id No.</label>{{$lastid->id+1}}
                  <input type="text" value="{!! $lastid->id+1 !!}" name="id" hidden>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <span style="color:red">*</span><label class="label">First Name: </label>
                    <br>
                    <input type="text" name="fname" required>
                    <br>
                </div>
                <div class="col-6">
                  <span style="color:red">*</span>
                    <label class="label">Last Name: </label>
                    <br>
                    <input type="text" name="lname" required>
                    <br>
                </div>
            </div>
            <div class="row-12">
              <span style="color:red">*</span>
                <label class="label">Email:</label>
                <br>
                <input type="text" name="email" size="43" required>
                <br>
            </div>
            <div class="row">

                <div class="col-12"><span style="color:red">*</span>
                    <label class="label">Department:</label>
                    <div class="form-group">
                        <select class="exampleFormControlSelect1" name="dept_id" style="width:380px;" required>
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
            <button id="save" type="submit" class="btn-success" data-toggle="modal" data-target="#success-message"> <span class="fas fa-plus"></span>Add</button>
            <button id="cancel" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
        </div>
    </form>
    </div>
    </div>

     <div class="modal fade" id="success-message" tabindex="-1" role="dialog" aria-labelledby="successModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div id="successAssociate" class="modal-header">
                    <h5 class="modal-title" id="ModalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <i id="successIcon" class="far fa-check-circle fa-10x"></i>
                    <p id="successText">Employee was successfully added!</p>
                </div>
                <div class="modal-footer">
                    <button id="okSuccessButton" type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Remove Employee Modal -->
    <div class="modal fade" id="removeEmployee" tabindex="-1" role="dialog" aria-labelledby="removeEmployeeTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="height:450px;">
                <div id="removeEmployeeHeader" class="modal-header">
                    <h5 class="modal-title" id="ModalTitle"><i class="fas fa-user-plus"></i>&nbsp;Remove Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{!! url('/removeEmployee'); !!}" enctype="multipart/form-data" onsubmit="DoSubmit()" method="post" role="form">
                    {!! csrf_field() !!}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                  <label class="label">Employee Name: </label>
                                  <br>
                                  <!--<input type="text" name="name" size="35"><br>-->
                                  <!--Bootstrap-select name-->
                                  <input list="employee" name="employee_id" id="employee_id" onchange="insertValues()" required>
                                  <datalist id="employee">
                                      @foreach ($employees as $employees)
                                      <option data-customvalue="{{ $employees->id}}" data-customdept="{{$employees->dept_id}}" data-email="{{ $employees->email}}" data-cname="{{ $employees->fname}} {{ $employees->lname}}" value="{{ $employees->fname}} {{ $employees->lname}} (ID: {{ $employees->id}})">
                                        @switch($employees->dept_id)
                                          @case(1)
                                              ITDD
                                              @break
                                          @case(2)
                                              PDD
                                              @break
                                          @case(3)
                                              FD
                                              @break
                                          @case(4)
                                              HRD
                                              @break

                                      @endswitch
                                      </option>
                                      @endforeach
                                    </datalist>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="label">Details </label>
                                <br>
                                <div class="container">


                                    <table id="info" style="width:100%">
                                        <tr>
                                            <th>ID Number</th>
                                            <th>Fullname</th>
                                            <th>Email</th>
                                            <th>Department</th>
                                        </tr>
                                        <tr>
                                            <td id="idnum"></td>
                                            <td id="cname"></td>
                                            <td id="email-in"></td>
                                            <td id="dept"></td>
                                        </tr>

                                    </table>



                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button id="save" type="submit" class="btn btn-warning"> <span class="fas fa-trash "></span>Remove</button>
                        <button id="cancel" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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
            $('#employeeTable').DataTable({
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
    <script>
      function insertValues(){
        var employee = $(employee_id).val();
        document.getElementById("idnum").innerHTML = $('#employee [value="' + employee + '"]').data('customvalue');
        document.getElementById("cname").innerHTML = $('#employee [value="' + employee + '"]').data('cname');
        document.getElementById("email-in").innerHTML = $('#employee [value="' + employee + '"]').data('email');
        var dept = ""
        switch($('#employee [value="' + employee + '"]').data('customdept')){
          case 1:
              dept = "ITDD";
              break;
          case 2:
              dept = "PDD";
              break;
        case 3:
              dept = "FD";
              break;
          case 4:
              dept = "HRD";
              break;
        }

        document.getElementById("dept").innerHTML = dept;
      }
      function DoSubmit(){
        var employee = $(employee_id).val();
        document.getElementById("employee_id").value = $('#employee [value="' + employee + '"]').data('customvalue');
        return true;
        }
    </script>
    <script>

        var table = document.getElementById('employeeTable');

        for(var i = 1; i < table.rows.length; i++)
        {
            table.rows[i].onclick = function()
            {
                document.getElementById("idOfEmployee").value = this.cells[0].innerHTML;
                 document.getElementById("employeeName").value = this.cells[1].innerHTML;
                 document.getElementById("nameOfEmployee").innerHTML = "Are you sure you want to deactivate the account of "+this.cells[1].innerHTML+"?";
                 document.getElementById("total_issued").innerHTML = "This employee has "+this.cells[5].innerHTML+ " unreturned item/s in their issuance.";

                 document.getElementById("idOfEmployee1").value = this.cells[0].innerHTML;
                  document.getElementById("employeeName1").value = this.cells[1].innerHTML;
                  document.getElementById("nameOfEmployee1").innerHTML = "Are you sure you want to activate the account of "+this.cells[1].innerHTML+"?";
            };
        }

    </script>


    @stop
