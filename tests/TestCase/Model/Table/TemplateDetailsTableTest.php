<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TemplateDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TemplateDetailsTable Test Case
 */
class TemplateDetailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TemplateDetailsTable
     */
    public $TemplateDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.template_details',
        'app.templates'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TemplateDetails') ? [] : ['className' => 'App\Model\Table\TemplateDetailsTable'];
        $this->TemplateDetails = TableRegistry::get('TemplateDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TemplateDetails);

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
