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
    <link rel="stylesheet" href="{{ asset('js/datatable/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('js/Buttons/css/buttons.dataTables.min.css')}}">
@stop

@section('title')
    Purchases and Orders Report
@stop

@section('../layout/breadcrumbs')
    @section('breadcrumbs-title')
    <i class="fas fa-chart-line">Inventory
    @stop
@stop


@section('content')
<body onpageshow="ShowLocalDate()">
<a class="btn btn-dark" href="{!! url('/generateReportPage') !!}" role="button" style="margin-top: 1rem; padding: 10px;"><span class="fas fa-arrow-left" style="margin-right: 10px;"></span>Select Another Report</a>
<div id="content">
  <div class="card add" id="sample" style="margin-left: 2rem; margin-right: 2rem; padding-left: 2rem;">
    <div class="sample" style=" margin-top: 1rem;">
      <div class="row">
        <div class="col-3">
          <div class="mb-2"><i class="fas fa-list-alt" style="margin-right: 1rem;"></i> PURCHASES AND ORDERS</div>
        </div>
        <div class="col-3"></div>
      </div>
    </div>
</div>
        <div class="card add" id="sample" style="margin-left: 2rem; margin-right: 2rem;">
          <div class="sample" style=" margin-top: 1rem;">
            <p class="card-title text-right date" id="contents">Date:</p>
            <p class="card-title text-center" style="font-size: 24px; color: #555555; margin-bottom: 0 !important;">NEW MEDIA SERVICES</p>
            <p class="card-title text-center" id="contents2" style="font-size: 20px; color: #555555;">Purchases and Orders Report as of {{$start}} - {{$end}}</p>
          </div>

          <!--table-->
          <div class="" id="inventoryTable" style="margin-top:2rem;">
            <div class="inventory">
              <p class="card-title text-center" style="color: #555555; margin-bottom: 2rem; font-size: 20px;">{{$title}}</p>
            </div>
            @if($title=="Incomplete Orders")
            <table class="table all" id="complete">
                <thead class="thead-dark" style="font-size: 14px;">
                  <tr>
                      <th scope="col">Item ID</th>
                      <th scope="col">Brand-Model/Label</th>
                      <th scope="col">Item Type</th>
                      <th scope="col">Item Subtype</th>
                      <th scope="col">Date:</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach($inc_orders as $inc_orders)
                  <tr id="{{$inc_orders->created_at}}">
                    <td>{{$inc_orders->id}}</td>
                    <td>{{$inc_orders->brand}}-{{$inc_orders->model}}</td>
                    <td>{{$inc_orders->type}}</td>
                    <td>{{$inc_orders->subtype}}</td>
                    <td>{{$inc_orders->created_at}}</td>

                  </tr>
                  @endforeach
                </tbody>
              </table>
              @else
              <table class="table all" id="complete">
                  <thead class="thead-dark" style="font-size: 14px;">
                    <tr>
                        <th scope="col">Purchase Number</th>
                        <th scope="col">Official Receipt Number</th>
                        <th scope="col">Date of Purchases:</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($comp_orders as $comp_orders)
                    <tr id="{{$comp_orders->date_of_purchase}}">
                      <td>Purchase Number {{$comp_orders->purchase_no}}</td>
                      <td>{{$comp_orders->or_no}}</td>
                      <td>{{$comp_orders->date_of_purchase}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              @endif
          </div>

        </div>

    <!--Graph-->
    <div class="row" id="graph" style="margin-bottom: 2rem;">
      <div class="col col-6" id="container2" style="height: 350px; margin-top: 2rem;"></div>
      <div class="col col-6" id="container3" style="height: 350px; margin-top: 2rem;"></div>
      <div class="col col-6" id="container4" style="height: 350px; margin-top: 2rem;"></div>
    </div>

  </div>
</div>
</body>
@stop

@section('script')
        <!-- JQuery Core -->
        <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>

        <!-- graph -->
        <script src="{{ asset('js/highcharts/code/highcharts.js') }}"></script>
        <script src="{{ asset('js/highcharts/code/modules/exporting.js') }}"></script>
        <script src="{{ asset('js/highcharts/code/modules/export-data.js') }}"></script>

        <!--table export-->
        <script src="{{ asset('js/jQuery.tableExport/dist/tableExport.js') }}"></script>
        <script src="{{ asset('js/jQuery.tableExport/dist/tableExport.min.js') }}"></script>

        <!--JQuery form validation plugin-->
        <script src="{{ asset('js/jqueryvalidation/dist/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('js/jqueryvalidation/dist/additional-methods.min.js') }}"></script>
        <script src="{{ asset('js/popper/popper.min.js') }}"></script>

        <!-- Bootstrap -->
        <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>

        <!-- Datatable -->
        <link rel="stylesheet" href="{{ asset('css/datatable/dataTables.bootstrap4.min.css') }}">
        <!-- Datatable -->
        <script type="text/javascript" src="{{ asset('js/datatable/jquery.dataTables.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/datatable/datatables.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/datatable/dataTables.bootstrap4.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/Buttons/js/dataTables.buttons.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/Buttons/js/buttons.flash.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/Buttons/js/buttons.html5.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/Buttons/js/buttons.print.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/pdfmake/pdfmake.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/pdfmake/vfs_fonts.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/JSZip/jszip.min.js') }}"></script>

        <!-- <script src="https://cdn.jsdelivr.net/jspdf/1.2.61/jspdf.min.js"></script> -->

        <!--dashboard icon sidenav collapse-->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#sidebarCollapse').on('click', function() {
                    $('#sidebar').toggleClass('active');
                    var icon = $(this).parent().find(".fas")
                    if (icon.hasClass('fas fa-chevron-left'))
                        icon.removeClass('fas fa-chevron-left').addClass("fas fa-chevron-right");
                    else
                        icon.removeClass('fas fa-chevron-right').addClass("fas fa-chevron-left");
                });
            });
        </script>
        <!--user profile input validation-->
        <script>
            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            });
        </script>

        <!--graph-->
                <!-- date -->
        <script>
          function ShowLocalDate(){
            var dNow = new Date();
            var localdate = 'Date:' + (dNow.getMonth()+1) + '/'
                            + dNow.getDate() + '/'
                            + dNow.getFullYear() + ' '
                            + dNow.getHours() + ':'
                            + dNow.getMinutes();
            $('.date').text(localdate)
          }
        </script>

        <script>
          $(document).ready(function(){
          $('#report').addClass('active');
          });
        </script>

        <script type="text/javascript">
          $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
              $('#sidebar').toggleClass('active');
            });
          });
        </script>

        <script type="text/javascript">
          function printContent(el){
            var restorepage = $('body').html();
            var printcontent = $('#' + el).clone();
            $('body').empty().html(printcontent);
            window.print();
            $('body').html(restorepage);
          }
        </script>

        <script>
        $(document).ready(function() {
            $('#complete, #incomplete').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                  'copy',
                  {
                    extend: 'excel',
                    title: '',
                  },
                  {
                    extend: 'csv',
                    title: '',
                  },
                  {
                    extend: 'pdf',
                    title: '',
                  },
                  {
                    extend: 'print',
                    title: '',
                  },
                ],
                "searching": false,
                "ordering": false
            } );
        } );
      </script>
@stop
