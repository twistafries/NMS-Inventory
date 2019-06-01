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
    <link rel="stylesheet" href="{{ asset('css/datatable/awesome-bootstrap-checkbox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}"> @stop @section('title') Repair @stop @section('../layout/breadcrumbs') @section('breadcrumbs-title')
    <i class="fas fa-chart-line">REPAIR
    @stop
@stop

@section('content')


<div class="container-fluid">
<!--breadcrumbs navigation-->
<nav class="navbar navbar-light bg-light">
        <span class="navbar-brand mb-0 h1">FOR REPAIR</span>
            <nav aria-label="breadcrumb" style="font-size:23px; font-weight:bold;">
                <ol class="breadcrumb arr-right">
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/inventory') !!}" class="text-dark">Items</a>
                    </li>
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/repair') !!}" class="text-warning" aria-current="page">For Repair</a>
                    </li>
                   
                    <li class="breadcrumb-item ">
                        <a href="{!! url('/decommissioned') !!}" class="text-dark">Decommissioned</a>
                    </li>
                </ol>
            </nav>
    </nav>


<form action="" id="form1">
    <!-- Toolbox -->
    <div class="d-flex flex-row-reverse">
        <div class="p-2">
            <!-- Single Add Modal -->
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                        </div> 

                        <div class="modal-body">
                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-info"> <span class="fas fa-plus"></span> ADD ITEM</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
     <div class="container-fluid">

                            <div class="row">
                                <div class="container-fluid">
                                <ul class="nav nav-pills nav-justified">
                                <li class="nav-item" style="border-top-left-radius:25px;">
                                  <a class="nav-link active font-weight-bolder" href="{!! url('/repairSummary') !!}">SUMMARY</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link  font-weight-bolder" href="{!! url('/repair') !!}">REPAIR ITEMS LIST</a>
                                </li>
                              


                              </ul>
                                    </div>
                            </div>

                        </div>  
                        <hr>
    
    <!-- Tabs -->
    <div class="container-fluid">
   
        <div class="tab-content" id="pills-tabContent">
<!-- All Items in the Inventory -->
            <div class="tab-pane fade show active" id="pills-0" role="tabpanel" aria-labelledby="pills-0-tab">
                
                <div class="row">
                
<div class="container-fluid">
     <h4 class="font-weight-bold">System Units</h4>
     
        
      
                <!--            Departments collapse-->
                    <div class="panel panel-default pl-2">
                        <div class="panel-heading" role="tab" id="">
                            <h5 class="panel-title">
                                <a role="button" data-toggle="collapse" href="#collapseIT" aria-expanded="true" aria-controls="collapseIT" class="trigger collapsed" id="collapsedownIT"><i class="fas fa-arrow-circle-down"></i></i> Information Technology Development Department</a>
                            </h5>
                        </div>
                        <div id="collapseIT" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingIT">
                            <div class="panel-body">
                                <div class="container-fluid">
                                        <ul class="list-unstyled">
<!--IT PC items list -->
                                            <!--List item-->
                                            <li> <button type="button" class="btn btn-link text-info" data-toggle="collapse" data-target="#item1" style="text-decoration: none"  onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='#00F'" ><a onMouseOver="this.style.color='#33b5e5'" onMouseOut="this.style.color='#0099CC'" ><i class="fas fa-angle-down"></i> IT PC1</a> <button type="button" class="btn btn-success rounded btn-sm"><i class="fas fa-check"></i> Make Available</button>
                            <button type="button" class="btn btn-secondary rounded btn-sm"><i class="fas fa-trash-alt"></i> Decommissioned</button> </button>
