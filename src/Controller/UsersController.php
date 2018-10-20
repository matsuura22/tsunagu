<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * role別にアクセスを制御したい場合はここに記述。全ロールに許可する場合はreturn trueとだけ書く
     */
    public function isAuthorized($user = null)
    {
        $action = $this->request->params['action'];

        if ($user['role'] === 1) {
            return true;
        } else {
        }
        return false;
    }

    /**
     * 認証不要なアクションを定義
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // ここにloginを追加してはならない
        // ソース：https://book.cakephp.org/3.0/en/tutorials-and-examples/blog-auth-example/auth.html
        $this->Auth->allow(['logout']);
    }

    /**
     * ログインアクション
     */
    public function login()
    {
        if($this->request->is('post')) 
        {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);

                if ($user['role'] === 1) {//管理者
                    return $this->redirect(['controller'=>'Users','action'=>'index']);
                }
                else if($user['role'] === 2){
                    return $this->redirect(['controller'=>'Top','action'=>'index']);
                }
                else
                {
                    return $this->redirect($this->Auth->redirectUrl());
                }
            }
            $this->Flash->error(__('idもしくはpasswordが間違っています'));
        }

        $user = $this->Auth->user();

        if(is_null($user)){
            
        //ログインしていない場合
        }else{
            if ($user['role'] === 1) {//管理者
                return $this->redirect(['controller'=>'Users','action'=>'index']);
            }
            else if($user['role'] === 2){
                return $this->redirect(['controller'=>'Top','action'=>'index']);
            }
        }

    }

    /**
     * ログアウトアクション
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if ($this->Auth->user('role') === 1)
        {
            $users = $this->paginate($this->Users);
            $this->set(compact('users'));
        }
        else
        {
            return $this->redirect(['controller'=>'top','action'=>'index']);
        }
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
            'contain' => []
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
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
