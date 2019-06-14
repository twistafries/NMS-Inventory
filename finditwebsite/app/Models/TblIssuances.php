<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB, Session;
use Carbon\Carbon;

class TblIssuances extends Model {

	protected $table = 'issuance';
	public $timestamps = false;

	public static function getIssuance($params = null) {
		$query = \DB::table('issuance as i')
		->leftjoin('it_equipment' , 'it_equipment.id', '=', 'i.equipment_id')
		->leftjoin('system_units' , 'system_units.id', '=', 'i.unit_id')
		->leftjoin('employees' , 'employees.id', '=', 'i.issued_to')
		->leftjoin('users' , 'users.id', '=', 'i.user_id')
		->leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
		->leftjoin('it_equipment_type' , 'it_equipment_type.id', '=', 'it_equipment_subtype.type_id')
		->select('i.*', 'it_equipment.serial_no as serial_no', 'it_equipment.or_no as or_no', 'it_equipment_type.name as type', 'users.fname as userfname', 'users.lname as userlname', 'employees.fname as givenname', 'employees.lname as surname', 'it_equipment.model as model', 'it_equipment.brand as brand', 'system_units.name as unit_name',
		 'it_equipment_subtype.name as subtype',  'system_units.id as pc_number',  DB::raw("DATE_FORMAT(i.created_at, '%m-%d-%Y') as created_at"),  DB::raw("DATE_FORMAT(i.issued_until, '%m-%d-%Y') as issued_until"))
		->orderBy('i.created_at', 'desc')
		->get();

			if(isset($params['id'])) {
				$query->where('i.id', '=', $params['id']);
			}

		return $query;
	}

	public static function getLateReturn($params = null) {
		$query = \DB::table('issuance as i')
		->leftjoin('employees' , 'employees.id', '=', 'i.issued_to')
		->leftjoin('departments', 'departments.id', '=', 'employees.dept_id')
		->select('employees.id', 'employees.fname as fname', 'employees.lname as lname', 'departments.name as department', DB::raw('count(*) as totalIssued'))
		->where('returned_at', '=', null)
		->where('issued_until', '<', Carbon::now()->toDateString())
		->whereBetween('i.created_at', [$params['start'], $params['end']])
		->groupBy('employees.id')
		->orderBy('employees.id', 'desc')
		->get();

		return $query;
	}

	public static function getIssuancePerEmployee($id) {
		$query = \DB::table('issuance as i')
		->leftjoin('employees' , 'employees.id', '=', 'i.issued_to')
		->select('employees.id', 'employees.fname as fname', 'employees.lname as lname',  DB::raw('count(*) as totalIssued'))
		->groupBy('employees.id')
		->groupBy('employees.fname')
		->groupBy('employees.lname')
		->where('employees.dept_id', '=', $id)
		->where('i.returned_at', '=', null)
		->orderBy('i.issued_to', 'asc')
		->get();

			if(isset($params['id'])) {
				$query->where('i.id', '=', $params['id']);
			}

		return $query;
	}


	public static function getEmployeeWithIssuance($params = null) {
		$query = \DB::table('issuance as i')
		->leftjoin('employees' , 'employees.id', '=', 'i.issued_to')
		->select('employees.id', 'employees.fname as fname', 'employees.lname as lname')
		->groupBy('employees.id')
		->groupBy('employees.fname')
		->groupBy('employees.lname')
		->orderBy('i.issued_to', 'asc')
		->get();

			if(isset($params['id'])) {
				$query->where('i.id', '=', $params['id']);
			}

		return $query;
	}