<!--Accordion Content-->
                                                <div class="collapse" id="item1">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Component</th>
                                                                <th scope="col">Brand/Name</th>
                                                                <th scope="col">Details</th>
                                                                <th scope="col">Serial No.</th>
                                                                <th scope="col">Warranty</th>


                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Motherboard</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>CPU</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Storage</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>RAM</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>GPU</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Power Supply</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Case</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Heat Sink Fan</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sound Card</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </li>
         <button type="button" class="btn btn-link text-info" data-toggle="collapse" data-target="#item2" style="text-decoration: none"  onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='#00F'" ><a onMouseOver="this.style.color='#33b5e5'" onMouseOut="this.style.color='#0099CC'" ><i class="fas fa-angle-down"></i> IT PC2</a>
            <button type="button" class="btn btn-success rounded btn-sm"><i class="fas fa-check"></i> Make Available</button>
            <button type="button" class="btn btn-secondary rounded btn-sm"><i class="fas fa-trash-alt"></i> Decommissioned</button> </button>
                                  
                                    <div class="collapse" id="item2">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Component</th>
                                                        <th scope="col">Brand/Name</th>
                                                        <th scope="col">Details</th>
                                                        <th scope="col">Serial No.</th>
                                                        <th scope="col">Warranty</th>
                                                      

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Motherboard</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>CPU</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Storage</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>RAM</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>GPU</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Power Supply</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Case</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                     <tr>
                                                        <td>Heat Sink Fan</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                     <tr>
                                                        <td>Sound Card</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                    </div>
    </ul>


                                   
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                <div class="panel panel-default pl-2">
                        <div class="panel-heading" role="tab" id="">
                            <h5 class="panel-title">
                                <a role="button" data-toggle="collapse" href="#collapsePD" aria-expanded="true" aria-controls="collapsePD" class="trigger collapsed" id="collapsedownPD"><i class="fas fa-arrow-circle-down"></i> Production Development Department</a>
                            </h5>
                        </div>
                        <div id="collapsePD" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingPD">
                            <div class="panel-body">
                                <div class="container-fluid">
                            
                                     <ul class="list-unstyled">
<!--PD PC items list -->
                                            <!--List item-->
                                            <li> <button type="button" class="btn btn-link text-info" data-toggle="collapse" data-target="#pd1" style="text-decoration: none"  onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='#00F'" ><a onMouseOver="this.style.color='#33b5e5'" onMouseOut="this.style.color='#0099CC'" ><i class="fas fa-angle-down"></i> PD PC1</a><button type="button" class="btn btn-success rounded btn-sm"><i class="fas fa-check"></i> Make Available</button>
            <button type="button" class="btn btn-secondary rounded btn-sm"><i class="fas fa-trash-alt"></i> Decommissioned</button> </button>
<!--Accordion Content-->
                                                <div class="collapse" id="pd1">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Component</th>
                                                                <th scope="col">Brand/Name</th>
                                                                <th scope="col">Details</th>
                                                                <th scope="col">Serial No.</th>
                                                                <th scope="col">Warranty</th>


                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Motherboard</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>CPU</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Storage</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>RAM</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>GPU</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Power Supply</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Case</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Heat Sink Fan</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sound Card</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </li>
         <button type="button" class="btn btn-link text-info" data-toggle="collapse" data-target="#pd2" style="text-decoration: none"  onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='#00F'" ><a onMouseOver="this.style.color='#33b5e5'" onMouseOut="this.style.color='#0099CC'" ><i class="fas fa-angle-down"></i> PD PC2</a><button type="button" class="btn btn-success rounded btn-sm"><i class="fas fa-check"></i> Make Available</button>
            <button type="button" class="btn btn-secondary rounded btn-sm"><i class="fas fa-trash-alt"></i> Decommissioned</button> </button>
                                  
                                    <div class="collapse" id="pd2">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Component</th>
                                                        <th scope="col">Brand/Name</th>
                                                        <th scope="col">Details</th>
                                                        <th scope="col">Serial No.</th>
                                                        <th scope="col">Warranty</th>
                                                      

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Motherboard</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>CPU</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Storage</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>RAM</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>GPU</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Power Supply</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Case</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                     <tr>
                                                        <td>Heat Sink Fan</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                     <tr>
                                                        <td>Sound Card</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                    </div>
    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default pl-2">
                        <div class="panel-heading" role="tab" id="">
                            <h5 class="panel-title">
                                <a role="button" data-toggle="collapse" href="#collapseFD" aria-expanded="true" aria-controls="collapseFD" class="trigger collapsed" id="collapsedownFD"><i class="fas fa-arrow-circle-down"></i> Financial Department</a>
                            </h5>
                        </div>
                        <div id="collapseFD" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFD">
                            <div class="panel-body">
                                <div class="container-fluid">
                                     <ul class="list-unstyled">
