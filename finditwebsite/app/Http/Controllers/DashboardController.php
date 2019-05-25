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
use Session, Auth;

class DashboardController extends BaseController
{
    public function showDahsboardDetails(){
        if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
        }

        $card1data = [];
        $card1data['available_sys_units'] = count(TblSystemUnits::get_total_system_units(1));       
        $card1data['available_phone'] = count(TblItEquipment::countByStatusSubtype(1 , 14));       
        $card1data['available_laptop'] = count(TblItEquipment::countByStatusSubtype(1 , 12));       
        // dd($data);
        $card1data['totalAvailableUnits']  = $card1data['available_sys_units'] + $card1data['available_phone'] + $card1data['available_laptop'];
       
        $card2data = [];
        $card2data['repair_sys_units'] = count(TblSystemUnits::get_total_system_units(3));       
        $card2data['repair_phone'] = count(TblItEquipment::countByStatusSubtype(3 , 14));       
        $card2data['repair_laptop'] = count(TblItEquipment::countByStatusSubtype(3 , 12));       
        // dd2$data);
        $card2data['totalRepairUnits']  = $card2data['repair_sys_units'] + $card2data['repair_phone'] + $card2data['repair_laptop'];
        // dd($card2data);

        return view ('content/dashboard' , $card1data , $card2data);
    }
}