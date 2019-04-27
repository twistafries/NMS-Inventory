<?php

namespace App\Http\Controllers;

use View, Validator, Session, Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\SessionController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\TblUsers;
use App\Models\TblAssociate;
use App\Models\TblEmployees;

class AssociateController extends BaseController
{
    public function showAllAssociate(){
        if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
        } 

        $data = [];
        $data['associates'] = TblAssociate::get_all_associates();
        $data['employees'] = TblEmployees::get_employees();
        
        // dd($data);
        return view ('content/associates' , $data);
    }

   public function deactivateAccount(Request $request){
        // if(Session::get('loggedIn')['user_type']!='admin'){
        //     return \Redirect::to('/loginpage');
        // }
    //    $this->checkIfAdmin
        $data = $request->all();
        $updated = TblUsers::update_user($data);
   }

    //adding associate
    public function add_associate( Request $request )
    {
        // if(Session::get('loggedIn')['user_type']!='admin'){
        //     return \Redirect::to('/loginpage');
        // }

        $data = $request->all();
        $results = [];

        $data['employees'] = TblEmployees::get_employees();

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

    public function validate_registration( $params )
    {
        $rules = array(
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8'
        );

        return Validator::make($params, $rules);
    }
}