<!--FD PC items list -->
                                            <!--List item-->
                                            <li> <button type="button" class="btn btn-link text-info" data-toggle="collapse" data-target="#fd1" style="text-decoration: none"  onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='#00F'" ><a onMouseOver="this.style.color='#33b5e5'" onMouseOut="this.style.color='#0099CC'" ><i class="fas fa-angle-down"></i> FD PC1</a><button type="button" class="btn btn-success rounded btn-sm"><i class="fas fa-check"></i> Make Available</button>
            <button type="button" class="btn btn-secondary rounded btn-sm"><i class="fas fa-trash-alt"></i> Decommissioned</button> </button>
<!--Accordion Content-->
                                                <div class="collapse" id="fd1">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Component</th>
                                                                <th scope="col">Brand/Name</th>
                                                                <th scope="col">Details</th>
                                                                <th scope="col">Serial No.</th>
                                                                <th scope="col">Warranty</th>


                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Motherboard</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>CPU</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Storage</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>RAM</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>GPU</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Power Supply</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Case</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Heat Sink Fan</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sound Card</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </li>
         <button type="button" class="btn btn-link text-info" data-toggle="collapse" data-target="#fd2" style="text-decoration: none"  onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='#00F'" ><a onMouseOver="this.style.color='#33b5e5'" onMouseOut="this.style.color='#0099CC'" ><i class="fas fa-angle-down"></i> FD PC2</a><button type="button" class="btn btn-success rounded btn-sm"><i class="fas fa-check"></i> Make Available</button>
            <button type="button" class="btn btn-secondary rounded btn-sm"><i class="fas fa-trash-alt"></i> Decommissioned</button> </button>
                                  
                                    <div class="collapse" id="fd2">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Component</th>
                                                        <th scope="col">Brand/Name</th>
                                                        <th scope="col">Details</th>
                                                        <th scope="col">Serial No.</th>
                                                        <th scope="col">Warranty</th>
                                                      

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Motherboard</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>CPU</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Storage</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>RAM</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>GPU</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Power Supply</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Case</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                     <tr>
                                                        <td>Heat Sink Fan</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                     <tr>
                                                        <td>Sound Card</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                    </div>
    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default pl-2">
                        <div class="panel-heading" role="tab" id="">
                            <h5 class="panel-title">
                                <a role="button" data-toggle="collapse" href="#collapseHR" aria-expanded="true" aria-controls="collapseHR" class="trigger collapsed" id="collapsedownHR"><i class="fas fa-arrow-circle-down"></i>  Human Resources Department</a>
                            </h5>
                        </div>
                        <div id="collapseHR" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingHR">
                            <div class="panel-body">
                                <div class="container-fluid">
                                  
                                    <ul class="list-unstyled">
<!--HR PC items list -->
                                            <!--List item-->
                                            <li> <button type="button" class="btn btn-link text-info" data-toggle="collapse" data-target="#hr1" style="text-decoration: none"  onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='#00F'" ><a onMouseOver="this.style.color='#33b5e5'" onMouseOut="this.style.color='#0099CC'" ><i class="fas fa-angle-down"></i> HR PC1</a><button type="button" class="btn btn-success rounded btn-sm"><i class="fas fa-check"></i> Make Available</button>
            <button type="button" class="btn btn-secondary rounded btn-sm"><i class="fas fa-trash-alt"></i> Decommissioned</button> </button>
