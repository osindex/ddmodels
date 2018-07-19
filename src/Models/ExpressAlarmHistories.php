<?php
namespace Base\Models;

class ExpressAlarmHistories extends Model {
	protected $guarded = [];

	protected $table = 'express_alarm_histories';

	public function express() {
		return $this->belongsTo('\App\Models\Express');
	}
	public function alarm_rule() {
		return $this->belongsTo('\App\Models\ExpressAlarmRules', 'express_alarm_rule_id');
	}
}
