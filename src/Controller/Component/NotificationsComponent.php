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

    public function saveEventsNotifications($data){

        $eventTable = TableRegistry::get('Event');
        $eventsNotif = $eventTable->EventsNotifications->newEntities($data);
        $eventTable->EventsNotifications->saveMany($eventsNotif);

        return true;
    }

    public function getSortNotificationsFromUser($uid){
        $eventNotificationTable = TableRegistry::get('EventsNotifications');

        $notifications = $eventNotificationTable
            ->find()
            ->where(['user_id'=>$uid,'status'=>10])
            ->contain(['Event'])
            ->limit(10);

        return $notifications;
    }

    public function saveMessagesNotifications($data){

        $messagesNotificationTable = TableRegistry::get('MessagesNotifications');
        $messagesNotif = $messagesNotificationTable->newEntities($data);
        $messagesNotificationTable->saveMany($messagesNotif);

        return true;
    }

    public function getMessageNotificationsFromUser($uid){
        $messageNotifications = TableRegistry::get('MessagesNotifications');

        $notifications = $messageNotifications
            ->find()
            ->where(['MessagesNotifications.user_id'=>$uid,'MessagesNotifications.status'=>0])
            ->contain(['Messages','Groups','Users'])
            ->orderAsc('datetime')
            ->limit(10);

        return $notifications;
    }
}