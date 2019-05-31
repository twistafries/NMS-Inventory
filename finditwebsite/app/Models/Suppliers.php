<?php

namespace App\Models;
<<<<<<< HEAD

=======
use DB;
>>>>>>> 6ea3c7a7f13cdee097dfa5009e86e7fd9d296929
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
<<<<<<< HEAD
    protected $table = 'activity_log';
=======
    protected $table = 'supplier';
>>>>>>> 6ea3c7a7f13cdee097dfa5009e86e7fd9d296929
    public $timestamps = false;

    public static function get_suppliers($params = null){
        $query = \DB::table('supplier as s')
<<<<<<< HEAD
        -> orderBy('supplier_name' , 'asc')
=======
        -> orderBy('supplier_name' , 'desc')
>>>>>>> 6ea3c7a7f13cdee097dfa5009e86e7fd9d296929
        -> get();
        return $query;
    }

<<<<<<< HEAD
=======
    public static function add_supplier($params){
      $supplier = new Suppliers;
  		$supplier->supplier_name = $params;

  		try {
  			$supplier->save();
  			$id = DB::getPdo()->lastInsertId();
  			return $id;
  		}catch(QueryException $e) {
  			die($e);
  		}

  	}


>>>>>>> 6ea3c7a7f13cdee097dfa5009e86e7fd9d296929
    public static function update_associate_status(){

    }

}
