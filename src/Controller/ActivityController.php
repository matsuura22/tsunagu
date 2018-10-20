<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event; // 追加


/**
 * Activity Controller
 *
 *
 * @method \App\Model\Entity\Activity[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ActivityController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        return true;
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // ここにloginを追加してはならない
        // ソース：https://book.cakephp.org/3.0/en/tutorials-and-examples/blog-auth-example/auth.html
        $this->Auth->allow(['index', 'pdf']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $department = $this->request->query('department');
        $panel;
        $CodeForName;
        $histories_table = TableRegistry::get('histories');
        $histories = $histories_table
            ->find()
            ->where(["department" => $department])
            ->order(["postDate"=>"Desc"])
            ->limit(10);
        $this->set(compact('histories'));

        switch ($department) {
            case 1:
                $panel = "panel panel-warning";
                $CodeForName = "その他";
                break;
            case 2:
                $panel = "panel panel-green";
                $CodeForName = "Code For 生駒";
                break;
            case 3:
                $panel = "panel panel-yellow";
                $CodeForName = "Code For 奈良";
                break;
            case 4:
                $panel = "panel panel-success";
                $CodeForName = "Code For 大和郡山";
                break;
            case 5:
                $panel = "panel panel-info";
                $CodeForName = "Code For 三郷";
                break;
        }

        $this->set('department',$department);
        $this->set('panel',$panel);
        $this->set('CodeForName',$CodeForName);
    }

    /**
     * View method
     *
     * @param string|null $id Activity id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
    }

    /**
     * Pdf method
     *
     * @param string|null $id Activity id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function pdf()
    {
        // $this->viewBuilder()->layout(''); 
        $this->layout = false;
        $this->RequestHandler->respondAs('pdf', ['charset' => 'UTF-8']);

        $pdfUrl = $this->request->query('pdfUrl');
        $this->set('pdfUrl', $pdfUrl);
    }
}
