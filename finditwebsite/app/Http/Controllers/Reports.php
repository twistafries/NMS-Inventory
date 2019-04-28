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


class Reports extends BaseController
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

        $data['JanuaryReturn'] = TblActivityLogs::get_for_return_Month('1');
        $data['FebruaryReturn'] = TblActivityLogs::get_for_return_Month('2');
        $data['MarchReturn'] = TblActivityLogs::get_for_return_Month('3');
        $data['AprilReturn'] = TblActivityLogs::get_for_return_Month('4');
        $data['MayReturn'] = TblActivityLogs::get_for_return_Month('5');
        $data['JuneReturn'] = TblActivityLogs::get_for_return_Month('6');
        $data['JulyReturn'] = TblActivityLogs::get_for_return_Month('7');
        $data['AugustReturn'] = TblActivityLogs::get_for_return_Month('8');
        $data['SeptemberReturn'] = TblActivityLogs::get_for_return_Month('9');
        $data['OctoberReturn'] = TblActivityLogs::get_for_return_Month('10');
        $data['NovemberReturn'] = TblActivityLogs::get_for_return_Month('11');
        $data['DecemberReturn'] = TblActivityLogs::get_for_return_Month('12');

        $data['JanuaryRepair'] = TblActivityLogs::get_for_repair_Month('1');
        $data['FebruaryRepair'] = TblActivityLogs::get_for_repair_Month('2');
        $data['MarchRepair'] = TblActivityLogs::get_for_repair_Month('3');
        $data['AprilRepair'] = TblActivityLogs::get_for_repair_Month('4');
        $data['MayRepair'] = TblActivityLogs::get_for_repair_Month('5');
        $data['JuneRepair'] = TblActivityLogs::get_for_repair_Month('6');
        $data['JulyRepair'] = TblActivityLogs::get_for_repair_Month('7');
        $data['AugustRepair'] = TblActivityLogs::get_for_repair_Month('8');
        $data['SeptemberRepair'] = TblActivityLogs::get_for_repair_Month('9');
        $data['OctoberRepair'] = TblActivityLogs::get_for_repair_Month('10');
        $data['NovemberRepair'] = TblActivityLogs::get_for_repair_Month('11');
        $data['DecemberRepair'] = TblActivityLogs::get_for_repair_Month('12');

        $data['JanuaryPending'] = TblActivityLogs::get_for_pend_Month('1');
        $data['FebruaryPending'] = TblActivityLogs::get_for_pend_Month('2');
        $data['MarchPending'] = TblActivityLogs::get_for_pend_Month('3');
        $data['AprilPending'] = TblActivityLogs::get_for_pend_Month('4');
        $data['MayPending'] = TblActivityLogs::get_for_pend_Month('5');
        $data['JunePending'] = TblActivityLogs::get_for_pend_Month('6');
        $data['JulyPending'] = TblActivityLogs::get_for_pend_Month('7');
        $data['AugustPending'] = TblActivityLogs::get_for_pend_Month('8');
        $data['SeptemberPending'] = TblActivityLogs::get_for_pend_Month('9');
        $data['OctoberPending'] = TblActivityLogs::get_for_pend_Month('10');
        $data['NovemberPending'] = TblActivityLogs::get_for_pend_Month('11');
        $data['DecemberPending'] = TblActivityLogs::get_for_pend_Month('12');

        $data['JanuaryDecom'] = TblActivityLogs::get_for_decom_Month('1');
        $data['FebruaryDecom'] = TblActivityLogs::get_for_decom_Month('2');
        $data['MarchRDecom'] = TblActivityLogs::get_for_decom_Month('3');
        $data['AprilDecom'] = TblActivityLogs::get_for_decom_Month('4');
        $data['MayDecom'] = TblActivityLogs::get_for_decom_Month('5');
        $data['JuneDecom'] = TblActivityLogs::get_for_decom_Month('6');
        $data['JulyDecom'] = TblActivityLogs::get_for_decom_Month('7');
        $data['AugustDecom'] = TblActivityLogs::get_for_decom_Month('8');
        $data['SeptemberDecom'] = TblActivityLogs::get_for_decom_Month('9');
        $data['pending'] = TblEquipmentStatus::get_pending();
        $data['equipment'] = TblItEquipment::get_all_equipment();
        $data['OctoberDecom'] = TblActivityLogs::get_for_decom_Month('10');
        $data['NovemberDecom'] = TblActivityLogs::get_for_decom_Month('11');
        $data['DecemberDecom'] = TblActivityLogs::get_for_decom_Month('12');
        // $data['most_issued'] = TblActivityLogs
        $monthToday=Carbon::now()->month;
          $data['ThisMonthReturn'] = TblActivityLogs::get_for_return_Month($monthToday);
          $data['ThisMonthRepair'] = TblActivityLogs::get_for_repair_Month($monthToday);
          $data['ThisMonthPending']  = TblActivityLogs::get_for_pend_Month($monthToday);
          $data['ThisMonthDecom'] = TblActivityLogs::get_for_decom_Month($monthToday);

      		$data['issuance'] = TblIssuances::getIssuance();
          $data['for_repair'] = TblEquipmentStatus::get_for_repair();
          $data['for_return'] = TblEquipmentStatus::get_for_return();
          $data['for_disposal'] = TblEquipmentStatus::get_decommissioned();
          $data['for_repair_units'] = TblEquipmentStatus::get_for_repair_units();
          $data['pending'] = TblEquipmentStatus::get_pending();
          $data['equipment'] = TblItEquipment::get_all_equipment();
          
        return view ('content/report' , $data);
    }
}
