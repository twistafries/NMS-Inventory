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
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'purchased_items.subtype_id')
        -> leftjoin('it_equipment_type' , 'it_equipment_type.id', '=', 'it_equipment_subtype.type_id')
        -> leftjoin('supplier', 'supplier.id', '=', 'purchased_items.supplier_id')
        -> select('purchased_items.*','supplier.supplier_name as supplier', 'it_equipment_subtype.name as subtype')
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
