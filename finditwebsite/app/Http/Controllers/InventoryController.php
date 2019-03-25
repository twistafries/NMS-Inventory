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
        $data['component'] = TblItEquipment::get_computer_component();
        $data['mobile'] = TblItEquipment::get_mobile_devices();
        $data['equipment_types'] = TblItEquipmentType::get_all_equipment_type();
        $data['system_units'] = TblSystemUnits::get_all_system_units();
        $data['equipment_subtypes'] = TblItEquipmentSubtype::get_all_equipment_subtype();
        // dd($data);
        return view ('content/inventory' , $data);
    }
    
    public function showInputValues(){
        $data = [];
        
        $data['equipment_subtypes'] = TblItEquipmentSubtype::get_all_equipment_subtype();
        $data['equipment_types'] = TblItEquipmentType::get_all_equipment_type();
        // $data['status'] = TblSystemUnits::get_all_status();
        // dd($data);
        return view ('content/temporary-add-equipment' , $data);
    }
    
   public function addEquipment(Request $request){
       $data = $request->all();
    //    dd($data);
       if(isset($data['type_id']) && isset($data['name_or_model']) && isset($data['details']) && isset($data['serial_no']) && isset($data['or_no']) && isset($data['unit_id'])){
           TblItEquipment::add_equipment($data);
        //    dd($data);
           return \Redirect::to('/inventory');
       }else{
        dd($data);
       }
   }
}
