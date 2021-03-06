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
  <div class="p-lg-3 p-md-1 p-sm-0">
    <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand mb-0 h1" style="font-size: 20px;">REPORT SELECTION</span>
    </nav>

    <div class="card" style="margin-top: 2rem; padding: 3rem;">
      <div class="row mb-4">
        <div class="col-3 text-right">
          <label class="font-weight-bolder text-uppercase text-left">From:</label>
          <input type="date" id="start_date" value="{{$startReport}}"  onchange="startDateEnable()" style="width: 10rem;">
        </div>
        <div class="col-3 text-right">
          <label class="font-weight-bolder text-uppercase text-left">To:</label>
          <input type="date" id="end_date" value="{{$endReport}}"  onchange="startDateEnable()" style="width: 10rem;">
        </div>
      </div>
      <div class="row" style="font-size: 16px;">
        <div class="col-4">
          <div class="card border-light">
              <div class="card-header text-white mb-2" id="card-header"><i class="fas fa-warehouse"></i> INVENTORY REPORTS</div>
              <div class="card-body">
                  <ul class="list-group list-group-flush">

                    <form action="{!! url('/inventoryReports'); !!}" onsubmit="getDate()" method="post">
                        {!! csrf_field() !!}
                      <input name="status" value="null" hidden>
                      <input name="start" class="start" value="" hidden>
                      <input name="end" class="end" value="" hidden>
                      <input name="title" value="Item Additions" hidden>
                      <li class="list-group-item"><button type="submit" class="btn btn-dark btn-sm text-left" style="font-size: 16px; width: 15rem;">Item Additions</button></li>
                    </form>

                    <form action="{!! url('/inventoryReports'); !!}" onsubmit="getDate()" method="post">
                        {!! csrf_field() !!}
                      <input name="status" value="1" hidden>
                      <input name="start" class="start" value="" hidden>
                      <input name="end" class="end" value="" hidden>
                      <input name="title" value="Available Items" hidden>
                      <li class="list-group-item"><button type="submit" class="btn btn-dark btn-sm text-left" style="font-size: 16px; width: 15rem;">Item Availability</button></li>
                    </form>
                    <form action="{!! url('/inventoryReports'); !!}" onsubmit="getDate()" method="post">
                        {!! csrf_field() !!}
                      <input name="status" value="3" hidden>
                      <input name="title" value="For Repair Items" hidden>
                      <input name="start" class="start" value="" hidden>
                      <input name="end" class="end" value="" hidden>
                      <li class="list-group-item"><button type="submit" class="btn btn-dark btn-sm text-left" style="font-size: 16px; width: 15rem;">Item Repair</button></li>
                    </form>
                    <form action="{!! url('/inventoryReports'); !!}" onsubmit="getDate()" method="post">
                        {!! csrf_field() !!}
                      <input name="status" value="4" hidden>
                      <input name="title" value="For Return Items" hidden>
                      <input name="start" class="start" value="" hidden>
                      <input name="end" class="end" value="" hidden>
                      <li class="list-group-item"><button type="submit" class="btn btn-dark btn-sm text-left" style="font-size: 16px; width: 15rem;">Item Return</button></li>
                    </form>
                    <form action="{!! url('/inventoryReports'); !!}" onsubmit="getDate()" method="post">
                        {!! csrf_field() !!}
                      <input name="status" value="7" hidden>
                      <input name="start" class="start" value="" hidden>
                      <input name="end" class="end" value="" hidden>
                      <input name="title" value="For Disposal Items" hidden>
                      <li class="list-group-item"><button type="submit" class="btn btn-dark btn-sm text-left" style="font-size: 16px; width: 15rem;">Item Disposal</button></li>
                    </form>


                  </ul>
              </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card border-light">
              <div class="card-header text-white mb-2" id="card-header"><i class="fas fa-list-alt"></i> PURCHASES AND ORDERS</div>
              <div class="card-body">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item" id="purchasesreport" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" style="cursor: pointer; "><span class="fas fa-angle-right" style="cursor: pointer; margin-right: 1rem;"></span>Purchases</li>
                  <form action="{!! url('/purchasesAndOrdersReports'); !!}" onsubmit="getDate()" method="post">
                      {!! csrf_field() !!}
                    <input name="status" value="6" hidden>
                    <input name="start" class="start" value="" hidden>
                    <input name="end" class="end" value="" hidden>
                    <input name="title" value="Completed Orders" hidden>
                    <button type="submit" class="btn btn-light btn-sm text-left collapse" id="purchases1" style="font-size: 16px; width: 15rem; margin-top: 5px; margin-left: 3rem;">Completed Orders</button>
                  </form>
                  <form action="{!! url('/purchasesAndOrdersReports'); !!}" onsubmit="getDate()" method="post">
                      {!! csrf_field() !!}
                    <input name="status" value="6" hidden>
                    <input name="start" class="start" value="" hidden>
                    <input name="end" class="end" value="" hidden>
                    <input name="title" value="Incomplete Orders" hidden>
                    <button type="submit" class="btn btn-light btn-sm text-left collapse" id="purchases2" style="font-size: 16px; width: 15rem; margin-top: 5px; margin-left: 3rem;">Incomplete Orders</button>
                  </form>
                  </li>
                </ul>
              </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card border-light">
              <div class="card-header text-white" id="card-header"><i class="fas fa-hand-holding"></i> ISSUANCE</div>
              <div class="card-body">
                  <ul class="list-group list-group-flush">
                      <li class="list-group-item" id="late" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" style="cursor: pointer;"><span class="fas fa-angle-right" style="cursor: pointer; margin-right: 1rem;"></span>Employee Issuance</li>
                        <form action="{!! url('/issuanceReports'); !!}" onsubmit="getDate()" method="post">
                            {!! csrf_field() !!}
                          <input name="start" class="start" value="" hidden>
                          <input name="end" class="end" value="" hidden>
                          <input name="title" value="Late Returns" hidden>
                        <button type="submit" class="btn btn-light btn-sm text-left collapse" id="latereturns" style="font-size: 16px; width: 15rem; margin-top: 5px; margin-left: 3rem; margin-bottom: 5px;">Late Returns</button>
                      </form>
                      </li>
                      <li class="list-group-item" id="item" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" style="cursor: pointer;"><span class="fas fa-angle-right" style="margin-right: 1rem;"></span>Item Issuance</li>
                      <form action="{!! url('/issuanceReports'); !!}" onsubmit="getDate()" method="post">
                          {!! csrf_field() !!}
                        <input name="start" class="start" value="" hidden>
                        <input name="end" class="end" value="" hidden>
                        <input name="title" value="Item Issuance" hidden>
                        <button type="submit" class="btn btn-light btn-sm text-left collapse" id="itemIssuance" style="font-size: 16px; width: 15rem; margin-top: 5px; margin-left: 3rem;">Most/Least Issued</button>
                      </form>
                      </li>
                  </ul>
              </div>
          </div>
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
      <script>
          function getDate(){
            var startList = document.getElementsByClassName("start");
            for (var i = 0; i < startList.length; i++) {
             startList[i].value = document.getElementById("start_date").value;
            }

            var endList = document.getElementsByClassName("end");
            for (var i = 0; i < endList.length; i++) {
             endList[i].value = document.getElementById("end_date").value;
            }
          }
      </script>
      <script>
          $('#late').click(function() {
              $('#latereturns').toggle();
              $("span", this).toggleClass("fas fa-angle-right fas fa-angle-down");
          });

          $('#item').click(function() {
              $('#itemIssuance').toggle();
              $('#itemIssuance2').toggle();
              $("span", this).toggleClass("fas fa-angle-right fas fa-angle-down");
          });

          $('#purchasesreport').click(function() {
              $('#purchases1').toggle();
              $('#purchases2').toggle();
              $("span", this).toggleClass("fas fa-angle-right fas fa-angle-down");
          });
      </script>

      <script type="text/javascript">
      function startDateEnable(){
            var date = $("#start_date").val();
            var dtToday = new Date(date);

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate()+1;
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var today = year + '-' + month + '-' + day;
            $('#end_date').attr('min', today);
        }
        function endDateEnable(){
              var date = $("#end_date").val();
              var dtToday = new Date(date);

              var month = dtToday.getMonth() + 1;
              var day = dtToday.getDate()+1;
              var year = dtToday.getFullYear();
              if (month < 10)
                  month = '0' + month.toString();
              if (day < 10)
                  day = '0' + day.toString();

              var today = year + '-' + month + '-' + day;
              $('#start_date').attr('max', today);
          }
      </script>
@stop
