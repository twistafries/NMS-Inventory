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
    <form action="{!! url('/buildFromParts'); !!}" method="post">
        {!! csrf_field() !!}
            

        <div class="form-group">
            <div class="form-row">
                <label for="name" class="col-md-1 col-form-label">Unit Label and Number</label>
                <input name="name" type="text"  placeholder="Department Unit #" class="form-control col-sm-4" required>
            </div>
            @foreach($eq_subtype as $subtype)
                <p>
                @if($subtype->type_id == 1)
                    <div class="form-row align-items-center">
                        <label for="{{$subtype->name}}" class="col-md-1 col-form-label">{{$subtype->name}}</label>
                            <div class="col-md-8">
                                <select name="components[]" id="id{{$subtype->name}}" class="form-control form-control-sm" onchange="select{{$subtype->name}}()">
                                    <option value="" selected disabled hidden> -- select an option -- </option>
                                    @foreach($it_equipment as $item)
                                        @if($item->subtype_id == $subtype->id)
                                            <option value = "{{$item->id}}" id="{{$item->brand}} {{$item->model}} {{$item->details}}">{{$item->brand}} {{$item->model}} (S/N:{{$item->serial_no}})</option>
                                        @endif
                                    @endforeach 
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-outline-primary btn" onclick="clearOption('id{{$subtype->name}}')">Clear</button>
                            </div>
                    </div>
                @endif
                </p>
            @endforeach    
            <button type="submit" class="btn btn-success"><span class="fas fa-wrench"></span> Build Unit</button>
        </div>
    </form>
    <script>
        var it_eq = @json($it_equipment->toArray());
        
        /*
            get DOM elements: motherboard select, then once an option is chosen
            check the socket desc of selected option. Disable CPU and RAM select options 
            not matching that socket or config
        */
        function selectMotherboard(){
            var mb = document.getElementById("idMotherboard");
            var cpu = document.getElementById("idCPU");
            var ram = document.getElementById("idRAM");
            var cpSelect;
            var descCPArr;
            var descCP;

            var option = mb.options[mb.selectedIndex].id;
            var pattern = /Socket:(.*)/;
            var ramPat = /DDR[0-9]/;
            var descMBArr = pattern.exec(option);
            var descMB = descMBArr[1].replace(/[\W]/g,"");
            var descRAMArr = ramPat.exec(option);
            var descRAM = descRAMArr[0].replace(/[\W]/,"");
            
            for (var i=0; i<cpu.length; i++){
                cpSelect = cpu.options[i].id;
                descCPArr = pattern.exec(cpSelect);
                if(descCPArr != undefined){
                    descCP = descCPArr[1].replace(/[\W]/g,"");
                    if(descCP == descMB){
                        //cpu.options[i].disabled = false;
                        cpu.options[i].style.display = "block";
                    } else {
                        //cpu.options[i].disabled = true;
                        cpu.options[i].style.display = "none";
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

            var option = mb.options[mb.selectedIndex].id;
            var pattern = /Socket:(.*)/;
            var descMBArr = pattern.exec(option);
            var descMB = descMBArr[1].replace(/[\W]/g,"");
            for (var i=0; i<cpu.length; i++){
                cpSelect = cpu.options[i].id;
                descCPArr = pattern.exec(cpSelect);
                if(descCPArr != undefined){
                    descCP = descCPArr[1].replace(/[\W]/g,"");
                    if(descCP == descMB){
                        //cpu.options[i].disabled = false;
                        cpu.options[i].style.display = "block";
                    } else {
                        //cpu.options[i].disabled = true;
                        cpu.options[i].style.display = "none";
                    }
                }
            }           
        }

        function changeRAM(){
            var ram = document.getElementById("idRAM");
            var pattern;
        }

        function clearOption(selectID){
            document.getElementById(selectID).selectedIndex = 0;

            var cpu = document.getElementById("idMotherboard");
            var mb = document.getElementById("idCPU");
            var subtypes = document.getElementsByTagName('select');

            /*
            for(var i=0; i<cpu.length;i++){
                cpu.options[i].style.display = "block";
            }
            */

            Array.prototype.forEach.call(subtypes, subtype => {
                if(subtype.id !== selectID){
                    for(var i = 0; i<subtype.length; i++){
                        subtype.options[i].style.display = "block";
                    }
                }
            });
        }

    </script>
@endsection