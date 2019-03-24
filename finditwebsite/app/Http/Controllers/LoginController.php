<?php

namespace App\Http\Controllers;
use View, Validator, Session, Auth;
use Illuminate\Http\Request;
use App\Models\TblUsers;
use Illuminate\Support\Facade\Hash;

class LoginController extends Controller {

	protected $table = 'users';
	public $timestamps = false;

	public static function index() {
		return view('login');
	}

	public function login(Request $request) {

		$rules = array(
			'email' => 'required|email',
			'password' => 'required|alphaNum|min:8'
		);

		$validator = Validator::make($request->all(), $rules);

		if($validator->fails()) {
			Session::flash('errorLogin', 'Invalid Email or Password');
			return \Redirect::to('/login');
		}else {
			$userdata = array(
				'email' => $request->input('email'),
				'password' => $request->input('password')
			);

			$user = TblUsers::get_users($userdata);

			if(!isset($userdata['email'])) {
				Session::flash('errorLogin', 'Invalid Email.');
				return \Redirect::to('/login');
			}

			$logged = array(
				'id' => $user->id,
				'user_type' => $user->user_type,
				'firstname' => $user->firstname,
				'lastname' => $user->lastname,
			);

			if(Auth::attempt($userdata)) {
				Session::put(['loggedIn' => $logged]);
				return \Redirect::to('/dashboard');
			}else {
				Session::flash('errorLogin', 'Invalid Email.');
				return \Redirect::to('/inventory');
				dd($userdata);
			}			
		}
	}

	//adding associate
	// public function register( Request $request ) 
	// {
	// 	$data = $request->all();
	// 	$results = [];

	// 	//error is by default 1, 1 - meaning there is an error, 0 - where there is no error. 
	// 	$results['error'] = 1;
	// 	$results['message'] = 'error';

	// 	$validator = $this->validate_registration( $data );

	// 	if( $validator->fails() ) {
	// 		$results['error'] = 1;
	// 		$results['message'] = $validator->errors();
	// 	} else {
	// 		$results = TblUsers::add_user($data);
	// 	}		

	// 	return $results;
	// }

	// public function validate_registration( $params )
	// {
	// 	$rules = array(
 //            'firstname' => 'required',
 //            'lastname' => 'required',
	//  		'email' => 'required|email',
	//  		'password' => 'required|min:8'
	// 	);
		
	// 	return Validator::make($params, $rules);
	// }

}