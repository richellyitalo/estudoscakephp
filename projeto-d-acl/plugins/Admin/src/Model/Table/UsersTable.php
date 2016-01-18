<?php
namespace Admin\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\Query;

class UsersTable extends Table
{
	public function initialize(array $config)
	{
		$this->belongsTo('States');
		$this->belongsTo('Cities');
	}

	/**
	 * Find usado primeiramente pela autenticação
	 */
	public function findActive(Query $query, array $options)
	{
		$query
			->select(['id', 'email', 'password'])
			->where(['Users.active' => 1]);
		return $query;
	}
}