<!--Accordion Content-->
                                                <div class="collapse" id="hr1">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Component</th>
                                                                <th scope="col">Brand/Name</th>
                                                                <th scope="col">Details</th>
                                                                <th scope="col">Serial No.</th>
                                                                <th scope="col">Warranty</th>


                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Motherboard</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>CPU</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Storage</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>RAM</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>GPU</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Power Supply</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Case</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Heat Sink Fan</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sound Card</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </li>
         <button type="button" class="btn btn-link text-info" data-toggle="collapse" data-target="#hr2" style="text-decoration: none"  onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='#00F'" ><a onMouseOver="this.style.color='#33b5e5'" onMouseOut="this.style.color='#0099CC'" ><i class="fas fa-angle-down"></i> HR PC2</a><button type="button" class="btn btn-success rounded btn-sm"><i class="fas fa-check"></i> Make Available</button>
            <button type="button" class="btn btn-secondary rounded btn-sm"><i class="fas fa-trash-alt"></i> Decommissioned</button></button>
                                  
                                    <div class="collapse" id="hr2">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Component</th>
                                                        <th scope="col">Brand/Name</th>
                                                        <th scope="col">Details</th>
                                                        <th scope="col">Serial No.</th>
                                                        <th scope="col">Warranty</th>
                                                      

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Motherboard</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>CPU</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Storage</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>RAM</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>GPU</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Power Supply</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Case</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                     <tr>
                                                        <td>Heat Sink Fan</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                     <tr>
                                                        <td>Sound Card</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                    </div>
    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                
                </div>
            </div>
        </div>
   
   
    
    
    
    
    
    <h4 class="font-weight-bold">Computer Peripheral</h4>
     <div class="panel panel-default pl-2">
        <div class="panel-heading" role="tab" id="headingTwo">
            <h5 class="panel-title">
                <a role="button" data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" class="trigger collapsed" id="collapsedown2"><i class="fas fa-arrow-circle-down"></i> Mouse</a>
            </h5>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
                <div class="container-fluid">
                    
                    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Brand/Name</th>
                            <th scope="col">Details</th>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Warranty</th>
                            <th scope="col">Mark Item As</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                            <button type="button" class="btn btn-success rounded"><i class="fas fa-check"></i> Make Available</button>
                            <button type="button" class="btn btn-secondary rounded"><i class="fas fa-trash-alt"></i> Decommissioned</button>
                          </td>
                        </tr>
                       
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    
     <div class="panel panel-default pl-2">
        <div class="panel-heading" role="tab" id="headingThree">
            <h5 class="panel-title">
                <a role="button" data-toggle="collapse" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree" class="trigger collapsed" id="collapsedown3"><i class="fas fa-arrow-circle-down"></i> Keyboard</a>
            </h5>
        </div>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body">
                <div class="container-fluid">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Brand/Name</th>
                            <th scope="col">Details</th>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Warranty</th>
                            <th scope="col">Mark Item As</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                             <button type="button" class="btn btn-success rounded"><i class="fas fa-check"></i> Make Available</button>
                            <button type="button" class="btn btn-secondary rounded"><i class="fas fa-trash-alt"></i> Decommissioned</button>
                            </td>
                            
                        </tr>
                       
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
     <div class="panel panel-default pl-2">
        <div class="panel-heading" role="tab" id="headingFour">
            <h5 class="panel-title">
                <a role="button" data-toggle="collapse" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour" class="trigger collapsed" id="collapsedown4"><i class="fas fa-arrow-circle-down"></i> Monitor</a>
            </h5>
        </div>
        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
            <div class="panel-body">
                <div class="container-fluid">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Brand/Name</th>
                            <th scope="col">Details</th>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Warranty</th>
                            <th scope="col">Mark Item As</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                             <button type="button" class="btn btn-success rounded"><i class="fas fa-check"></i> Make Available</button>
                            <button type="button" class="btn btn-secondary rounded"><i class="fas fa-trash-alt"></i> Decommissioned</button>
                            
                        </tr>
                       
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
   
    
    
     
     <h4 class="font-weight-bold">Mobile Device</h4>
       <div class="panel panel-default pl-2">
            <div class="panel-heading" role="tab" id="headingFive">
                <h5 class="panel-title">
                    <a role="button" data-toggle="collapse" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive" class="trigger collapsed" id="collapsedown5"><i class="fas fa-arrow-circle-down"></i> Laptop</a>
                </h5>
            </div>
            <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                <div class="panel-body">
                    <div class="container-fluid">
                     <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Brand/Name</th>
                            <th scope="col">Details</th>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Warranty</th>
                            <th scope="col">Mark Item As</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                             <button type="button" class="btn btn-success rounded"><i class="fas fa-check"></i> Make Available</button>
                            <button type="button" class="btn btn-secondary rounded"><i class="fas fa-trash-alt"></i> Decommissioned</button>
                           
                        </tr>
                       
                    </tbody>
                </table>
                    </div>
                </div>
            </div>
        </div>
     
         <div class="panel panel-default pl-2">
            <div class="panel-heading" role="tab" id="headingSix">
                <h5 class="panel-title">
                    <a role="button" data-toggle="collapse" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix" class="trigger collapsed" id="collapsedown6"><i class="fas fa-arrow-circle-down"></i> Tablet</a>
                </h5>
            </div>
            <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                <div class="panel-body">
                    <div class="container-fluid">
                        <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Brand/Name</th>
                            <th scope="col">Details</th>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Warranty</th>
                            <th scope="col">Mark Item As</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                            <button type="button" class="btn btn-success rounded"><i class="fas fa-check"></i> Make Available</button>
                            <button type="button" class="btn btn-secondary rounded"><i class="fas fa-trash-alt"></i> Decommissioned</button>
                            
                        </tr>
                       
                    </tbody>
                </table>
                    </div>
                </div>
            </div>
        </div>
    
             <div class="panel panel-default pl-2">
            <div class="panel-heading" role="tab" id="headingSeven">
                <h5 class="panel-title">
                    <a role="button" data-toggle="collapse" href="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven" class="trigger collapsed" id="collapsedown7"><i class="fas fa-arrow-circle-down"></i> Mobile Phone</a>
                </h5>
            </div>
            <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                <div class="panel-body">
                    <div class="container-fluid">
                       <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Brand/Name</th>
                            <th scope="col">Details</th>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Warranty</th>
                            <th scope="col">Mark Item As</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td> <button type="button" class="btn btn-success rounded"><i class="fas fa-check"></i> Make Available</button>
                            <button type="button" class="btn btn-secondary rounded"><i class="fas fa-trash-alt"></i> Decommissioned</button></td>
                            
                        </tr>
                       
                    </tbody>
                </table>
                    </div>
                </div>
            </div>
        </div>
    
    
    
   
     
    

