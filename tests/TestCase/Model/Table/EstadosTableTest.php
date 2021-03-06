<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EstadosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EstadosTable Test Case
 */
class EstadosTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.estados',
        'app.representantes',
        'app.cidades'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Estados') ? [] : ['className' => 'App\Model\Table\EstadosTable'];
        $this->Estados = TableRegistry::get('Estados', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Estados);

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
     * Test listar method
     *
     * @return void
     */
    public function testListar()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test listarCidadesPorEstados method
     *
     * @return void
     */
    public function testListarCidadesPorEstados()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buscar method
     *
     * @return void
     */
    public function testBuscar()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
