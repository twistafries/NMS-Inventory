<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TblEmploees extends Model {

	protected $table = 'employees'
	public $timestamps = false;

	public static function getEmployees($params = null) {
		if(isset($params['id'])) {
			$query = \DB::table('employees as e')
				->where('e.id', '=', $params['id'])
				->get();
		}else {
			$query = \DB::table('employees as e')
				->where('e.id', '=', 'active')
				->groupBy('dept_id')
				->orderBy('lname', 'asc');				
		}
	}

	public static function addEmployee($params) {
		$empl = new TblEmployees;
		$empl->fname = $params['fname'];
		$empl->lname = $params['lname'];
		$empl->email = $params['email'];
		$empl->dept_id = $params['dept_id'];

		try {
			$empl->save();
		}catch(QueryException $e) {
			die($e);
		}

	}

	pblic static function updateEmployee($params) {
		$empl = TblEmployees::find($params['id']);

		if(isset($params['fname']))
			$empl->fname = $params['fname'];

		if(isset($params['lname']))
			$empl->lname = $params['lname'];

		if(isset($params['email']))
			$empl->email = $params['email'];

		if(isset($params['dept_id']))
			$empl->dept_id = $params['dept_id'];

		$empl->updated_at = gmdate('Y-m-d H:i:s');

		try {
			$empl->save();
		} catch(QueryException $e) {
			die($e);
		}
	}
}

?>