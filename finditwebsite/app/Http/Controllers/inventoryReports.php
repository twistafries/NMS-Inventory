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
  public function showInventoryReports(){
    if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
          return \Redirect::to('/loginpage');
    }
      $data = [];
      $data['counts'] = TblItEquipment::getCountsByStatus(1);
      $data['availeq'] = TblItEquipment::get_equipment_by_status(1);
      $data['repEq'] = TblItEquipment::get_equipment_by_status(3);
      $data['items'] = TblItEquipment::getEquipment();
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

    // public function showCompleteOrders(){
    //   if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
    //         return \Redirect::to('/loginpage');
    //   }
    //     $data = [];
    //     return view ('content/completedOrdersReport' , $data);
    // }
    //
    // public function showIncompleteOrders(){
    //   if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
    //         return \Redirect::to('/loginpage');
    //   }
    //     $data = [];
    //     return view ('content/incompleteOrdersReport' , $data);
    // }

    public function showIssuanceReports(){
      if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
      }
        $data = [];
        return view ('content/issuanceReports' , $data);
    }

    // public function showLateReport(){
    //   if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
    //         return \Redirect::to('/loginpage');
    //   }
    //     $data = [];
    //     return view ('content/lateReturnsReport' , $data);
    // }
    //
    // public function showIssuancePerComponent(){
    //   if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
    //         return \Redirect::to('/loginpage');
    //   }
    //     $data = [];
    //     return view ('content/issuancePerComponent' , $data);
    // }
    //
    // public function showmostLeastReport(){
    //   if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
    //         return \Redirect::to('/loginpage');
    //   }
    //     $data = [];
    //     return view ('content/mostLeastReport' , $data);
    // }
}
