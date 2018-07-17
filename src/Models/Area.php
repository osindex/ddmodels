<?php

namespace Base\Models;

class Area extends Model {
	protected $table = "areas";

	protected $guarded = [];

	public function city() {
		return $this->belongsTo('Base\Models\City', 'city_code', 'code');
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
	public function layer() {
		return $this->belongsTo('Base\Models\Layer');
	}
	public function admins() {
		return $this->belongsToMany('Base\Models\Admin');
	}
}
