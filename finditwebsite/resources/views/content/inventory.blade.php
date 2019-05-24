<?php
//   use Carbon\Carbon;
//   $session=Session::get('loggedIn');
//   $user_id = $session['id'];
//   $fname = $session['fname'];
//   $lname = $session['lname'];
  // $img_path = $session['img_path'];
?>

    @extends('../template') @section('css')
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}"> @stop @section('title') Inventory @stop @section('../layout/breadcrumbs') @section('breadcrumbs-title')
    <i class="fas fa-chart-line">Inventory
    @stop
@stop

@section('content')
<div class="container">
<nav class="navbar navbar-light">
        <span class="navbar-brand mb-0 h1">INVENTORY</span>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb arr-right">
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/inventory') !!}" class="text-dark active">Items</a>
                    </li>
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/repair') !!}"  aria-current="page" class="text-warning">For Repair</a>
                    </li>
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/decommissioned') !!}" class="text-warning">Decommissioned</a>
                    </li>
                </ol>
            </nav>
    </nav>

<!--
     Pills Tabs
    <ul class="nav nav-pills p-3 nav-justified nav-fill font-weight-bold" id="pills-tab" role="tablist" style="background-color:white;">
        <li class="nav-item text-uppercase" >
            <a class="nav-link active" id="pills-0-tab" onclick="restore(true)" data-toggle="pill" href="#pills-0" role="tab" aria-controls="pills-0" aria-selected="true">
              IT Equipments
            </a>
        </li>
        <li class="nav-item text-uppercase">
        <a class="nav-link" id="pills-5-tab" data-toggle="pill" href="#pills-5" role="tab" onclick="changeFilter()" aria-controls="pills-6" aria-selected="false"> System Unit
        </a>
      </li>

         <li class="nav-item text-uppercase">
            <a class="nav-link" id="pills-2-tab" data-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-2" aria-selected="false">
                Computer Peripherals</a>
        </li>
        <li class="nav-item text-uppercase">
            <a class="nav-link" id="pills-3-tab" data-toggle="pill" href="#pills-3" role="tab" aria-controls="pills-3" aria-selected="false">
                Mobile Devices</a>
        </li>
        <li class="nav-item text-uppercase">
            <a class="nav-link" id="pills-4-tab" data-toggle="pill" href="#pills-4" role="tab" aria-controls="pills-4" aria-selected="false">tab 4</a>
        </li>
    </ul>
-->


<!--    PAGE CONTENT -->
      <div class="container p-lg-2 p-md-1 p-sm-0">
                        <div class="container">

                            <div class="row">
                                <div class="container">
                                <ul class="nav nav-pills nav-justified">
                                <li class="nav-item">
                                  <a class="nav-link active" href="{!! url('/inventory') !!}">Categories</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="{!! url('/inventoryAll') !!}">All Items</a>
                                </li>


                              </ul>
                                    </div>
                            </div>

                        </div>

                        <div class="container pt-4">
                            <div class="row">
                                <h4>IT EQUIPMENT</h4>
                                <div class="container">
                                    <!--
                                    <div class="collapse-group">

                                        <div class="controls">
                                            <button class="btn btn-primary open-button" type="button">
      Open all
    </button>
                                            <button class="btn btn-primary close-button" type="button">
      Close all
    </button>

                                    </div>
