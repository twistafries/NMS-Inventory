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
    Generate Report
@stop

@section('../layout/breadcrumbs')
    @section('breadcrumbs-title')
    <i class="fas fa-chart-line">Inventory
    @stop
@stop

@section('content')
<body onpageshow="ShowLocalDate()">
<div class="container-fluid">
  <div class="p-lg-3 p-md-1 p-sm-0">
    <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand mb-0 h1" style="font-size: 20px;">REPORT SELECTION</span>
    </nav>

    <div class="card" style="margin-top: 2rem; padding: 3rem;">
      <div class="row mb-4">
        <div class="col-3 text-right">
          <label class="font-weight-bolder text-uppercase text-left">From:</label>
          <input type="date" id="start_date" value="" onchange="startDateEnable()" style="width: 10rem;">
        </div>
        <div class="col-3 text-right">
          <label class="font-weight-bolder text-uppercase text-left">To:</label>
          <input type="date" id="end_date" value="" onchange="endDateEnable()" style="width: 10rem;">
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

    <!--Graph-->
    <div class="row" id="graph" style="margin-bottom: 2rem;">
      <div class="col col-6" id="container2" style="height: 350px; margin-top: 2rem;"></div>
      <div class="col col-6" id="container3" style="height: 350px; margin-top: 2rem;"></div>
      <div class="col col-6" id="container4" style="height: 350px; margin-top: 2rem;"></div>
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
        <script>

        Highcharts.chart('container2', {
          chart: {
              plotBackgroundColor: null,
              plotBorderWidth: null,
              plotShadow: false,
              type: 'pie'
          },
          title: {
              text: 'Most Purchased item as of {{$date}}'
          },
          tooltip: {
              pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
          },
          plotOptions: {
              pie: {
                  allowPointSelect: true,
                  cursor: 'pointer',
                  dataLabels: {
                      enabled: true,
                      format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                      style: {
                          color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                      }
                  }
              }
          },
          series: [{
              name: 'Inventory Concerns',
              colorByPoint: true,
              data: [{
                @foreach($most_purchased as $item)
                  name: '{{$item->subtype}}',
                  y: {{$item->count}}
              }, { @endforeach
              name: 'System Unit',
              y: {{$system_unit_purchased}},
              sliced: true,
              selected: true
              }]
            }]
          });
      </script>

      <script>
        Highcharts.chart('container3', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Most Issued item as of {{$date}}'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Inventory Concerns',
            colorByPoint: true,
            data: [{
              @foreach($most_issued as $item)
              @if($item->name!="")
                name: '{{$item->name}}',
                y: {{$item->count}}
            }, { @endif @endforeach
            name: 'System Unit',
            y: {{$system_unit_issued}},
            sliced: true,
            selected: true
            }]
          }]
        });
        </script>
        <!--Table select-->
        <script>
          $(document).ready(function(){
            var tableID = "";
            var all = "";
            $('select').change(function() {
              var category = $("#category-select5").val();
              switch (category) {
                  case "For Repair":
                      $("#inventoryTable").show();
                      $("#inventoryTable2, #inventoryTable3, #inventoryTable4").hide();
                      tableID = "#forRepair"
                      break;
                  case "To Be Returned":
                      $("#inventoryTable2").show();
                      $("#inventoryTable, #inventoryTable3, #inventoryTable4").hide();
                      tableID = "#toBeReturned";
                      break;
                  case "Decommissioned":
                      $("#inventoryTable3").show();
                      $("#inventoryTable, #inventoryTable2, #inventoryTable4").hide();
                      tableID = "#decommissioned";
                      break;
                  case "Pending":
                      $("#inventoryTable4").show();
                      $("#inventoryTable, #inventoryTable2, #inventoryTable3").hide();
                      tableID = "#pending";
                      break;
                  case "All":
                      $("#inventoryTable, #inventoryTable2, #inventoryTable3, #inventoryTable4").show();
                      all = ".all";
                      break;
              }
            });
            $("#category-select6").on('change', function() {
                var category = $("#category-select6").val();
                switch (category) {
                    case "Items Added":
                        $("#add").show();
                        $("#edit, #delete").hide();
                        break;
                    case "Items Edited":
                        $("#edit").show();
                        $("#add, #delete").hide();
                        break;
                    case "Items Deleted":
                        $("#delete").show();
                        $("#add, #edit").hide();
                        break;
                    case "All2":
                        $("#add, #edit, #delete").show();
                        break;
                    default:
                }
            });
            $("#category-select7").on('change', function() {
                var category = $("#category-select7").val();
                switch (category) {
                    case "Computer Components":
                        $("#components").show();
                        $("#peripherals, #mobile").hide();
                        break;
                    case "Computer Peripherals":
                        $("#peripherals").show();
                        $("#components, #mobile").hide();
                        break;
                    case "Mobile Devices":
                        $("#mobile").show();
                        $("#components, #peripherals").hide();
                        break;
                    case "All3":
                        $("#components, #peripherals, #mobile").show();
                        break;
                    default:
                }
            });
            $("#category-select8").on('change', function() {
                var category = $("#category-select8").val();
                switch (category) {
                    case "Associates":
                        $("#associates").show();
                        $("#category-select9, #AdminAndAssociate, #users, #items, #associateIssuance, #approvedUsers").hide();
                        break;
                    case "Admin":
                        $("#category-select9").show();
                        $("#associates, #AdminAndAssociate, #users").hide();
                        break;
                    case "Admin and Associates":
                        $("#AdminAndAssociate").show();
                        $("#associates, #category-select9, #users, #items, #associateIssuance, #approvedUsers").hide();
                        break;
                    case "User":
                        $("#users").show();
                        $("#associates, #category-select9, #AdminAndAssociate, #items, #associateIssuance, #approvedUsers").hide();
                        break;
                    case "All4":
                        $("#associates, #AdminAndAssociate, #users, #category-select9, #items, #associateIssuance, #approvedUsers").show();
                        $("#category-select9").hide();
                        break;
                    default:
                }
            });
            $("#category-select9").on('change', function() {
                var category = $("#category-select9").val();
                switch (category) {
                    case "Items":
                        $("#items").show();
                        $("#associateIssuance, #approvedUsers").hide();
                        break;
                    case "Associate Issuance":
                        $("#associateIssuance").show();
                        $("#items, #approvedUsers").hide();
                        break;
                    case "Approved Users":
                        $("#approvedUsers").show();
                        $("#items, #associateIssuance").hide();
                        break;
                    case "All5":
                        $("#items, #associateIssuance, #approvedUsers").show();
                        $("#associates, #AdminAndAssociate, #users#users").hide();
                        break;
                    default:
                }
            });
            function exportAll(type) {
              switch (tableID){
                // inventory concerns
                case "#forRepair":
                  $(tableID).tableExport({
                    filename: 'For Repair Items',
                    format: type
                  });
                break;
                case "#toBeReturned":
                  $(tableID).tableExport({
                    filename: 'To Be Returned Items',
                    format: type
                  });
                break;
                case "#pending":
                  $(tableID).tableExport({
                    filename: 'Pending Items',
                    format: type
                  });
                break;
                case "#decommissioned":
                  $(tableID).tableExport({
                    filename: 'Decommissioned Items',
                    format: type
                  });
                break;
                case ".all":
                  $(all).tableExport({
                    filename: 'InventoryConcernsReport',
                    format: type
                  });
                break;

                //Inventory operations
                case "#added":
                  $(tableID).tableExport({
                    filename: 'Added Items',
                    format: type
                  });
                break;
                case "#edited":
                  $(tableID).tableExport({
                    filename: 'Edited Items',
                    format: type
                  });
                break;
                case "#deleted":
                  $(tableID).tableExport({
                    filename: 'Deleted Items',
                    format: type
                  });
                break;
                case ".all2":
                  $(all).tableExport({
                    filename: 'NMS-InventoryOperationReport',
                    format: type
                  });
                break;

                //Inventory Equipment type
                case "#computerComponents":
                  $(tableID).tableExport({
                    filename: 'Computer Components',
                    format: type
                  });
                break;
                case "#computerPeripherals":
                  $(tableID).tableExport({
                    filename: 'Computer Periperals',
                    format: type
                  });
                break;
                case "#mobileDevices":
                  $(tableID).tableExport({
                    filename: 'Mobile Devices',
                    format: type
                  });
                break;
                case ".all3":
                  $(all).tableExport({
                    filename: 'NMS-InventoryEquipmentTypeReport',
                    format: type
                  });
                break;

                //Office equipment
                case "#":
                  $(tableID).tableExport({
                    filename: 'Office Equipment',
                    format: type
                  });
                break;

                //Issuance
                case "":
                  $(tableID).tableExport({
                    filename: 'Associate Issuance',
                    format: type
                  });
                break;
                case "":
                  $(tableID).tableExport({
                    filename: 'Admin Issuance',
                    format: type
                  });
                break;
                case "":
                  $(tableID).tableExport({
                    filename: 'Admin and Associate Issuance',
                    format: type
                  });
                break;
                case "":
                  $(tableID).tableExport({
                    filename: 'User Issuance',
                    format: type
                  });
                break;
                case "":
                  $(all).tableExport({
                    filename: 'New Media Services Report',
                    format: type
                  });
                break;
              }
            }
          });
        </script>
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
        <!--Export sample-->
        <script type="text/javascript">
          $(document).ready(function() {
              var printCounter = 0;
              var title1 = '<h5 style="color: #555555; font-size: 25px; margin-left: 35%;">NEW MEDIA SERVICES</h5>';
                var title = 'NEW MEDIA SERVICES';

              $('#example').DataTable( {
                  "searching": false,
                  "paging": false,
                  "info": false,
                  "bSort": false,
                  dom: 'Bfrtip',
                  buttons: [
                      'copy',
                      {
                          extend: 'excel',
                          title: title1
                      },
                      {
                          extend: 'pdf',
                          title: title
                      },
                      {
                          extend: 'print',
                          title: title,
                          message: '<h5 style="color: #555555; font-size: 20px; margin-left: 30%;">Inventory Concerns Report as of January 2019</h5>',
                          messageTop: function () {
                              printCounter++;

                              if ( printCounter === 1 ) {
                                  return 'This is the first time you have printed this document.';
                              }
                              else {
                                  return 'You have printed this document '+printCounter+' times';
                              }
                          },
                      }
                  ]
              } );
          } );
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
