<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class PurchasedItems extends Model
{
    protected $table = 'purchased_items';
    public $timestamps = false;

    public static function get_purchased_Item($params){
        $query = \DB::table('purchased_items')
        -> where('p_id', '=', $params)
        -> orderBy('subtype_id' , 'asc')
        -> get();
        return $query;
    }

    public static function add_purchased_Item($params){
      $purchases = new Purchases;
  		$purchases->supplier_name = $params;

  		try {
  			$supplier->save();
  			$id = DB::getPdo()->lastInsertId();
  			return $id;
  		}catch(QueryException $e) {
  			die($e);
  		}

  	}



}
