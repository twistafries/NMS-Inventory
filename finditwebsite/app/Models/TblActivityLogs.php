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

    	$log->done_by = Session::get('loggedIn')['fname'] . ' ' . Session::get('loggedIn')['lname'];
    	$log->activity = $params['activity'];

      if(isset($params['data']))
        $log->data = $params['data'];


      if(isset($params['data']))
        $log->data = $params['data'];

      if(isset($params['system_unit']))
        $log->system_unit = $params['system_unit'];


      if(isset($params['done_by']))
    	  $log->done_by = $params['done_by'];

      if(isset($params['from_status']))
    	 $log->from_status = $params['from_status'];

      if(isset($params['to_status']))
    	 $log->to_status = $params['to_status'];


      if(isset($params['issued_to']))
    	  $log->issued_to = $params['issued_to'];

			if(isset($params['field']))
     	 $log->field = $params['field'];

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
        ->leftjoin('it_equipment', 'it_equipment.id', '=', 'a.data')

        ->select('a.*', 'it_equipment.brand as brand', 'it_equipment.model as model')

        ->leftjoin('system_units', 'system_units.id', '=', 'a.system_unit')
        ->select('a.*', 'it_equipment.brand as brand', 'it_equipment.model as model', 'system_units.id as pc_id', 'system_units.name as pc_name')

        ->orderBy('a.created_at' , 'desc')
        ->get();

        return $query;

    }

public static function get_activities_dashboard($params = null){
    $query = \DB::table('activity_logs as a')
    ->leftjoin('users', 'users.id', '=', 'a.done_by')
    ->leftjoin('it_equipment', 'it_equipment.id', '=', 'a.data')
    ->select('a.*', 'it_equipment.brand as brand', 'it_equipment.model as model')
    ->orderBy('a.created_at' , 'desc')
    ->limit(12)
    ->get();
    return $query;
}
}
