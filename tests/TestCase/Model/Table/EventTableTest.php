<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EventTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EventTable Test Case
 */
class EventTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EventTable
     */
    public $Event;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.event',
        'app.group_events',
        'app.groups',
        'app.lottery',
        'app.users_group',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Event') ? [] : ['className' => EventTable::class];
        $this->Event = TableRegistry::get('Event', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Event);

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
