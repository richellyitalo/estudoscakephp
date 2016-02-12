<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\I18n\Time;

/**
 * Anuncio Entity.
 *
 * @property int $id
 * @property int $plan_id
 * @property \App\Model\Entity\Plan $plan
 * @property int $property_id
 * @property int $plan_periodo
 * @property int $plan_tipo
 * @property int $status
 * @property \Cake\I18n\Time $vencimento
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\Property[] $properties
 */
class Anuncio extends Entity
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
        'plan_tipo_nome',
        'vencido'
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

    /**
     * Retorna o status nomenclaturamente: 'Em dias', 'Vencido'
     * @return string
     */
    protected function _getVencimentoForHuman()
    {
        if ($this->_getVencido()) {
            return 'Em dias';
        }
        return 'Vencido';
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

    protected function _getVencido()
    {
        return new Time() > $this->_properties['vencimento'];
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
    public function setVencimento2($days, $tipo)
    {
        $tipoString = $tipo == 1 ? 'days' : 'months';
        $changeString = sprintf('+%s %s', $days, $tipoString);

        if ( $this->_isVencido() ) {
            $newVencimento = new Time( $changeString );
        } else {
            $newVencimento = $this->_properties['vencimento']->modify( $changeString );
        }
        $this->set('vencimento', $newVencimento);
    }

    /**
     * Define o prazo de vencimento do anúncio em dias a frente da data atual.
     * @param  int $days Dias a acrescer no vencimento
     * @param  int         $days [description]
     * @param  int|integer $tipo [1:dia, 2:mes]
     * @return void
     */
    public function setVencimentoOrConcat(Anuncio $entity = null)
    {
        $periodo = $this->_properties['plan_periodo'];
        $tipo = $this->_properties['plan_tipo'];

        $tipoString = $tipo == 1 ? 'days' : 'months';
        $changeString = sprintf('+%s %s', $periodo, $tipoString);

        if ($entity == null || $entity->vencido) {
            $newVencimento = new Time( $changeString );
        } else {
            $newVencimento = $entity->_properties['vencimento']->modify( $changeString );
        }

        $this->set('vencimento', $newVencimento);
    }

    /**
     * Vencimento já passou da data atual,
     * ou não existe (para novos cadastros).
     * @return boolean [description]
     */
    private function _isVencido()
    {
        return ! isset($this->_properties['vencimento'])
            || new Time > $this->_properties['vencimento'];
    }
}
