<?php
/**
 * Created by PhpStorm.
 * User: jorge
 * Date: 12/08/2017
 * Time: 01:37
 */

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;


class NotificationsComponent extends Component
{

    public function getEventsNotificationsFromUser($uid){
        $eventNotificationTable = TableRegistry::get('EventsNotifications');

        $notifications = $eventNotificationTable
            ->find()
            ->where(['user_id'=>$uid,'status'=>0])
            ->contain(['Event'])
            ->limit(10);

        return $notifications;
    }
}