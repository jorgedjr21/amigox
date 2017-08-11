<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\User;
use App\Model\Table\UsersTable;
use Cake\Routing\Router;
use Cake\Validation\Validator;

/**
 * Register Controller
 *
 *
 * */

class RegisterController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('/login');
        $this->Auth->allow(['index', 'view','add']);
    }

    /**
     * Index method
     * Shows the register form
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $url = Router::url(['_name' => 'register.create']);
        $this->set('url',$url);
    }


}
