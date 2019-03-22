<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblItAssociate extends Model
{
    protected $table = 'users';
    public $timestamps = false;

    public static function get_all_associate($params = null){
        $query = \DB::table('users')
        -> leftjoin('employees' , 'employees.email', '=', 'users.email')
        -> leftjoin('departments' , 'departments.id', '=', 'users.dept_id')
        -> select('users.email as email' ,'employees.fname', 'employees.lname', 'departments.name', 'users.status as stat')
        -> where('users.user_type' , '=' , 'associate')
        -> orderBy('users.email' , 'asc')
        -> get();
        return $query;
    }



/*
INSERT INTO `findit`.`it_equipment` (`type_id`, `name_or_model`, `details`, `serial_no`, `or_no`, `unit_id`, `status_id`)
VALUES ('1', 'Keyboard', 'Logitech', '897adP', '7984563', '2', '1');
*/







    // public static function get_table_columns(){
    //     $table = \DB::table('it_equipment')
    //     DB::connection()->getDoctrineColumn('table', '')->getName();
    //     // -> getSchemaBuilder()
    //     // -> getColumnListing();
    //     // return $table;

    //     // return DB::getSchemaBuilder()->getColumnListing($table);
    //     // return Schema::getColumnListing($table);
    // }
}
