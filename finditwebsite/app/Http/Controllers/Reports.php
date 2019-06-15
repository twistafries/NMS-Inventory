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
use App\Models\PurchasedItems;


class Reports extends BaseController
{
    public function showAllStatus(){
      if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
      }
        $data = [];
        $data['start'] = Carbon::parse('first day of January');
        $data['start']->startOfMonth();
        $data['end'] = Carbon::now();
        $data['chartStartDate'] = Carbon::parse('first day of January');
        $data['chartStartDate']->startOfMonth();
        $data['chartEndDate'] = Carbon::now();
        $data['chartStartDate'] = Carbon::parse($data['chartStartDate']  )->format('F j, Y');
        $data['chartEndDate'] = Carbon::parse($data['chartEndDate']  )->format('F j, Y');

        if($data['chartStartDate']==$data['chartEndDate']){
          $data['date'] = $data['chartStartDate'];
        } else {
          $data['date'] = $data['chartStartDate']." - ". $data['chartEndDate'];
        }

        $data['most_issued']  = TblIssuances::most_issued($data);
        $data['system_unit_issued']  = TblIssuances::system_unit_issued($data);
        $data['system_unit_issued'] = $data['system_unit_issued'][0]->count;

        $data['most_purchased']  = PurchasedItems::most_purchased($data);
        $data['system_unit_purchased']  = PurchasedItems::system_unit_purchased($data);
        $data['system_unit_purchased'] = $data['system_unit_purchased']->count();
        return view ('content/generateReport' , $data);
    }
}
