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
    Item Disposal Report
@stop

@section('../layout/breadcrumbs')
    @section('breadcrumbs-title')
    <i class="fas fa-chart-line">Inventory
    @stop
@stop


@section('content')
<div class="container p-lg-3 p-md-1 p-sm-0">
  <nav class="navbar navbar-light bg-light">
      <span class="navbar-brand mb-0 h1" style="font-size: 20px;">Item Disposal Report</span>
  </nav>
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

@stop
