<?php
namespace Base\Models;

class ExportData extends Model {
	protected $table = "exportdata";
	protected $guarded = [];
	public function admin() {
		return $this->BelongsTo('Base\Models\Admin');
	}
}
