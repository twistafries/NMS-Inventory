<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TblEmployees extends Model {

	protected $table = 'employees';
	public $timestamps = false;

	public static function getEmployees($params = null) {
		if(isset($params['id'])) {
			$query = \DB::table('employees as e')
				->where('e.id', '=', $params['id'])
				->get();
		}else {
			$query = \DB::table('employees as e')
				->leftjoin('departments', 'departments.id', '=', 'e.dept_id')
				->select('e.*', 'departments.name as department')
				->where('e.status', '=', 'active')
				->orderBy('lname', 'asc')
				->get();
		}
			return $query;
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

}

?>
