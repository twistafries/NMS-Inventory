
<h1>Build A PC</h1>
    <form>
        <div class="form-group">
            @foreach($eq_subtype as $subtype)
                @if($subtype->type_id == 1)
                    <p>
                        {{$subtype->name}}<select id="id{{$subtype->name}}" class="form-control form-control-sm" onchange="select{{$subtype->name}}()">
                            <option value="" selected disabled hidden> -- select an option -- </option>
                            @foreach($it_equipment as $item)
                                @if($item->subtype_id == $subtype->id)
                                    <option value="{{$item->model}} {{$item->details}}">{{$item->model}}</option>
                                @endif
                            @endforeach 
                        </select>
                    </p>
                @endif
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

        function selectCPU(){

        }

        function changeGPU(){

        }

        function changeRAM(){

        }
    </script>
