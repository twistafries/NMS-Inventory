<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB, Session;
  use Carbon\Carbon;
class TblActivityLogs extends Model {

	protected $table = 'activity_logs';
    public $timestamps = false;

    public static function add_log($params) {

    	$results = [];
    	$results['error'] = 1;
    	$results['message'] ='error';

    	$log = new TblActivityLogs;

    	$log->done_by = Session::get('loggedIn')['id'];
    	$log->action = $params['action'];

      if(isset($params['departments']))
        $log->departments = $params['departments'];

      if(isset($params['employees']))
    	$log->employees = $params['employees'];

      if(isset($params['equipment_status']))
    	$log->equipment_status = $params['equipment_status'];

      if(isset($params['inventory_concerns']))
    	$log->inventory_concerns = $params['inventory_concerns'];

        if(isset($params['issuance']))
    	$log->issuance = $params['issuance'];

      if(isset($params['it_equipment']))
    	$log->it_equipment = $params['it_equipment'];

      if(isset($params['it_equipment_type']))
    	$log->it_equipment_type = $params['it_equipment_type'];

      if(isset($params['it_equipment_subtype']))
    	$log->it_equipment_subtype = $params['it_equipment_subtype'];

      if(isset($params['replacement_issuance']))
    	$log->replacement_issuance = $params['replacement_issuance'];

      if(isset($params['system_units']))
    	$log->system_units = $params['system_units'];

      if(isset($params['users']))
    	$log->users = $params['users'];

      if(isset($params['status_id']))
    	$log->status_id = $params['status_id'];

    	try {
    		$log->save();
    		$results['error'] = 0;
    		$results['message'] = 'Log Added';
    	} catch(QueryException $e) {
            $result['error'] = 0;
            $result['message'] = $e;
        }

    	return $results;
    }

