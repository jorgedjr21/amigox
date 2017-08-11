<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersGroupTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersGroupTable Test Case
 */
class UsersGroupTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersGroupTable
     */
    public $UsersGroup;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users_group',
        'app.users',
        'app.groups',
        'app.group_events',
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
        $config = TableRegistry::exists('UsersGroup') ? [] : ['className' => UsersGroupTable::class];
        $this->UsersGroup = TableRegistry::get('UsersGroup', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersGroup);

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
