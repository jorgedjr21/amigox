<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Table\UsersTable;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    private $user;
    private $invites;
    private $eventNotifications;

    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->loadComponent('Invites');
        $this->loadComponent('Notifications');

        $this->Auth->allow(['index', 'view','add']);

    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {

        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    public function dashboard(){
        $this->user = $this->Auth->user();
        $query = TableRegistry::get('Users');
        $this->invites = $this->Invites->getUserGroupsInvites($this->user['id']);
        $this->eventNotifications = $this->Notifications->getEventsNotificationsFromUser($this->user['id']);

        $myGroyps = $query->find('all')->where(['id'=>$this->user['id']])->matching('UsersGroup',function($q){
            return $q->where(['UsersGroup.user_id'=>$this->user['id'],'UsersGroup.invite_status'=>1]);
        })->count();

        $this->set('invites',$this->invites);
        $this->set('eventNotifications',$this->eventNotifications);
        $this->set('user',$this->Auth->user());
        $this->set('myGroups',$myGroyps);
    }
    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['UsersGroup']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    /*public function add()
    {

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }*/

    public function add()
    {

        if($this->request->is('post')){
            $data = $this->request->getData();

            if(isset($data['preferences'])){
                foreach($data['preferences'] as $key => $preference){
                    if($preference == '0'){
                        unset($data['preferences'][$key]);
                    }
                }
                sort($data['preferences']);
                $data['preferences'] = ($data['preferences'] != '') ? implode(',',$data['preferences']) : '';
            }else {
                $data['preferences'] = '';
            }

            $user = $this->Users->newEntity($data);
            if($user->getErrors()){
                //$errorMessages = [];

                $this->Flash->error('Não foi possivel cadastrar', ['params'=>['errors'=>$user->getErrors()]]);

                return $this->redirect('/register');
            }else{
                $data['max_value'] = ($data['max_value'] == '' ) ? 'Sem preferência' : $data['max_value'];

                $this->Users->save($user);
                $this->Flash->success(__('Cadastro realizado com sucesso!'));
                return $this->redirect('/login');
            }

        }
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
