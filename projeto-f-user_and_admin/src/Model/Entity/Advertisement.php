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

    /*
    |--------------------------------------------------------------------------
    | Virtual Fields
    |--------------------------------------------------------------------------
    */

    /**
     * Returna true para o status em dia do anúncio.
     * NOW() < $anuncio->vencimento
     * @return boolean
     */
    protected function _getStatus()
    {
        return new Time() <= $this->_properties['vencimento'];
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

    /*
    |--------------------------------------------------------------------------
    | Funções complementares
    |--------------------------------------------------------------------------
    */

    /**
     * Define o prazo de vencimento do anúncio em dias a frente da data atual.
     * @param  int $days Dias a acrescer no vencimento
     * @param  int         $days [description]
     * @param  int|integer $tipo [1:dia, 2:mes]
     * @return void
     */
    public function definirVencimento($days, $tipo)
    {
        $tipoString = $tipo == 1 ? 'days' : 'months';
        $changeString = sprintf('+%s %s', $days, $tipoString);

        if ( $this->_isVencimentoAtrazado() ) {
            $newVencimento = new Time( $changeString );
        } else {
            $newVencimento = $this->_properties['vencimento']->modify( $changeString );
        }
        $this->set('vencimento', $newVencimento);
    }

    /**
     * Vencimento já passou da data atual,
     * ou não existe (para novos cadastros).
     * @return boolean [description]
     */
    private function _isVencimentoAtrazado()
    {
        return ! isset($this->_properties['vencimento'])
            || new Time > $this->_properties['vencimento'];
    }
}
