<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MessagesNotificationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MessagesNotificationsTable Test Case
 */
class MessagesNotificationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MessagesNotificationsTable
     */
    public $MessagesNotifications;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.messages_notifications',
        'app.messages',
        'app.users',
        'app.users_group',
        'app.groups',
        'app.group_events',
        'app.event',
        'app.events_notifications',
        'app.lottery'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MessagesNotifications') ? [] : ['className' => MessagesNotificationsTable::class];
        $this->MessagesNotifications = TableRegistry::get('MessagesNotifications', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MessagesNotifications);

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
