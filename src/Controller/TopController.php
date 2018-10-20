<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Tops Controller
 *
 *
 * @method \App\Model\Entity\Top[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TopController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $cf_table = TableRegistry::get('events');
        $cfikoma = $cf_table->find()->where(["department"=>"2"])->order(["startDate"=>"Desc"])->limit(1);
        $this->set(compact('cfikoma'));

        $cfnara = $cf_table->find()->where(["department"=>"3"])->order(["startDate"=>"Desc"])->limit(1);
        $this->set(compact('cfnara'));

        $cfyamatokoriyama = $cf_table->find()->where(["department"=>"4"])->order(["startDate"=>"Desc"])->limit(1);
        $this->set(compact('cfyamatokoriyama'));

        $cfsango = $cf_table->find()->where(["department"=>"5"])->order(["startDate"=>"Desc"])->limit(1);
        $this->set(compact('cfsango'));

        $cfex = $cf_table->find()->where(["department"=>"1"])->order(["startDate"=>"Desc"])->limit(1);
        $this->set(compact('cfex'));
        
    }

    /**
     * View method
     *
     * @param string|null $id Top id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
       
    }
}
