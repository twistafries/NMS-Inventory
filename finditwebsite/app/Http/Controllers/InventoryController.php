<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\SessionController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Database\QueryException;
use App\Models\TblItEquipment;
use App\Models\TblItEquipmentType;
use App\Models\TblItEquipmentSubtype;
use App\Models\TblSystemUnits;
use App\Models\TblStatus;
use App\Models\TblEquipmentStatus;
use App\Models\Equipment;
use App\Models\TblActivityLogs;
use App\Models\Suppliers;
use App\Models\TblDepartments;
use App\Models\TblEmployees;
use Session, Auth;
use DB;

class InventoryController extends BaseController
{
    public function showAllInventory(){
      if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
      }

      $data = [];
      $data['equipment'] = TblItEquipment::get_all_equipment();
      $data['equipments'] = TblItEquipment::get_all_equipment();
      // dd($data);
      $data['equipment_types'] = TblItEquipmentType::get_all_equipment_type();
      $data['equipments'] = TblItEquipment::get_all_equipment();
      $data['peripherals'] = TblItEquipment::get_computer_peripherals();
      // dd($data);
      $data['component'] = TblItEquipment::get_computer_component();
      $data['mobile'] = TblItEquipment::get_mobile_devices();
      $data['units'] = TblSystemUnits::get_all_system_units();
      $data['system_units'] = TblSystemUnits::get_all_system_units();
      $data['systemunits'] = TblSystemUnits::get_all_system_units();
      $data['units_system'] = TblSystemUnits::get_all_system_units();
      $data['all_units'] = TblSystemUnits::get_all_system_units();
      $data['equipment_subtypes'] = TblItEquipmentSubtype::get_all_equipment_subtype();
      $data['subtypes'] = TblItEquipmentSubtype::get_component_subtype();
      $data['parts'] = TblItEquipment::get_computer_component();
      $data['status'] = TblEquipmentStatus::get_all_status();
      $data['subtypesSel'] = TblItEquipmentSubtype::get_all_equipment_subtype();
      $data['typesSel'] = TblItEquipmentType::get_all_equipment_type();
      $data['suppliers'] = Suppliers::get_suppliers();
      $data['brands'] = TblItEquipment::get_brand();
      $data['models'] = TblItEquipment::get_model();
      $data['pc_part_subtypes'] = TblItEquipmentSubtype::get_all_equipment_subtype();
      $data['pc_components'] = TblItEquipmentSubtype::get_component_subtype();
      $data['unit_parts'] = TblItEquipment::get_all_equipment();
      $data['pc'] = TblSystemUnits::get_all_system_units();
      $data['available_units']  = count(TblSystemUnits::get_total_system_units(1));
      $data['issued_units']  = count(TblSystemUnits::get_total_system_units(2));
      $data['forRepair_units']  = count(TblSystemUnits::get_total_system_units(3));
      $data['forReturn_units']  = count(TblSystemUnits::get_total_system_units(4));
      $data['pending_units']  = count(TblSystemUnits::get_total_system_units(6));
      $data['decommissioned_units']  = count(TblSystemUnits::get_total_system_units(7));

      $data['countComponentAvailableStatus'] = count(TblItEquipment::countByStatus('Available',1));
      $data['countComponentIssuedStatus'] = count(TblItEquipment::countByStatus('Issued',1));
      $data['countComponentForRepair'] = count(TblItEquipment::countByStatus('For repair',1));
      $data['countComponentInUseStatus'] = count(TblItEquipment::countByStatus('In-use',1));
      $data['countComponentForReturnStatus'] = count(TblItEquipment::countByStatus('For return',1));
      $data['countComponentPendingStatus'] = count(TblItEquipment::countByStatus('Pending',1));
      $data['countComponentDecommissionedStatus'] = count(TblItEquipment::countByStatus('Decommissioned',1));

