<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\TblItEquipment;
use App\Models\TblItEquipmentType;
use App\Models\TblItEquipmentSubtype;
use App\Models\TblSystemUnits;
use App\Models\TblStatus;

class InventoryController extends BaseController
{
    public function showAllInventory(){
        $data = [];
        $data['equipment'] = TblItEquipment::get_all_equipment();
        $data['peripherals'] = TblItEquipment::get_computer_peripherals();
        // dd($data);
        $data['component'] = TblItEquipment::get_computer_component();
        $data['mobile'] = TblItEquipment::get_mobile_devices();
        $data['equipment_types'] = TblItEquipmentType::get_all_equipment_type();
        $data['system_units'] = TblSystemUnits::get_all_system_units();
        $data['equipment_subtypes'] = TblItEquipmentSubtype::get_all_equipment_subtype();
        $data['equipment_component_subtypes'] = TblItEquipmentSubtype::get_all_component_subtype();
        $data['equipment_peripheral_subtypes'] = TblItEquipmentSubtype::get_all_peripheral_subtype();
        $data['equipment_mobile_subtypes'] = TblItEquipmentSubtype::get_all_mobile_subtype();
        $data['equipment_status'] = TblStatus::get_all_equipment_status();
        return view ('content/inventory' , $data);
    }

    public function showTempAllInventory(){
        $data = [];
        $data['equipment'] = TblItEquipment::get_all_equipment();
        // dd($data);
        $data['peripherals'] = TblItEquipment::get_computer_peripherals();
        $data['component'] = TblItEquipment::get_computer_component();
        $data['mobile'] = TblItEquipment::get_mobile_devices();
        $data['equipment_types'] = TblItEquipmentType::get_all_equipment_type();
        $data['system_units'] = TblSystemUnits::get_all_system_units();
        $data['equipment_subtypes'] = TblItEquipmentSubtype::get_all_equipment_subtype();
        return view ('content/temporary-add-equipment' , $data);
    }
    
    public function showInputValues(){
        $data = [];
        
        $data['equipment_subtypes'] = TblItEquipmentSubtype::get_all_equipment_subtype();
        $data['equipment_types'] = TblItEquipmentType::get_all_equipment_type();
        $data['system_units'] = TblSystemUnits::get_all_system_units();
        // $data['status'] = TblSystemUnits::get_all_status();
        // dd($data);
        return view ('content/temporary-add-equipment' , $data);
    }
 
    // INSERT INTO `findit`.`it_equipment` 
    // (`subtype_id`, `name`, `details`, 
    // `serial_no`, `or_no`, `user_id`, `status_id`) 
    // VALUES ('6', 'EVGA SuperNOVA 750', '750 W', '80-R5-7854-TY', '43790', '1', '1');

   public function addEquipment(Request $request){
    // dd("Inside");   
        $data = $request->all();

        if($data['unit_id'] == "NULL"){
            $data['unit_id'] = null;
        }else{
            return $it_equipment->system_units = $data['system_units'];  
        }
        
       if(isset($data['subtype_id']) && isset($data['name']) && isset($data['details']) && isset($data['serial_no']) && isset($data['or_no'])){
           TblItEquipment::add_equipment($data);
           return \Redirect::to('/inventory');
       }else{
        //    return redirect()->back()->with('error', 'Please fill out ALL fields');
           return redirect()->intended('/inventory')->with('error', 'Please fill out ALL fields');
       }
   }

   public function bulkAdd(){
       return view('content/bulk-add');
   }

   public function editEquipment(Request $request){
       $data = $request->all();
       TblItEquipment::edit_equipment($data);
       return redirect()->intended('/inventory')->with('message', 'Successfully editted equipment details');
   }
   
   public function editStatus(Request $request){
        $data = $request->all();
        dd($data);
        $id = TblItEquipment::edit_equipment($data);
        return redirect()->intended('/inventory')->with('message', 'Successfully editted equipment details');
   }
}
