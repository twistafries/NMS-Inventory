<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;

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
		->select('i.*', 'it_equipment.serial_no as serial_no', 'it_equipment.or_no as or_no', 'it_equipment_type.name as type', 'users.fname as userfname', 'users.lname as userlname', 'employees.fname as givenname', 'employees.lname as surname', 'it_equipment.model as model', 'it_equipment.brand as brand', 'system_units.description as unit_name',
		 'it_equipment_subtype.name as subtype',  'system_units.id as pc_number')
		->where('i.status_id', '=', '2')
		->orderBy('i.created_at', 'desc')
		->get();

			if(isset($params['id'])) {
				$query->where('i.id', '=', $params['id']);
			}

		return $query;
	}

	public static function most_issued(){
		$query = \DB::table('it_equipment as i')
		->leftjoin('it_equipment_subtype', 'it_equipment_subtype.id', 'i.subtype_id')
		->leftjoin('it_equipment_type', 'it_equipment_type.id', 'it_equipment_subtype.type_id')
		->select( "i.subtype_id", DB::raw("COUNT(i.subtype_id) as count"))
		->where('status_id', '=', '1')
		->orwhere('status_id', '=', '2')
		->orwhere('status_id', '=', '3')
		->orwhere('status_id', '=', '4')
		->groupBy('i.subtype_id')
		->get();
		return $query;
	}

	public static function getID($params) {
		$query = \DB::table('it_equipment')
			->select('id')
			->where('name', '=', $params)
			->get();
		return $query;
	}
	public static function getEmployeeID($params) {
		$query = \DB::table('employees')
			->select('id')
			->where('fname', '=', $params['fname'])
			->where('lname', '=', $params['lname'])
			->get();
		return $query;
	}


	public static function add_issuance($params) {
		$issuance = new TblIssuances;

		$issuance->issued_to = $params['issued_to'];
		$issuance->user_id = $params['user_id'];
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
