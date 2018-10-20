<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Notice Controller
 *
 *
 * @method \App\Model\Entity\Notice[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NoticeController extends AppController
{
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
        $events_table = TableRegistry::get('events');
        $events = $events_table
            ->find()
            ->where(["department" => $department])
            ->order(["startDate"=>"Desc"])
            ->limit(10);
        $this->set(compact('events'));

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
     * @param string|null $id Notice id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
    }
}
