<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Plan Entity.
 *
 * @property int $id
 * @property string $titulo
 * @property int $periodo
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\Property[] $properties
 */
class Plan extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    protected $_virtual = [
        'tipo_nome'
    ];

    /**
     * Tipos de usuário permitidos
     * @var array
     */
    private $_tiposArray = [
        1 => 'Dia',
        2 => 'Mês'
    ];


    /*
    |--------------------------------------------------------------------------
    | Tipos permitidos
    |--------------------------------------------------------------------------
    */

    public function getTipos()
    {
        return $this->_tiposArray;
    }

    /*
    |--------------------------------------------------------------------------
    | Virtual fields
    |--------------------------------------------------------------------------
    */

    protected function _getTipoNome()
    {
        return $this->_tiposArray[ $this->_properties['tipo'] ];
    }


}
