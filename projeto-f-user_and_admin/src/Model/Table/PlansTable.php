<?php
namespace App\Model\Table;

use App\Model\Entity\Plan;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Plans Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Properties
 */
class PlansTable extends Table
{
    /**
     * Valores padrões de campos inteiros
     * @var array
     */
    private $_valuesAllow = [
        'tipo' => [
            '1' => 'Dia',
            '2' => 'Mês'
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

        $this->table('plans');
        $this->displayField('titulo');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Properties', [
            'foreignKey' => 'plan_id',
            'targetForeignKey' => 'property_id',
            'joinTable' => 'plans_properties'
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
            ->requirePresence('titulo', 'create')
            ->notEmpty('titulo');

        $validator
            ->requirePresence('tipo', 'create')
            ->notEmpty('tipo');

        $validator
            ->integer('periodo')
            ->requirePresence('periodo', 'create')
            ->notEmpty('periodo');

        return $validator;
    }

    /*
    |--------------------------------------------------------------------------
    | Valores de campos inteiros
    |--------------------------------------------------------------------------
    | Valores para select de inputs inteiros.
    */

    /**
     * Tipos permitidos no campo
     * @return array
     */
    public function getTipoAllow()
    {
        return $this->_valuesAllow['tipo'];
    }
}
