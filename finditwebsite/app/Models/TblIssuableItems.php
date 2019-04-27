<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblIssuableItems extends Model{
	protected table = it_equipment;
	public $timestamp = false;

	public static function getAllEquipment($params = null){
		$query = \DB::table('it_equipment')
		-> join('equipment_status', 'equipment_status.id', '=', 'it_equipment.status_id')
		-> join('it_equipment_subtype', 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
		-> select('it_equipment.*', 'equipment_status.name as stat')
		-> orderBy('created_at','desc')
		-> get();
		return $query;
	}

	public static function getAvailableSystemUnit($params = null){
		$query = \DB::table('system_units')
		-> join('equipment_status', 'equipment_status.id', '=', 'system_units.status_id')
		-> select('it_equipment.*' , 'equipment_status.name as stat')
		-> where('status_id', '=', '1')
		-> orderBy('created_at', 'desc')
		-> get();
		return $query;
	}

	public static function getIssuedSystemUnit($params = null){
		$query = \DB::table('system_units')
		-> join('equipment_status', 'equipment_status.id', '=', 'system_units.status_id')
		-> select('it_equipment.*' , 'equipment_status.name as stat')
		-> where('status_id', '=', '2')
		-> orderBy('created_at', 'desc')
		-> get();
		return $query;
	}

	public static function getForRepairSystemUnit($params = null){
		$query = \DB::table('system_units')
		-> join('equipment_status', 'equipment_status.id', '=', 'system_units.status_id')
		-> select('it_equipment.*' , 'equipment_status.name as stat')
		-> where('status_id', '=', '3')
		-> orderBy('created_at', 'desc')
		-> get();
		return $query;
	}

	public static function getForReturnSystemUnit($params = null){
		$query = \DB::table('system_units')
		-> join('equipment_status', 'equipment_status.id', '=', 'system_units.status_id')
		-> select('it_equipment.*' , 'equipment_status.name as stat')
		-> where('status_id', '=', '4')
		-> orderBy('created_at', 'desc')
		-> get();
		return $query;
	}

	public static function getForDisposalSystemUnit($params = null){
		$query = \DB::table('system_units')
		-> join('equipment_status', 'equipment_status.id', '=', 'system_units.status_id')
		-> select('it_equipment.*' , 'equipment_status.name as stat')
		-> where('status_id', '=', '5')
		-> orderBy('created_at', 'desc')
		-> get();
		return $query;
	}

	public static function getPendingSystemUnit($params = null){
		$query = \DB::table('system_units')
		-> join('equipment_status', 'equipment_status.id', '=', 'system_units.status_id')
		-> select('it_equipment.*' , 'equipment_status.name as stat')
		-> where('status_id', '=', '6')
		-> orderBy('created_at', 'desc')
		-> get();
		return $query;
	}

	public static function getDisposedSystemUnit($params = null){
		$query = \DB::table('system_units')
		-> join('equipment_status', 'equipment_status.id', '=', 'system_units.status_id')
		-> select('it_equipment.*' , 'equipment_status.name as stat')
		-> where('status_id', '=', '7')
		-> orderBy('created_at', 'desc')
		-> get();
		return $query;
	}
}