-->

                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h5 class="panel-title">
                                                <a role="button" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed "><i class="fas fa-plus-circle"></i> Hardware </a>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <div class="container">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Type</th>
                                                            <th scope="col">Available</th>
                                                            <th scope="col">Issued</th>
                                                            <th scope="col">In Use</th>
                                                            <th scope="col">For Repair</th>
                                                            <th scope="col">For Return</th>
                                                            <th scope="col">For Disposal</th>
                                                            <th scope="col">Pending</th>
                                                            <th scope="col">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Motherboard</th>
                                                            <td>5</td>
                                                            <td>6</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">CPU</th>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Storage</th>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                         <tr>
                                                            <th scope="row">RAM</th>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                             <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                         <tr>
                                                            <th scope="row">GPU</th>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                         <tr>
                                                            <th scope="row">Power Supply</th>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                         <tr>
                                                            <th scope="row">Case</th>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Heat Sink Fan</th>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Mouse</th>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Keyboard</th>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                         <tr>
                                                            <th scope="row">Monitor</th>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                             <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                         <tr>
                                                            <th scope="row">Laptop</th>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                         <tr>
                                                            <th scope="row">Tablet</th>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Mobile Phone</th>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h5 class="panel-title">
                                                <a role="button" data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" class="trigger collapsed"><i class="fas fa-plus-circle"></i> Software </a>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                <div class="container">
                                                 <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Type</th>
                                                            <th scope="col">Installed</th>
                                                            <th scope="col">Total</th>


                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Operating System</th>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Licensed Software</th>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Operating System</th>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                         <tr>

                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingThree">
                                            <h5 class="panel-title">
                                                <a role="button" data-toggle="collapse" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree" class="trigger collapsed"><i class="fas fa-plus-circle"></i> System Units</a>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body">
                                             <div class="container">
                                                 <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Available</th>
                                                            <th scope="col">Total</th>


                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>

                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>

                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>

                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                         <tr>

                                                            <td></td>
                                                            <td></td>

                                                        </tr>

                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<!--

                                <div class="collapse-group">
                                    <div class="controls">
                                        <button class="btn btn-primary open-button" type="button">
      Open all
    </button>
                                        <button class="btn btn-primary close-button" type="button">
      Close all
    </button>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingThree">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree" class="trigger">
          Collapsible Group Item #3
        </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi molestiae dolorum, soluta temporibus vero perferendis quo odit eaque cum fugiat nihil earum error vitae libero nostrum sed ipsam, beatae ea.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingFour">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour" class="trigger">
          Collapsible Group Item #4
        </a>
                                            </h4>
                                        </div>
                                        <div id="collapseFour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour">
                                            <div class="panel-body">
                                                Sunt quia aperiam, officiis tempora quis quasi fugit ab ipsa quo expedita reiciendis quod iusto! Enim delectus unde voluptatem officiis molestiae repudiandae.
                                            </div>
                                        </div>
                                    </div>
                                </div>
-->


                            </div>
                        <div class="row pt-4">
                            <h4>OFFICE EQUIPMENT</h4>
                        </div>

                        </div>


                    </div>
<!--    PAGE CONTENT END -->



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
      $('#inventory').addClass('active');
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
    <script type="text/javascript">
    $(document).ready(function() {
        $('#myDataTable1').DataTable({
           "pagingType": "full_numbers",
           "order": []});
    } );
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#myDataTable2').DataTable({ "pagingType": "full_numbers",
        "order": []});
    } );
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#myDataTable3').DataTable({ "pagingType": "full_numbers",
        "order": []});
    } );
  </script>
  <script type="text/javascript">
  $(document).ready(function() {
      $('#myDataTable4').DataTable({ "pagingType": "full_numbers",
      "order": []});
  } );
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#myDataTable5').DataTable({ "pagingType": "full_numbers",
    "order": []});
} );
</script>
    <!-- <script>
      $(document).ready(function() {
            $('table.display').DataTable({
              pagingType: "full_numbers",
              scrollY:        "300px",
              scrollX:        true,
              scrollCollapse: true,
              paging:         false,
              fixedColumns:   {
                  leftColumns: 1,
                  rightColumns: 1
              }
            });
        } );
      </script> -->
    <script>
      function DoSubmit(){
        var item = $(equipment).val();
        document.getElementById("equipment").value = $('#items [value="' + item + '"]').data('customvalue');
        var item1 = $(hequipment).val();
        document.getElementById("hequipment").value = $('#item [value="' + item1 + '"]').data('customvalue');
        return true;
        };
    </script>
    <script>
    $.fn.dataTable.ext.search.push(
function( settings, data, dataIndex ) {
var type =  $('#types').val();
var subtype =  $('#subtypes').val();
var supplier =  $('#supplier').val();
var brand =  $('#brand').val();
var status =  $('#status').val();
var types = data[3]; // use data for the age column
var subtypes = data[4];
var suppliers = data[5];
var brands = data[2];
var statuses = data[11];
if ( type == types || type == "any"){
  if (subtype == subtypes || subtype == "any"){
    if (supplier == suppliers || supplier == "any"){
      if (brand == brands || brand == "any"){
        if (status == statuses || status == "any"){
          return true;
        }
      }
    }
  }

}
return false;
}
);

