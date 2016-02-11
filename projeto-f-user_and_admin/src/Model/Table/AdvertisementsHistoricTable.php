<?php
namespace App\Model\Table;

use App\Model\Entity\AdvertisementsHistoric;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdvertisementsHistoric Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Advertisements
 * @property \Cake\ORM\Association\BelongsTo $Plans
 * @property \Cake\ORM\Association\BelongsTo $Properties
 */
class AdvertisementsHistoricTable extends Table
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

        $this->table('advertisements_historic');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Advertisements', [
            'foreignKey' => 'advertisement_id',
            'joinType' => 'INNER'
        ]);
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
            ->allowEmpty('vencimento');

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
        $rules->add($rules->existsIn(['advertisement_id'], 'Advertisements'));
        $rules->add($rules->existsIn(['plan_id'], 'Plans'));
        return $rules;
    }

    /*
    |--------------------------------------------------------------------------
    | Before's
    |--------------------------------------------------------------------------
    */

    public function beforeSave($event, $entity, $options)
    {
        if ($entity->status == AdvertisementsHistoric::PAGO)
        {
            $advertisementsHistoricPendingEntity = $this->get($entity->id, ['contain' => 'Advertisements']);

            $advertisement = $advertisementsHistoricPendingEntity->advertisement;
            $advertisement->definirVencimento($entity->plan_periodo, $entity->plan_tipo);
            $advertisement->plan_id = $entity->plan_id;

            $this->Advertisements->save($advertisement, ['associated' => false]);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Finders
    |--------------------------------------------------------------------------
    */
   
    public function findPending(Query $query, array $options)
    {
        return $query->where(['status' => AdvertisementsHistoric::PENDENTE]);
    }

    public function findAccomplished(Query $query, array $options)
    {
        return $query->where(['status' => AdvertisementsHistoric::PAGO]);
    }
}
