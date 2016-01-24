<?php
namespace App\Model\Table;

use App\Model\Entity\Property;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Properties Model
 *
 */
class PropertiesTable extends Table
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

        $this->table('properties');
        $this->displayField('name');
        $this->primaryKey('id');

        /*$this->belongsToMany('Areas');
        $this->belongsToMany('CommonAreasProperties', [
            'though' => 'CommonAreasProperties'
        ]);*/

        $this->belongsToMany('Areas', [
            'className' => 'Areas',
            'foreignKey' => 'property_id',
            'targetForeignKey' => 'area_id',
            'joinTable' => 'areas_properties'
        ]);

        $this->belongsToMany('CommonAreas', [
            'className' => 'Areas',
            'foreignKey' => 'property_id',
            'targetForeignKey' => 'area_id',
            'joinTable' => 'areas_properties',
            'though' => 'AreasProperties'
        ]);

        $this->belongsToMany('PrivateAreas', [
            'className' => 'Areas',
            'foreignKey' => 'property_id',
            'targetForeignKey' => 'area_id',
            'joinTable' => 'areas_properties',
            'though' => 'AreasProperties'
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }

    public function beforeSave($event, $entity, $config)
    {
    }
}
