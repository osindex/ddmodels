<?php
namespace Base\Models;

class AccountRewardTransaction extends Model {
	// use Notifiable;
	protected $table = "account_reward_transactions";
	protected $guarded = [];

	public function account() {
		return $this->BelongsTo('Base\Models\Account');
	}
	public function express() {
		return $this->BelongsTo('Base\Models\Express');
	}
}