<?php
namespace Base\Models;
use \Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel {
	public function scopePage($query, $req) {
		// 无法实例化 整个传过来
		// $select = $req->getRequestParam('select') ?? '*';
		$pageSize = (int) $req->getRequestParam('per_page') ?? 10;
		$page = (int) $req->getRequestParam('page') ?? 1;
		$paginator = $query->paginate($pageSize, ['*'], 'page', $page);
		$paginator->setPath($req->getServerParams()['request_uri']);
		return $paginator;
	}
}