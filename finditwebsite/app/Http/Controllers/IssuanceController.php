<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\TblItEquipment;
use App\Models\TblItEquipmentType;
use App\Models\TblSystemUnits;
use App\Models\TblStatus;
use App\Models\TblIssuances;

class IssuanceController extends BaseController {

	public function showAllIssuances() {
		$data = [];
		$data['issuance'] = TblIssuances::getIssuances();
		return view('content/issuance', $data);
	}
}

