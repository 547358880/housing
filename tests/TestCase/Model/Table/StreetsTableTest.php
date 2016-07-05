<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StreetsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StreetsTable Test Case
 */
class StreetsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StreetsTable
     */
    public $Streets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.streets',
        'app.items',
        'app.flows',
        'app.templates',
        'app.flow_details',
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
        $config = TableRegistry::exists('Streets') ? [] : ['className' => 'App\Model\Table\StreetsTable'];
        $this->Streets = TableRegistry::get('Streets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Streets);

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
