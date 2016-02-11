<?php
namespace App\Model\Table;

use App\Model\Entity\Anuncio;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Anuncios Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Plans
 */
class AnunciosTable extends Table
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

        $this->table('anuncios');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Plans', [
            'foreignKey' => 'plan_id',
            'joinType' => 'INNER'
        ]);
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
            ->integer('plan_periodo')
            ->requirePresence('plan_periodo', 'create')
            ->notEmpty('plan_periodo');

        $validator
            ->integer('plan_tipo')
            ->requirePresence('plan_tipo', 'create')
            ->notEmpty('plan_tipo');

        $validator
            ->integer('status')
            ->allowEmpty('status');

        $validator
            ->dateTime('vencimento')
            ->requirePresence('vencimento', 'create')
            ->notEmpty('vencimento');

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
        $rules->add($rules->existsIn(['plan_id'], 'Plans'));
        return $rules;
    }
}
