<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PlansPropertiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlansPropertiesTable Test Case
 */
class PlansPropertiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PlansPropertiesTable
     */
    public $PlansProperties;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.plans_properties',
        'app.plans',
        'app.properties',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PlansProperties') ? [] : ['className' => 'App\Model\Table\PlansPropertiesTable'];
        $this->PlansProperties = TableRegistry::get('PlansProperties', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PlansProperties);

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
