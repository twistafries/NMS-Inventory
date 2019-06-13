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


class inventoryReports extends BaseController
{
  public function showInventoryReports(Request $request){
    if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
          return \Redirect::to('/loginpage');
    }
      try{
        $data = $request->all();
        if($data['start']==null){
          $data['start'] = new Carbon('first day of this month');
          $data['start']->startOfMonth();
          $data['end'] = new Carbon('last day of this month');
          $data['end']->endOfMonth();
        }

        if($data['status']=="null"){
            $data['items'] = TblItEquipment::get_item_additions($data);

        } else{
            $data['items'] = InventoryConcerns::get_item_by_status($data);

        }
        // dd($data);
        $data['start'] = Carbon::parse($data['start'] )->format('F j, Y');
        $data['end'] = Carbon::parse($data['end'] )->format('F j, Y');
        /* might need these later
        $data['availmb'] = TblItEquipment::getEqPerStatusSubtype(1,1);
        $data['availcpu'] = TblItEquipment::getEqPerStatusSubtype(1,2);
        $data['availstr'] = TblItEquipment::getEqPerStatusSubtype(1,3);
        $data['availram'] = TblItEquipment::getEqPerStatusSubtype(1,4);
        $data['availgpu'] = TblItEquipment::getEqPerStatusSubtype(1,5);
        $data['availpsu'] = TblItEquipment::getEqPerStatusSubtype(1,6);
        $data['availcase'] = TblItEquipment::getEqPerStatusSubtype(1,7);
        $data['availhsf'] = TblItEquipment::getEqPerStatusSubtype(1,8);
        $data['availmouse'] = TblItEquipment::getEqPerStatusSubtype(1,9);
        $data['availkb'] = TblItEquipment::getEqPerStatusSubtype(1,10);
        */
        //dd($data['items']);

        return view ('content/inventoryReports' , $data);
      } catch(Exception $e){
        return \Redirect::to('/generateReportPage');
      }

  }

    // public function showAvailable(){
    //   if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
    //         return \Redirect::to('/loginpage');
    //   }
    //     $data = [];
    //     return view ('content/itemAvailabilityReport' , $data);
    // }
    //
    // public function showRepair(){
    //   if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
    //         return \Redirect::to('/loginpage');
    //   }
    //     $data = [];
    //     return view ('content/itemRepairReport' , $data);
    // }
    //
    // public function showReturn(){
    //   if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
    //         return \Redirect::to('/loginpage');
    //   }
    //     $data = [];
    //     return view ('content/itemReturnReport' , $data);
    // }
    //
    // public function showDisposal(){
    //   if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
    //         return \Redirect::to('/loginpage');
    //   }
    //     $data = [];
    //     return view ('content/itemDisposalReport' , $data);
    // }

    public function showPurchasesAndOrders(){
      if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
      }
        $data = [];
        return view ('content/purchasesAndOrdersReports' , $data);
    }

    public function showIssuanceReports(Request $request){
      if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
      }
        try{
          $data = $request->all();
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
