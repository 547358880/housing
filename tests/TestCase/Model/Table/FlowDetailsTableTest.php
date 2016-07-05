<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FlowDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FlowDetailsTable Test Case
 */
class FlowDetailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FlowDetailsTable
     */
    public $FlowDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.flow_details',
        'app.flows',
        'app.templates',
        'app.items',
        'app.streets',
        'app.areas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('FlowDetails') ? [] : ['className' => 'App\Model\Table\FlowDetailsTable'];
        $this->FlowDetails = TableRegistry::get('FlowDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FlowDetails);

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
