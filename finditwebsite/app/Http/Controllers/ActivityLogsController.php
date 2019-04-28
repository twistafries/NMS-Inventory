<?php

namespace App\Http\Controllers;

use View, Validator, Session, Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\SessionController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\TblUsers;
use App\Models\TblAssociate;
use App\Models\TblEmployees;
use App\Models\TblIssuances;
use App\Models\TblActivityLogs;

class ActivityLogsController extends BaseController {

	public static function getActivityLogs() {
		if(Session::get('loggedIn')['user_type']!='admin'){
            return \Redirect::to('/loginpage');
        }

        $data = [];
        $data['logs'] = TblActivityLogs::get_logs();
        $data['issuance'] = TblIssuances::getIssuance();
        
        // dd($data);
        return view ('content/activitylogs' , $data);
	}
}