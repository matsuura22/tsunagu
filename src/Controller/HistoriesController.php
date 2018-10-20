<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Utils\ImgGousei;
use Cake\ORM\TableRegistry;

/**
 * Histories Controller
 *
 * @property \App\Model\Table\HistoriesTable $Histories
 *
 * @method \App\Model\Entity\History[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HistoriesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
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
            $this->paginate = [
                'contain' => ['Users']
            ];
            $histories = $this->paginate($this->Histories);
            $this->set(compact('histories'));
        }
        else if($this->Auth->user('role') === 2)
        {
            $query = $this->Histories->find()->where(["Histories.department"=> "2"])->contain(['Users']);
            $this->set('histories',$this->paginate($query));
        }
        else
        {
            return $this->redirect(['controller'=>'top','action'=>'index']);
        }
    }

    /**
     * View method
     *
     * @param string|null $id History id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $history = $this->Histories->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('history', $history);
    }

    /**
     * pdf method
     *
     * @param string|null $id History id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function pdf($id = null)
    {
        $this->viewBuilder()->layout(''); 
        $this->layout = false;
        $this->RequestHandler->respondAs('pdf', ['charset' => 'UTF-8']);
        $history = $this->Histories->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('history', $history);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $history = $this->Histories->newEntity();
        if ($this->request->is('post')) {
            $history = $this->Histories->patchEntity($history, $this->request->getData());
            $pdfUrl = sha1(uniqid(rand(), true));
            $history['pdfUrl'] = $pdfUrl . '.png';
            $pdfcontent = $this->request->getData('pdfcontent');
            
            $response = @file_get_contents($history['imgUrl'], NULL, NULL, 0, 1);

            if ($response !== false) {
                if(exif_imagetype($history['imgUrl'])){
                    if(ImgGousei::image_gousei($history['imgUrl'],$history['postDate'],$pdfcontent,$history['pdfUrl'])== true)
                    {
                        if ($this->Histories->save($history)) {
                            $this->Flash->success(__('The history has been saved.'));
                            return $this->redirect(['action' => 'index']);
                        }
                    }
                }
            }
            $this->Flash->error(__('The history could not be saved. Please, try again.'));
        }
        $users = $this->Histories->Users->find('list', ['limit' => 200]);
        $this->set(compact('history', 'users'));
        $key_user_id = $this->Auth->user('id');
        $this->set('key_user_id', $key_user_id);
        $key_user_department = $this->Auth->user('department');
        $this->set('key_user_department', $key_user_department);
    }

    /**
     * Edit method
     *
     * @param string|null $id History id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $history = $this->Histories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $history = $this->Histories->patchEntity($history, $this->request->getData());
            $pdfcontent = $this->request->getData('pdfcontent');
            $response = @file_get_contents($history['imgUrl'], NULL, NULL, 0, 1);

            if ($response !== false) {
                if(exif_imagetype($history['imgUrl'])){
                    if(ImgGousei::image_gousei($history['imgUrl'],$history['postDate'],$pdfcontent,$history['pdfUrl'])== true)
                    {
                        if ($this->Histories->save($history)) {
                            $this->Flash->success(__('The history has been saved.'));
                            return $this->redirect(['action' => 'index']);
                        }
                    }
                }
            }
            $this->Flash->error(__('The history could not be saved. Please, try again.'));
        }
        $users = $this->Histories->Users->find('list', ['limit' => 200]);
        $this->set(compact('history', 'users'));
        $key_user_id = $this->Auth->user('id');
        $this->set('key_user_id', $key_user_id);
        $key_user_department = $this->Auth->user('department');
        $this->set('key_user_department', $key_user_department);
    }

    /**
     * Delete method
     *
     * @param string|null $id History id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $history = $this->Histories->get($id);
        if ($this->Histories->delete($history)) {
            $this->Flash->success(__('The history has been deleted.'));
        } else {
            $this->Flash->error(__('The history could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
