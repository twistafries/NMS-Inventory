<?php
  use Carbon\Carbon;
  $session=Session::get('loggedIn');
  $user_id = $session['id'];
  $fname = $session['fname'];
  $lname = $session['lname'];
  // $img_path = $session['img_path'];
?>

@extends('../template')
@section('title') Build PC @stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/awesome-bootstrap-checkbox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/select.dataTables.min.css')}}">
@stop

@section('content')
<h1>Build A PC</h1>
    <form>
        <div class="form-group">
            @foreach($eq_subtype as $subtype)
                <p>
                @if($subtype->type_id == 1)
                    <div class="form-row align-items-center">
                        <label for="{{$subtype->name}}" class="col-md-1 col-form-label">{{$subtype->name}}</label>
                            <div class="col-md-8">
                                <select id="id{{$subtype->name}}" class="form-control form-control-sm" onchange="select{{$subtype->name}}()">
                                    <option value="" selected disabled hidden> -- select an option -- </option>
                                    @foreach($it_equipment as $item)
                                        @if($item->subtype_id == $subtype->id)
                                            <option value="{{$item->model}} {{$item->details}}">{{$item->model}}</option>
                                        @endif
                                    @endforeach 
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-outline-primary btn" onclick="clear{{$subtype->name}}">Clear</button>
                            </div>
                    </div>
                @endif
                </p>
            @endforeach    
        </div>

    </form>
    <script>
        var it_eq = @json($it_equipment->toArray());
        
        /*
            get DOM elements: motherboard select, then once an option is chosen
            check the socket desc of selected option. Disable CPU select options 
            not matching that socket
        */
        function selectMotherboard(){
            var mb = document.getElementById("idMotherboard");
            var cpu = document.getElementById("idCPU");
            var cpSelect;
            var descCPArr;
            var descCP;

            var option = mb.options[mb.selectedIndex].value;
            var pattern = /Socket:(.*)/;
            var descMBArr = pattern.exec(option);
            var descMB = descMBArr[1].replace(/[\W]/g,"");
            console.log("Option socket is "+descMB);
            for (var i=0; i<cpu.length; i++){
                cpSelect = cpu.options[i].value;
                descCPArr = pattern.exec(cpSelect);
                if(descCPArr != undefined){
                    descCP = descCPArr[1].replace(/[\W]/g,"");
                    console.log(descCP);
                    if(descCP == descMB){
                        cpu.options[i].disabled = false;
                    } else {
                        cpu.options[i].disabled = true;
                    }
                }
            }            
        }

        /*
            same script as above, just inverted for CPU/Mboard
        */
        function selectCPU(){
            var cpu = document.getElementById("idMotherboard");
            var mb = document.getElementById("idCPU");
            var cpSelect;
            var descCPArr;
            var descCP;

            var option = mb.options[mb.selectedIndex].value;
            var pattern = /Socket:(.*)/;
            var descMBArr = pattern.exec(option);
            var descMB = descMBArr[1].replace(/[\W]/g,"");
            console.log("Option socket is "+descMB);
            for (var i=0; i<cpu.length; i++){
                cpSelect = cpu.options[i].value;
                descCPArr = pattern.exec(cpSelect);
                if(descCPArr != undefined){
                    descCP = descCPArr[1].replace(/[\W]/g,"");
                    console.log(descCP);
                    if(descCP == descMB){
                        cpu.options[i].disabled = false;
                    } else {
                        cpu.options[i].disabled = true;
                    }
                }
            }            
        }

        function clearMotherboard(){

        }

        function changeRAM(){

        }
    </script>
@endsection