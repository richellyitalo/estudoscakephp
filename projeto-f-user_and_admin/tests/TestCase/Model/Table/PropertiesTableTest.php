<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PropertiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PropertiesTable Test Case
 */
class PropertiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PropertiesTable
     */
    public $Properties;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.properties',
        'app.anuncios',
        'app.plans',
        'app.plans_properties',
        'app.users',
        'app.advertisements',
        'app.advertisements_historic'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Properties') ? [] : ['className' => 'App\Model\Table\PropertiesTable'];
        $this->Properties = TableRegistry::get('Properties', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Properties);

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

    /**
     * Test findNaoAnunciado method
     *
     * @return void
     */
    public function testFindNaoAnunciado()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test findAnunciado method
     *
     * @return void
     */
    public function testFindAnunciado()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test findPendente method
     *
     * @return void
     */
    public function testFindPendente()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test findVencido method
     *
     * @return void
     */
    public function testFindVencido()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
