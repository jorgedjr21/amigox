<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Lottery Entity
 *
 * @property string $group_id
 * @property int $user1
 * @property int $user2
 *
 * @property \App\Model\Entity\Group $group
 */
class Lottery extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'group_id' => true,
        'user1' => true,
        'user2' => true
    ];
}
