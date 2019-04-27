<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    protected $table = 'activity_log';
    public $timestamps = false;

    public static function get_activities_dashboard($params = null){
        $query = \DB::table('activity_log as a')
        -> leftjoin('users' , 'users.id', '=', 'a.done_by')
        -> leftjoin('employees' , 'employees.id', '=', 'a.employee_id')
        -> leftjoin('it_equipment' , 'it_equipment.id', '=', 'a.equipment_id')
        -> leftjoin('issuance' , 'issuance.id', '=', 'a.equipment_id')
        -> select('a.*', 'users.fname as ufname', 'users.lname as ulname', 'employees.fname as efname', 'employees.lname as elname',
                  'it_equipment.model as model', 'it_equipment.brand as brand')
        -> orderBy('a.created_at' , 'desc')
        -> limit(12)
        -> get();
        return $query;
    }

    public static function update_associate_status(){

    }

}
