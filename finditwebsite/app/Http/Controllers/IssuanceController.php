<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\TblItEquipment;
use App\Models\TblEquipmentStatus;
use App\Models\TblItEquipmentSubtype;
use App\Models\TblItEquipmentType;
use App\Models\TblSystemUnits;
use App\Models\TblStatus;
use App\Models\TblIssuances;
use App\Models\TblEmployees;
use App\Models\Suppliers;
use App\Models\InventoryConcerns;
use App\Models\TblActivityLogs;
use Session, Auth;

class IssuanceController extends BaseController {

	public function showAllIssuance() {
		if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
      	}

		$data = [];
		$data['issuance'] = TblIssuances::getIssuance();
		$data['equipment'] = TblEquipmentStatus::get_available();
		$data['units'] = TblEquipmentStatus::get_available_units();
		$data['employees'] = TblEmployees::get_employees('active');
		$data['status'] = TblEquipmentStatus::get_all_status();
		$data['subtypesSel'] = TblItEquipmentSubtype::get_all_equipment_subtype();
		$data['typesSel'] = TblItEquipmentType::get_all_equipment_type();
		$data['suppliers'] = Suppliers::get_suppliers();
		$data['brands'] = TblItEquipment::get_brand();
		$data['models'] = TblItEquipment::get_model();
		return view('content/issuance', $data);
	}

	public function showEmployeeIssuance() {
		if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
						return \Redirect::to('/loginpage');
				}

		$data = [];
		$data['issuance'] = TblIssuances::getIssuance();
		$data['equipment'] = TblEquipmentStatus::get_available();
		$data['units'] = TblEquipmentStatus::get_available_units();
		$data['employees'] = TblEmployees::get_employees('active');
		$data['itdd'] = TblEmployees::getIssuancePerEmployee(1);
		$data['pdd'] = TblEmployees::getIssuancePerEmployee(2);
		$data['fd'] = TblEmployees::getIssuancePerEmployee(3);
		$data['hrd'] = TblEmployees::getIssuancePerEmployee(4);
		dd($data);
		return view('content/issue', $data);
	}


	public function employeeIssuance() {
	if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
					return \Redirect::to('/loginpage');
			}

	$data = [];
	$data['issuance'] = TblIssuances::getIssuance();
	$data['eqp'] = TblEquipmentStatus::get_available();
	$data['pc'] = TblEquipmentStatus::get_available_units();
	$data['employees'] = TblEmployees::get_employees('active');
	$data['employee_with_issuance'] = TblIssuances::getEmployeeWithIssuance();
	$data['itdd'] = TblIssuances::getIssuancePerEmployee(1);
	$data['pdd'] = TblIssuances::getIssuancePerEmployee(2);
	$data['fd'] = TblIssuances::getIssuancePerEmployee(3);
	$data['hrd'] = TblIssuances::getIssuancePerEmployee(4);
	foreach ($data['employee_with_issuance']  as $employee) {
			$data['issued'][$employee->id] = TblIssuances::getIssuanceOfEmployee($employee->id);
	}
	// dd($data);
	return view('content/issue', $data);
}

	public function addIssuance(Request $request){
	if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
					return \Redirect::to('/loginpage');
			}

 // dd("Inside");
		 $data = $request->all();

		 $data['status_id'] = 2;
		 $pieces = explode("-", $data['items']);
		 if($pieces[0] == "Mobile Device"){
			 $data['equipment_id']=(int)$pieces[1];
			TblItEquipment::update_equipment_status($data['equipment_id'],2);
			$log['data'] = $data['equipment_id'];

		 }else{
			$data['unit_id']=(int)$pieces[1] ;
			TblSystemUnits::update_unit_status($data['unit_id'],2);
			$log['system_unit'] = $data['unit_id'];
		 }
		 $issuance = explode(' (', $data['issued_to']);
		 $data['issued_to'] = preg_replace('/\D/', '', $data['issued_to']);
		 $data['issuedTo_name']=$issuance[0];
		if(isset($data['issued_to']) && isset($data['issued_until']) && isset($data['status_id']) ){

				TblIssuances::add_issuance($data);
				$log['issued_to'] = $data['issuedTo_name'];

				$log['activity'] = "issued";
				TblActivityLogs::add_log($log);
				return redirect()->back()->with('success', ['Issuance Success']);
		}else{

		 //    return redirect()->back()->with('error', 'Please fill out ALL fields');
				return redirect()->intended('/content/issuance')->with('error', 'Please fill out ALL fields');
		}
	}

	public function addIssuanceFromInventory(Request $request){
		if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
			return \Redirect::to('/loginpage');
		}
		$data = $request->all();
		$data['status_id'] = 2;
		$data['user_id'] = Session::get('loggedIn')['id'];
		$employee['id'] = $data['issued_to'];

		$log['data'] = $data['equipment_id'];
		$log['activity'] = "issued";
		$log['issued_to'] = TblEmployees::getActiveEmployeeInfo($employee['id'])[0]->fname . " " .TblEmployees::getActiveEmployeeInfo($employee['id'])[0]->lname;
		
		$concerns = $request->all();
		if($request->get('su.id') == null){
			$concerns['id'] = $request->get('equipment_id');
			$concerns['name_component'] = $request->get('equipment_id');
			$concerns['system_unit_id'] = null;
		}else{
			$concerns['system_unit_id'] = $request->get('su.id');
			$concerns['name_component'] = null;
		};
		$concerns['added_by'] = $data['user_id'];
		$concerns['status_id'] = $data['status_id'];

		if($request->get('equipment_id') != null){
			$equipment_info = TblItEquipment::get_equipment_info($data['equipment_id']);
			
			InventoryConcerns::addConcern($concerns);
			// dd( $concerns);  
			try{ 
				if(isset($data['issued_to'])){
					TblIssuances::add_issuance($data);
				};
				TblItEquipment::update_equipment_status($data['equipment_id'], $data['status_id']);
				TblActivityLogs::add_log($log);
				// dd($equipment_info[0]);
				return \Redirect::to('/inventoryAll')->with('message','Equipment ID:'. $equipment_info[0]->id .', '. $equipment_info[0]->brand.' '. $equipment_info[0]->model .' has been successfully issued to .' . $log['issued_to']);
	
			}catch(Exception $e){
				dd($e);
			}catch(QueryException $qe){
	
			}
		}else{
			$system_unit_info;
			InventoryConcerns::addConcern($concerns);

			try{
				if(isset($data['issued_to'])){
					$data['unit_id'] = $request->get('su.id');
					dd($data);
					TblIssuances::add_issuance($data);

				};

			}catch(Exception $e){

			}catch(QueryException $qe){

			}
		}


		// return redorect


	}

	public function fetchIssuanceInfo($id){
		$data['active_employees'] = TblEmployees::getActiveEmployees();
		$data['equipment'] = TblItEquipment::get_equipment_info($id);
		echo json_encode($data);
	}




}
