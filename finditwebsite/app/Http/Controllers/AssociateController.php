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


class AssociateController extends SessionController
{
    public function showAllAssociate(){
        if(Session::get('loggedIn')['user_type']!='admin' || ['user_type'] != "associate"){
            return \Redirect::to('/login');
        }  

        $data = [];
        $data['associates'] = TblAssociate::get_all_associates();
        // dd($data);
        return view ('content/associates' , $data);
    }

   public function deactivateAccount(Request $request){
    //    $this->checkIfAdmin
        $data = $request->all();
        $updated = TblUsers::update_user($data);
   }

    //adding associate
    public function add_associate( Request $request )
    {
        $data = $request->all();
        $results = [];

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
