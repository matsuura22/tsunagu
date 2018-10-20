<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Events Controller
 *
 * @property \App\Model\Table\EventsTable $Events
 *
 * @method \App\Model\Entity\Event[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EventsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if ($this->Auth->user('role') === 1)
        {
            $this->paginate = [
                'contain' => ['Users']
            ];
            $events = $this->paginate($this->Events);
            $this->set(compact('events'));
        }
        else if($this->Auth->user('role') === 2)
        {
            $query = $this->Events->find()->where(["Events.department"=> "2"])->contain(['Users']);
            $this->set('events',$this->paginate($query));
        }
        else
        {
            return $this->redirect(['controller'=>'top','action'=>'index']);
        }
    }

    /**
     * View method
     *
     * @param string|null $id Event id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $event = $this->Events->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('event', $event);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $event = $this->Events->newEntity();
        if ($this->request->is('post')) {
            $event = $this->Events->patchEntity($event, $this->request->getData());
            if ($this->Events->save($event)) {
                $this->Flash->success(__('The event has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The event could not be saved. Please, try again.'));
        }
        $users = $this->Events->Users->find('list', ['limit' => 200]);
        $this->set(compact('event', 'users'));
        $key_user_id = $this->Auth->user('id');
        $this->set('key_user_id', $key_user_id);
        
        $key_user_department = $this->Auth->user('department');
        $this->set('key_user_department', $key_user_department);
    }

    /**
     * Edit method
     *
     * @param string|null $id Event id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $event = $this->Events->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $event = $this->Events->patchEntity($event, $this->request->getData());
            if ($this->Events->save($event)) {
                $this->Flash->success(__('The event has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The event could not be saved. Please, try again.'));
        }

        if($this->Auth->user('role') === 2) {
            if($event['department'] == $this->Auth->user('department'))
            {
            }
            else
            {
                return $this->redirect(['controller'=>'Events','action'=>'index']);
            }
        }

        $users = $this->Events->Users->find('list', ['limit' => 200]);
        $this->set(compact('event', 'users'));

        $key_user_id = $this->Auth->user('id');
        $this->set('key_user_id', $key_user_id);
        
        $key_user_department = $this->Auth->user('department');
        $this->set('key_user_department', $key_user_department);
    }

    /**
     * Delete method
     *
     * @param string|null $id Event id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $event = $this->Events->get($id);
        if ($this->Events->delete($event)) {
            $this->Flash->success(__('The event has been deleted.'));
        } else {
            $this->Flash->error(__('The event could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
