<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblItAssociate extends Model
{
    protected $table = 'users';
    public $timestamps = false;

    public static function get_all_associate($params = null){
      $query = \DB::table('users')
      -> leftjoin('employees' , 'employees.id', '=', 'users.employee_id')
      -> leftjoin('departments' , 'departments.id', '=', 'employees.dept_id')
      -> select('users.*', 'departments.name', 'users.status as stat')
      -> where('users.user_type' , '=' , 'associate')
      -> orderBy('users.email' , 'asc')
      -> get();
      return $query;
    }

}
