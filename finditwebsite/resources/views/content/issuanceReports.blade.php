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
    Issuance Reports
@stop

@section('../layout/breadcrumbs')
    @section('breadcrumbs-title')
    <i class="fas fa-chart-line">Issuance Report
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
          <div class="mb-2"><i class="fas fa-hand-holding" style="margin-right: 1rem;"></i> ISSUANCE REPORTS</div>
        </div>
        <div class="col-3"></div>
      </div>
    </div>
</div>

      <div class="card add" id="sample" style="margin-left: 2rem; margin-right: 2rem;">
          <div class="sample" style=" margin-top: 1rem;">
            <p class="card-title text-right date" id="contents">Date:</p>
            <p class="card-title text-center" style="font-size: 24px; color: #555555; margin-bottom: 0 !important;">NEW MEDIA SERVICES</p>
            <p class="card-title text-center" id="contents2" style="font-size: 20px; color: #555555;">Issuance Report as of {{$start}} - {{$end}}</p>
          </div>

          <!--table-->

          <!-- additions -->
          <div class="" id="inventoryTable" style="margin-top:4rem;">
            <div class="inventory">
              <p class="card-title text-center" style="color: #555555; margin-bottom: 2rem;">{{$title}}</p>
            </div>

            @if($title=="Late Return")
            <table class="table all" id="available">
              <thead class="thead-dark" style="font-size: 14px;">
                <tr>
                    <th scope="col">Employee ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Department</th>
                    <th scope="col">Total Number of Late Returned</th>
                </tr>
              </thead>
              <tbody>

                @foreach($employees as $employee)
                <tr id="{{$employee->id}}">
                  <td>{{$employee->id}}</td>
                  <td>{{$employee->fname}}</td>
                  <td>{{$employee->lname}}</td>
                  <td>{{$employee->department}}</td>
                  <td>{{$employee->totalIssued}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @else
            <table class="table all" id="available">
              <thead class="thead-dark" style="font-size: 14px;">
                <tr>
                    <th scope="col">Subtype</th>
                    <th scope="col">Total Number of Issued Item</th>
                </tr>
              </thead>
              <tbody>

                @foreach($most_issued as $most_issued)
                @if($system_unit_issued > $most_issued->count)
                <tr id="{{$most_issued->subtype_id}}">
                  <td>System Unit</td>
                  <td>{{$system_unit_issued}}</td>
                </tr>
                @php ($system_unit_issued = 0)
                @endif
                @if($most_issued->name!=null)
                <tr id="{{$most_issued->subtype_id}}">
                  <td>{{$most_issued->name}}</td>
                  <td>{{$most_issued->count}}</td>
                  @endif
                @endforeach
              </tbody>
            </table>
            @endif
          <!-- available -->




    <!--Graph-->
    <div class="row" id="graph" style="margin-bottom: 2rem;">
      <div class="col col-6" id="container2" style="height: 350px; margin-top: 2rem;"></div>
      <div class="col col-6" id="container3" style="height: 350px; margin-top: 2rem;"></div>
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
          $('#available, #available2, #repair, #return, #disposal').DataTable( {
              dom: 'Bfrtip',
              buttons: [
                  'copy', 'csv', 'excel', 'pdf', 'print'
              ],
              "searching": false,
              "ordering": false
          } );
      } );
    </script>
@stop
