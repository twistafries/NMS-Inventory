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
<div class="container p-lg-3 p-md-1 p-sm-0">
  <nav class="navbar navbar-light bg-light">
      <span class="navbar-brand mb-0 h1" style="font-size: 20px;">REPORT SELECTION</span>
  </nav>

  <div class="card" style="margin-top: 2rem; padding: 3rem;">
    <div class="row" style="font-size: 16px;">
      <div class="col-4">
        <div class="card border-light">
            <div class="card-header text-white mb-2" id="card-header"><i class="fas fa-warehouse"></i> INVENTORY REPORTS</div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><button type="button" class="btn btn-light btn-sm text-left" style="font-size: 16px; width: 15rem;">Item Availability</button></li>
                    <li class="list-group-item"><button type="button" class="btn btn-light btn-sm text-left" style="font-size: 16px; width: 15rem;">Item Repair</button></li>
                    <li class="list-group-item"><button type="button" class="btn btn-light btn-sm text-left" style="font-size: 16px; width: 15rem;">Item Return</button></li>
                    <li class="list-group-item"><button type="button" class="btn btn-light btn-sm text-left" style="font-size: 16px; width: 15rem;">Item Disposal</button></li>
                </ul>
            </div>
        </div>
      </div>
      <div class="col-4">
        <div class="card border-light">
            <div class="card-header text-white mb-2" id="card-header"><i class="fas fa-list-alt"></i> PURCHASES AND ORDERSS</div>
            <div class="card-body">
              <ul class="list-group list-group-flush">
                <li class="list-group-item" data-toggle="collapse" data-target="#purchases1" aria-expanded="false" aria-controls="collapseExample"><span class="fas fa-angle-down" style="margin-right: 1rem;"></span>Purchases</li>
                  <button type="button" class="btn btn-light btn-sm text-left collapse" id="purchases1" style="font-size: 16px; width: 15rem; margin-left: 4rem;">Completed Orders</button>
                  <button type="button" class="btn btn-light btn-sm text-left collapse" id="purchases1" style="font-size: 16px; width: 15rem; margin-left: 4rem;">incomplete Orders</button>
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
                    <li class="list-group-item" data-toggle="collapse" data-target="#latereturns" aria-expanded="false" aria-controls="collapseExample"><span class="fas fa-angle-down" style="margin-right: 1rem;"></span>Employee Isuuance</li>
                      <button type="button" class="btn btn-light btn-sm text-left collapse" id="latereturns" style="font-size: 16px; width: 15rem; margin-left: 4rem;">Late Returns</button>
                    </li>
                    <li class="list-group-item" data-toggle="collapse" data-target="#itemIssuance" aria-expanded="false" aria-controls="collapseExample"><span class="fas fa-angle-down" style="margin-right: 1rem;"></span>Item Isuuance</li>
                      <button type="button" class="btn btn-light btn-sm text-left collapse" id="itemIssuance" style="font-size: 16px; width: 15rem; margin-left: 4rem;">Issuance per (SU, Mobile Device, Peripherals)</button>
                      <button type="button" class="btn btn-light btn-sm text-left collapse" id="itemIssuance" style="font-size: 16px; width: 15rem; margin-left: 4rem;">Most/Least Issued</button>
                    </li>
            </div>
        </div>
      </div>
    </div>

      <!-- <div class="" style="font-weight: bold; font-size: 16px; margin-left: 1rem; margin-top: 3rem; background: #bdbdbd; padding: 2rem;">FILTER
        <p style="font-size: 14px; font-weight: bold; color: black; margin-left: 2rem; margin-top: 1rem;">Filter by Date:</p>
        <div class="row" style="margin-left: 0.1rem;">
          <div class="col col-2 input-date2" id="month2-operations" style="padding-right: 0!important; padding-left: 2rem; margin-right: 1rem;">
            <select id="" class="" style="width: 10rem; height: 1.9rem;">
              <option disabled selected hidden>Month</option>
              <option value="1">January</option>
              <option value="2">February</option>
              <option value="3">March</option>
              <option value="4">April</option>
              <option value="5">May</option>
              <option value="6">June</option>
              <option value="7">July</option>
              <option value="8">August</option>
              <option value="9">September</option>
              <option value="10">October</option>
              <option value="11">November</option>
              <option value="12">December</option>
            </select>
          </div>
          <div class="col col-2 input-date2" id="day-operations" style="padding-right: 0!important; padding-left: 2rem; margin-right: 1rem;">
            <select id="" class="" style="width: 10rem; height: 1.9rem;">
              <option disabled selected hidden>Day</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="3">4</option>
              <option value="3">5</option>
              <option value="3">6</option>
              <option value="3">7</option>
              <option value="3">8</option>
              <option value="3">9</option>
              <option value="3">10</option>
              <option value="3">11/option>
              <option value="3">12</option>
            </select>
          </div>
          <div class="col col-2 input-date2" id="year3-operations" style="padding-right: 0!important; padding-left: 2rem;">
            <select id="" class="" style="width: 10rem; height: 1.9rem;">
              <option disabled selected hidden> Year</option>
              <option value="1">2019</option>
              <option value="2">2018</option>
              <option value="3">2017</option>
            </select>
          </div>
        </div>

        <div class="row" style="margin-top: 1rem; margin-left: 2rem;">
            <div class="col-1.5">
              <div class="checkbox-custom">
                <label>
                  <input type="checkbox" name="all" id="cb1" onclick="toggle(this)" style="height: 1rem; width: 1rem;">
                  <b></b>
                  <span class="all">Most</span>
                </label>
              </div>
            </div>

            <div class="col-2">
              <div class="checkbox-custom">
                <label>
                  <input type="checkbox" name="all" id="cb1" onclick="toggle(this)" style="height: 1rem; width: 1rem;">
                  <b></b>
                  <span class="all">Least</span>
                </label>
              </div>
            </div>
        </div>

        <div class="row" style="margin-top: 1rem; margin-left: 2rem;">
            <div class="col-1.5">
              <div class="checkbox-custom">
                <label>
                  <input type="checkbox" name="all" id="cb1" onclick="toggle(this)" style="height: 1rem; width: 1rem;">
                  <b></b>
                  <span class="all">Alphabetical</span>
                </label>
              </div>
            </div>
        </div>
      </div> -->
  </div>
