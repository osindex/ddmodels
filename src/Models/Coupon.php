<?php

namespace Base\Models;

class Coupon extends Model {
	protected $table = "coupons";

	protected $guarded = [];
	public function shop() {
		return $this->BelongsTo('Base\Models\Account', 'account_id');
	}
	public function user() {
		return $this->BelongsTo('Base\Models\User');
	}
}
