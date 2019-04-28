<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use View, Validator, Session, Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\SessionController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\TblUsers;
use App\Models\TblAssociate;
use App\Models\TblEmployees;
use App\Models\TblActivityLogs;

class AssociateController extends BaseController
{
    public function showAllAssociate(){
        if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
        }

        $data = [];
        $data['associates'] = TblAssociate::get_all_users();
        $data['associatesRem'] = TblAssociate::get_all_users();
        $data['users'] = TblAssociate::get_all_users();
        $user = [];
        $user['emails'] = array();
        foreach ($data['users'] as $users) {
          // code...
          array_push($user['emails'],$user['email'] = $users->email);
        }
        $data['employees'] = TblEmployees::get_employees($user);
        return view ('content/associates' , $data);
    }

   public function deactivateAccount(Request $request){
        // if(Session::get('loggedIn')['user_type']!='admin'){
        //     return \Redirect::to('/loginpage');
        // }
    //    $this->checkIfAdmin
        $data = $request->all();
        $updated = TblUsers::update_user($data);
        $id = TblUsers::update_user($data);
        $data['users'] = $id;
        $data['action'] = "deactivated";
        ActivityLogs::add_log($data);
   }

    //adding associate
    public function add_associate( Request $request )
    {
        // if(Session::get('loggedIn')['user_type']!='admin'){
        //     return \Redirect::to('/loginpage');
        // }

        $data = $request->all();
        $results = [];
        dd($data);
        $data['id'] = $request->get('employee_id');
        $data['employee'] = TblEmployees::get_employees();

        //error is by default 1, 1 - meaning there is an error, 0 - where there is no error.
        $results['error'] = 1;
        $results['message'] = 'error';

        $validator = $this->validate_registration( $data );

        if( $validator->fails() ) {
            $results['error'] = 1;
            $results['message'] = $validator->errors();
        } else {
            $results = TblUsers::add_user($data);
        }

        return $results;
    }

    public function addUsers( Request $request )
    {
        // if(Session::get('loggedIn')['user_type']!='admin'){
        //     return \Redirect::to('/loginpage');
        // }

        $data = $request->all();
        $results = [];
        $data['id'] = $request->get('employee_id');
        $employee = TblEmployees::get_employees($data);

        foreach($employee as $employee){
          $data['password'] = "nmsfindit";
          $data['fname'] = $employee->fname;
          $data['lname'] = $employee->lname;
          $data['email'] = $employee->email;
          $data['dept_id'] = $employee->dept_id;
        }



        //error is by default 1, 1 - meaning there is an error, 0 - where there is no error.
        $results['error'] = 1;
        $results['message'] = 'error';

        $validator = $this->validate_registration( $data );

        if( $validator->fails() ) {
            $results['error'] = 1;
            $results['message'] = $validator->errors();
        } else {
            $results = TblUsers::add_user($data);
              return \Redirect::to('/associates')->with('user has been added');
        }

        return $results;
    }

    public function removeUser( Request $request )
    {
        if(Session::get('loggedIn')['user_type']!='admin'){
            return \Redirect::to('/loginpage');
        }


        $data = $request->all();
        $data['id'] =  $request->get('user_id');
        TblUsers::remove_user($data);
      return \Redirect::to('/associates')->with('user has been removed');
    }


    public function validate_registration( $params )
    {

        $rules = array(
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        );

        return Validator::make($params, $rules);
    }

    public function editAssociates(Request $request)
    {
       $data = $request->all();
    
      if(Session::get('loggedIn')['id']==$data['id']&&$data['status']=="inactive"){
        Session::flash('errorLogin', 'You can not deactivate yourself.');
        return \Redirect::to('/associates');
      }

       TblUsers::update_user($data);

       $act['associate'] = $data['id'];
       $act['action'] = "updated";
       TblActivityLogs::add_log($act);

       return redirect()->intended('/associates')->with('message', 'Successfully editted equipment details');

    }
}
