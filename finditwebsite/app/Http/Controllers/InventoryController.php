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
        $data['user_id'] = 2;
        $data['status_id'] = 1;
        $data['subtype_id'] = (int)$request->get('subtype_id');

       if(isset($data['subtype_id']) && isset($data['name']) && isset($data['details']) && isset($data['user_id']) && isset($data['warranty_details']) && isset($data['supplier'])
       && isset($data['serial_no']) && isset($data['or_no'])  && isset($data['status_id']) ){
           TblItEquipment::add_equipment($data);
           dd($data);
           return \Redirect::to('/inventory')->with('equipment has been added');
       }else{

        //    return redirect()->back()->with('error', 'Please fill out ALL fields');
           return redirect()->intended('/content/inventory')->with('error', 'Please fill out ALL fields');
       }
   }

   public function bulkAdd(){
       return view('content/bulk-add');
   }
}
