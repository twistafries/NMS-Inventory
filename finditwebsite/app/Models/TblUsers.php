<?php

namespace App\Models;
use Session;
use Illuminate\Database\Eloquent\Model;
use App\User as Authenticatable;

class TblUsers extends Authenticatable {

	protected $table = 'users';
	protected $fillable = ['firstname', 'lastname', 'email', 'password', 'status'];
	public $timestamps = false;

	public static function get_users($params=null){
		if(isset($params['id'])){
			$query= \DB::table('users AS u')
				// ->where('u.user_type','=', 'guest')
				->where('u.id','=',$params['id'])
				->get();
		}
		elseif(isset($params['email'])){
			$query = \DB::table('users AS u')
				->whereRaw("u.email = '".$params['email']."'")
				->first();
		}
		elseif(isset($params['column'])){
			$query= \DB::table('users AS u')
				->select($params['column'])
				->where('u.user_type','=', 'associate')
				->get();
		}
		else{
			$query = \DB::table('users AS u')
					// ->where('status', '=', 'active')
					->get();
		}
		return $query;
	}

	// public static function add_user( $params ){
	// 	$results = [];

	// 	$results['error'] = 1;
	// 	$results['message'] = 'error';

 //    	$user = new TblUsers;
 //    	$user->email = $params['email'];
 //    	$user->password = bcrypt($params['password']);
 //    	$user->firstname = $params['firstname'];
 //    	$user->lastname = $params['lastname'];
 //    	$user->dept_id = '1';

 //    	// if(isset($params['user_type'])) {
 //    	// 	$user->user_type = $params['user_type'];
 //    	// }

 //    	try{	
	// 		$user->save();
	// 		$results['error'] = 0;
	// 		$results['message'] = 'user has been save';
	// 	}
	// 	catch ( QueryException $e ){
	// 		$results['error'] = 1;
	// 		$results['message'] = $e;
	// 	}

	// 	return $results;
	// }

}