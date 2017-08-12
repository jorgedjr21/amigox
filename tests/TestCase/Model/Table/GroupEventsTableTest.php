<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GroupEventsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GroupEventsTable Test Case
 */
class GroupEventsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GroupEventsTable
     */
    public $GroupEvents;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.group_events',
        'app.groups',
        'app.lottery',
        'app.users_group',
        'app.users',
        'app.event'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('GroupEvents') ? [] : ['className' => GroupEventsTable::class];
        $this->GroupEvents = TableRegistry::get('GroupEvents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GroupEvents);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
