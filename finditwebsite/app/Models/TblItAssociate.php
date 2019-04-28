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

    public static function edit_associate( $params ){
      $associate = TblItAssociate::find($params['id']);
          $id = TblItAssociate::find($params['id']);

      if(isset($params['fname']))
      $associate->fname = $params['fname'];

      if(isset($params['lname']))
      $associate->lname = $params['lname'];

      if(isset($params['email']))
      $associate->email = $params['email'];

      if(isset($params['dept_id']))
      $associate->dept_id = $params['dept_id'];

      if(isset($params['status']))
      $associate->status = $params['status'];

      $associate->updated_at = gmdate('Y-m-d H:i:s');

      try {
              $associate->save();
              return $id;
          }catch(QueryException $e){
              die($e);
          }
    }

}
