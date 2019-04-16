<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblAssociate extends Model
{
    protected $table = 'users';
    public $timestamps = false;

    public static function get_all_associate($params = null){
        $query = \DB::table('users')
        -> leftjoin('departments' , 'departments.id', '=', 'employees.dept_id')
        -> select('users.*', 'departments.name', 'users.status as stat')
        -> where('users.user_type' , '=' , 'associate')
        -> orderBy('users.email' , 'asc')
        -> get();
        return $query;
    }

    public static function update_associate_status(){

    }

}
