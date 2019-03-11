<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TblEquipmentTypes extends Model {

	protected $table = 'equipment_types';
	public $timestamps = false;

	public static function getAllTypes($params = null) {
		$query = \DB::table('equipment_types as et')
			->get();
		return $query;
	}

	public static function addType($params) {
		$type = new TblEquipmentTypes;

		if(isset($params['type']))
			$type->name = $params['name'];

		// if(isset($params['subtype']))
		// 	$type->subtype = $params['subtype'];

		try {
			$status->save();
		}catch(QueryException $e) {
			die($e);
		}
	}

	public static function updateType($params) {
		$type = TblEquipmentTypes::find($params['id']);

		if(isset($params['type']))
			$type->name = $params['name'];

		// if(isset($params['subtype']))
		// 	$type->subtype = $params['subtype'];

		$status->updated_at = gmdate('Y-m-d H:i:s');

		try {
			$status->save();
		}catch(QueryException $e) {
			die($e);
		}
	}
}

?>