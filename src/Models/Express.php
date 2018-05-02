<?php

namespace Base\Models;

class Express extends Model {
	// use SoftDeletes;

	/*
		     * Role profile to get value from ntrust config file.
	*/

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $guarded = [];

	protected $dates = [
		'created_at',
		'updated_at',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
	];

	public function sendPasswordResetNotification($token) {
		$this->notify(new \App\Notifications\MyResetPassword($token));
	}

	public function shop() {
		return $this->BelongsTo('Base\Models\Account', 'account_id', 'id');
	}
	public function user() {
		return $this->BelongsTo('Base\Models\User');
	}
	public function expressLatest() {
		return $this->hasOne('Base\Models\ExpressRoute')->latest();
	}
	public function expressOneRoute() {
		return $this->hasOne('Base\Models\ExpressRoute');
	}
	public function expressRoutes() {
		return $this->hasMany('Base\Models\ExpressRoute');
	}
	public function expressWithRoutes() {
		return $this->expressRoutes()->select('express_id', 'id', 'name', 'op_type', 'start_at', 'end_at');
	}
	public function expressWithPayments() {
		return $this->expressTransactions()->select('express_id', 'type', 'channel', 'amount', 'state', 'remark', 'created_at');
	}
	public function expressPayment() {
		return $this->hasOne('Base\Models\ExpressPayment');
	}
	public function expressRoutesWithDriver() {
		return $this->hasMany('Base\Models\ExpressRoute')->with('toDriver', 'fromDriver');
	}
	public function fromArea() {
		return $this->belongsTo('Base\Models\Area', 'est_send_area');
	}
	public function toArea() {
		return $this->belongsTo('Base\Models\Area', 'est_rec_area');
	}
	public function expressTransactions() {
		return $this->hasMany('Base\Models\ExpressTransaction');
	}
	public function expressNopayTransaction() {
		return $this->hasOne('Base\Models\ExpressTransaction')->where('state', 0)->where('type', 'pay');
	}
	public function expressCancle() {
		return $this->hasOne('Base\Models\ExpressAction')->where('type', 'cancle')->orderBy('id', 'DESC');
	}
	public function product() {
		return $this->BelongsTo('Base\Models\Product', 'product_id')->select("id", "name", "city_code");
	}
}
