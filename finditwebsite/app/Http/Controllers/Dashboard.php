<?php

namespace App\Http\Controllers;
use View, Validator, Session, Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\TblEquipmentStatus;
use App\Models\TblEmployees;
use App\Models\TblDepartments;
use App\Models\TblItEquipment;
use App\Models\TblSystemUnits;
use App\Models\TblActivityLogs;


class Dashboard extends BaseController
{
    public function showAllStatus(){
      if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
      }

        $data = [];
        $data['for_repair'] = TblEquipmentStatus::get_for_repair();
        $data['for_return'] = TblEquipmentStatus::get_for_return();
        $data['decommissioned'] = TblEquipmentStatus::get_for_disposal();
        $data['employees'] = TblEmployees::get_employees();
        $data['equipment'] = TblItEquipment::get_all_equipment();
        $data['system_units'] = TblSystemUnits::get_all_system_units();
        $data['recent_activities'] = TblActivityLogs::get_activities_dashboard();
        // $data['most_issued'] = TblActivityLogs

        // $data['subtypesSel'] = TblItEquipmentSubtype::get_all_equipment_subtype();
        // // $data['onhand'] = TblItEquipment::countSubtypes();
        // // $data['onhandAvailable'] = TblItEquipment::countSubtypes();
        // // $data['lowStack'] = collect([]);
        // // foreach ($data['onhand'] as $onhand) {
        // //   if($onhound)
        // //   $data['lowStack'] ->push([
        // //     'id'->
        // //   ])
        // // }
        // // dd($data);

        return view ('content/dashboard' , $data);
    }
    //
    // public function getLowStack(){
    //   $data['subtypes'] =
    // }
}
