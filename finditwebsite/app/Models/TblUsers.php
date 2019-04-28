<?php

namespace App\Models;
use Session;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\User as Authenticatable;

class TblUsers extends Authenticatable {

	protected $table = 'users';
	protected $fillable = ['firstname', 'lastname', 'email', 'password', 'status'];
	public $timestamps = false;

	public static function get_all_associates($params = null){
        $query = \DB::table('users')
				-> leftjoin('employees' , 'employees.id', '=', 'users.employee_id')
        -> leftjoin('departments' , 'departments.id', '=', 'employees.dept_id')
        -> select('users.*', 'employees.*','departments.name', 'users.status as stat')
        -> where('users.user_type' , '=' , 'associate')
        -> orderBy('employees.email' , 'asc')
        -> get();
        return $query;
    }

    public static function update_user($params){
    	$user = TblUsers::find($params['id']);

      //   if(isset($params['email']))
			// $user->email = $params['email'];

		if(isset($params['password']))
			$user->password = $params['password'];

		if(isset($params['firstname']))
			$user->firstname = $params['fname'];
			$loggedIn['firstname'] = $params['fname'];

		if(isset($params['lastname']))
			$user->lastname = $params['lname'];
			$loggedIn['lastname'] = $params['lname'];

		if(isset($params['dept_id']))
			$user->mobileno = $params['mobileno'];


		if(isset($params['status']))
			$user->status = $params['status'];

		// if(isset($params['image'])){
		// 	$image = $params['image'];
		// 	$image_path = $image->store('assets/images/users');

		// 	$loggedIn['img_path'] = $image_path;

		// 	$user->img_name = $image->getClientOriginalName();
		// 	$user->img_type = $image->getMimeType();
		// 	$user->img_path = $image_path;
		// }

		// change updated at
		$user->updated_at = gmdate('Y-m-d H:i:s');

		try {
			$user->save();
			return $user->id;
		}
		catch (QueryException $e)
		{
			return false;
			die($e);
		}
    }

	public static function get_users($params=null){
		if(isset($params['id'])){
			$query= \DB::table('users AS u')
				// ->where('u.user_type','=', 'guest')
				->where('u.id','=',$params['id'])
				->get();
		}
		elseif(isset($params['email'])){
			$query = \DB::table('users AS u')
				->leftjoin('departments','departments.id' , '=' , 'u.dept_id')
				->select('u.*', 'departments.name as department')
				->whereRaw("u.email = '".$params['email']."'")
				// ->whereRaw("u.password = '".$params['password']."'")
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

	public static function add_user( $params ){
		$results = [];

		$results['error'] = 1;
		$results['message'] = 'error';

    	$user = new TblUsers;
    	$user->email = $params['email'];
    	$user->password = bcrypt($params['password']);
    	$user->fname = $params['fname'];
    	$user->lname = $params['lname'];
    	$user->dept_id = $params['dept_id'];
			$user->user_type = $params['user_type'];


    	try{
			$user->save();

			$id = DB::getPdo()->lastInsertId();
			return $id;
			$results['error'] = 0;
			$results['message'] = 'user has been save';

		}
		catch ( QueryException $e ){
			$results['error'] = 1;
			$results['message'] = $e;
		}

		return $results;
	}
	public static function remove_user($params){
	$user = TblUsers::find($params['id']);
		$user->delete();
	}

}
