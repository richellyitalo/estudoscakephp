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
 * @property \Cake\ORM\Association\BelongsTo $Anuncios
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $Advertisements
 * @property \Cake\ORM\Association\HasMany $Anuncios
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
        $this->displayField('titulo');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        // $this->belongsTo('Advertisements');
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Anuncios', [
            'foreignKey' => 'property_id'
        ]);
        $this->hasOne('Anuncio', [
            'className' => 'Anuncios',
            'conditions' => ['Anuncio.active' => true]
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
            ->requirePresence('endereco', 'create')
            ->notEmpty('endereco');

        $validator
            ->integer('quartos')
            ->requirePresence('quartos', 'create')
            ->notEmpty('quartos');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }

    /*
    |--------------------------------------------------------------------------
    | Finders
    |--------------------------------------------------------------------------
    */

    public function findNaoAnunciado(Query $query, array $options)
    {
        return $query->notMatching('Anuncio');
    }

    public function findAnunciado(Query $query, array $options)
    {
        return $query->matching('Anuncio', function ($q)
            {
                return $q->find('valido');
            });
    }

    public function findPendente(Query $query, array $options)
    {
        return $query->matching('Anuncio', function ($q)
            {
                return $q->find('pendente');
            });
    }

    public function findPendentes(Query $query, array $options)
    {
        return $query->matching('Anuncios', function ($q)
            {
                return $q->find('pendente');
            });
    }

    public function findVencido(Query $query, array $options)
    {
        return $query->matching('Anuncio', function ($q)
            {
                return $q->find('vencido');
            });
    }
}
