<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD

class TblActivityLogs extends Model
{
    protected $table = 'activity_log';
    public $timestamps = false;

    public static function get_all_activities($params = null){
        $query = \DB::table('activity_log as a')
        -> leftjoin('users' , 'users.id', '=', 'a.done_by')
        -> leftjoin('employees' , 'employees.id', '=', 'a.employee_id')
        -> leftjoin('it_equipment' , 'it_equipment.id', '=', 'a.equipment_id')
        -> select('activity_logs.*', 'users.fname as ufname', 'users.lname as ulname', 'employees.fname as efname', 'employees.lname as elname',
                  'it_equipment.model as model', 'it_equipment.brand as brand')
        -> orderBy('a.created_at' , 'desc')
        -> get();
        return $query;
    }

    public static function update_associate_status(){

    }

}
=======
use DB, Session;

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
    	$log->it_equipment = $params['equipment_id'];

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

    public static function get_logs() {
        $query = DB::table('activity_logs as a')
        ->leftjoin('users', 'users.id', '=', 'a.done_by')
        ->leftjoin('departments', 'departments.id', '=', 'a.departments')
        ->leftjoin('employees', 'employees.id', '=', 'a.employees')
        ->leftjoin('equipment_status', 'equipment_status.id', '=', 'a.equipment_status')
        ->leftjoin('inventory_concerns', 'inventory_concerns.id', '=', 'a.inventory_concerns')
        ->leftjoin('issuance', 'issuance.id', '=', 'a.issuance')
        ->leftjoin('it_equipment', 'it_equipment.id', '=', 'a.it_equipment')
        ->leftjoin('it_equipment_subtype', 'it_equipment_subtype.id', '=', 'a.it_equipment_subtype')
        ->leftjoin('it_equipment_type', 'it_equipment_type.id', '=', 'a.it_equipment_type')
        ->leftjoin('replacement_issuance', 'replacement_issuance.id', '=', 'a.replacement_issuance')
        ->leftjoin('system_units', 'system_units.id', '=', 'a.system_units')
        ->select('users.fname as firstname','users.lname as lastname', 'users.id as user_id', 'departments.name as dept_name', 'equipment_status.name as status_name', 'issuance.issued_to as issued_to', 'it_equipment.brand as brand', 'it_equipment.model', 'it_equipment.unit_id as part_unit', 'it_equipment_subtype.name as subtype_name', 'it_equipment_type.name as type_name', 'system_units.description as unit_description', 'system_units.id as unit_id', 'a.action as action', 'a.created_at as date_added')
        ->orderBy('a.created_at' , 'desc')
        ->get();

        return $query;

    }
}
>>>>>>> 8ff778587959b98789cf00621d4700c031d3ed52
