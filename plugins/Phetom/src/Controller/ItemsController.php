<?php
namespace Phetom\Controller;
use Cake\ORM\TableRegistry;
use Symfony\Component\Console\Helper\Table;
use Cake\I18n\Time;

/**
 * Items Controller
 *
 * @property \App\Model\Table\ItemsTable $Items
 */
class ItemsController extends AppController
{

    public $paginate = [
        'order' => [
            'Items.ok' => 'asc',
            'Items.created' => 'desc'
        ]
    ];

    public function initialize()
    {
        parent::initialize();
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $conditions = array();
        //项目名称查询
        if (isset($this->request->data['name']) && !empty($this->request->data['name'])) {
            $name = $this->request->data['name'];
            $conditions['Items.name like'] = '%' . $name . '%';
            $this->set('name', $name);
        }

        //项目状态查询
        if (isset($this->request->data['state']) && !empty($this->request->data['state'])) {
            $state = $this->request->data['state'];
            $conditions['Items.state'] = $state;
            $this->set('state', $state);
        }

        //项目完成状态查询
        if (isset($this->request->data['ok']) && !empty($this->request->data['ok'])) {
            $ok = $this->request->data['ok'];
            $conditions['Items.ok'] = $ok;
            $this->set('ok', $ok);
        }

        $page = isset($this->request->data['pageCurrent']) ? $this->request->data['pageCurrent'] : 1;
        $numPerPage = isset($this->request->data['pageSize']) ? $this->request->data['pageSize'] : $this->limit;
        $this->paginate = [
            'order' => [
                'Items.ok' => 'asc',
                'Items.created' => 'desc'
            ],
            'page' => $page,
            'limit' => $numPerPage
        ];

        $query = $this->Items->find()->where($conditions);
        $data = $this->paginate($query);

        $itemStateData = $this->Items->itemState();         //项目状态
        $stateColorData = $this->Items->stateColor();       //项目状态颜色
        $stateOkData = $this->Items->stateOk();             //项目完成状态
        $okColorData = $this->Items->okColor();             //项目完成状态颜色

        $this->set(compact('data', 'page', 'numPerPage', 'itemStateData', 'stateOkData', 'okColorData', 'stateColorData'));
    }

    /**
     * View method
     *
     * @param string|null $id Item id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => ['Flows', 'Streets']
        ]);

        $this->set('item', $item);
        $this->set('_serialize', ['item']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $item = $this->Items->newEntity();
        if ($this->request->is('post')) {
            $item = $this->Items->patchEntity($item, $this->request->data);
            if ($this->Items->save($item)) {
                $item_id = $item->id;
                //保存项目街道数据
                if (!empty($this->request->data['areas'])) {
                    TableRegistry::get('Phetom.Streets')->saveData($item_id, $this->request->data['areas']);
                }

                //保存项目实例信息
                if (!empty($this->request->data['template_id'])) {
                    $saveData['item_id'] = $item_id;
                    $saveData['starttime'] = $this->request->data['starttime'];
                    $saveData['template_id'] = $this->request->data['template_id'];
                    TableRegistry::get('Phetom.Flows')->saveData($item_id, $saveData);
                }
                $this->jp(200, '添加成功!', 'items', true);
            } else {
                $this->jp(300, '添加失败!', 'items', true);
            }
        }

        $areaData = TableRegistry::get('Phetom.Areas')->getArea();              //获取区域街道数据
        $templateData = TableRegistry::get('Phetom.Templates')->getData();      //获取工作流模板

        $stateData = $this->Items->itemState();         //项目状态
        $okData = $this->Items->stateOk();             //项目完成状态

        $this->set(compact('item', 'areaData', 'templateData', 'stateData', 'okData'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Item id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $item = $this->Items->patchEntity($item, $this->request->data);
            if ($this->Items->save($item)) {
                $item_id = $item->id;
                //保存项目街道数据
                if (!empty($this->request->data['areas'])) {
                    TableRegistry::get('Phetom.Streets')->saveData($item_id, $this->request->data['areas']);
                }

                $this->jp(200, '编辑成功!', 'items', true);
            } else {
                $this->jp(300, '编辑失败!', 'items', true);
            }
        }

        $areaData = TableRegistry::get('Phetom.Areas')->getArea();              //获取区域街道数据
        $streetData = TableRegistry::get('Phetom.Streets')->getDataId(array('Streets.item_id'=>$id));     //获取项目街道数据
        $templateData = TableRegistry::get('Phetom.Flows')->getData(array('Flows.item_id'=>$id));

        $stateData = $this->Items->itemState();         //项目状态
        $okData = $this->Items->stateOk();             //项目完成状态

        $this->set(compact('item', 'areaData', 'templateData', 'stateData', 'okData', 'streetData'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Item id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->Items->get($id);
        if ($this->Items->delete($item)) {
            $this->srncDel($id);        //同步删除
            $this->jp(200, '删除成功!', '', false);
        } else {
            $this->jp(300, '删除失败,请重试!', '', false);
        }
    }

    /*
     * 批量删除
     *
     * */
    public function batchDel() {
        $idArr = explode(',', $this->request->query['delids']);
        if($this->Items->deleteAll(array('Items.id in' => $idArr))) {

            foreach($idArr as $item) {
                $this->srncDel($item);
            }

            $this->jp(200, '批量删除成功!', '', false);
        }else{
            $this->jp(300, '批量删除失败,请重试!', '', false);
        }
    }


    /*
     * 同步删除 项目的相关数据
     *
     * */
    public function srncDel($item_id = null) {
        TableRegistry::get('Phetom.Streets')->deleteAll(array('Streets.item_id'=>$item_id));    //同步删除项目街道数据

        $flowModel = TableRegistry::get('Phetom.Flows');
        $flowData = $flowModel->getData(array('Flows.item_id' => $item_id));
        $flowModel->deleteAll(array('Flows.item_id'=>$item_id));        //同步删除项目实例数据

        if (!empty($flowData) && !empty($flowData->id)) {
            TableRegistry::get('Phetom.FlowDetails')->deleteAll(array('FlowDetails.flow_id'=>$flowData->id));   //同步删除项目实例详情数据
        }
    }
}
