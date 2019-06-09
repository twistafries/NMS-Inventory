<?php

namespace App\Http\Controllers;
use View, Validator, Session, Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\TblEquipmentStatus;
use App\Models\TblEmployees;
use App\Models\TblSystemUnits;
use App\Models\TblDepartments;
use App\Models\TblActivityLogs;
use App\Models\TblItEquipment;

class ForStatusController extends BaseController
{
    public function showAllStatus(){
      if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
      }

        $data = [];
        $data['for_repair'] = TblEquipmentStatus::get_for_repair();
        $data['for_return'] = TblEquipmentStatus::get_for_return();
        $data['for_disposal'] = TblEquipmentStatus::get_for_disposal();
        return view ('content/dashboard' , $data);
    }

   public function showInventoryConcerns(){
      if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
      }

     $data = [];
     $data['for_repair'] = TblEquipmentStatus::get_for_repair();
     $data['for_repair_units'] = TblEquipmentStatus::get_for_repair_units();
     $data['for_return'] = TblEquipmentStatus::get_for_return();
     $data['for_disposal'] = TblEquipmentStatus::get_for_disposal();
     $data['pending'] = TblEquipmentStatus::get_pending();
     return view ('content/concerns' , $data);

   }



   public function showRepairItems(){
     if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
      }

     $data = [];
     $data['for_repair'] = TblEquipmentStatus::get_for_repair();
     $data['for_repair_units'] = TblEquipmentStatus::get_for_repair_units();
     return view ('content/repair' , $data);
   }

      public function showRepairItemsSummary(){
     if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
      }

     $data = [];
     $data['for_repair'] = TblEquipmentStatus::get_for_repair();
     $data['for_repair'] = TblEquipmentStatus::get_for_repair();
     $data['for_repair_mice'] = TblEquipmentStatus::get_for_repair_by_subtype(9);
     $data['for_repair_keyboards'] = TblEquipmentStatus::get_for_repair_by_subtype(10);
     $data['for_repair_monitors'] = TblEquipmentStatus::get_for_repair_by_subtype(11);
     $data['for_repair_laptops'] = TblEquipmentStatus::get_for_repair_by_subtype(12);
     $data['for_repair_tablets'] = TblEquipmentStatus::get_for_repair_by_subtype(13);
     $data['for_repair_phones'] = TblEquipmentStatus::get_for_repair_by_subtype(14);
     $data['for_repair_units'] = TblEquipmentStatus::get_for_repair_units();
     $data['it_dep'] = TblSystemUnits::unitDepStatus(1, 3);
     $data['pd_dep'] = TblSystemUnits::unitDepStatus(2, 3);
     $data['fin_dep'] = TblSystemUnits::unitDepStatus(3, 3);
     $data['hr_dep'] = TblSystemUnits::unitDepStatus(4, 3);
     $data['no_dep'] = TblSystemUnits::unitDepStatus(null, 3);

     $data['components'] = TblItEquipment::getByType(1);

     foreach($data['for_repair_units'] as $repair_unit){
           $data['unit_component'] = TblSystemUnits::get_unit_component($repair_unit->id);
      }
     return view ('content/repairSummary' , $data);
   }



   public function showReturnItems(){
      if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
             return \Redirect::to('/loginpage');
       }

      $data = [];
      $data['for_return'] = TblEquipmentStatus::get_for_return();
      return view ('content/returns' , $data);
    }


    public function showPurchases(){
     if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
      }

     $data = [];
     $data['for_repair'] = TblEquipmentStatus::get_for_repair();
     $data['for_repair_units'] = TblEquipmentStatus::get_for_repair_units();
     return view ('content/purchasenumber' , $data);
   }

   public function showPurchaseHistory(){
      if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
             return \Redirect::to('/loginpage');
       }

      $data = [];
      return view ('content/purchaseHistory' , $data);
    }


    public function showOR(){
     if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
      }

     $data = [];
     $data['for_repair'] = TblEquipmentStatus::get_for_repair();
     $data['for_repair_units'] = TblEquipmentStatus::get_for_repair_units();
     return view ('content/ornumber' , $data);
   }


   public function showDecommissionedItems(){
     if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
      }

     $data = [];
     $data['decommissioned'] = TblEquipmentStatus::get_decommissioned();
     return view ('content/decommissioned' , $data);
   }

   public function showIssuable(){
      if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
      }

     $data = [];
     $data['available'] = TblEquipmentStatus::get_available();
     $data['all_mobile_device'] = TblEquipmentStatus::get_available();
     $data['units'] = TblEquipmentStatus::get_available_units();
     $data['all_units'] = TblEquipmentStatus::get_available_units();
//      return view ('content/issue' , $data);
   }

   public function showEmployees(){
      if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
      }

     $data = [];
     $data['employees'] = TblEmployees::get_employees();
     $data['employees'] = TblEmployees::get_employees();
     $data['departments'] = TblDepartments::getDept();
     $lastid = DB::table('employees')->orderBy('id', 'DESC')->first();
     $data['lastid'] = $lastid;

     return view ('content/employees' , $data);
   }

   public function addEmployee(Request $request)
   {
      if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
      }

       $data = $request->all();
       $results = [];
       //error is by default 1, 1 - meaning there is an error, 0 - where there is no error.
       $results['error'] = 1;
       $results['message'] = 'error';

       $validator = $this->validate( $data );

       if( $validator->fails() ) {
           $results['error'] = 1;
           $results['message'] = $validator->errors();
       } else {
           $id = TblEmployees::add_employee($data);

           $data['employees'] = $id;
           $data['action'] = "added";
           TblActivityLogs::add_log($data);
       }

         return \Redirect::to('/employees');
   }

   public function validate( $params )
   {
       $rules = array(
           'fname' => 'required',
           'lname' => 'required',
           'email' => 'required|email|unique:employees,email',
           'dept_id' => 'required|min:1'
       );

       return Validator::make($params, $rules);
   }

   public function editEmployee(Request $request)
   {
      $data = $request->all();
      dd($data);
      TblEmployees::edit_employee($data);

      $act['employees'] = $data['id'];
      $act['activity'] = "updated";
      TblActivityLogs::add_log($act);

      return redirect()->intended('/employees')->with('message', 'Successfully editted equipment details');

   }

   public function changeStatus(Request $request)
   {
      $data = $request->all();

      TblEmployees::edit_employee($data);
      if($data['status']=="active"){
        $act['to_status'] = "active";
        $act['from_status'] = "inactive";
      } else {
        $act['to_status'] = "inactive";
        $act['from_status'] = "active";
      }

      $act['issued_to'] = $data['name'];
      $act['activity'] = "change the status of";
      TblActivityLogs::add_log($act);

      return redirect()->intended('/employees')->with('message', 'Successfully editted equipment details');

   }

   public function removeEmployee(Request $request)
   {
      $data['id'] = $request->get('employee_id');
      TblEmployees::remove_employee($data);
      return redirect()->intended('/employees')->with('message', 'Successfully editted equipment details');

   }
}
