<?php

namespace App\Http\Controllers;
use View, Validator, Session, Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
  use Carbon\Carbon;
use App\Models\TblEquipmentStatus;
use App\Models\TblEmployees;
use App\Models\TblDepartments;
use App\Models\TblItEquipment;
use App\Models\TblSystemUnits;
use App\Models\TblActivityLogs;
use App\Models\TblIssuances;


class inventoryReports extends BaseController
{
    public function showAvailable(){
      if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
      }
        $data = [];
        return view ('content/itemAvailabilityReport' , $data);
    }
}
