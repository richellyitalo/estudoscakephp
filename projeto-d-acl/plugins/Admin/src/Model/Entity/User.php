<?php
namespace Admin\Model\Entity;

use Cake\ORM\Entity;
use Cake\Utility\Text;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity.
 *
 * @property int $id
 * @property string $email
 * @property string $name
 * @property string $cep
 * @property int $state_id
 * @property \Admin\Model\Entity\State $state
 * @property int $city_id
 * @property \Admin\Model\Entity\City $city
 * @property string $address
 * @property string $district
 * @property string $number
 * @property int $active
 * @property int $role
 * @property string $password
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Admin\Model\Entity\UserPhone[] $user_phones
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

    public function setUserCliente($active = false)
    {
        $this->set('role', 2);
        $this->set('active', (int) $active);
        $this->set('token', Text::uuid());
    }

    public function activateUserCliente()
    {
        $this->set('active', 1);
        $this->set('token', null);
    }

    public function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }
}
