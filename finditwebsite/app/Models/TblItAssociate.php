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
        -> select('users.email as email' ,'fname', 'lname', 'departments.name', 'users.status as stat')
        -> where('users.user_type' , '=' , 'associate')
        -> orderBy('users.email' , 'asc')
        -> get();
        return $query;
    }

}