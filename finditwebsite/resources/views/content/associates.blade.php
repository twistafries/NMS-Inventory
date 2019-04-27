<?php
  use Carbon\Carbon;
  $session=Session::get('loggedIn');
  $user_id = $session['id'];
  $fname = $session['fname'];
  $lname = $session['lname'];
  // $img_path = $session['img_path'];
?>

@extends('../template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/awesome-bootstrap-checkbox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
@stop

@section('title')
    Associates
@stop

@section('../layout/breadcrumbs')
    @section('breadcrumbs-title')
    <i class="fas fa-chart-line">Inventory
    @stop
@stop

@section('content')
<form action="" id="form1">
    <!-- Toolbox -->
    <!-- <div class="d-flex flex-row-reverse">
        <div class="p-2">
            <span>
                <a id="multiple_select" href="#" data-toggle="tooltip" title="Multiple Select">
                    <img class="tool-item" src="../../assets/icons/table-toolbar-icons/checkbox-icon.png">
                </a>
            </span>

            <span>
                <a href="#" data-toggle="tooltip" title="Edit">
                    <img class="tool-item" src="../../assets/icons/table-toolbar-icons/edit-icon.png">
                </a>
            </span>

            <span>
                <a href="#" data-toggle="tooltip" title="Add">
                    <img class="tool-item" src="../../assets/icons/table-toolbar-icons/add-icon.png">
                </a>
            </span>

            <span>
                <a href="#" data-toggle="tooltip" title="Hide/Unhide Columns">
                    <img class="tool-item" src="../../assets/icons/table-toolbar-icons/view.png">
                </a>
            </span>

            <span>
                <a href="#" data-toggle="tooltip" title="Delete Row(s)">
                    <img class="tool-item" src="../../assets/icons/table-toolbar-icons/delete-icon.png">
                </a>
            </span>

            <span>
                <a href="#" data-toggle="tooltip" title="Sort by Column">
                    <img class="tool-item" src="../../assets/icons/table-toolbar-icons/sort-icon.png">
                </a>
            </span>

        </div>
    </div> -->

                        <!-- Page Content -->
                    <div class="container p-lg-2 p-md-1 p-sm-0">
                        <div class="container">

                            <!-- Toolbox -->
                            <div class="d-flex flex-row-reverse">
                                <div class="p-2">




                                    <!-- Add User Modal -->
                                    <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="addUserTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div id="addUserHeader" class="modal-header">
                                                    <h5 class="modal-title" id="ModalTitle"><i class="fas fa-user-plus"></i>&nbsp;Add User</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="row">
                                                        <div class="col">
                                                            <form>
                                                                <label class="label">Employee Name: </label>
                                                                <br>
                                                                <!--<input type="text" name="name" size="35"><br>-->
                                                                <!--Bootstrap-select name-->
                                                                <input  list="items" name="items" id="equipment" onblur="CheckListed(this.value);" required>
                                                                  <datalist id="items">
                                                                    <select>
                                                                    @foreach ($employees as $employees)
                                                                    <option value="{{ $employees->fname }} {{ $employees->lname }} (ID:{{ $employees->id }})">
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
                                                                  </select>
                                                                  </datalist>
                                                            </form>


                                                        </div>


                                                    </div>
                                                    <br>

                                                    <!--User type dropdown-->
                                                    <div class="row">
                                                        <div class="col">
                                                            <form>
                                                                <label class="label">User Type:</label>
                                                                <br>
                                                                <div class="form-group">
                                                                    <select class="exampleFormControlSelect1">
                                                                    <option>Admin</option>
                                                                    <option>Associate</option>
                                                                   
                                                                    </select>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>


                                                    <br>
                                                    <!--Employee Details Table-->
                                                    <div class="row">
                                                        <div class="col">
                                                            <label class="label">Details</label>
                                                            <br>
                                                            <div class="container">
                                                                <table style="width:100%">
                                                                    <tr>
                                                                        <th>Firstname</th>
                                                                        <th>Lastname</th>
                                                                        <th>Email</th>
                                                                        <th>Department</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Null</td>
                                                                        <td>Null</td>
                                                                        <td>Null</td>
                                                                        <td>Null</td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="modal-footer">
                                                    <button id="save" type="button" class="btn btn-success" data-dismiss="modal" data-toggle="modal" href="#successAssociate"> <span class="fas fa-plus"></span>ADD</button>
                                                    <button id="cancel" type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                   

                                    <!-- Remove User Modal -->
                                    <div class="modal fade" id="removeUser" tabindex="-1" role="dialog" aria-labelledby="removeUserTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div id="removeUserHeader" class="modal-header">
                                                    <h5 class="modal-title" id="ModalTitle"><i class="fas fa-user-plus"></i>&nbsp;Remove User</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <form>
                                                                <label class="label">Employee Name: </label>
                                                                <br>
                                                                <!--<input type="text" name="name" size="35"><br>-->
                                                                <!--Bootstrap-select name-->
                                                                <input  list="items" name="items" id="equipment" onblur="CheckListed(this.value);" required>
                                                                  <datalist id="items">
                                                                    <select>
                                                                    @foreach ($associates as $associate)
                                                                    <option value="{{ $associate->fname }} {{ $associate->lname }} (ID:{{ $associate->id }})">
                                                                          @switch($associate->dept_id)
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
                                                                  </select>
                                                                  </datalist>
                                                            </form>
                                                        </div>
                                                    </div>

                                                    <br>
                                                    <!--Employee Details Table-->
                                                    <div class="row">
                                                        <div class="col">
                                                            <label class="label">Details</label>
                                                            <br>
                                                            <div class="container">
                                                                <table style="width:100%">
                                                                    <tr>
                                                                        <th>Firstname</th>
                                                                        <th>Lastname</th>
                                                                        <th>Email</th>
                                                                        <th>Department</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Null</td>
                                                                        <td>Null</td>
                                                                        <td>Null</td>
                                                                        <td>Null</td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button id="save" type="button" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" href="#successRemoveAssociate"> <span class="fas fa-minus"></span>    REMOVE</button>
                                                    <button id="cancel" type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <!-- Modal Associate successfully added!-->
                                    <div class="modal fade" id="successAssociate" tabindex="-1" role="dialog" aria-labelledby="successModalTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div id="successAssociate" class="modal-header">
                                                    <h5 class="modal-title" id="ModalTitle"></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <i id="successIcon" class="far fa-check-circle fa-10x"></i>
                                                    <p id="successText">User ($Name) successfully added!</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button id="okSuccessButton" type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Associate successfully removed!-->
                                    <div class="modal fade" id="successRemoveAssociate" tabindex="-1" role="dialog" aria-labelledby="successRemoveModalTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div id="successRemoveAssociate" class="modal-header">
                                                    <h5 class="modal-title" id="ModalTitle"></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <i id="successIcon" class="far fa-check-circle fa-10x"></i>
                                                    <p id="successText">User ($Name) successfully removed!</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button id="okSuccessButton" type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--- Failed To Add Associate Modal Design --->
                                    <!-- Modal -->
                                    <div class="modal fade" id="failedModal" tabindex="-1" role="dialog" aria-labelledby="failedModalTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div id="failedHeader" class="modal-header">
                                                    <h5 class="modal-title" id="ModalTitle"></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <i id="failedIcon" class="far fa-times-circle fa-10x"></i>
                                                    <p id="failedText">Failed to add ($Name) Associate!</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button id="retryFailedButton" type="button" class="btn btn-danger" data-dismiss="modal">RETRY</button>
                                                    <button id="okFailedButton" type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>





                                    <!-- Associate tools ADD EDIT DELETE-->
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn " data-toggle="modal" data-target="#addUser" style="padding-left: 15px;"><span class="fas fa-user-plus" data-toggle="tooltip" title="Add  User" ></span>Add </button>
                                        <!--                                        <button type="button" class="btn" data-toggle="modal" data-target="#"><span class="fas fa-user-edit" data-toggle="tooltip" title="Edit Associate"></span></button>-->
                                        <button type="button" class="btn " data-toggle="modal" data-target="#removeUser"><span class="fas fa-user-minus" data-toggle="tooltip" title="Remove User"></span>Remove</button>


                                        <!--
                                        <button  type="button" class="btn btn-secondary rounded-10 border-0" data-toggle="modal" data-target="#addAssociate"><span class="fas fa-user-plus" style="padding:5px; margin: auto;   "></span>Add Associate</button>
                                        
                                        <button  type="button" class="btn btn-secondary rounded-10 border-0" data-toggle="modal" data-target="#addAssociate"><span class="fas fa-user-plus" style="padding-right: 5px; padding-left: 5; "></span>Add Associate</button>
                                        
                                        <button  type="button" class="btn btn-secondary rounded-10 border-0" data-toggle="modal" data-target="#addAssociate"><span class="fas fa-user-plus" style="padding-right: 5px"></span>Add Associate</button>
-->



                                    </div>



                                </div>
                            </div>


    <!-- Tabs -->
    <div class="container">
      <div style="height:10px"></div>
        <table id="myDataTable" class="table table-borderless table-striped table-hover" style="width:100%">
            <thead class="thead-dark">
                <tr>

                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($associates as $associate)
                <tr>

                    <td>{{ $associate->fname  }} {{ $associate->lname }}</td>
                    <td>{{ $associate->email }}</td>
                    <td>{{ $associate->name }}</td>
                    <td>{{ $associate->stat }}</td>
                    <td>
                        @if( $associate->stat == "active")
                        <button class="btn btn-secondary" id="deactivate">
                            Deactivate
                        </button>
                        @else
                        <button class="btn btn-info" id="activate">
                            Activate
                        </button>
                        @endif
                    </td>
                </tr>
                @endforeach

            </tbody>

        </table>

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
      $('#associates').addClass('active');
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('input').attr('autocomplete','off');
      });
    </script>
    <script>
    $(document).ready(function() {
        $('#myDataTable').DataTable({
           "pagingType": "full_numbers",
           responsive: true,
           "order": []});
    } );
    </script>


@stop
