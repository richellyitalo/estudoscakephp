<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AdvertisementsHistoric Entity.
 *
 * @property int $id
 * @property int $advertisement_id
 * @property \App\Model\Entity\Advertisement $advertisement
 * @property int $plan_id
 * @property \App\Model\Entity\Plan $plan
 * @property int $property_id
 * @property \App\Model\Entity\Property $property
 * @property int $plan_periodo
 * @property int $plan_tipo
 * @property int $status
 * @property \Cake\I18n\Time $vencimento
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class AdvertisementsHistoric extends Entity
{

    /*
    |--------------------------------------------------------------------------
    | Constantes
    |--------------------------------------------------------------------------
    */

    const PENDENTE = '0';
    const PAGO = '1';

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
        'plan_tipo_nome'
    ];

   
    private $_statusArray = [
        self::PENDENTE => 'Pendente',
        self::PAGO => 'Pago'
    ];

    /*
    |--------------------------------------------------------------------------
    | Funções Públicas
    |--------------------------------------------------------------------------
    */

    public function getStatus()
    {
        return $_statusArray;
    }

    /*
    |--------------------------------------------------------------------------
    | Virtual Fields
    |--------------------------------------------------------------------------
    */

    protected function _getPlanTipoNome()
    {
        $plan = new Plan();
        $tiposArray = $plan->getTipos();

        return $tiposArray[ $this->_properties['plan_tipo'] ];
    }

    protected function _getStatusNome()
    {
        return $this->_statusArray[ $this->_properties['status'] ];
    }
}
