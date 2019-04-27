<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblAssociate extends Model
{
    protected $table = 'users';
    public $timestamps = false;

    public static function get_all_users($params = null){
        $query = \DB::table('users')
        -> leftjoin('departments' , 'departments.id', '=', 'users.dept_id')
        -> select('users.*', 'users.id as id', 'departments.name as department', 'departments.id as dept_id', 'users.status as status')
        -> orderBy('users.email' , 'asc')
        -> get();
        return $query;
    }

    public static function update_associate_status(){

    }

}
