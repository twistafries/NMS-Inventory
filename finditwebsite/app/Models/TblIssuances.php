<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TblIssuances extends Model {

	protected $table = 'issuances';
	public $timestamps = false;

	public static function getIssuances($params = null) {
		$query = \DB::table('issuance as i')
			->where('i.status_id', '=', '2')
			->orderBy('created_at', 'desc')
			->get();

			if(isset($params['id'])) {
				$query->where('i.id', '=', $params['id']);
			}

		return $query;
	}

	public static function addIssuance($params) {
		$issuance = new TblIssuances;

		$issuance->issued_to = $params['isssued_to'];
		$issuance->user_id = $params['user_id'];
		$issuance->created_at = $params['created_at'];
		// $issuance->status_id = $params['status_id'];

		if(isset($params['equipment_id']))
			$issuance->unit_id = $params['equipment_id'];

		if(isset($params['unit_id']))
			$issuance->unit_id = $params['unit_id'];

		if(isset($params['issued_until']))
			$issuance->issued_until = $params['issued_until'];

		if(isset($params['remarks']))
			$issuance->remarks = $params['remarks'];

		try {
			$issuance->save();
		}catch(QueryException $e) {
			die($e);
		}
	}

	public static function updateIssuance($params) {
		$issuance = TblIssuances::find($params['id']);

		if(isset($params['equipment_id']))
			$issuance->unit_id = $params['equipment_id'];

		if(isset($params['unit_id']))
			$issuance->unit_id = $params['unit_id'];

		if(isset($params['issued_to']))
			$issuance->issued_to = $params['isssued_to'];

		if(isset($params['returned_at'])){
			$issuance->returned_at = $params['returned_at'];
			// $issuance->status_id = $params['1'];
		}

		if(isset($params['issued_until']))
			$issuance->issued_until = $params['issued_until'];

		if(isset($params['remarks']))
			$issuance->remarks = $params['remarks'];

		$issuance->updated_at = gmdate('Y-m-d H:i:s');

		try {
			$event->save();
		} catch(QueryException $e) {
			die($e);
		}
	}
}