    public static function get_logs($params = null) {
        $query = DB::table('activity_logs as a')
        ->leftjoin('users', 'users.id', '=', 'a.done_by')
        ->leftjoin('users as u', 'u.id', '=', 'a.users')
        ->leftjoin('departments', 'departments.id', '=', 'a.departments')
        ->leftjoin('employees', 'employees.id', '=', 'a.employees')
        ->leftjoin('equipment_status', 'equipment_status.id', '=', 'a.equipment_status')
        ->leftjoin('equipment_status as e', 'e.id', '=', 'a.status_id')
        ->leftjoin('inventory_concerns', 'inventory_concerns.id', '=', 'a.inventory_concerns')
        ->leftjoin('issuance', 'issuance.id', '=', 'a.issuance')
        ->leftjoin('it_equipment', 'it_equipment.id', '=', 'a.it_equipment')
        ->leftjoin('it_equipment_subtype', 'it_equipment_subtype.id', '=', 'a.it_equipment_subtype')
        ->leftjoin('it_equipment_type', 'it_equipment_type.id', '=', 'a.it_equipment_type')
        ->leftjoin('replacement_issuance', 'replacement_issuance.id', '=', 'a.replacement_issuance')
        ->leftjoin('system_units', 'system_units.id', '=', 'a.system_units')
        ->select('users.fname as firstname','users.lname as lastname', 'users.id as user', 'employees.fname as efname', 'employees.lname as elname','departments.name as dept_name', 'equipment_status.name as status_name', 'issuance.id as issuance_id', 'issuance.issued_to as issued_to', 'it_equipment.brand as brand', 'it_equipment.model', 'it_equipment.unit_id as part_unit', 'it_equipment_subtype.name as subtype_name', 'it_equipment_type.name as type_name', 'system_units.description as unit_description', 'system_units.id as unit', 'a.action as action', 'u.fname as userfname', 'u.lname as userlname', 'a.created_at as date', 'a.equipment_status as status')
        ->orderBy('a.created_at' , 'desc')
        ->get();

        return $query;

    }

public static function get_activities_dashboard($params = null){
    $query = \DB::table('activity_logs as a')
    ->leftjoin('users', 'users.id', '=', 'a.done_by')
    ->leftjoin('users as u', 'u.id', '=', 'a.users')
    ->leftjoin('departments', 'departments.id', '=', 'a.departments')
    ->leftjoin('employees', 'employees.id', '=', 'a.employees')
    ->leftjoin('equipment_status', 'equipment_status.id', '=', 'a.equipment_status')
    ->leftjoin('equipment_status as e', 'e.id', '=', 'a.status_id')
    ->leftjoin('inventory_concerns', 'inventory_concerns.id', '=', 'a.inventory_concerns')
    ->leftjoin('issuance', 'issuance.id', '=', 'a.issuance')
    ->leftjoin('it_equipment', 'it_equipment.id', '=', 'a.it_equipment')
    ->leftjoin('it_equipment_subtype', 'it_equipment_subtype.id', '=', 'a.it_equipment_subtype')
    ->leftjoin('it_equipment_type', 'it_equipment_type.id', '=', 'a.it_equipment_type')
    ->leftjoin('replacement_issuance', 'replacement_issuance.id', '=', 'a.replacement_issuance')
    ->leftjoin('system_units', 'system_units.id', '=', 'a.system_units')
    ->select('users.fname as firstname','users.lname as lastname', 'users.id as user', 'employees.fname as efname', 'employees.lname as elname','departments.name as dept_name', 'equipment_status.name as status_name', 'issuance.id as issuance_id', 'issuance.issued_to as issued_to', 'it_equipment.brand as brand', 'it_equipment.model', 'it_equipment.unit_id as part_unit', 'it_equipment_subtype.name as subtype_name', 'it_equipment_type.name as type_name', 'system_units.description as unit_description', 'system_units.id as unit', 'a.action as action', 'u.fname as userfname', 'u.lname as userlname', 'a.created_at as date', 'a.equipment_status as status')
    ->orderBy('a.created_at' , 'desc')
    -> limit(12)
    -> get();
    return $query;
}

public static function get_for_return_Month($params){
	$query = \DB::table('activity_logs as a')
	->leftjoin('users', 'users.id', '=', 'a.done_by')
	->leftjoin('users as u', 'u.id', '=', 'a.users')
	->leftjoin('departments', 'departments.id', '=', 'a.departments')
	->leftjoin('employees', 'employees.id', '=', 'a.employees')
	->leftjoin('equipment_status', 'equipment_status.id', '=', 'a.status_id')
	->leftjoin('inventory_concerns', 'inventory_concerns.id', '=', 'a.inventory_concerns')
	->leftjoin('issuance', 'issuance.id', '=', 'a.issuance')
	->leftjoin('it_equipment', 'it_equipment.id', '=', 'a.it_equipment')
	->leftjoin('it_equipment_subtype', 'it_equipment_subtype.id', '=', 'a.it_equipment_subtype')
	->leftjoin('it_equipment_type', 'it_equipment_type.id', '=', 'a.it_equipment_type')
	->leftjoin('replacement_issuance', 'replacement_issuance.id', '=', 'a.replacement_issuance')
	->leftjoin('system_units', 'system_units.id', '=', 'a.system_units')
  ->where('a.action', '=', 'changed the status of')
  ->where('a.status_id', '=', 4)
  ->whereMonth('a.created_at', '=', $params)
  -> get();
  return $query;
}
public static function get_for_repair_Month($params){
	$query = \DB::table('activity_logs as a')
	->leftjoin('users', 'users.id', '=', 'a.done_by')
	->leftjoin('users as u', 'u.id', '=', 'a.users')
	->leftjoin('departments', 'departments.id', '=', 'a.departments')
	->leftjoin('employees', 'employees.id', '=', 'a.employees')
	->leftjoin('equipment_status', 'equipment_status.id', '=', 'a.status_id')
	->leftjoin('inventory_concerns', 'inventory_concerns.id', '=', 'a.inventory_concerns')
	->leftjoin('issuance', 'issuance.id', '=', 'a.issuance')
	->leftjoin('it_equipment', 'it_equipment.id', '=', 'a.it_equipment')
	->leftjoin('it_equipment_subtype', 'it_equipment_subtype.id', '=', 'a.it_equipment_subtype')
	->leftjoin('it_equipment_type', 'it_equipment_type.id', '=', 'a.it_equipment_type')
	->leftjoin('replacement_issuance', 'replacement_issuance.id', '=', 'a.replacement_issuance')
	->leftjoin('system_units', 'system_units.id', '=', 'a.system_units')
  ->where('a.action', '=', 'changed the status of')
  ->where('a.status_id', '=', '3')
  ->whereMonth('a.created_at', '=', $params)
  -> get();
  return $query;
}

public static function get_for_pend_Month($params){
	$query = \DB::table('activity_logs as a')
	->leftjoin('users', 'users.id', '=', 'a.done_by')
	->leftjoin('users as u', 'u.id', '=', 'a.users')
	->leftjoin('departments', 'departments.id', '=', 'a.departments')
	->leftjoin('employees', 'employees.id', '=', 'a.employees')
	->leftjoin('equipment_status', 'equipment_status.id', '=', 'a.status_id')
	->leftjoin('inventory_concerns', 'inventory_concerns.id', '=', 'a.inventory_concerns')
	->leftjoin('issuance', 'issuance.id', '=', 'a.issuance')
	->leftjoin('it_equipment', 'it_equipment.id', '=', 'a.it_equipment')
	->leftjoin('it_equipment_subtype', 'it_equipment_subtype.id', '=', 'a.it_equipment_subtype')
	->leftjoin('it_equipment_type', 'it_equipment_type.id', '=', 'a.it_equipment_type')
	->leftjoin('replacement_issuance', 'replacement_issuance.id', '=', 'a.replacement_issuance')
	->leftjoin('system_units', 'system_units.id', '=', 'a.system_units')
  ->where('a.action', '=', 'changed the status of')
  ->where('a.status_id', '=', '6')
  ->whereMonth('a.created_at', '=', $params)
  -> get();
  return $query;
}

public static function get_for_decom_Month($params){
	$query = \DB::table('activity_logs as a')
	->leftjoin('users', 'users.id', '=', 'a.done_by')
	->leftjoin('users as u', 'u.id', '=', 'a.users')
	->leftjoin('departments', 'departments.id', '=', 'a.departments')
	->leftjoin('employees', 'employees.id', '=', 'a.employees')
	->leftjoin('equipment_status', 'equipment_status.id', '=', 'a.status_id')
	->leftjoin('inventory_concerns', 'inventory_concerns.id', '=', 'a.inventory_concerns')
	->leftjoin('issuance', 'issuance.id', '=', 'a.issuance')
	->leftjoin('it_equipment', 'it_equipment.id', '=', 'a.it_equipment')
	->leftjoin('it_equipment_subtype', 'it_equipment_subtype.id', '=', 'a.it_equipment_subtype')
	->leftjoin('it_equipment_type', 'it_equipment_type.id', '=', 'a.it_equipment_type')
	->leftjoin('replacement_issuance', 'replacement_issuance.id', '=', 'a.replacement_issuance')
	->leftjoin('system_units', 'system_units.id', '=', 'a.system_units')
  ->where('a.action', '=', 'changed the status of')
  ->where('a.status_id', '=', '7')
  ->whereMonth('a.created_at', '=', $params)
  -> get();
  return $query;
}
}
