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
use App\Models\TblDepartments;
use App\Models\TblActivityLogs;

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
   public function showIssuable(){
      if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
      }

     $data = [];
     $data['available'] = TblEquipmentStatus::get_available();
     $data['all_mobile_device'] = TblEquipmentStatus::get_available();
     $data['units'] = TblEquipmentStatus::get_available_units();
     $data['all_units'] = TblEquipmentStatus::get_available_units();
     return view ('content/issuableItems' , $data);
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

      TblEmployees::edit_employee($data);

      $act['employees'] = $data['id'];
      $act['action'] = "updated";
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