      $data['countPeripheralAvailableStatus'] = count(TblItEquipment::countByStatus('Available',2));
      $data['countPeripheralIssuedStatus'] = count(TblItEquipment::countByStatus('Issued',2));
      $data['countPeripheralForRepair'] = count(TblItEquipment::countByStatus('For repair',2));
      $data['countPeripheralInUseStatus'] = count(TblItEquipment::countByStatus('In-use',2));
      $data['countPeripheralForReturnStatus'] = count(TblItEquipment::countByStatus('For return',2));
      $data['countPeripheralPendingStatus'] = count(TblItEquipment::countByStatus('Pending',2));
      $data['countPeripheralDecommissionedStatus'] = count(TblItEquipment::countByStatus('Decommissioned',2));

      $data['countMobileAvailableStatus'] = count(TblItEquipment::countByStatus('Available',3));
      $data['countMobileIssuedStatus'] = count(TblItEquipment::countByStatus('Issued',3));
      $data['countMobileForRepair'] = count(TblItEquipment::countByStatus('For repair',3));
      $data['countMobileInUseStatus'] = count(TblItEquipment::countByStatus('In-use',3));
      $data['countMobileForReturnStatus'] = count(TblItEquipment::countByStatus('For return',3));
      $data['countMobilePendingStatus'] = count(TblItEquipment::countByStatus('Pending',3));
      $data['countMobileDecommissionedStatus'] = count(TblItEquipment::countByStatus('Decommissioned',3));
      $data['total_equipment'] = count(TblItEquipment::get_IT_equipment());
      $data['active_employees'] = TblEmployees::getActiveEmployees();
      // dd($data);

      // dd($data['available_units']);s
      foreach ($data['component'] as $component) {
        foreach ($data['status'] as $status) {
          $data[str_replace(' ', '', $component->subtype_name)][$status->name]=count(TblItEquipment::get_qty($component->subtype_id,$status->id));
        }
        $data['total_'.str_replace(' ', '', $component->subtype_name)]=count(TblItEquipment::get_qty($component->subtype_id));
      }

      foreach ($data['mobile'] as $mobile) {
        foreach ($data['status'] as $status) {
          $data[str_replace(' ', '', $mobile->subtype_name)][$status->name]=count(TblItEquipment::get_qty($mobile->subtype_id,$status->id));
        }
        $data['total_'.str_replace(' ', '', $mobile->subtype_name)]=count(TblItEquipment::get_qty($mobile->subtype_id));
      }

      foreach ($data['peripherals'] as $peripherals) {
        foreach ($data['status'] as $status) {
          $data[str_replace(' ', '', $peripherals->subtype_name)][$status->name]=count(TblItEquipment::get_qty($peripherals->subtype_id,$status->id));
        }
        $data['total_'.str_replace(' ', '', $peripherals->subtype_name)]=count(TblItEquipment::get_qty($peripherals->subtype_id));
      }


      $data['total_component']=count($data['component']);
      $data['total_mobile']=count($data['mobile']);
      $data['total_peripherals']=count($data['peripherals']);
      $data['total_pc']=count($data['pc']);
      // $data['hardware'] = TblSystemUnits::get_all_hardware();
       // dd($data['software']);



