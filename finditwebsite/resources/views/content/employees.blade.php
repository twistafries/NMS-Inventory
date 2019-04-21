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
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="{{ asset('css/animate/animate.css') }}">
@stop

@section('title')
    Inventory
@stop

@section('../layout/breadcrumbs')
    @section('breadcrumbs-title')
    <i class="fas fa-chart-line">Inventory
    @stop
@stop

@section('content')
    <div class="container">
      <div style="height:10px"></div>
      <div class="d-flex flex-row-reverse">
                                <div class="p-2">

      <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn " data-toggle="modal" data-target="#addAssociate" style="padding-left: 15px;"><span class="fas fa-user-plus" data-toggle="tooltip" title="Add Associate" ></span>Add </button>
                                    <!--                                        <button type="button" class="btn" data-toggle="modal" data-target="#"><span class="fas fa-user-edit" data-toggle="tooltip" title="Edit Associate"></span></button>-->
                                    <button type="button" class="btn " data-toggle="modal" data-target="#removeEmployee"><span class="fas fa-user-minus" data-toggle="tooltip" title="Remove Associate"></span>Remove</button>


                                    <!--
                                    <button  type="button" class="btn btn-secondary rounded-10 border-0" data-toggle="modal" data-target="#addAssociate"><span class="fas fa-user-plus" style="padding:5px; margin: auto;   "></span>Add Associate</button>

                                    <button  type="button" class="btn btn-secondary rounded-10 border-0" data-toggle="modal" data-target="#addAssociate"><span class="fas fa-user-plus" style="padding-right: 5px; padding-left: 5; "></span>Add Associate</button>

                                    <button  type="button" class="btn btn-secondary rounded-10 border-0" data-toggle="modal" data-target="#addAssociate"><span class="fas fa-user-plus" style="padding-right: 5px"></span>Add Associate</button>
-->



                                </div>
                              </div>
                            </div>
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
                @foreach ($employees as $employee)
                <tr>

                    <td>{{ $employee->fname  }} {{ $employee->lname }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->department }}</td>
                    <td>{{ $employee->status }}</td>
                    <td>
                        @if( $employee->status == "active")
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

                                            <!-- Add Associate Modal -->
                                            <div class="modal fade" id="addAssociate" tabindex="-1" role="dialog" aria-labelledby="addAssociateTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div id="addAssociateHeader" class="modal-header">
                                                            <h5 class="modal-title" id="ModalTitle"><i class="fas fa-user-plus"></i>&nbsp;Add Employee</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <form action="{!! url('/addEmployee'); !!}" enctype="multipart/form-data"  method="post" role="form">
                                                            {!! csrf_field() !!}
                                                        <div class="modal-body" style="height: auto">

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



                                                                    <label class="label">Email </label>
                                                                    <br>
                                                                    <input type="text" name="email" size="51">
                                                                    <br>





                                                            </div>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <label class="label">Department:</label>
                                                                    <br>
                                                                    <div class="form-group">
                                                                        <select class="exampleFormControlSelect1" name="dept_id">
                                                                            <option value="1">Information Technology Development Department</option>
                                                                            <option value="2">Production Development Department</option>
                                                                            <option value="3">Financial Department</option>
                                                                            <option value="4">Human Resources Department</option>
                                                                            </select>
                                                                    </div>

                                                                </div>
                                                                <!-- <div class="col-6">
                                                                     <label class="label">Status:</label>
                                                                    <br>
                                                                    <div class="form-group">
                                                                        <select class="exampleFormControlSelect1" name="atatus">
                                                                            <option>Active</option>
                                                                            <option>2</option>
                                                                            <option>3</option>
                                                                            <option>4</option>
                                                                            <option>5</option>
                                                                            </select>
                                                                    </div>
                                                                </div> -->
                                                            </div>



                                                            <!--
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label class="label">Details </label>
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
        -->



                                                            <!--
                                                            <form>
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Recipient:</label>
                                                                    <input type="text" class="form-control " id="recipient-name">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="message-text" class="col-form-label">Message:</label>
                                                                    <textarea class="form-control" id="message-text"></textarea>
                                                                </div>
                                                            </form>
        -->



                                                        </div>
                                                        <div class="modal-footer">
                                                            <button id="save" type="submit"> <span class="fas fa-plus"></span>    ADD</button>
                                                            <button id="cancel" type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                                                        </div>
                                                    </div>
                                                  </form>
                                                </div>
                                            </div>


                                            <!-- Remove Associate Modal -->
                                            <div class="modal fade" id="removeEmployee" tabindex="-1" role="dialog" aria-labelledby="addAssociateTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                              <div id="addAssociateHeader" class="modal-header">
                                                  <h5 class="modal-title" id="ModalTitle"><i class="fas fa-user-plus"></i>&nbsp;Remove Employee</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                              </div>
                                              <form action="{!! url('/removeEmployee'); !!}" enctype="multipart/form-data"  method="post" role="form">
                                                  {!! csrf_field() !!}
                                              <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label class="label">Name:</label>
                                                        <br>
                                                        <div class="form-group">
                                                            <select class="selectpicker" data-live-search="true"  name="employee_id">
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




                                                  <!--
                                                  <form>
                                                      <div class="form-group">
                                                          <label for="recipient-name" class="col-form-label">Recipient:</label>
                                                          <input type="text" class="form-control " id="recipient-name">
                                                      </div>
                                                      <div class="form-group">
                                                          <label for="message-text" class="col-form-label">Message:</label>
                                                          <textarea class="form-control" id="message-text"></textarea>
                                                      </div>
                                                  </form>
-->



                                              </div>
                                              <div class="modal-footer">
                                                  <button id="save" type="submit"> <span class="fas fa-save"></span>SAVE</button>
                                                  <button id="cancel" type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                                              </div>
                                            </form>
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
        $(function() {
            $('select').selectpicker();
        });
    </script>
    <script>
      $(document).ready(function(){
      $('#employees').addClass('active');
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
