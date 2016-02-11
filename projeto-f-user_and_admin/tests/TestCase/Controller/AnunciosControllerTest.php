<?php
namespace App\Test\TestCase\Controller;

use App\Controller\AnunciosController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\AnunciosController Test Case
 */
class AnunciosControllerTest extends IntegrationTestCase
{

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
        'app.advertisements_pending',
        'app.plans_properties'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
