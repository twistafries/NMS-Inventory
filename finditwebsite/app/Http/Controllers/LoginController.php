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
		return view('loginpage');
	}

	public function login(Request $request) {

		$rules = array(
			'email' => 'required|email',
			'password' => 'required|alphaNum|min:8'
		);

		$validator = Validator::make($request->all(), $rules);

		if($validator->fails()) {
			Session::flash('errorLogin', 'Invalid Email or Password');
			return \Redirect::to('/loginpage');
		}else {
			$userdata = array(
				'email' => $request->input('email'),
				'password' => $request->input('password')
			);
			$user = TblUsers::get_users($userdata);

			if(!isset($userdata['email'])) {
				Session::flash('errorLogin', 'Invalid Email');
				return \Redirect::to('/loginpage');
			}

			if(!isset($userdata['password'])) {
				Session::flash('errorLogin', 'Invalid Password');
				return \Redirect::to('/loginpage');
			}

			$logged = array(
				'id' => $user->id,
				'dept_id' => $user->department,
				'email' => $user->email,
				'user_type' => $user->user_type,
				'fname' => $user->fname,
				'lname' => $user->lname,
				'status' =>  $user->status,
			);
			if($logged['status']!="active"){
				Session::flash('errorLogin', 'Please refer to the admin with regards the details of your account.');
				return \Redirect::to('/loginpage');
			}
			if(Auth::attempt($userdata)) {
				Session::put(['loggedIn' => $logged]);
				return \Redirect::to('/dashboard');
			}else {
				Session::flash('errorLogin', 'Invalid Email or Password');
				return \Redirect::to('/loginpage');
				dd($userdata);
			}
		}
	}

	public function logout() {
		Session::flush();
		return \Redirect::to('/loginpage');
	}

	public static function add_user(Request $request) {
		$rules = array(
            'fname' => 'required',
            'lname' => 'required',
	 		'email' => 'required|email',
	 		'dept_id' => 'required',
	 		'password' => 'required|min:8'
		);

		$validator = Validator::make($request->all(), $rules);

		if($validator->fails()) {
			($validator->errors());
			return \Redirect::to('/')
						->withErrors($validator)
						->withInput();
		} else {
			//echo 'Success!';
			//$user = User::create($request -> all(), ['username', 'email', 'password']);

			//auth()->login($user);

			$data = $request->all();
			TblUsers::add_associate($data);
			dd($data);
			return \Redirect::to('content/inventory');
		}
	}
}
