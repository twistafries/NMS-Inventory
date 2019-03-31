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

	public function logout() {
		Session::flush();
		return \Redirect::to('/login');
	}

}