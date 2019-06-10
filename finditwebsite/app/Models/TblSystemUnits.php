<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use DB;
use Session;
class TblSystemUnits extends Model
{
  protected $table = 'system_units';
  public $timestamps = false;

    public static function get_all_system_units($params = null){
        $query = \DB::table('system_units')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'system_units.status_id')
        -> leftjoin('users' , 'users.id', '=', 'system_units.user_id')
        -> select('system_units.*', 'system_units.id as id', 'system_units.name as name', 'users.lname as lname', 'users.fname as fname', 'equipment_status.name as status', DB::raw("DATE_FORMAT(system_units.created_at, '%m-%d-%Y') as added_at"))
        -> orderBy('system_units.id' , 'ASC')
        -> get();
        return $query;
    }
    
    public static function get_unit_component($params){
        $query = \DB::table('system_units')
        -> leftjoin('it_equipment' , 'it_equipment.unit_id', '=', 'system_units.id')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'system_units.status_id')
        -> where('system_units.id' , '=' , $params)
        -> orderBy('system_units.id' , 'ASC')
        -> get();
        return $query;
    }

    public static function get_total_system_units($status){
        $query = \DB::table('system_units')
        -> where('system_units.status_id', '=', $status)
        -> get();
        return $query;
    }

    public static function update_unit_status($id,$status){
      $system_units = TblSystemUnits::find($id);
      $unit_id = TblSystemUnits::find($id);

      $system_units->status_id = $status;
      $system_units->save();
      return $unit_id;
    }

    public static function delete_equipment($params){
      $system_units = TblSystemUnits::find($params);
      $id = TblSystemUnits::find($params);

      $system_units->delete();
      return $id;
    }

    public static function add_system_unit($params){
      $system_units = new TblSystemUnits;
      // $system_units->description = $params['description'];
      $system_units->name = $params['name'];
      $system_units->user_id = $params['user_id'];
      if(isset($params['dept_id'])){
        $system_units->dept_id = $params['dept_id'];
      }
      $system_units->status_id = 1;
      try {
        $system_units->save();
        $id = DB::getPdo()->lastInsertId();
        return $id;
      }catch(QueryException $qa) {
        // dd($qa::getErrorInfo());
        // Session::flash('error', 'Input cannot be read by the Database');
        return \Redirect::to('/inventoryAll')->with('error' , 'Database error(s)');
      }
    }

    public static function bulk_add_system_unit($params){
      $system_units = new TblSystemUnits;
      // $system_units->description = $params['description'];
      $system_units->name = $params['name'];
      $system_units->user_id = $params['user_id'];
      if(isset($params['dept_id'])){
        $system_units->dept_id = $params['dept_id'];
      }
      $system_units->status_id = 1;
      try {
        $system_units->save();
        $id = DB::getPdo()->lastInsertId();
        return $id;
      }catch(QueryException $qa) {
        // dd($qa::getErrorInfo());
        Session::flash('error', 'Database exception:');
        return \Redirect::to('/inventoryAll')->with('error' , 'Database error(s)');
      }
    }

    public static function unitByDep($department){
      $query = \DB::table('system_units')
      -> leftjoin('issuance', 'issuance.unit_id', '=', 'system_units.id')
      -> leftjoin('employees', 'employees.id', '=', 'issuance.issued_to')
      -> select('system_units.*', 'system_units.id as su_id', 'employees.id as empid', 'issuance.unit_id as unitIsh', 'issuance.issued_to', 'employees.*')
      -> where('system_units.dept_id', '=', $department)
      ->get();

      return $query;
    }

    public static function unitDepStatus($department,$status){
      $query = \DB::table('system_units')
      -> leftjoin('issuance', 'issuance.unit_id', '=', 'system_units.id')
      -> leftjoin('employees', 'employees.id', '=', 'issuance.issued_to')
      -> select('system_units.*', 'system_units.id as su_id', 'employees.id as empid', 'issuance.unit_id as unitIsh', 'issuance.issued_to', 'employees.*')
      -> where([['system_units.dept_id', '=', $department],['system_units.status_id', '=', $status]])
      ->get();

      return $query;
    }

    public static function getLatestUser($unit_id){
      $query = \DB::table('issuance')
      -> select('*')
      -> where('unit_id', '=', $unit_id)
      -> get();

      return $query;
    }
}
