<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

class IssuanceController extends BaseController {

	public function showAllIssuance() {
		$data = [];
		$data['issuance'] = TblIssuances::getIssuance();
		$data['equipment'] = TblEquipmentStatus::get_available();
		$data['units'] = TblEquipmentStatus::get_available_units();
		$data['employees'] = TblEquipmentStatus::get_employees();
		return view('content/issuance', $data);
	}


	public function addIssuance(Request $request){
	 // dd("Inside");
			 $data = $request->all();
			 $data['user_id'] = 2;
			 $data['status_id'] = 2;
			 $pieces = explode("-", $data['items']);
			 if($pieces[0] == "Mobile Device"){
				 $data['equipment_id']=(int)$pieces[1];
			 }else{
				 $data['unit_id']=(int)$pieces[1] ;
			 }
			if(isset($data['issued_to']) && isset($data['issued_until']) && isset($data['remarks'])	&& isset($data['user_id'])  && isset($data['status_id']) ){

					TblIssuances::add_issuance($data);
					//dd($data);
					return \Redirect::to('/issuance')->with('issuance has been added');
			}else{

			 //    return redirect()->back()->with('error', 'Please fill out ALL fields');
					return redirect()->intended('/content/issuance')->with('error', 'Please fill out ALL fields');
			}
	}


}
