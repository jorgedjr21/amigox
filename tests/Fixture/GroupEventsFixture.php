<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * GroupEventsFixture
 *
 */
class GroupEventsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'group_id' => ['type' => 'string', 'length' => 15, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'event_id' => ['type' => 'string', 'length' => 15, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'fk_Group_Events_Event1_idx' => ['type' => 'index', 'columns' => ['event_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['group_id', 'event_id'], 'length' => []],
            'fk_Group_Events_Event1' => ['type' => 'foreign', 'columns' => ['event_id'], 'references' => ['event', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_Group_Events_Groups1' => ['type' => 'foreign', 'columns' => ['group_id'], 'references' => ['groups', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'group_id' => '2f4bfb72-b774-493a-a1f3-26f8cee78a77',
            'event_id' => 'ce59aca7-4742-47bf-9bbe-47ac45e7c356'
        ],
    ];
}
