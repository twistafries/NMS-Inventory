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
use App\Models\PurchasedItems;

use Session, Auth;

class DashboardController extends BaseController
{
    public function showDahsboardDetails(){
        if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
        }

        $data = [];
        $data['available_sys_units'] = count(TblSystemUnits::get_total_system_units(1));       
        $data['available_phone'] = count(TblItEquipment::countByStatusSubtype(1 , 14));       
        $data['available_laptop'] = count(TblItEquipment::countByStatusSubtype(1 , 12));       
        $data['available_component'] = count(TblItEquipment::countByStatusType(1 , 1));       
        $data['available_component_qty'] = TblItEquipment::countByStatusTypeQuantity(1 , 1);       
        $data['totalAvailableUnits']  = $data['available_sys_units'] + $data['available_phone'] + $data['available_laptop'];
       
        
        $data['countHardwareForRepair'] = count(TblItEquipment::countByStatusHardware('For repair'));
        $data['repair_sys_units'] = count(TblSystemUnits::get_total_system_units(3));       
        $data['repair_phone'] = count(TblItEquipment::countByStatusSubtype(3 , 14));       
        $data['repair_laptop'] = count(TblItEquipment::countByStatusSubtype(3 , 12));       
        $data['countHardwareIssued'] = count(TblItEquipment::countByStatusHardware(2));
        $data['issued_sys_units'] = count(TblSystemUnits::get_total_system_units(2));       
        $data['issued_phone'] = count(TblItEquipment::countByStatusSubtype(2 , 14));       
        $data['issued_laptop'] = count(TblItEquipment::countByStatusSubtype(2 , 12));
        
        $data['recent_purchases'] = PurchasedItems::orderBy('id', 'desc')
        ->take(5)
        ->get(); 
        // $data['purchases'];
        return view ('content/dashboard' , $data);
    }

    public function filter(Request $request){
        // if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
        //     return \Redirect::to('/loginpage');
        // }

        $data = [];
        $data = $request->all();
        // dd($data['status_filter']);
        if($data['type_filter'] == 'all'){
            return \Redirect::to('/inventoryAll')
            ->with('type_filter' , $data['type_filter'])
            ->with('status_filter' , $data['status_filter']);
        }
        if($data['type_filter'] == 'system_unit'){
            return \Redirect::to('/systemUnit')
            ->with($data);
        }else{
            return \Redirect::to('/inventoryAll')
            ->with('type_filter' , $data['type_filter'])
            ->with('subtype_filter' , $data['subtype_filter'])
            ->with('status_filter' , $data['status_filter']);
            
        }
    }
}