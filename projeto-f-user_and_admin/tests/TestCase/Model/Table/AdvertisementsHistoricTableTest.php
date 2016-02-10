<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdvertisementsHistoricTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdvertisementsHistoricTable Test Case
 */
class AdvertisementsHistoricTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdvertisementsHistoricTable
     */
    public $AdvertisementsHistoric;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.advertisements_historic',
        'app.advertisements',
        'app.plans',
        'app.properties',
        'app.users',
        'app.plans_properties'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AdvertisementsHistoric') ? [] : ['className' => 'App\Model\Table\AdvertisementsHistoricTable'];
        $this->AdvertisementsHistoric = TableRegistry::get('AdvertisementsHistoric', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AdvertisementsHistoric);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
