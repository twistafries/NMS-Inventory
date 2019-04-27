<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;

class TblEmployees extends Model {

	protected $table = 'employees';
	public $timestamps = false;

	public static function get_employees($params = null) {
		if(isset($params['id'])) {
			$query = \DB::table('employees as e')
				->where('e.id', '=', $params['id'])
				->get();
		}else if($params=='active') {
			$query = \DB::table('employees as e')
				->where('e.status', '=', 'active')
				->get();
		}else	if(isset($params['emails'])) {
				$query = \DB::table('employees as e')
					->whereNotIn('e.email', $params['emails'])
					->get();
			}else {
			$query = \DB::table('employees as e')
				->leftjoin('departments', 'departments.id', '=', 'e.dept_id')
				->select('e.*', 'departments.name as department')
				->orderBy('e.created_at', 'desc')
				->get();
		}
			return $query;
	}

	public static function add_employee($params) {
		$empl = new TblEmployees;
		$empl->id = $params['id'];
		$empl->fname = $params['fname'];
		$empl->lname = $params['lname'];
		$empl->email = $params['email'];
		$empl->dept_id = $params['dept_id'];
		$empl->status = 'active';

		try {
			$empl->save();
			$id = DB::getPdo()->lastInsertId();
			return $id;
		}catch(QueryException $e) {
			die($e);
		}

	}
	public static function remove_employee($params){
	$employees = TblEmployees::find($params['id']);
	$id = TblEmployees::find($params['id']);
	$employees->delete();
	return $id;
	}

	public static function edit_employee( $params ){
		$employees = TblEmployees::find($params['id']);
        $id = TblEmployees::find($params['id']);
        
		if(isset($params['fname']))
		$employees->fname = $params['fname'];

		if(isset($params['lname']))
		$employees->lname = $params['lname'];

		if(isset($params['email']))
		$employees->email = $params['email'];

		if(isset($params['dept_id']))
		$employees->dept_id = $params['dept_id'];

		if(isset($params['status']))
		$employees->status = $params['status'];

		$employees->updated_at = gmdate('Y-m-d H:i:s');

		try {
            $employees->save();
            return $id;
        }catch(QueryException $e){
            die($e);
        }
	}

}

?>
