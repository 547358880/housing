<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FlowsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FlowsTable Test Case
 */
class FlowsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FlowsTable
     */
    public $Flows;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.flows',
        'app.templates',
        'app.items',
        'app.streets',
        'app.flow_details'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Flows') ? [] : ['className' => 'App\Model\Table\FlowsTable'];
        $this->Flows = TableRegistry::get('Flows', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Flows);

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
