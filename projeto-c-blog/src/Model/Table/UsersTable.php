<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
	public function validationDefault(Validator $validator)
	{
		return $validator
			->notEmpty('username', 'Um usuário é necessário')
			->notEmpty('password', 'Uma senha é necessário')
			->notEmpty('role', 'Um perfil é necessário')
			->add('role', 'inList', [
				'rule' => ['inList', ['admin', 'author']],
				'message' => 'Por favor entre com um perfil válido'
			]);

	}
}