<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConfigsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConfigsTable Test Case
 */
class ConfigsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ConfigsTable
     */
    public $Configs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.configs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Configs') ? [] : ['className' => 'App\Model\Table\ConfigsTable'];
        $this->Configs = TableRegistry::get('Configs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Configs);

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
