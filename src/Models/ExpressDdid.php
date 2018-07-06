<?php
namespace Base\Models;

class ExpressDdid extends Model {
	protected $table = "express_ddids";
	protected $guarded = [];
	// protected $casts = [
	// 	'options' => 'array',
	// ];
	public function express() {
		return $this->hasOne('Base\Models\Expresses', 'ddid', 'ddid');
	}
}
