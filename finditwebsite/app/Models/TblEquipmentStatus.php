<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TblEquipmentStatus extends Model {

	protected $table = 'equipment_status';
	public $timestamps = false;

	public static function addStatus($params) {
		$status = new TblEquipmentStatus;
		$status->name = $params['name'];

		try {
			$status->save();
		}catch(QueryException $e) {
			die($e);
		}
	}

	public static function updateStatus($params) {
		$status = TblEquipmentStatus::find($params['id']);

		if(isset($params['name']))
			$status->name = $params['name'];

		status->updated_at = gmdate('Y-m-d H:i:s');

		try {
			$status->save();
		}catch(QueryException $e) {
			die($e);
		}
	}

}

?>