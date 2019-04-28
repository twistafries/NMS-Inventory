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
      <div class="d-flex flex-row-reverse">
                                <div class="p-2">

                                  <div class="btn-group" role="group" aria-label="Basic example">

                                      <!-- Add Option-->
                                      <div class="dropdown">
                                        <button class="btn" type="button" id="addOption" data-toggle="modal" data-target="#addUser" daria-haspopup="true" aria-expanded="false">
                                            <a href="#" data-toggle="tooltip"    class="fas fa-user-plus" title="Add">
                                            </a>
                                        </button>
                                    </div>
                                      <!-- Delete -->
                                      <div class="dropdown">
                                        <button class="btn" type="button" id="deleteOption" data-toggle="modal" data-target="#removeUser"   aria-haspopup="true" aria-expanded="false">
                                            <a href="#" data-toggle="tooltip" class="fas fa-user-minus" title="delete">
                                            </a>
                                            </button>
                                    </div>


                                      <!-- Sort -->
                                      <!-- <button type="button" class="btn">
                                          <a href="#" data-toggle="tooltip" title="sort">
                                              <img class="tool-item"  src="../../assets/icons/table-toolbar-icons/sort-icon.png">
                                          </a>
                                      </button> -->



                                  </div>
                              </div>
                            </div>
        <table id="myDataTable" class="table table-borderless table-striped table-hover" style="width:100%; cursor:pointer;">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>User Type</th>
                    <th>Status</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($associates as $associates)
                <tr data-toggle="modal" data-target="#modal-{!! $associates->id !!}">

                    <td>{{ $associates->id  }}</td>
                    <td>{{ $associates->fname  }} {{ $associates->lname }}</td>
                    <td>{{ $associates->email }}</td>
                    <td>{{ $associates->department }}</td>
                    <td>{{ $associates->user_type }}</td>
                    <td>{{ $associates->status }}</td>

                </tr>


                <!-- View Details Modal -->
                <div class="modal fade" id="modal-{!! $associates->id !!}" tabindex="-1" role="dialog">
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
                                        {{ $associates->fname  }} {{ $associates->lname }}
                                        <p class="text-uppercase">{{ $associates->status  }}</p>
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
                                        <form action="{!! url('/editAssociates'); !!}" class="profile-form" id="profile-form" method="post">
                                            <input type="hidden" name="id" value="{!! $associates->id !!}">
                                            {!! csrf_field() !!}
                                            <!--name-->
                                            <div class="" id="divname">
                                                <div class="row row-details">
                                                    <div class="col col-4 detail-header">NAME</div>
                                                    <div class="col col-7 details" id="fullname">{{ $associates->fname  }} {{ $associates->lname }}</div>
                                                    <div class="col col-1 edit" id="name-edit"><u>Edit</u></div>
                                                </div>

                                                <div class="display" id="name">
                                                    <div class="margin row">
                                                        <div class="form-group col col-6">
                                                            <label for="label" class="col-form-label label">First Name</label>
                                                            <input type="text" name="fname" class="form-inline input" value="{!! $associates->fname  !!}">
                                                        </div>
                                                        <div class="form-group col col-6">
                                                            <label for="label" class="col-form-label label">Last Name</label>
                                                            <input type="text" name="lname" class="form-inline input"  value="{!! $associates->lname  !!}">
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
                                                    <div class="col col-1 edit" id="department-edit"><a href="#">Edit</a></div>
                                                    <div class="form-group col col-12">
                                                        <button type="submit" class="btn btn-primary text-uppercase">Save Changes</button>
                                                    </div>
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


                                            <!--password-->
                                            <div id="divpassword">
                                                <div class="row row-details">
                                                    <div class="col col-4 detail-header">PASSWORD</div>
                                                    <div class="col col-1 edit" id="password-edit"><a href="#">Reset Password</a></div>
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
                                                @if( $associates->status == "active")
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

        <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="addAssociateTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div id="addAssociateHeader" class="modal-header">
                        <h5 class="modal-title" id="ModalTitle"><i class="fas fa-user-plus"></i>&nbsp;Add User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{!! url('/addUsers'); !!}" enctype="multipart/form-data" onsubmit="DoSubmit()" method="post" role="form">
                        {!! csrf_field() !!}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                      <label class="label">Employee Name: </label>
                                      <br>
                                      <!--<input type="text" name="name" size="35"><br>-->
                                      <!--Bootstrap-select name-->
                                      <input list="employee" name="employee_id" id="employee_id" onblur="CheckListedEmployee(this.value)" onchange="insertValues()" required>
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
                                                            <form>
                                                                <label class="label">User Type:</label>
                                                                <br>
                                                                <div class="form-group">
                                                                    <select name="user_type">
                                                                      <option value="associate">Associate</option>
                                                                    <option value="admin">Admin</option>

                                                                    </select>
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
                            <button id="save" type="submit" class="btn btn-success"> <span class="fas fa-add"></span>Add</button>
                            <button id="cancel" type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>


    <!-- Remove Employee Modal -->
    <div class="modal fade" id="removeUser" tabindex="-1" role="dialog" aria-labelledby="addAssociateTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div id="addAssociateHeader" class="modal-header">
                    <h5 class="modal-title" id="ModalTitle"><i class="fas fa-user-plus"></i>&nbsp;Remove User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{!! url('/removeUser'); !!}" enctype="multipart/form-data" method="post" onSubmit="DoSubmit()" role="form">
                    {!! csrf_field() !!}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                  <label class="label">Employee Name: </label>
                                  <br>
                                  <!--<input type="text" name="name" size="35"><br>-->
                                  <!--Bootstrap-select name-->
                                  <input list="users" name="user_id" id="user_id" onblur="CheckListedEmployee(this.value)" onchange="insertValuesForUsers()" required>
                                  <datalist id="users">
                                      @foreach ($associatesRem as $associatesRem)
                                      <option data-customvalue="{{ $associatesRem->id}}" data-customdept="{{$associatesRem->dept_id}}" data-email="{{ $associatesRem->email}}" data-cname="{{ $associatesRem->fname}} {{ $associatesRem->lname}}" value="{{ $associatesRem->fname}} {{ $associatesRem->lname}} (ID: {{ $associatesRem->id}})  ({{ $associatesRem->user_type}})">
                                        @switch($associatesRem->dept_id)
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
                                            <td id="idnumforUsers"></td>
                                            <td id="cnameforUsers"></td>
                                            <td id="emailforUsers"></td>
                                            <td id="deptforUsers"></td>
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
        $(document).ready(function() {
            $('#associates').addClass('active');
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
      function insertValuesForUsers(){
        var user = $(user_id).val();
        document.getElementById("idnumforUsers").innerHTML = $('#users [value="' + user + '"]').data('customvalue');
        document.getElementById("cnameforUsers").innerHTML = $('#users [value="' + user + '"]').data('cname');
        document.getElementById("emailforUsers").innerHTML = $('#users [value="' + user + '"]').data('email');
        var dept = ""
        switch($('#users [value="' + user + '"]').data('customdept')){
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

        document.getElementById("deptforUsers").innerHTML = dept;
      }
      function DoSubmit(action){

          var employee = $(employee_id).val();
          document.getElementById("employee_id").value =  $('#employee [value="' + employee + '"]').data('customvalue');
          var user = $(user_id).val();
          document.getElementById("user_id").value = $('#users [value="' + user + '"]').data('customvalue');
          return true;
        }


    </script>


    @stop
