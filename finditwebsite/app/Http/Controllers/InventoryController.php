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
use App\Models\TblEquipmentStatus;
use App\Models\Equipment;
use App\Models\TblActivityLogs;
use Session, Auth;

class InventoryController extends BaseController
{
    public function showAllInventory(){
      if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
      }

      $data = [];
      $data['equipment'] = TblItEquipment::get_all_equipment();
      $data['equipments'] = TblItEquipment::get_all_equipment();
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
      $data['subtypes'] = TblItEquipmentSubtype::get_component_subtype();
      $data['parts'] = TblItEquipment::get_computer_component();
      $data['status'] = TblEquipmentStatus::get_all_status();
      $data['subtypesSel'] = TblItEquipmentSubtype::get_all_equipment_subtype();
      $data['typesSel'] = TblItEquipmentType::get_all_equipment_type();
      $data['suppliers'] = TblItEquipment::get_supplier();
      $data['brands'] = TblItEquipment::get_brand();
      $data['models'] = TblItEquipment::get_model();
      $data['pc_part_subtypes'] = TblItEquipmentSubtype::get_all_equipment_subtype();
      $data['pc_components'] = TblItEquipmentSubtype::get_component_subtype();
      $data['unit_parts'] = TblItEquipment::get_all_equipment();
      $data['pc'] = TblSystemUnits::get_all_system_units();




      return view ('content/inventory' , $data);
    }


    public function showInputValues(){
      if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
      }

        $data = [];

        $data['equipment_subtypes'] = TblItEquipmentSubtype::get_all_equipment_subtype();
        $data['equipment_types'] = TblItEquipmentType::get_all_equipment_type();
        $data['system_units'] = TblSystemUnits::get_all_system_units();
        // $data['status'] = TblSystemUnits::get_all_status();

        return view ('content/temporary-add-equipment' , $data);
    }

    public function addEquipment(Request $request){
      if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
        return \Redirect::to('/loginpage');
      }

      $session=Session::get('loggedIn');
      // dd($request->all());
      $user_id = $session['id'];

      $data = $request->all();
        // dd($data);

      $data['user_id'] = $user_id;
      // $data['subtype_id'] = (int)$request->get('subtype_id');
      // dd($data);

      if(isset($data['subtype_id'])
      && isset($data['brand'])
      && isset($data['model'])
      && isset($data['details'])
      && isset($data['user_id'])
      && isset($data['warranty_start'])
      && isset($data['warranty_end'])
      && isset($data['supplier'])
      && isset($data['serial_no'])
      && isset($data['or_no'])
      && isset($data['status_id']) ){
          TblItEquipment::add_equipment($data);
          return \Redirect::to('/inventory')->with('equipment has been added');
      }else{
           return redirect()->back()->with('error', 'Please fill out ALL fields');
          // return redirect()->intended('/content/inventory')->with('error', 'Please fill out ALL fields');
      }
    }

    public function addSystemUnit(Request $request){
      if(Session::get('loggedIn')['user_type']!='admin' &&
      Session::get('loggedIn')['user_type'] != "associate"){
        return \Redirect::to('/loginpage');
      }

      $session=Session::get('loggedIn');
      $user_id = $session['id'];

      // $show = $request->all();
      $data = $request->input('unit.*');
      $data['user_id'] = $user_id;
      $data['description'] = $data[0];
      $data['supplier'] = $data[1];
      $data['or_no'] = $data[2];
      $data['warranty_start'] = $data[3];
      $data['warranty_end'] = $data[4];

      $id = TblSystemUnits::add_system_unit($data);

      $data['equipments'] = collect([]);
      $brands = $request->get('equipment')['brand'];
      $model = $request->get('equipment')['model'];
      // $names = $request->get('equipment')['name'];
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
      foreach ($brands as $brand) {
        $data['equipments'] ->push([
          'brand'=> $brand,
          'model'=> $model[$ctr],
          'details'=> $details[$ctr],
          'subtype_id'=> $subtype_id[$ctr],
          'serial_no'=> $serial_no[$ctr],
          'warranty_start'=> $warranty_start,
          'warranty_end'=> $warranty_end,
          'user_id'=> $user_id,
          'or_no'=> $or_no,
          'supplier'=> $supplier,
          'unit_id'=>$unit_id,
          'status_id'=> $status]);
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


    public function editEquipment(Request $request){
        $data = $request->all();
        // dd($data);
        TblItEquipment::edit_equipment($data);
        return redirect()->intended('/inventory')->with('message', 'Successfully editted equipment details');
    }

    public function changeStatus(Request $request){
        $data = $request->all();

        $act = [];
      //  $act['equipment_status']=$data['id'];
        TblItEquipment::edit_equipment($data);
        $act['status_id']=$data['status_id'];
        $act['action']="changed the status of";
        $act['it_equipment']=$data['id'];
        // dd($act);
        TblActivityLogs::add_log($act);
        return redirect()->intended('/inventory')->with('message', 'Successfully editted equipment details');
    }


    public function softDeleteEquipment(Request $request){
      $data = $request->all();
      $pieces = explode("-", $data['items']);
      if($pieces[0] == "Mobile Device"){
        $data['equipment_id']=(int)$pieces[1];
        TblItEquipment::update_equipment_status($data['equipment_id'],7);
      }else{
        $data['unit_id']=(int)$pieces[1] ;
        TblSystemUnits::update_unit_status($data['unit_id'],7);
      }

        return \Redirect::to('/inventory')->with('equipment has been deleted');
    }

    public function hardDeleteEquipment(Request $request){
      $data = $request->all();
        $pieces = explode("-", $data['item']);
        $act=[];
        if($pieces[0] == "Mobile Device"){
          $data['equipment_id']=(int)$pieces[1];
            //$act['it_equipment']=$data['equipment_id'];
        TblItEquipment::delete_equipment($data['equipment_id']);

        }else{
          $data['unit_id']=(int)$pieces[1] ;
          //act['system_units']=$data['unit_id'];
          TblSystemUnits::delete_unit($data['unit_id']);

        }


        //$act['action'] = "deleted";
        //TblActivityLogs::add_log($act);
        return \Redirect::to('/inventory')->with('equipment has been deleted');
      }

    public function buildUnit(Request $request){
      $data = $request->all();

      // dd($request->all());
      $session=Session::get('loggedIn');
      $user_id = $session['id'];
      $data['user_id'] = $user_id;
      // dd($data['items']);

      $unit_id = TblSystemUnits::add_system_unit($data);

      $components = $data['items'];
      $count = 0;
      foreach($components as $component){
        $data['unit_id'] = $unit_id;
        $data['status_id'] = 8;
        $data['id'] = $component;
        TblItEquipment::edit_equipment($data);
        // TblItEquipment::
      }

      return \Redirect::to('/inventory')->with('equipment has been added');

      // dd($data);



    }



}
