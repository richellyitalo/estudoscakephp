<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Phones
 * @property \Cake\ORM\Association\HasMany $Phones
 */
class UsersTable extends Table
{

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
        $this->displayField('id');
        $this->primaryKey('id');

        /*$this->belongsTo('Phones', [
            'foreignKey' => 'phone_id'
        ]);*/

        $this->hasMany('Phones', [
            'foreignKey' => 'user_id'
        ]);

        $this->hasOne('Phone', [
            'className' => 'Phones',
            'conditions' => ['active' => true]
        ]);
/*
Solução 1

        //com campo phone_id no users
        $this->hasOne('Phone', [
            'className' => 'Phones',
            'bindingKey' => 'phone_id',
            'foreignKey' => 'id'
        ]);*/
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('nome');

        return $validator;
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
        $rules->add($rules->existsIn(['phone_id'], 'Phones'));
        return $rules;
    }

    public function beforeSave($event, $entity, $options)
    {
        $this->Phones->query()
            ->update()
            ->set(['active' => false])
            ->where(['user_id' => $entity->id])
            ->execute();
    }

    public function afterSave($event, $entity, $options)
    {
    }
}
