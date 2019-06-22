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
use App\Models\InventoryConcerns;
use App\Models\Purchases;


class inventoryReports extends BaseController
{
  public function showInventoryReports(Request $request){
    if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
          return \Redirect::to('/loginpage');
    }
      try{
        $data = $request->all();
        $data['startReport'] = $data['start'];
        $data['endReport'] = $data['end'];
        if($data['start']==null){
          $data['start'] = new Carbon('first day of this month');
          $data['start']->startOfMonth();
          $data['end'] = new Carbon('last day of this month');
          $data['end']->endOfMonth();
        }else if ($data['end']==null){
          $data['end'] = Carbon::now();
        }
        $data['chartStartDate'] = new Carbon('first day of this month');
        $data['chartStartDate']->startOfMonth();
        $data['chartEndDate'] = Carbon::now();
        $data['available'] = TblItEquipment::get_all_available();
        if($data['status']=="null"){
            $data['items'] = TblItEquipment::get_item_additions($data);

        } else{
            $data['items'] = InventoryConcerns::get_item_by_status($data);

        }
        // dd($data);
        $data['start'] = Carbon::parse($data['start'] )->format('F j, Y');
        $data['end'] = Carbon::parse($data['end'] )->format('F j, Y');


        return view ('content/inventoryReports' , $data);
      } catch(Exception $e){
        return \Redirect::to('/generateReportPage');
      }

  }

    public function showPurchasesAndOrders(Request $request){
      if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
      }
        try{
          $data = $request->all();
          $data['startReport'] = $data['start'];
          $data['endReport'] = $data['end'];
          if($data['start']==null){
            $data['start'] = new Carbon('first day of this month');
            $data['start']->startOfMonth();
            $data['end'] = new Carbon('last day of this month');
            $data['end']->endOfMonth();
          } else if ($data['end']==null){
            $data['end'] = Carbon::now();
          }

          $data['inc_orders'] = InventoryConcerns::get_item_by_status($data);
          $data['comp_orders'] = Purchases::get_completed_purchases($data);
          // dd($data);
          $data['start'] = Carbon::parse($data['start'] )->format('F j, Y');
          $data['end'] = Carbon::parse($data['end'] )->format('F j, Y');

          return view ('content/purchasesAndOrdersReports' , $data);
        } catch(Exception $e){
          return \Redirect::to('/generateReportPage');
        }
    }

    public function showIssuanceReports(Request $request){
      if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
      }
        try{
          $data = $request->all();
          $data['startReport'] = $data['start'];
          $data['endReport'] = $data['end'];
          if($data['start']==null){
            $data['start'] = new Carbon('first day of this month');
            $data['start']->startOfMonth();
            $data['end'] = new Carbon('last day of this month');
            $data['end']->endOfMonth();
          } else if ($data['end']==null){
            $data['end'] = Carbon::now();
          }

          $data['employees'] = TblIssuances::getLateReturn($data);
          $data['most_issued']  = TblIssuances::most_issued($data);
          $data['system_unit_issued']  = TblIssuances::system_unit_issued($data);
          $data['system_unit_issued'] = $data['system_unit_issued'][0]->count;
          // dd($data);
          $data['start'] = Carbon::parse($data['start'] )->format('F j, Y');
          $data['end'] = Carbon::parse($data['end'] )->format('F j, Y');

          return view ('content/issuanceReports' , $data);
        } catch(Exception $e){
          return \Redirect::to('/generateReportPage');
        }

    }


}
