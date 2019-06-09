<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="systemUnit">
    <div class="modal-dialog modal-xxl">
        <div class="modal-content" style="height: 75%;">

            <div id="addSystemUnit" class="modal-header">
                <h5 class="modal-title" id="ModalTitle"><i class="fas fa-plus-square"></i>&nbsp;Add System Unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <form id="addSystemUnitForm" action="{!! url('/addSystemUnit'); !!}" enctype="multipart/form-data" method="post" role="form">
                    {!! csrf_field() !!}

                    <div class="row">
                        <div class="col-sm">

                            <table class="table table-borderless table-striped table-hover table-responsive table-condensed" style="width:100%; ">
                                <thead>
                                    <tr>
                                        <th>Department</th>
                                        <th>Supplier</th>
                                        <th>OR No.</th>
                                        <th>Warranty</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td> <input type="text" name="unit[mac_address]"></td>
                                        <td>
                                            <input type="text" name="unit[supplier]"><br>

                                        </td>
                                        <td> <input type="text" name="unit[or_no]"></td>
                                        <td>
                                            <label for="start">Start date:</label>
                                            <input type="date" id="start" name="unit[warranty_start]">
                                            <br>
                                            <label for="start">End date:</label>
                                            <input type="date" id="end" name="unit[warranty_end]">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                        <div class="col-sm">
                            <table class="table table-borderless table-striped table-hover table-responsive" style="width:100%">
                                <thead class="">
                                    <tr>
                                        <th>Component</th>
                                        <th>Brand</th>
                                        <th>Model</th>
                                        <th>Serial no.</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Motherboard <input type="text" name="equipment[subtype_id][]" value="1" hidden></td>
                                        <td> <input type="text" name="equipment[brand][]" required></td>
                                        <td> <input type="text" name="equipment[model][]" required></td>
                                        <td> <input type="text" name="equipment[serial_no][]" required></td>
                                        <td><textarea name="equipment[details][]" rows="2" cols="22">Socket:
Chipset:
Size:
RAM: </textarea></td>
                                    </tr>


                                    <tr>
                                        <td>CPU<input type="text" name="equipment[subtype_id][]" value="2" hidden></td>
                                        <td> <input type="text" name="equipment[brand][]" required></td>
                                        <td> <input type="text" name="equipment[model][]" required></td>
                                        <td> <input type="text" name="equipment[serial_no][]" required></td>
                                        <td><textarea name="equipment[details][]" rows="2" cols="22" value="Socket: ">Socket:
</textarea></td>
                                    </tr>

                                    <tr>
                                        <td>Storage<input type="text" name="equipment[subtype_id][]" value="3" hidden></td>
                                        <td> <input type="text" name="equipment[brand][]" required></td>
                                        <td> <input type="text" name="equipment[model][]" required></td>
                                        <td> <input type="text" name="equipment[serial_no][]" required></td>

                                        <td><textarea name="equipment[details][]" rows="2" cols="22"></textarea></td>

                                    <tr>
                                        <td>RAM<input type="text" name="equipment[subtype_id][]" value="4" hidden></td>
                                        <td> <input type="text" name="equipment[brand][]" required></td>
                                        <td> <input type="text" name="equipment[model][]" required></td>
                                        <td> <input type="text" name="equipment[serial_no][]" required></td>
                                        <td><textarea name="equipment[details][]" rows="2" cols="22"></textarea></td>
                                    </tr>

                                    <tr>
                                        <td>GPU<input type="text" name="equipment[subtype_id][]" value="5" hidden></td>
                                        <td> <input type="text" name="equipment[brand][]" required></td>
                                        <td> <input type="text" name="equipment[model][]" required></td>
                                        <td> <input type="text" name="equipment[serial_no][]" required> </td>
                                        <td><textarea name="equipment[details][]" rows="2" cols="22"></textarea></td>
                                    </tr>

                                    <tr>
                                        <td>Case<input type="text" name="equipment[subtype_id][]" value="7" hidden></td>
                                        <td> <input type="text" name="equipment[brand][]" required></td>
                                        <td> <input type="text" name="equipment[model][]" required></td>
                                        <td> <input type="text" name="equipment[serial_no][]" required></td>
                                        <td><textarea name="equipment[details][]" rows="2" cols="22"></textarea></td>
                                    </tr>

                                    <tr>
                                        <td>Heat Sink Fan<input type="text" name="equipment[subtype_id][]" value="8" hidden></td>
                                        <td> <input type="text" name="equipment[brand][]"></td>
                                        <td> <input type="text" name="equipment[model][]"></td>
                                        <td> <input type="text" name="equipment[serial_no][]"> </td>
                                        <td><textarea name="equipment[details][]" rows="2" cols="22"></textarea></td>


                                    </tr>

                                    <tr>
                                        <td>Sound Card<input type="text" name="equipment[subtype_id][]" value="18" hidden></td>
                                        <td> <input type="text" name="equipment[brand][]"></td>
                                        <td> <input type="text" name="equipment[model][]"></td>
                                        <td> <input type="text" name="equipment[serial_no][]" ></td>
                                        <td><textarea name="equipment[details][]" rows="2" cols="22"></textarea></td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                            </div>


                        </div>

                    <div class="modal-footer">
                        <button id="save" class="btn btn-success" type="submit"> <span class="fas fa-plus-square"></span>&nbsp;Add System Unit</button>
                        <button id="cancel" type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                    </div>
                      </form>


        </div>
    </div>
</div>
