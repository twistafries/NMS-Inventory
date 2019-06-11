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

    public static function get_bulk_purchased_items($params){
        $query = \DB::table('purchased_items')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'purchased_items.subtype_id')
        -> leftjoin('it_equipment_type' , 'it_equipment_type.id', '=', 'it_equipment_subtype.type_id')
        -> leftjoin('supplier', 'supplier.id', '=', 'purchased_items.supplier_id')
        -> select('purchased_items.*','supplier.supplier_name as supplier', 'it_equipment_subtype.name as subtype')
        -> where('purchased_items.id', '=', $params)
        -> orderBy('subtype_id' , 'asc')
        -> get();
        // dd($query);
        return $query;
    }

    public static function get_all_items($params=null){
        $query = \DB::table('purchased_items')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'purchased_items.subtype_id')
        -> leftjoin('it_equipment_type' , 'it_equipment_type.id', '=', 'it_equipment_subtype.type_id')
        -> leftjoin('supplier', 'supplier.id', '=', 'purchased_items.supplier_id')
        -> select('purchased_items.*','supplier.supplier_name as supplier', 'it_equipment_subtype.name as subtype')
        -> orderBy('subtype_id' , 'asc')
        -> get();
        return $query;
    }

    public static function get_component($params=null){
        $query = \DB::table('purchased_items')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'purchased_items.subtype_id')
        -> leftjoin('it_equipment_type' , 'it_equipment_type.id', '=', 'it_equipment_subtype.type_id')
        -> leftjoin('supplier', 'supplier.id', '=', 'purchased_items.supplier_id')
        -> select('purchased_items.*','supplier.supplier_name as supplier', 'it_equipment_subtype.name as subtype')
        -> where('unit_number', '!=', 'null')
        -> orderBy('subtype_id' , 'asc')
        -> get();
        return $query;
    }

    public static function get_unit_number($params=null){
        $query = \DB::table('purchased_items')
        -> leftjoin('supplier', 'supplier.id', '=', 'purchased_items.supplier_id')
        -> groupBy('unit_number')
        -> where('unit_number', '!=', null)
        -> orderBy('p_id' , 'asc')
        -> get();
        return $query;
    }

    public static function add_purchased_Item($params){
      $purchased_items = new PurchasedItems;
      $purchased_items->p_id = $params['purchase_no'];
      $purchased_items->subtype_id = $params["subtype_id"];
      $purchased_items->brand = $params["brand"];
      $purchased_items->model = $params["model"];
      $purchased_items->details = $params["details"];
      $purchased_items->supplier_id = $params['supplier_id'];
      $purchased_items->qty = $params["qty"];
      if(isset($params['is_part'])){
        $purchased_items->is_part = $params["is_part"];;
      } else {
        $purchased_items->is_part = 0;
      }
  		try {
  			$purchased_items->save();

  		}catch(QueryException $e) {
  			die($e);
  		}

  	}


    public static function getUnitItems($params){
      $query = \DB::table('purchased_items')
      -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'purchased_items.subtype_id')
      -> leftjoin('it_equipment_type' , 'it_equipment_type.id', '=', 'it_equipment_subtype.type_id')
      -> leftjoin('supplier', 'supplier.id', '=', 'purchased_items.supplier_id')
      -> select('purchased_items.*','supplier.supplier_name as supplier', 'it_equipment_subtype.name as subtype')
      -> where('p_id', '=', $params)
      -> where('unit_number', '!=', 'null')
      -> orderBy('subtype_id' , 'asc')
      -> get();
      return $query;
  }
}
