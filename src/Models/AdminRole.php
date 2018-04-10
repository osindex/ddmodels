<?php

namespace Base\Models;

class AdminRole extends Model {
	protected $table = "admin_roles";

	protected $guarded = [];

	public function admins() {
		return $this->belongsToMany('App\Models\Admin', 'admin_role_user');
	}
}
