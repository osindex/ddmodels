<?php
namespace Base\Models;

class Setting extends Model {
	// use Notifiable;
	protected $table = "setting";
	protected $fillable = ['key', 'value'];
	// 还是不使用locale key采用 city.key的方式
	// public $timestamps = false;
	public static function Has(String $key) {
		$res = static::where('key', $key)->count();
		return $res;
	}
	public static function Get(String $key, $value = null) {
		$res = static::where('key', $key)->first();
		return $res ? $res->value : $value;
	}
	public static function GetLike(String $key, Array $value = []) {
		$res = static::where('key', 'like', $key . '%')->get();
		return $res ?? $value;
	}
	public static function Set(String $key, $value) {
		// $query = new static();
		$res = static::updateOrCreate(['key' => $key], ['value' => $value]);
		return $res;
	}
	public static function Forget(String $key) {
		return static::where('key', $key)->delete();
	}
}