</div>
                
                </div>
            

        </div>
    </div>
</div>



</form>
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
      $(document).ready(function(){
      $('#concerns').addClass('active');
      });
    </script>

    <!-- <script type="text/javascript">
    $(document).ready(function() {
        $('#myDataTable1').DataTable();
    } );
    </script> -->
    <script type="text/javascript">
    $(document).ready(function() {
        $('#myDataTable').DataTable();
    } );
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#myDataTable1').DataTable();
    } );
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#myDataTable2').DataTable();
    } );
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#myDataTable3').DataTable();
    } );
    </script>
        
         <script>
        $('#collapsedown1').click(function() {
            $('#collapse1').toggle('1000');
            $("i", this).toggleClass("fas fa-arrow-circle-down fas fa-arrow-circle-up");

        });

        $('#collapsedown2').click(function() {
            $('#collapseTwo').toggle('1000');
            $("i", this).toggleClass("fas fa-arrow-circle-down fas fa-arrow-circle-up");

        });

        $('#collapsedown3').click(function() {
            $('#collapseThree').toggle('1000');
            $("i", this).toggleClass("fas fa-arrow-circle-down fas fa-arrow-circle-up");

        });

        $('#collapsedown4').click(function() {
            $('#collapseFour').toggle('1000');
            $("i", this).toggleClass("fas fa-arrow-circle-down fas fa-arrow-circle-up");

        });
             
        $('#collapsedown5').click(function() {
            $('#collapseFive').toggle('1000');
            $("i", this).toggleClass("fas fa-arrow-circle-down fas fa-arrow-circle-up");

        });
             
        $('#collapsedown6').click(function() {
            $('#collapseSix').toggle('1000');
            $("i", this).toggleClass("fas fa-arrow-circle-down fas fa-arrow-circle-up");

        });
             
        $('#collapsedown8').click(function() {
         $('#collapseEight').toggle('1000');
         $("i", this).toggleClass("fas fa-arrow-circle-down fas fa-arrow-circle-up");

        });
             
        $('#collapsedown11').click(function() {
        $('#collapseEleven').toggle('1000');
        $("i", this).toggleClass("fas fa-arrow-circle-down fas fa-arrow-circle-up");

        });

    </script>
        <script>
        $('#collapsedownIT').click(function() {
        $('#collapseIT').toggle('1000');
        $("i", this).toggleClass("fas fa-arrow-circle-down fas fa-arrow-circle-up");

        });
        $('#collapsedownPD').click(function() {
        $('#collapsePD').toggle('1000');
        $("i", this).toggleClass("fas fa-arrow-circle-down fas fa-arrow-circle-up");

        });
        $('#collapsedownFD').click(function() {
        $('#collapseFD').toggle('1000');
        $("i", this).toggleClass("fas fa-arrow-circle-down fas fa-arrow-circle-up");

        });
        $('#collapsedownHR').click(function() {
        $('#collapseHR').toggle('1000');
        $("i", this).toggleClass("fas fa-arrow-circle-down fas fa-arrow-circle-up");

        });
            
         
        
        </script>

@stop
