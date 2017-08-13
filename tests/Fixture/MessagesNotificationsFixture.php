<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MessagesNotificationsFixture
 *
 */
class MessagesNotificationsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'message_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'group_id' => ['type' => 'string', 'length' => 15, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'status' => ['type' => 'integer', 'length' => 2, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_Messages_Notifications_Messages1_idx' => ['type' => 'index', 'columns' => ['message_id'], 'length' => []],
            'fk_Messages_Notifications_Groups1_idx' => ['type' => 'index', 'columns' => ['group_id'], 'length' => []],
            'fk_Messages_Notifications_Users1' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['message_id', 'user_id', 'group_id'], 'length' => []],
            'fk_Messages_Notifications_Groups1' => ['type' => 'foreign', 'columns' => ['group_id'], 'references' => ['groups', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_Messages_Notifications_Messages1' => ['type' => 'foreign', 'columns' => ['message_id'], 'references' => ['messages', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_Messages_Notifications_Users1' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'message_id' => 1,
            'user_id' => 1,
            'group_id' => 'b4eddec1-4316-4ab4-b9d2-d222abacfbcd',
            'status' => 1
        ],
    ];
}
