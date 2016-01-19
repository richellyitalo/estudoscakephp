<?php
namespace Admin\Model\Table;

use Admin\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $States
 * @property \Cake\ORM\Association\BelongsTo $Cities
 * @property \Cake\ORM\Association\HasMany $UserPhones
 */
class UsersTable extends Table
{
	private $allows = [
		'role' => [
			'1' => 'Administrador',
			'2' => 'Cliente'
		]
	];

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('users');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('States', [
            'foreignKey' => 'state_id',
            'className' => 'Admin.States'
        ]);
        $this->belongsTo('Cities', [
            'foreignKey' => 'city_id',
            'className' => 'Admin.Cities'
        ]);
        $this->hasMany('UserPhones', [
            'foreignKey' => 'user_id',
            'className' => 'Admin.UserPhones'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationRegisterCustomer(Validator $validator)
    {
    	$requiredMessage = 'Campo obrigatório';
    	$invalidMessage = 'Informação inválida';
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create')

            ->add('email', 'valid', ['rule' => 'email', 'message' => $invalidMessage])
            ->requirePresence('email', 'create')
            ->notEmpty('email', $requiredMessage)
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table'])

            ->requirePresence('name', 'create')
            ->notEmpty('name', $requiredMessage)

            ->notEmpty('cep', $requiredMessage)

            ->notEmpty('address', $requiredMessage)

            ->notEmpty('district', $requiredMessage)

            ->notEmpty('number', $requiredMessage)

            ->add('active', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('active')

            ->add('role', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('role')

            ->requirePresence('password', 'create')
            ->notEmpty('password');

        return $validator;
    }

	/**
	 * @todo
	 * Aqui será acrescido o id do usuário logado
	 * @param  [type] $event   [description]
	 * @param  [type] $entity  [description]
	 * @param  [type] $options [description]
	 * @return [type]          [description]
	 */
	public function beforeSave($event, $entity, $options)
	{
	}

	/**
	 */
	public function afterSave($event, $entity, $options)
	{
		// Enviar email
	}

	/**
	 * Find usado primeiramente pela autenticação
	 */
	public function findAdmin(Query $query, array $options)
	{
		$query
			->select(['id', 'email', 'password'])
			->where(['active' => 1, 'role' => 1]);
		return $query;
	}

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['state_id'], 'States'));
        $rules->add($rules->existsIn(['city_id'], 'Cities'));
        return $rules;
    }
}