      return view ('content/inventory' , $data);
    }

    public function showAllItemsInventory(){
      if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
      }

      $data = [];
      $data['equipment'] = TblItEquipment::get_all_equipment();
      $data['eqp'] = TblItEquipment::get_all_equipment();
      $data['eqp'] = TblItEquipment::get_all_equipment();
      $data['eqp'] = TblItEquipment::get_all_equipment();
      $data['eqp'] = TblItEquipment::get_all_equipment();
      $data['eqp'] = TblItEquipment::get_all_equipment();
      $data['eqp'] = TblItEquipment::get_all_equipment();
      $data['eqp'] = TblItEquipment::get_all_equipment();
      $data['eqp'] = TblItEquipment::get_all_equipment();
      $data['equipment_types'] = TblItEquipmentType::get_all_equipment_type();
      $data['units'] = TblSystemUnits::get_all_system_units();
      $data['units_system'] = TblSystemUnits::get_all_system_units();
      $data['equipment_subtypes'] = TblItEquipmentSubtype::get_all_equipment_subtype();
      $data['subtypes'] = TblItEquipmentSubtype::get_component_subtype();
      $data['parts'] = TblItEquipment::get_computer_component();
      $data['status'] = TblEquipmentStatus::get_all_status();
      $data['subtypesSel'] = TblItEquipmentSubtype::get_all_equipment_subtype();
      $data['typesSel'] = TblItEquipmentType::get_all_equipment_type();
      $data['suppliers'] = Suppliers::get_suppliers();
      $data['supplier'] = Suppliers::get_suppliers();
      $data['brands'] = TblItEquipment::get_brand();
      $data['departments'] = TblDepartments::getDept();
      $data['models'] = TblItEquipment::get_model();
      $data['active_employees'] = TblEmployees::getActiveEmployees();
      return view ('content/inventoryAll' , $data);
    }

    public function showSystemUnit(){
      if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
      }

      $data = [];
      //system units by dep
      $data['it_dep'] = TblSystemUnits::unitByDep(1);
      $data['prod_dep'] = TblSystemUnits::unitByDep(2);
      $data['fin_dep'] = TblSystemUnits::unitByDep(3);
      $data['hr_dep'] = TblSystemUnits::unitByDep(4);
      $data['no_dep'] = TblSystemUnits::unitByDep(null);

      $data['components'] = TblItEquipment::getByType(1);

      //$data['latestUser'] = TblSystemUnits::getLatestUser();

      $data['subtypes'] = TblItEquipmentSubtype::get_component_subtype();
      $data['equipments'] = TblItEquipment::get_all_equipment();
      $data['equipment'] = TblItEquipment::get_all_equipment();
      $data['peripherals'] = TblItEquipment::get_computer_peripherals();
      $data['equipment_subtypes'] = TblItEquipmentSubtype::get_all_equipment_subtype();
      $data['component'] = TblItEquipment::get_computer_component();
      $data['mobile'] = TblItEquipment::get_mobile_devices();
      $data['equipment_types'] = TblItEquipmentType::get_all_equipment_type();
      $data['software'] = TblItEquipment::get_software();
      $data['system_units'] = TblSystemUnits::get_all_system_units();
      $data['computers'] = TblSystemUnits::get_all_system_units();
      $data['systemunits'] = TblSystemUnits::get_all_system_units();
      $data['units_system'] = TblSystemUnits::get_all_system_units();
      $data['all_units'] = TblSystemUnits::get_all_system_units();
      $data['subtype'] = TblItEquipmentSubtype::get_all_equipment_subtype();
      $data['subtypes'] = TblItEquipmentSubtype::get_component_subtype();
      $data['parts'] = TblItEquipment::get_computer_component();
      $data['status'] = TblEquipmentStatus::get_all_status();
      $data['subtypesSel'] = TblItEquipmentSubtype::get_all_equipment_subtype();
      $data['typesSel'] = TblItEquipmentType::get_all_equipment_type();
      $data['suppliers'] = Suppliers::get_suppliers();
      $data['brands'] = TblItEquipment::get_brand();
      $data['models'] = TblItEquipment::get_model();
      $data['pc_part_subtypes'] = TblItEquipmentSubtype::get_all_equipment_subtype();
      $data['pc_components'] = TblItEquipmentSubtype::get_component_subtype();
      $data['unit_parts'] = TblItEquipment::get_all_equipment();
      $data['units'] = TblSystemUnits::get_all_system_units();
      $data['total_equipment'] = count(TblItEquipment::get_IT_equipment());
      $data['pc_parts'] = TblItEquipment::get_all_parts();
      ///pc
      $data['departments'] = TblDepartments::getDept();
      $data['depts'] = TblDepartments::getDept();

      foreach ($data['departments']  as $dept) {
    			$data['pc'][$dept->id] = TblSystemUnits::unitByDep($dept->id);
    	}



      return view ('content/systemUnit' , $data);
    }

    public static function showAllEquipment(){
      $data['equipment'] = TblItEquipment::get_all_equipment();
      return view('content/trial-ajax' , $data);
    }

    public static function showFilterOptions(){
      $filter['subtype'] = TblItEquipmentSubtype::get_all_equipment_subtype();
      $filter['type'] = TblItEquipmentType::get_all_equipment_type();
      $filter['supplier'] = Suppliers::get_suppliers();
      $filter['brand'] = TblItEquipment::get_all_brands();
      $filter['status'] = TblEquipmentStatus::get_all_status_name();
      echo json_encode($filter);
    }

    public static function showEquipmentInfo($id = 0){
      $equipment['data'] = TblItEquipment::get_equipment_info($id);
      echo json_encode($equipment);
      exit;
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

      try{
        $data = $request->all();
          // dd($data);

        $data['user_id'] = $user_id;
        // $data['subtype_id'] = (int)$request->get('subtype_id');
        // dd($data);
        $supplier = $request->input('supplier');
  			$all_supplier = DB::table('supplier')->where('supplier_name',$supplier)->first();
  			if(!$all_supplier){
          $id=Suppliers::add_supplier($supplier);
  			  $data['supplier_id']=$id;
        }
        if($all_supplier){
          $supp=DB::table('supplier')->select('id')->where('supplier_name',$supplier)->get();
          foreach ($supp as $supp) {
            $data['supplier_id']=(int)$supp->id;
          }

        }

      if(isset($data['subtype_id'])
      && isset($data['brand'])
      && isset($data['model'])
      && isset($data['details'])
      && isset($data['user_id'])
      && isset($data['warranty_start'])
      && isset($data['warranty_end'])
      && isset($data['supplier_id'])
      && isset($data['serial_no'])
      && isset($data['or_no'])
      && isset($data['status_id']) ){
          $id=TblItEquipment::add_equipment($data);
          $log['data'] = $id;
          // $log['unit'] = $data['unit_id'];
          $log['activity'] = "added";
          TblActivityLogs::add_log($log);
          return \Redirect::to('/inventory')->with('equipment has been added');
      }
      }catch(Exception $e){
        return redirect()->back()
              ->with('error' , 'Please fill out ALL the fields')
              ->with('error_info' , $e->getMessage())
              ->with('target' , '#singleAdd');

      }catch(QueryException $qe){
        return redirect()->back()
              ->with('error' , 'Database cannot read input value.')
              ->with('error_info' , $qe->getMessage())
              ->with('target' , '#singleAdd');

      }
    }

    public function addSystemUnit(Request $request){
      if(Session::get('loggedIn')['user_type']!='admin' &&
      Session::get('loggedIn')['user_type'] != "associate"){
        return \Redirect::to('/loginpage');
      }

      $session=Session::get('loggedIn');
      $user_id = $session['id'];
      try{
        $data = $request->input('unit.*');
        $data['user_id'] = $user_id;
        $data['name'] = $data[0];
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

        foreach($data['equipments'] as $equipment){
          TblItEquipment::add_equipment($equipment);
        }


        return \Redirect::to('/inventoryAll')->with('message' , 'PC has been added');

        }catch(Exception $e){
          return \Redirect::to('/inventoryAll')
          ->with('error' , $e)
          ->with('error_info' , $e->getMessage())
          ->with('target' , '#systemUnit');
        }catch(QueryException $qe){
          // dd($qe->getMessage());
          return \Redirect::to('/inventoryAll')
          ->with('error' , 'Database cannot read input value.')
          ->with('error_info' , $qe->getMessage())
          ->with('target' , '#systemUnit');
        }
    }


    public function editEquipment(Request $request){
      try{
          $data = $request->all();
        TblItEquipment::edit_equipment($data);
        Session::flash('message', 'Successfully edited equipment values:');
        return redirect()->intended('/inventoryAll')
        ->with(
          'eq_id', $data['id'])
        ->with(
          'brand', $data['brand'])
        ->with(
          'model', $data['model'])
        ->with(
          'details', $data['details'])
        ->with(
          'warranty_start', $data['warranty_start'])
        ->with(
          'warranty_end', $data['warranty_end'])
        ->with(
          'serial_no ', $data['serial_no'])
        ->with(
          'imei', $data['imei_or_macaddress'])
        ->with(
          'or_no', $data['or_no']
        );
      }catch(Exception $e){
        return \Redirect::to('/inventoryAll')
        ->with('error' , 'Database cannot read input value.')
        ->with('error_info' , $e->getMessage())
        ->with('target' , '#edit-'.$data['id']);
      }catch(QueryException $qe){
        return \Redirect::to('/inventoryAll')
        ->with('error' , 'Database cannot read input value.')
        ->with('error_info' , $qe->getMessage())
        ->with('target' , '#edit-'.$data['id']);
      }

    }

    public function changeStatus(Request $request){
      // dd($request);
      try{

        $data = $request->all();
        // dd($data);
        // $act = [];
      //  $act['equipment_status']=$data['id'];
        TblItEquipment::edit_equipment($data);
        $act['status_id']=$data['status_id'];
        // $act['action']="changed the status of";
        $act['it_equipment']=$data['id'];
        // dd($act);
        // TblActivityLogs::add_log($act);
        return redirect()->back()
        ->with('message', 'Changed status of Equipment ID: '. $data['id']);
        // ->with('data', $data);
      }catch(Exception $e){
        return \Redirect::to('/inventoryAll')
        ->with('error' , 'Database cannot read input value.')
        ->with('error_info' , $e->getMessage())
        ->with('target' , '#change-status-'.$data['id']);
      }catch(QueryException $qe){
         return \Redirect::to('/inventoryAll')
        ->with('error' , 'Database cannot read input value.')
        ->with('error_info' , $qe->getMessage())
        ->with('target' , '#change-status-'. $data['id']);
      }
    }



    public function hardDeleteEquipment(Request $request){
      if(Session::get('loggedIn')['user_type']!='admin' &&
      Session::get('loggedIn')['user_type'] != "associate"){
        return redirect()->back()
        ->with('warning' , 'You dont have the right privelege to access this feature');
      }
      try{
         $data = $request->all();
        TblItEquipment::delete_equipment($data['equipment_id']);


        $act['activity'] = "deleted";
        $act['deleted_item'] = $data['deleted_item'];
        TblActivityLogs::add_log($act);
        return \Redirect::to('/inventoryAll')->with('message' , $data['deleted_item'].' has been removed from the Database');

      }catch(Exception $e){
        return \Redirect::to('/inventoryAll')
        ->with('error' , 'Could not remove equipment from the database')
        ->with('error_info' , $e->getMessage())
        ->with('target' , '#hardDelete');

      }catch(QueryException $qe){
        return \Redirect::to('/inventoryAll')
        ->with('error' , 'Could not remove equipment from the database')
        ->with('error_info' , $qe->getMessage())
        ->with('target' , '#hardDelete');
      }
    }

    public function buildUnit(Request $request){
      try{
        $data = $request->all();

        dd($request->all());
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
        }

        //return \Redirect::to('/inventoryAll')->with('equipment has been added');

      }catch(QueryException $qe){;
        return \Redirect::to('/inventoryAll')
        ->with('error' , 'Database cannot read input value.')
        ->with('error_info' , $qe->getMessage())
        ->with('target' , '#build');
      }


      $log['system_unit'] = $unit_id;
      $log['activity'] = "added";
      TblActivityLogs::add_log($log);
      return \Redirect::to('/inventory')->with('equipment has been added');
    }

    public function getUnitForRepair($id){
      $units['unit'] = TblSystemUnits::getUnit($id);
      // $statuses['status'] = TblSystemUnits::getUnit($id);
      // dd($units);
      echo json_encode($units);
      exit;
    }
}
