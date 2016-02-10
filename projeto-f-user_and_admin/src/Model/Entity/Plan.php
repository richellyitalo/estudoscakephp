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

    /**
     * Tipos de usuário permitidos
     * @var array
     */
    private $_tiposArray = [
        1 => 'dia',
        2 => 'mes'
    ];


    /*
    |--------------------------------------------------------------------------
    | Tipos permitidos
    |--------------------------------------------------------------------------
    */
   
    public function getTiposAllow()
    {
        return $this->_tiposArray;
    }
}
