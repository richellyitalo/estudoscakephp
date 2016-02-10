<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

/**
 * Advertisement Entity.
 *
 * @property int $id
 * @property int $plan_id
 * @property \App\Model\Entity\Plan $plan
 * @property int $property_id
 * @property \App\Model\Entity\Property $property
 * @property \Cake\I18n\Time $prazo_final
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Advertisement extends Entity
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
     * Define o prazo de vencimento do anúncio em dias a frente da data atual.
     * @param  int $days Dias a acrescer no vencimento
     */
    public function definirVencimento($days)
    {
        if (! isset($this->_properties['vencimento'])
            || new Time > $this->_properties['vencimento']
            ) {
            $newVencimento = new Time( sprintf('+%s days', $days) );
        } else {
            $newVencimento = $this->_properties['vencimento']->modify( sprintf('+%s days', $days) );
        }
        $this->set('vencimento', $newVencimento);
    }

    /**
     * Returna true para o status em dia do anúncio.
     * NOW() < $anuncio->vencimento
     * @return boolean
     */
    protected function _getStatus()
    {
        return new Time() < $this->_properties['vencimento'];
    }

    /**
     * Retorna o status nomenclaturamente: 'Em dias', 'Vencido'
     * @return string
     */
    protected function _getStatusForHuman()
    {
        if ($this->_getStatus()) {
            return 'Em dias';
        }
        return 'Vencido';
    }
}