$(document).ready(function() {
var table = $('#myDataTable').DataTable();

// Event listener to the two range filtering inputs to redraw on input
$('#subtypes').on('keyup change',  function() {
    table.draw();
    } );
    $('#types').on('keyup change',  function() {
        table.draw();
        } );
        $('#supplier').on('keyup change',  function() {
            table.draw();
            } );
            $('#brand').on('keyup change',  function() {
                table.draw();
                } );
                $('#status').on('keyup change',  function() {
                    table.draw();
                    } );
        } );
        $(document).ready(function() {
        var table = $('#myDataTable1').DataTable();

        // Event listener to the two range filtering inputs to redraw on input
        $('#subtypes').on('keyup change',  function() {
            table.draw();
            } );
            $('#types').on('keyup change',  function() {
                table.draw();
                } );
                $('#supplier').on('keyup change',  function() {
                    table.draw();
                    } );
                    $('#brand').on('keyup change',  function() {
                        table.draw();
                        } );
                        $('#status').on('keyup change',  function() {
                            table.draw();
                            } );
                } );

              $(document).ready(function() {
                var table = $('#myDataTable2').DataTable();

                // Event listener to the two range filtering inputs to redraw on input
                $('#subtypes').on('keyup change',  function() {
                    table.draw();
                    } );
                    $('#types').on('keyup change',  function() {
                        table.draw();
                        } );
                        $('#supplier').on('keyup change',  function() {
                            table.draw();
                            } );
                            $('#brand').on('keyup change',  function() {
                                table.draw();
                                } );
                                $('#status').on('keyup change',  function() {
                                    table.draw();
                                    } );
                        } );
                        $(document).ready(function() {
                          var table = $('#myDataTable3').DataTable();

                          // Event listener to the two range filtering inputs to redraw on input
                          $('#subtypes').on('keyup change',  function() {
                              table.draw();
                              } );
                              $('#types').on('keyup change',  function() {
                                  table.draw();
                                  } );
                                  $('#supplier').on('keyup change',  function() {
                                      table.draw();
                                      } );
                                      $('#brand').on('keyup change',  function() {
                                          table.draw();
                                          } );
                                          $('#status').on('keyup change',  function() {
                                              table.draw();
                                              } );
                                  } );
                                  $(document).ready(function() {
                                    var table = $('#myDataTable4').DataTable();

                                    // Event listener to the two range filtering inputs to redraw on input
                                    $('#subtypes').on('keyup change',  function() {
                                        table.draw();
                                        } );
                                        $('#types').on('keyup change',  function() {
                                            table.draw();
                                            } );
                                            $('#supplier').on('keyup change',  function() {
                                                table.draw();
                                                } );
                                                $('#brand').on('keyup change',  function() {
                                                    table.draw();
                                                    } );
                                                    $('#status').on('keyup change',  function() {
                                                        table.draw();
                                                        } );
                                            } );
                                            // $(document).ready(function() {
                                            //   var table = $('#myDataTable5').DataTable();
                                            //
                                            //   // Event listener to the two range filtering inputs to redraw on input
                                            //   $('#subtypes').on('keyup change',  function() {
                                            //       table.draw();
                                            //       } );
                                            //       $('#types').on('keyup change',  function() {
                                            //           table.draw();
                                            //           } );
                                            //           $('#supplier').on('keyup change',  function() {
                                            //               table.draw();
                                            //               } );
                                            //               $('#brand').on('keyup change',  function() {
                                            //                   table.draw();
                                            //                   } );
                                            //                   $('#status').on('keyup change',  function() {
                                            //                       table.draw();
                                            //                       } );
                                            //           } );
        function reset(){
          document.getElementById("subtypes").selectedIndex = "0";
          document.getElementById("types").selectedIndex = "0";
          document.getElementById("supplier").selectedIndex = "0";
          document.getElementById("brand").selectedIndex = "0";
          document.getElementById("status").selectedIndex = "0";
          $('#myDataTable').DataTable().search('').draw();
          $('#myDataTable1').DataTable().search('').draw();
          $('#myDataTable2').DataTable().search('').draw();
          $('#myDataTable3').DataTable().search('').draw();
          $('#myDataTable4').DataTable().search('').draw();
          // $('#myDataTable5').DataTable().search('').draw();

        }
        function restore(option){
          if(option== false){
              $("#types").hide();
            $("#labelTypes").hide();
            reset()
          } else{
            $("#types").show();
            $("#labelTypes").show();
            reset()

          }
        };


    </script>
  <script>
        $(".open-button").on("click", function() {
            $(this).closest('.collapse-group').find('.collapse').collapse('show');
        });

        $(".close-button").on("click", function() {
            $(this).closest('.collapse-group').find('.collapse').collapse('hide');
        });

    </script>


@stop
