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
 	try{
		 $data = $request->all();
		 $data['status_id'] = 2;
		 $log['activity'] = "issued";
		 $unitlog['activity'] = "issued";
		 $data['issued_to_name'] = $data['issued_to'];
		 $ctr = 0;

		 foreach($data['items'] as $items){

			 if (str_contains($items, "(System Unit)")){
				 $pieces = explode("  (ID: ", $items);
				 $dataUnit['unit_id'] = (int)preg_replace('/[^0-9]/','',$pieces[1] );
				 TblSystemUnits::update_unit_status((int)$dataUnit['unit_id'],2);
				 $dataUnit['issued_to'] = (int)preg_replace('/\D/', '', $data['issued_to']);
				 $dataUnit['issued_until'] = $data['issued_date'][$ctr];
				 TblIssuances::add_issuance($dataUnit);
				 $unitlog['issued_to'] = $data['issued_to_name'];
				 $unitlog['system_unit'] = $dataUnit['unit_id'];
				 TblActivityLogs::add_log($unitlog);
			 } else{
				 $pieces = explode("  (ID: ", $items);
				 $data['equipment_id'] = (int)preg_replace('/[^0-9]/','',$pieces[1] );
				 TblItEquipment::update_equipment_status((int)$data['equipment_id'],2);
				 $data['issued_to'] = (int)preg_replace('/\D/', '', $data['issued_to']);
				 $data['issued_until'] = $data['issued_date'][$ctr];
				 TblIssuances::add_issuance($data);
				 $log['issued_to'] = $data['issued_to_name'];
				 $log['data'] = $data['equipment_id'];
				 TblActivityLogs::add_log($log);
			 }
			 $ctr++;
	 	 }
		 return \Redirect::to('/issuance')->with('equipment has been added');
		}catch(Exception $e){
			return redirect()->back()
						->with('error' , 'Please fill out ALL the fields')
						->with('error_info' , $e->getMessage());
		}catch(QueryException $qe){
			return redirect()->back()
						->with('error' , 'Database cannot read input value.')
						->with('error_info' , $qe->getMessage());
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
			$log['data'] = $data['equipment_id'];

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
			$system_unit_info = TblSystemUnits::getUnit($request->get('su_id'))[0];
			InventoryConcerns::addConcern($concerns);

			try{
				if(isset($data['issued_to'])){
					$data['unit_id'] = $request->get('su_id');
					// dd($request->get('su_id'));
					// dd($data);
					TblIssuances::add_issuance($data);
					$log['data'] = $data['unit_id'];

				};

				if(isset($data['status_id'])){
					TblSystemUnits::update_system_unit_status($data['unit_id'] , $data['status_id']);
					// $concern = InventoryConcerns::addConcern($data);

				}
				TblActivityLogs::add_log($log);
				return \Redirect::to('/systemUnit')->with('message','System Unit:'. $system_unit_info->name.$system_unit_info->id. ' has been successfully issued to .' . $log['issued_to']);

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

	public function updateIssuedUntil(Request $request){
		$data = $request->all();
		// dd($data);
		$data['user_id'] = Session::get('loggedIn')['id'];
		try{
			$result['error'] = TblIssuances::extendIssuedUntil($data);
			if($result['error'][0]==null){
			return \Redirect::to('/issue')
			->with('message', 'Successfully Edited Issuance Until')
			->with('error', $result['error']);
			}else{
				dd($result);
			}
		}catch(QueryException $qe){
			dd($qe);
		}catch(Exception $e){
			dd($e);
		}
	}


	public function updateIssuance(Request $request){

		try{
			$data = $request->all();
			$data['user_id'] = Session::get('loggedIn')['id'];
			$data['issuance_id'] = $request->get('issuance_id');
			$concerns = $request->all();
			$concerns['remarks'] = $request->get('remarks');
			$concerns['added_by'] = $data['user_id'];
			$concerns['issued_to'] = $request->get('issued_to_concerns');

			// dd($data);
			if($request->get('returned_at') == null){
				$data['returned_at'] = gmdate('Y-m-d H:i:s');
			}else{
				$data['returned_at'] = $request->get('returned_at');
			}
			// $data['returned_at'] = gmdate('Y-m-d H:i:s');

			if($request->get('equipment_id') != null){
				TblItEquipment::update_equipment_status($data['equipment_id'] , $data['status_id']);
				TblIssuances::updateReturnedDate($data);
				$concerns['name_component'] = $data['equipment_id'];
				$concerns['system_unit_id'] = $request->get('system_unit_id');
				$concerns['id'] = $data['equipment_id'];
				InventoryConcerns::addConcern($concerns);
			}else{
				TblSystemUnits::update_unit_status($data['unit_id'] , $data['status_id']);
				TblIssuances::updateReturnedDate($data);
				// TblIssuances::updateIssuance($data);
				$concerns['name_component'] = $request->get('name_component');
				$concerns['system_unit_id'] = $data['unit_id'];
				$concerns['id'] = $request->get('id');

				InventoryConcerns::addConcern($concerns);
			}
			return \Redirect::to('/issue')->with('message' , 'Issued Item Status was successfully changed.');
		}catch(Exception $e){
			dd($e);

		}catch(QueryException $qe){
			dd($qe);

		}
	}





}
