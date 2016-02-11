<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Anuncio Entity.
 *
 * @property int $id
 * @property int $plan_id
 * @property \App\Model\Entity\Plan $plan
 * @property int $plan_periodo
 * @property int $plan_tipo
 * @property int $status
 * @property \Cake\I18n\Time $vencimento
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Anuncio extends Entity
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
}
