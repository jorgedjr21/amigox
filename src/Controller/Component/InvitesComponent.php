<?php
    namespace App\Controller\Component;

    use Cake\Controller\Component;
    use Cake\ORM\TableRegistry;

    class InvitesComponent extends Component{

        public function getUserGroupsInvites($uid){
            $userGroups = TableRegistry::get('UsersGroup');

            $invites = $userGroups->find()
                ->where(['user_id'=>$uid,'invite_status'=>0])
                ->contain(['Groups'])
                ->limit(10);
            return $invites;
        }
    }