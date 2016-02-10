<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AdvertisementsPending Entity.
 *
 * @property int $id
 * @property int $advertisement_id
 * @property \App\Model\Entity\Advertisement $advertisement
 * @property int $plan_id
 * @property \App\Model\Entity\Plan $plan
 * @property int $plan_periodo
 * @property int $plan_tipo
 * @property int $status
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class AdvertisementsPending extends Entity
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
        'plan_tipo_nome'
    ];

   
    private $_statusArray = [
        '-1' => 'Não iniciado',
        '0' => 'Iniciado',
        '1' => 'Pago'
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
        return $_statusArray[ $this->_properties['status'] ];
    }
}
