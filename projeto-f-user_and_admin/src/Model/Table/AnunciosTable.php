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
 * @property \Cake\ORM\Association\HasMany $Properties
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
        $this->belongsTo('Properties', [
            'foreignKey' => 'property_id'
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
            ->allowEmpty('plan_periodo');

        $validator
            ->integer('plan_tipo')
            ->allowEmpty('plan_tipo');

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
        if ($entity->isNew()) {
            $this->_setValoresDoPlano($entity);
        }

        if ($entity->status == Anuncio::PAGO)
        {
            $this->_setVencimentoAndDefineOneActive($entity);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Finders
    |--------------------------------------------------------------------------
    */

    public function findPago(Query $query, array $options)
    {
        return $query->where([
            'status' => Anuncio::PAGO
        ]);
    }

    public function findValido(Query $query, array $options)
    {
        return $query->find('pago')
            ->where([
                'vencimento >=' => $query->func()->now()
            ]);
    }

    public function findVencido(Query $query, array $options)
    {
        return $query->find('pago')
            ->where([
                'vencimento <' => $query->func()->now()
            ]);
    }

    public function findPendente(Query $query, array $options)
    {
        return $query->where(['status' => Anuncio::PENDENTE]);
    }

    /*
    |--------------------------------------------------------------------------
    | Funções Privadas
    |--------------------------------------------------------------------------
    */
   
    private function _setVencimentoAndDefineOneActive(Anuncio &$entity)
    {
        $property = $this->Properties->get($entity->property_id, [
            'contain' => ['Anuncio']
        ]);
        $entity->setVencimentoOrConcat($property->anuncio);

        $this->Properties->Anuncios->query()
            ->update()
            ->set(['active' => false])
            ->where(['property_id' => $entity->property_id])
            ->execute();

        $entity->active = true;
    }

    private function _setValoresDoPlano(Anuncio &$entity) {
        $planTable = $this->Plans->get($entity->plan_id);

        $entity->plan_periodo = $planTable->periodo;
        $entity->plan_tipo = $planTable->tipo;
    }
}
