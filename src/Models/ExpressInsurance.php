<?php
namespace Base\Models;

class ExpressInsurance extends Model {
	protected $guarded = [];

	protected $table = 'express_insurances';

	public function express() {
		return $this->belongsTo('\Base\Models\Express');
	}
}
