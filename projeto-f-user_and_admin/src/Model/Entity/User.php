<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity.
 *
 * @property int $id
 * @property string $nome
 * @property string $email
 * @property string $password
 * @property int $level
 * @property string $endereco
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
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

    /**
     * Fields that are excluded from JSON an array versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected $_virtual = [
        'role'
    ];

    /**
     * Tipos de usuário permitidos
     * @var array
     */
    private $_rolesArray = [
        1 => 'admin',
        2 => 'cliente'
    ];


    /**
     * **********************************************************
     * PRIVATE
     */

    /**
     * Retorna o level pelo tipo de usuário
     * @param  string $role
     * @return int
     */
    private function _getLevel($role)
    {
        return array_search($role, $this->_rolesArray);
    }

    /**
     * **********************************************************
     * ACCESSOR AND MUTATORS
     */
    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }

    /**
     * **********************************************************
     * VIRTUAL PROPERTIES
     */

    /**
     * Retorna o tipo de usuário:'tipo'
     * @return string
     */
    public function _getRole()
    {
        return $this->_rolesArray[$this->_properties['level']];
    }

    /**
     * **********************************************************
     * PUBLIC
     */
    public function setRole($role)
    {
        $this->set('level', $this->_getLevel($role));
    }
}
