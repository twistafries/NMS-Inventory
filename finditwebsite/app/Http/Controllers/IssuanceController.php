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
use App\Models\TblItEquipmentType;
use App\Models\TblSystemUnits;
use App\Models\TblStatus;
use App\Models\TblIssuances;
use App\Models\TblEmployees;
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




}
