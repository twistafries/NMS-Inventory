<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TblActivityLogs extends Model {

	protected $table = 'activity_logs';
	public $timestamps  = false;

	public static function getActLogs($params = null) {
		$query = \DB::table('activity_logs AS a')
			->get();

		if(isset($params['id'])) {
			$query = \DB::table('activity_logs AS a ')
				->where('a.id', '=', $params['id']);
		}

		return $query;
	}

	public static function addActLog($params) {
		$actlog = new TblActivityLogs;

		$actlog->user_id = $params['user_id'];
		// $actlog->action = $params['action'];
		// $actlog->table = $params['table'];
		// $actlog->data = $params['data'];

		try {
			$actlog->save();
		}catch(QueryException $e) {
			die($e);
		}
	}

}

?>