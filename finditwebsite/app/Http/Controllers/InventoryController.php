<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\SessionController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\TblItEquipment;
use App\Models\TblItEquipmentType;
use App\Models\TblItEquipmentSubtype;
use App\Models\TblSystemUnits;
use App\Models\TblStatus;
use App\Models\Equipment;
use Session, Auth;

class InventoryController extends SessionController
{
    public function showAllInventory(){
      if(Session::get('loggedIn')['user_type']!='admin' || ['user_type'] != "associate"){
            return \Redirect::to('/login');
      }

        $data = [];
        $data['equipment'] = TblItEquipment::get_all_equipment();
        $data['peripherals'] = TblItEquipment::get_computer_peripherals();
        // dd($data);
        $data['component'] = TblItEquipment::get_computer_component();
        $data['mobile'] = TblItEquipment::get_mobile_devices();
        $data['equipment_types'] = TblItEquipmentType::get_all_equipment_type();
        $data['software'] = TblItEquipment::get_software();
        $data['system_units'] = TblSystemUnits::get_all_system_units();
        $data['units'] = TblSystemUnits::get_all_system_units();
        $data['all_units'] = TblSystemUnits::get_all_system_units();
        $data['equipment_subtypes'] = TblItEquipmentSubtype::get_all_equipment_subtype();
        return view ('content/inventory' , $data);
    }


    public function showInputValues(){
      if(Session::get('loggedIn')['user_type']!='admin' || ['user_type'] != "associate"){
            return \Redirect::to('/login');
      }

        $data = [];

        $data['equipment_subtypes'] = TblItEquipmentSubtype::get_all_equipment_subtype();
        $data['equipment_types'] = TblItEquipmentType::get_all_equipment_type();
        $data['system_units'] = TblSystemUnits::get_all_system_units();
        // $data['status'] = TblSystemUnits::get_all_status();

        return view ('content/temporary-add-equipment' , $data);
    }

    // INSERT INTO `findit`.`it_equipment`
    // (`subtype_id`, `name`, `details`,
    // `serial_no`, `or_no`, `user_id`, `status_id`)
    // VALUES ('6', 'EVGA SuperNOVA 750', '750 W', '80-R5-7854-TY', '43790', '1', '1');

public function addSystemUnit(Request $request){
  if(Session::get('loggedIn')['user_type']!='admin' || ['user_type'] != "associate"){
            return \Redirect::to('/login');
  }

  $show = $request->all();
  $data = $request->input('unit.*');
  $data['user_id'] = 2;
  $data['mac_address'] = $data[0];
  $data['supplier'] = $data[1];
  $data['or_no'] = $data[2];
  $data['warranty_start'] = $data[3];
  $data['warranty_end'] = $data[4];

  $id = TblSystemUnits::add_system_unit($data);

  $data['equipments'] = collect([]);
  $names = $request->get('equipment')['name'];
  $subtype_id = $request->get('equipment')['subtype_id'];
  $details = $request->get('equipment')['details'];
  $serial_no = $request->get('equipment')['serial_no'];
  $unit_id = $id;
  $supplier = $data['supplier'];
  $user_id = $data['user_id'] ;
  $or_no = $data['or_no'];
  $warranty_start = $data['warranty_start'];
  $warranty_end = $data['warranty_end'];
  $status = 8;

  $ctr = 0;
  foreach ($names as $name) {
    $data['equipments'] ->push(['name'=> $name, 'details'=> $details[$ctr], 'subtype_id'=> $subtype_id[$ctr], 'serial_no'=> $serial_no[$ctr],
                                'warranty_start'=> $warranty_start, 'warranty_end'=> $warranty_end, 'user_id'=> $user_id,'or_no'=> $or_no, 'supplier'=> $supplier, 'unit_id'=>$unit_id, 'status_id'=> $status]);
    $ctr++;
    // code...
  }


  foreach($data['equipments'] as $equipment){
    TblItEquipment::add_equipment($equipment);

  }
  // dd($data['show']);

    // foreach ($data['equipments'] as $equipment) {
    //   dd($equipment['name']);
    // }
    return \Redirect::to('/inventory')->with('equipment has been added');

}
   public function addEquipment(Request $request){
    if(Session::get('loggedIn')['user_type']!='admin' || ['user_type'] != "associate"){
            return \Redirect::to('/login');
    }

    // dd("Inside");
        $data = $request->all();
          dd($data);
        $data['user_id'] = 2;
        $data['status_id'] = 1;
        $data['subtype_id'] = (int)$request->get('subtype_id');
       if(isset($data['subtype_id']) && isset($data['name']) && isset($data['details']) && isset($data['user_id']) && isset($data['warranty_details']) && isset($data['supplier'])
       && isset($data['serial_no']) && isset($data['or_no'])  && isset($data['status_id']) ){
           TblItEquipment::add_equipment($data);

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
