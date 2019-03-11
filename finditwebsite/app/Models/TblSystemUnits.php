<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TblSystemUnits extends Model {

	protected $table= 'computer_specs';
	public $timestamps = false;

	public static function getSystemUnits($params = null) {
		if(isset($params['id'])) {
			$query = \DB::table('system_units as su')
				->where('su.id', '=', $params['id'])
				->orderBy('created_at', 'desc')
				->get();
		}elseif(isset($params['user_id'])) {
			$query = \DB::table('system_units as su')
				->where('su.user_id', '=' $params['user_id'])
				->orderBy('created_at', 'desc')
				->get();
		}else {
			$query = \DB::table('system_units as su')
				->orderBy('created_at', 'desc')
				->get();
		}

		return $query;
	}

	public static function addSystemUnit($params) {
		$unit = new TblSystemUnits;

		$unit->description = $params['description'];
		$unit->user_id = $params['user_id'];
		$unit->created_at = $params['created_at'];
		$unit->status_id = $params['status_id'];

		try {
			$compspec->save();
		}catch(QueryException $e) {
			die($e);
		}
	}

	public static function updateSystemUnit($params) {
		$unit = TblSystemUnits::find($params['id'])

		if(isset($params['description']))
			$unit->description = $params['description'];

		try {
			$compspec->save();
		}catch(QueryException $e) {
			die($e);
		}

	}

}

?>