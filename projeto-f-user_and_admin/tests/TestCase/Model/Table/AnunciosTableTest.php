<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AnunciosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AnunciosTable Test Case
 */
class AnunciosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AnunciosTable
     */
    public $Anuncios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.anuncios',
        'app.plans',
        'app.properties',
        'app.users',
        'app.advertisements',
        'app.advertisements_historic',
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
        $config = TableRegistry::exists('Anuncios') ? [] : ['className' => 'App\Model\Table\AnunciosTable'];
        $this->Anuncios = TableRegistry::get('Anuncios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Anuncios);

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
     * Test beforeSave method
     *
     * @return void
     */
    public function testBeforeSave()
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
     * Test findEfetuado method
     *
     * @return void
     */
    public function testFindEfetuado()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