	public static function getIssuanceOfEmployee($id) {
		$query = \DB::table('issuance as i')
		->leftjoin('it_equipment' , 'it_equipment.id', '=', 'i.equipment_id')
		->leftjoin('system_units' , 'system_units.id', '=', 'i.unit_id')
		->leftjoin('employees' , 'employees.id', '=', 'i.issued_to')
		->leftjoin('users' , 'users.id', '=', 'i.user_id')
		->leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
		->leftjoin('it_equipment_type' , 'it_equipment_type.id', '=', 'it_equipment_subtype.type_id')
		->select('i.*', 'it_equipment.serial_no as serial_no', 'it_equipment.or_no as or_no', 'it_equipment_type.name as type', 'users.fname as userfname', 'users.lname as userlname', 'employees.fname as givenname', 'employees.lname as surname', 'it_equipment.model as model', 'it_equipment.brand as brand', 'system_units.name as unit_name',
		 'it_equipment_subtype.name as subtype',  'system_units.id as pc_number')
		->where('i.issued_to', '=', $id)
		->where('i.returned_at', '=', null)
		->orderBy('i.issued_to', 'desc')
		->get();

			if(isset($params['id'])) {
				$query->where('i.id', '=', $params['id']);
			}
			// dd($query);
		return $query;
	}

	public static function getIssuedTo($params){
		$query =\DB::table('issuance as is')
		->leftjoin('employees' , 'employees.id', 'is.issued_to')
		->where('equipment_id', '=', $params)
		->get();
		;
		// dd($query->count());
		if ($query->count() == 0) {
			return "NULL";
		}else{
			return $query;
		}
	}


	public static function most_issued($params){
		$query = \DB::table('issuance as i')
		->leftjoin('it_equipment', 'it_equipment.id', 'i.equipment_id')
		->leftjoin('it_equipment_subtype', 'it_equipment_subtype.id', 'it_equipment.subtype_id')
		->leftjoin('it_equipment_type', 'it_equipment_type.id', 'it_equipment_subtype.type_id')
		->select( "it_equipment.subtype_id","it_equipment_subtype.name", DB::raw("COUNT(it_equipment.subtype_id) as count"))
		->whereBetween('i.created_at', [$params['start'], $params['end']])
		->groupBy('it_equipment.subtype_id')
		->get();
		return $query;
	}

	public static function system_unit_issued($params){
		$query = \DB::table('issuance as i')
		->select(DB::raw("COUNT(id) as count"))
		->where('unit_id', '!=', null)
		->whereBetween('i.created_at', [$params['start'], $params['end']])
		->get();
		return $query;
	}



	public static function add_issuance($params) {
		$issuance = new TblIssuances;

		$issuance->issued_to = $params['issued_to'];
		$issuance->user_id = Session::get('loggedIn')['id'];
		// $issuance->status_id = $params['status_id'];

		if(isset($params['equipment_id']))
			$issuance->equipment_id = $params['equipment_id'];

		if(isset($params['unit_id']))
			$issuance->unit_id = $params['unit_id'];

		if(isset($params['issued_until']))
			$issuance->issued_until = $params['issued_until'];

		if(isset($params['remarks']))
			$issuance->remarks = $params['remarks'];

		try {
			$issuance->save();
			$id = DB::getPdo()->lastInsertId();
			return $id;
		}catch(QueryException $e) {
			die($e);
		}
	}

	public static function updateIssuance($params) {
		$issuance = TblIssuances::find($params['id']);
		$id = TblIssuances::find($params['id']);

		if(isset($params['equipment_id']))
			$issuance->unit_id = $params['equipment_id'];

		if(isset($params['unit_id']))
			$issuance->unit_id = $params['unit_id'];

		if(isset($params['issued_to']))
			$issuance->issued_to = $params['isssued_to'];

		if(isset($params['returned_at'])){
			$issuance->returned_at = $params['returned_at'];
			// $issuance->status_id = $params['1'];
		}

		if(isset($params['issued_until']))
			$issuance->issued_until = $params['issued_until'];

		if(isset($params['remarks']))
			$issuance->remarks = $params['remarks'];

		$issuance->updated_at = gmdate('Y-m-d H:i:s');

		try {
			$event->save();
			return $id;
		} catch(QueryException $e) {
			die($e);
		}
	}


}
