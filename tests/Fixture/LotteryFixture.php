<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LotteryFixture
 *
 */
class LotteryFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'lottery';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'group_id' => ['type' => 'string', 'length' => 15, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'event_id' => ['type' => 'string', 'length' => 15, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user1' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user2' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_Lottery_Groups1_idx' => ['type' => 'index', 'columns' => ['group_id'], 'length' => []],
            'fk_Lottery_Users2_idx' => ['type' => 'index', 'columns' => ['user2'], 'length' => []],
            'fk_Lottery_Event1_idx' => ['type' => 'index', 'columns' => ['event_id'], 'length' => []],
            'fk_Lottery_Users1' => ['type' => 'index', 'columns' => ['user1'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['group_id', 'event_id', 'user1', 'user2'], 'length' => []],
            'fk_Lottery_Event1' => ['type' => 'foreign', 'columns' => ['event_id'], 'references' => ['event', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_Lottery_Groups1' => ['type' => 'foreign', 'columns' => ['group_id'], 'references' => ['groups', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_Lottery_Users1' => ['type' => 'foreign', 'columns' => ['user1'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_Lottery_Users2' => ['type' => 'foreign', 'columns' => ['user2'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'group_id' => '1abca27d-d6a1-4cd4-86aa-ab7ab64f1085',
            'event_id' => '1da13338-81d7-434e-b513-0076d930f5eb',
            'user1' => 1,
            'user2' => 1
        ],
    ];
}
