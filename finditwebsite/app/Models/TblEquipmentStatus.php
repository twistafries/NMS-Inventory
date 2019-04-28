<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblEquipmentStatus extends Model
{
    protected $table = 'it_equipment';
    public $timestamps = false;

    public static function get_all_status($params = null){
        $query = \DB::table('equipment_status')
        -> orderBy('created_at' , 'asc')
        -> get();
        return $query;
    }

    public static function get_for_repair($params = null){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        -> leftjoin('users' , 'users.id', '=', 'it_equipment.user_id')
        // -> leftjoin('departments' , 'departments.id', '=', 'users.dept_id')
        -> select('it_equipment.*', 'users.fname as firstname', 'users.lname as lastname', 'equipment_status.name as stat')
        -> where('status_id' , '=' , '3')
        -> orderBy('created_at' , 'desc')
        -> get();

        return $query;
    }

    public static function get_for_repair_units($params = null){
        $query = \DB::table('system_units')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'system_units.status_id')
        -> leftjoin('users' , 'users.id', '=', 'system_units.user_id')
        // -> leftjoin('departments' , 'departments.id', '=', 'users.dept_id')
        -> select('system_units.*', 'users.fname as firstname', 'users.lname as lastname', 'equipment_status.name as stat')
        -> where('status_id' , '=' , '3')
        -> orderBy('created_at' , 'desc')
        -> get();
        return $query;
      }

    public static function get_for_disposal($params = null){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('users' , 'users.id', '=', 'it_equipment.user_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        // -> leftjoin('departments' , 'departments.id', '=', 'users.dept_id')
        -> select('it_equipment.*', 'users.fname as firstname', 'users.lname as lastname', 'equipment_status.name as stat')
        -> where('status_id' , '=' , '7')
        -> orderBy('created_at' , 'desc')
        -> get();
        return $query;
    }

    public static function get_for_return($params = null){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('users' , 'users.id', '=', 'it_equipment.user_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        ->leftjoin('it_equipment_type' , 'it_equipment_type.id', '=', 'it_equipment_subtype.type_id')

        // -> leftjoin('departments' , 'departments.id', '=', 'users.dept_id')
        -> select('it_equipment.*', 'it_equipment_type.name as type', 'it_equipment_subtype.name as subtype', 'users.fname as firstname', 'users.lname as lastname', 'equipment_status.name as stat')
        -> where('status_id' , '=' , '4')
        -> orderBy('created_at' , 'desc')
        -> get();
        return $query;
    }

    public static function get_pending($params = null){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('users' , 'users.id', '=', 'it_equipment.user_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        // -> leftjoin('departments' , 'departments.id', '=', 'users.dept_id')
        -> select('it_equipment.*', 'equipment_status.name as stat')
        -> where('status_id' , '=' , '6')
        -> orderBy('created_at' , 'desc')
        -> get();
        return $query;
    }

    public static function get_decommissioned($params = null){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('users' , 'users.id', '=', 'it_equipment.user_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        // -> leftjoin('departments' , 'departments.id', '=', 'users.dept_id')
        -> select('it_equipment.*', 'equipment_status.name as stat', 'users.fname as firstname', 'users.lname as lastname', 'equipment_status.name as stat')
        -> where('status_id' , '=' , '7')
        -> orderBy('created_at' , 'desc')
        -> get();
        return $query;
    }

    public static function get_available($params = null){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('users' , 'users.id', '=', 'it_equipment.user_id')
        // -> leftjoin('departments' , 'departments.id', '=', 'users.dept_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        -> select('it_equipment.*', 'users.fname as fname', 'users.lname as lname',  'equipment_status.name as stat','it_equipment_subtype.name as subtype')
        -> where('status_id' , '=' , '1')
        -> where('it_equipment_subtype.type_id' , '=' , '3')
        -> orderBy('it_equipment.created_at' , 'desc')
        -> get();
        return $query;
    }

    public static function get_available_units($params = null){
        $query = \DB::table('system_units')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'system_units.status_id')
        -> leftjoin('users' , 'users.id', '=', 'system_units.user_id')
        -> leftjoin('departments' , 'departments.id', '=', 'users.dept_id')
        -> select('system_units.*', 'system_units.id as id', 'users.lname as lname', 'users.fname as fname', 'equipment_status.name as stat')
        -> where('status_id' , '=' , '1')
        -> orderBy('system_units.id' , 'ASC')
        -> get();
        return $query;
    }


    public static function get_employees($params = null){
        $query = \DB::table('employees')
        -> leftjoin('departments' , 'departments.id', '=', 'employees.dept_id')
        -> select('employees.*', 'departments.name as dept')
        -> where('employees.status' , '=' , 'active')
        -> orderBy('employees.created_at' , 'desc')
        -> get();
        return $query;
    }
}
