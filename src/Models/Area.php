<?php

namespace Base\Models;

class Area extends Model {
	protected $table = "areas";

	protected $guarded = [];

	public function city() {
		return $this->belongsTo('Base\Models\City');
	}
	public function stations() {
		return $this->hasMany('Base\Models\Station', 'area_code', 'code');
	}
	public function expresses() {
		return $this->hasMany('Base\Models\Express');
	}

	public function shops() {
		return $this->hasMany('Base\Models\Account');
	}
}