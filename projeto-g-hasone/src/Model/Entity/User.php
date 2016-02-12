<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use App\Model\Entity\Phone;

/**
 * User Entity.
 *
 * @property int $id
 * @property int $phone_id
 * @property string $nome
 * @property \App\Model\Entity\Phone[] $phones
 */
class User extends Entity
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

    protected function _setPhone(Phone $phone)
    {
        $phone->active = true;

        return $phone;
    }
}
