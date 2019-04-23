<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\TblItEquipment;
use App\Models\TblSystemUnits;
use App\Models\TblItEquipmentSubtype;
use App\Models\TblItEquipmentType;

class BulkController extends BaseController
{
    public function showFields(){
        $data = [];
              $data['peripherals'] = TblItEquipment::get_computer_peripherals();
      // dd($data);
        $data['component'] = TblItEquipment::get_computer_component();
        $data['mobile'] = TblItEquipment::get_mobile_devices();
        $data['equipment_types'] = TblItEquipmentType::get_all_equipment_type();
        $data['software'] = TblItEquipment::get_software();
        $data['system_units'] = TblSystemUnits::get_all_system_units();
        $data['units'] = TblSystemUnits::get_all_system_units();
        $data['systemunits'] = TblSystemUnits::get_all_system_units();
        $data['units_system'] = TblSystemUnits::get_all_system_units();
        $data['all_units'] = TblSystemUnits::get_all_system_units();
        $data['equipment_subtypes'] = TblItEquipmentSubtype::get_all_equipment_subtype();
        $data['component_subtypes'] = TblItEquipmentSubtype::get_component_subtype();
        // $data['system_units'] = TblSystemUnits::get_all_system_units();
        
        // return view ('content/bulk-add' , $data);
        return view ('content/bulk-add-temp' , $data);
    }

   public function bulkAddInventory(Request $request){
       dd("iNSIDE");
       for($count = 0; $count<count($_POST['hidden_name']); $count++){
        $data = array(
            'name'=>$request->hidden_name[$count],
            'details'=>$request->hidden_details[$count],
            'serial_no'=>$request->hidden_serial_no[$count],
            'or_no'=>$request->or_no[$count],
            'supplier'=>$request->hidden_supplier[$count],
        );
        
        // $data = array(
        // ':name' => $_POST['hidden_name'][$count],
        // ':details' => $_POST['hidden_details'][$count]
        // );
        // $statement = $connect->prepare($query);
        // $statement->execute($data);
        }
        dd($data);

   }
}
