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
          <input type="date" name="warranty_start" value="" style="width: 10rem;">
        </div>
        <div class="col-3 text-right">
          <label class="font-weight-bolder text-uppercase text-left">To:</label>
          <input type="date" name="warranty_start" value="" style="width: 10rem;">
        </div>
      </div>
      <div class="row" style="font-size: 16px;">
        <div class="col-4">
          <div class="card border-light">
              <a href="{!! url('/inventoryReports') !!}" style="cursor: pointer;"><div class="card-header text-white mb-2" id="card-header"><i class="fas fa-warehouse"></i> INVENTORY REPORTS</div></a>
              <div class="card-body">
                  <ul class="list-group list-group-flush">
                      <li class="list-group-item"><a href="{!! url('/inventoryReports') !!}" type="button" class="btn btn-light btn-sm text-left" style="font-size: 16px; width: 15rem;">Item Availability</a></li>
                      <li class="list-group-item"><a href="{!! url('/inventoryReports') !!}" type="button" class="btn btn-light btn-sm text-left" style="font-size: 16px; width: 15rem;">Item Repair</a></li>
                      <li class="list-group-item"><a href="{!! url('/inventoryReports') !!}" type="button" class="btn btn-light btn-sm text-left" style="font-size: 16px; width: 15rem;">Item Return</a></li>
                      <li class="list-group-item"><a href="{!! url('/inventoryReports') !!}" type="button" class="btn btn-light btn-sm text-left" style="font-size: 16px; width: 15rem;">Item Disposal</a></li>
                  </ul>
              </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card border-light">
              <a href="{!! url('/purchasesAndOrdersReports') !!}" style="cursor: pointer;"><div class="card-header text-white mb-2" id="card-header"><i class="fas fa-list-alt"></i> PURCHASES AND ORDERS</div></a>
              <div class="card-body">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item" id="purchasesreport" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample"><span class="fas fa-angle-right" style="margin-right: 1rem;"></span>Purchases</li>
                    <a href="{!! url('/purchasesAndOrdersReports') !!}" type="button" class="btn btn-light btn-sm text-left collapse" id="purchases1" style="font-size: 16px; width: 15rem; margin-top: 5px; margin-left: 3rem;">Completed Orders</a>
                    <a href="{!! url('/purchasesAndOrdersReports') !!}" type="button" class="btn btn-light btn-sm text-left collapse" id="purchases2" style="font-size: 16px; width: 15rem; margin-top: 5px; margin-left: 3rem;">incomplete Orders</a>
                  </li>
                </ul>
              </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card border-light">
              <a href="{!! url('/issuanceReports') !!}" style="cursor: pointer;"><div class="card-header text-white" id="card-header"><i class="fas fa-hand-holding"></i> ISSUANCE</div></a>
              <div class="card-body">
                  <ul class="list-group list-group-flush">
                      <li class="list-group-item" id="late" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample"><span class="fas fa-angle-right" style="margin-right: 1rem;"></span>Employee Issuance</li>
                        <a href="{!! url('/issuanceReports') !!}" type="button" class="btn btn-light btn-sm text-left collapse" id="latereturns" style="font-size: 16px; width: 15rem; margin-top: 5px; margin-left: 3rem; margin-bottom: 5px;">Late Returns</a>
                      </li>
                      <li class="list-group-item" id="item" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample"><span class="fas fa-angle-right" style="margin-right: 1rem;"></span>Item Issuance</li>
                        <a href="{!! url('/issuanceReports') !!}" type="button" class="btn btn-light btn-sm text-left collapse" id="itemIssuance" style="font-size: 16px; width: 15rem; margin-top: 5px; margin-left: 3rem;">Issuance per (SU, Mobile Device, Peripherals)</a>
                        <a href="{!! url('/issuanceReports') !!}" type="button" class="btn btn-light btn-sm text-left collapse" id="itemIssuance2" style="font-size: 16px; width: 15rem; margin-top: 5px; margin-left: 3rem;">Most/Least Issued</a>
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
            data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

        }, {
            name: 'To be Returned',
            data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

        }, {
            name: 'Decommissioned',
            data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

        }, {
            name: 'Pending',
            data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

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
                y: 41.41,
                sliced: true,
                selected: true
            }, {
                name: 'To be Returned',
                y: 15.85
            }, {
                name: 'Decommissioned',
                y: 21.84
            }, {
                name: 'Pending',
                y: 9.67
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

@stop
