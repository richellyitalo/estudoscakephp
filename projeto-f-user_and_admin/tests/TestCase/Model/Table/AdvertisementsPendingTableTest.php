<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdvertisementsPendingTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdvertisementsPendingTable Test Case
 */
class AdvertisementsPendingTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdvertisementsPendingTable
     */
    public $AdvertisementsPending;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.advertisements_pending',
        'app.advertisements',
        'app.advertisements_historic',
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
        $config = TableRegistry::exists('AdvertisementsPending') ? [] : ['className' => 'App\Model\Table\AdvertisementsPendingTable'];
        $this->AdvertisementsPending = TableRegistry::get('AdvertisementsPending', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AdvertisementsPending);

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
