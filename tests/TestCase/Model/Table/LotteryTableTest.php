<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LotteryTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LotteryTable Test Case
 */
class LotteryTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LotteryTable
     */
    public $Lottery;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.lottery',
        'app.groups',
        'app.group_events',
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
        $config = TableRegistry::exists('Lottery') ? [] : ['className' => LotteryTable::class];
        $this->Lottery = TableRegistry::get('Lottery', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Lottery);

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