</div>
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
              type: 'column'
          },
          title: {
              text: 'Inventory Concerns Report in January, 2019'
          },
          xAxis: {
              categories: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
              crosshair: true
          },
          yAxis: {
              min: 0,
              title: {
                  text: 'Quantity'
              }
          },
          tooltip: {
              headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
              pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' + '<td style="padding:0"><b>{point.y:.1f} items</b></td></tr>',
              footerFormat: '</table>',
              shared: true,
              useHTML: true
          },
          plotOptions: {
              column: {
                  pointPadding: 0.2,
                  borderWidth: 0
              }
          },
          series: [{
              name: 'For Repair',
              data: [{{$JanuaryRepair->count()}}, {{$FebruaryRepair->count()}}, {{$MarchRepair->count()}}, {{$AprilRepair->count()}}, {{$MayRepair->count()}}, {{$JuneRepair->count()}}, {{$JulyRepair->count()}}, {{$AugustRepair->count()}}, {{$SeptemberRepair->count()}}, {{$OctoberRepair->count()}}, {{$NovemberRepair->count()}}, {{$DecemberRepair->count()}}]

          }, {
              name: 'To be Returned',
              data: [{{$JanuaryReturn->count()}}, {{$FebruaryReturn->count()}}, {{$MarchReturn->count()}}, {{$AprilReturn->count()}}, {{$MayReturn->count()}}, {{$JuneReturn->count()}}, {{$JulyReturn->count()}}, {{$AugustReturn->count()}}, {{$SeptemberReturn->count()}}, {{$OctoberReturn->count()}}, {{$NovemberReturn->count()}}, {{$DecemberReturn->count()}}]

          }, {
              name: 'Decommissioned',
              data: [{{$JanuaryDecom->count()}}, {{$FebruaryDecom->count()}}, {{$MarchRDecom->count()}}, {{$AprilDecom->count()}}, {{$MayDecom->count()}}, {{$JuneDecom->count()}}, {{$JulyDecom->count()}}, {{$AugustDecom->count()}}, {{$SeptemberDecom->count()}}, {{$OctoberDecom->count()}}, {{$NovemberDecom->count()}}, {{$DecemberDecom->count()}}]

          }, {
              name: 'Pending',
              data: [{{$JanuaryPending->count()}}, {{$FebruaryPending->count()}}, {{$MarchPending->count()}}, {{$AprilPending->count()}}, {{$MayPending->count()}}, {{$JunePending->count()}}, {{$JulyPending->count()}}, {{$AugustPending->count()}}, {{$SeptemberPending->count()}}, {{$OctoberPending->count()}}, {{$NovemberPending->count()}}, {{$DecemberPending->count()}}]

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
              text: 'Inventory Concerns Report in January, 2019'
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
                  name: 'For Repair',
                  y: {{$ThisMonthRepair->count()}},
                  sliced: true,
                  selected: true
              }, {
                  name: 'To be Returned',
                  y: {{$ThisMonthReturn->count()}}
              }, {
                  name: 'Decommissioned',
                  y: {{$ThisMonthDecom->count()}}
              }, {
                  name: 'Pending',
                  y: {{$ThisMonthPending->count()}}
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

@stop