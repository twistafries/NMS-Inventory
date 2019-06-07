<div class="d-flex flex-row-reverse">
        <div class="p-4">
            <div class="btn-group" role="group" aria-label="Basic example">


                <button type="button" class="btn btn-outline-dark rounded-pill hide-column mr-2" id="hideColumn"  aria-haspopup="true" aria-expanded="false" style="border-radius:25px;" data-target="#singleAdd" data-toggle="modal">

                    <a href="#" data-toggle="tooltip" title="Single Add">
                        <img class="tool-item" src="{{ asset('assets/icons/table-toolbar-icons/add-icon.png') }}"> Single Add
                    </a>
                </button>
                <!-- Bulk add  -->
                <button type="button" class="btn btn-outline-dark rounded-pill mr-2" id="bulkAdd">
                    <a  data-toggle="tooltip" title="Bulk Add" href="{!! url('/bulk-add') !!}">
                        <img class="tool-item" src="{{ asset('assets/icons/table-toolbar-icons/box.png') }}"> Bulk Add
                    </a>
                </button>

                <!-- Add System Unit  -->
                <button type="button" class="btn btn-outline-dark rounded-pill mr-2" id="addSystemUnit" data-target="#systemUnit" data-toggle="modal">
                    <a href="#" data-toggle="tooltip" title="Add System Unit">
                        <img class="tool-item" src="{{ asset('assets/icons/table-toolbar-icons/system-unit.png') }}"> Add System Unit
                    </a>
                </button>

                <!-- Build A pc  -->
                 <button type="button" class="btn btn-outline-dark rounded-pill mr-2" id="buildAPc">
                    <a href="{!! url('/buildpc') !!}" data-toggle="tooltip" title="Build A Pc">
                        <img class="tool-item" src="{{ asset('assets/icons/table-toolbar-icons/build.png') }}"> Build A Pc
                    </a>
                </button>
                
                 <button type="button" class="btn btn-outline-dark rounded-pill mr-2" id="addSub" data-target="#addSubtype" data-toggle="modal">
                    <a href="#" data-toggle="tooltip" title="Add Subtype">
                        <img class="tool-item" src="{{ asset('assets/icons/table-toolbar-icons/subtype.png') }}"> Add Subtype
                    </a>
                </button>



            </div>


        </div>
    </div>