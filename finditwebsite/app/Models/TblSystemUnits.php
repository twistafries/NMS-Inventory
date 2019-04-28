<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class TblSystemUnits extends Model
{
  protected $table = 'system_units';
  public $timestamps = false;

    public static function get_all_system_units($params = null){
        $query = \DB::table('system_units')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'system_units.status_id')
        -> leftjoin('users' , 'users.id', '=', 'system_units.user_id')
        -> select('system_units.*', 'system_units.id as id', 'users.lname as lname', 'users.fname as fname', 'equipment_status.name as stat')
        -> orderBy('system_units.id' , 'ASC')
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
      $system_units->description = $params['description'];
      $system_units->user_id = $params['user_id'];
      
      $system_units->status_id = 1;
      try {
        $system_units->save();
        $id = DB::getPdo()->lastInsertId();
        return $id;
      }catch(QueryException $e) {
        die($e);
      }
    }
}
