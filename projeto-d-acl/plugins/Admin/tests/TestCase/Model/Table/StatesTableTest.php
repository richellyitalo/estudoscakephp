<?php
namespace Admin\Test\TestCase\Model\Table;

use Admin\Model\Table\StatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Admin\Model\Table\StatesTable Test Case
 */
class StatesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.admin.states',
        'plugin.admin.cities',
        'plugin.admin.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('States') ? [] : ['className' => 'Admin\Model\Table\StatesTable'];
        $this->States = TableRegistry::get('States', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->States);

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
}
