<?php
namespace App\Model\Table;

use App\Model\Entity\Advertisement;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\I18n\Time;

/**
 * Advertisements Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Plans
 * @property \Cake\ORM\Association\BelongsTo $Properties
 */
class AdvertisementsTable extends Table
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

        $this->table('advertisements');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('AdvertisementsHistoric', [
            'targetForeignKey' => 'advertisement_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Plans', [
            'foreignKey' => 'plan_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Properties', [
            'foreignKey' => 'property_id',
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
        $rules->add($rules->existsIn(['property_id'], 'Properties'));
        return $rules;
    }

    /*
    |--------------------------------------------------------------------------
    | Finders
    |--------------------------------------------------------------------------
    */

    public function findValido(Query $query, array $options)
    {
        return $query->where(['Advertisements.vencimento >' => new Time]);
    }

    public function findInvalido(Query $query, array $options)
    {
        return $query->where(['Advertisements.vencimento <' => new Time]);
    }

    /*
    |--------------------------------------------------------------------------
    | Befores
    |--------------------------------------------------------------------------
    */

    public function beforeSave($event, $entity, $options)
    {
        if ($entity->isNew() || $options['renew']) {
            $entity = $this->_definirVencimentoAnuncio($entity);
        }
    }

    public function afterSave($event, $entity, $options)
    {
        if ($entity->isnew() || $options['renew']) {
            $newHistoricoData = array_merge($entity->toArray(), ['advertisement_id' => $entity->id]);
            $newHistorico = $this->AdvertisementsHistoric->newEntity($newHistoricoData, ['associated' => false]);
            $this->AdvertisementsHistoric->save($newHistorico);
        }
    }

    private function _definirVencimentoAnuncio($entity)
    {
        $plan = $this->Plans->get($entity->plan_id);
        $entity->definirVencimento($plan->periodo);
        return $entity;
    }
}
