<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TblEquipment extends Model {

	protected $table = 'it_equipment';
	public $timestamps = false;

	public static function getEquipment($params = null) {
		if(isset($params['id'])) {
			$query = \DB::table('it_equipment as i')
				->where('i.id', '=', $params['id'])
				->orderBy('created_at', 'desc')
				->get();
		}else {
			$query = \DB::table('it_equipment as i')
				->where('status_id', '!=', '7')
				->orderBy('status_id', 'asc')
				->orderBy('created_at', 'desc')
				->get();
		}
		return $query;
	}

	public static function addEquipment($params) {
		$item = new TblEquipment;

		$item->type_id = $params['type_id'];
		$item->name = $params['name'];
		$item->details = $params['details'];
		$item->serial_no = $params['serial_no'];
		$item->or_no = $params['or_no'];
		$item->unit_id = $params['unit_id'];
		$item->created_at = $params['created_at'];
		//$item->user_id = $params['user_id'];
		$item->status_id = $params['status_id'];

		try {
			$item->save();
		}catch(QueryException $e) {
			die($e);	
		}
	}

	public static function updateEquipment($params) {
		$item = TblEquipment::find($params['id']);

		if(isset($params['type_id']))
			$item->type_id = $params['type_id'];

		if(isset($params['name']))
			$item->name = $params['name'];

		if(isset($params['details']))
			$item->details = $params['details'];

		if(isset($params['serial_no']))
			$item->serial_no = $params['serial_no'];

		if(isset($params['or_no']))
			$item->or_no = $params['or_no'];

		if(isset($params['unit_id']))
			$item->unit_id = $params['unit_id'];

		// if(isset($params['user_id']))
		// 	$item->user_id = $params['user_id'];

		if(isset($params['status_id']))
			$item->status_id = $params['status_id'];

		$item->updated_at = gmdate('Y-m-d H:i:s');

		try {
			$booking->save();
		}catch(QueryException $e) {
			die($e);
		}

	}


}

?>