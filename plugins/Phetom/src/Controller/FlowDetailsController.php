<?php
namespace Phetom\Controller;
use Cake\ORM\TableRegistry;

/**
 * FlowDetails Controller
 *
 * @property \App\Model\Table\FlowDetailsTable $FlowDetails
 */
class FlowDetailsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($item_id = null)
    {
        $flowData = TableRegistry::get('Phetom.Flows')->getData(array('Flows.item_id'=>$item_id));
        $data = (!empty($flowData)) ? $this->FlowDetails->findAllData($flowData->id) : array();
        $this->set(compact('item_id', 'data', 'flowData'));
    }

    //菜单查找带回
    public function lookup($item_id = null)
    {
        $flowData = TableRegistry::get('Phetom.Flows')->getData(array('Flows.item_id'=>$item_id));
        $data = (!empty($flowData)) ? $this->FlowDetails->findAllData($flowData->id) : array();
        $this->set(compact('item_id', 'data', 'flowData'));
    }

    /**
     * View method
     *
     * @param string|null $id Flow Detail id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $flowDetail = $this->FlowDetails->get($id, [
            'contain' => ['Flows', 'ParentFlowDetails', 'ChildFlowDetails']
        ]);

        $this->set('flowDetail', $flowDetail);
        $this->set('_serialize', ['flowDetail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($item_id = null)
    {
        $flowDetail = $this->FlowDetails->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['parent_id'] = !empty($this->request->data['parent_id']) ? $this->request->data['parent_id']:0;
            $this->request->data['level'] = $this->request->data['parent_level']+1;
            $flowDetail = $this->FlowDetails->patchEntity($flowDetail, $this->request->data);
            if ($this->FlowDetails->save($flowDetail)) {
                $this->jp(200, '添加成功!', 'flowdetails', true);
            } else {
                $this->jp(300, '添加失败!', 'flowdetails', true);
            }
        }

        $flowData = TableRegistry::get('Phetom.Flows')->getData(array('Flows.item_id'=>$item_id));
        $flow_id = $flowData->id;
        if (empty($flowData)) {
            $saveData['name'] = '';
            $saveData['type'] = '';
            $saveData['item_id'] = $item_id;
            $flow = $this->newEntity();
            $flow = $this->patchEntity($flow, $saveData);
            $flow_id = $flow->id;
        }

        if (isset($this->request->query['id']) && !empty($this->request->query['id'])) {
            $data = $this->FlowDetails->get($this->request->query['id'], [
                'contain' => []
            ]);
            $this->set('data', $data);
        }
        $this->set(compact('item_id', 'flow_id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Flow Detail id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $data = $this->FlowDetails->get($id, [
            'contain' => ['ParentFlowDetails', 'Flows']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->request->data['parent_id'] = !empty($this->request->data['parent_id']) ? $this->request->data['parent_id']:0;
            $this->request->data['level'] = $this->request->data['parent_level']+1;
            $data = $this->FlowDetails->patchEntity($data, $this->request->data);
            if ($this->FlowDetails->save($data)) {
                $this->jp(200, '编辑成功!', 'templatedetails', true);
            } else {
                $this->jp(300, '编辑失败!', 'templatedetails', true);
            }
        }
        $this->set(compact('data'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Flow Detail id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //判断是否存在子栏目
        $conditions['FlowDetails.parent_id'] = $id;
        if ($this->FlowDetails->haveChild($conditions)) {
            $this->jp(300, '删除失败,请先删除所有子流程!', '', false);
        }

        $this->request->allowMethod(['post', 'delete']);
        $flowDetail = $this->FlowDetails->get($id);
        if ($this->FlowDetails->delete($flowDetail)) {
            $this->jp(200, '删除成功!', '', false);
        } else {
            $this->jp(300, '删除失败,请重试!', '', false);
        }
    }

    /*
     * 设置当前项目进度
     *
     * */
    public function setcurrent($item_id = null) {
        $itemData = TableRegistry::get('Phetom.Items')->find()
            ->where(array('Items.id' => $item_id))
            ->first();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $itemModel = TableRegistry::get('Phetom.Items');
            $item = $itemModel->get($item_id, [
                'contain' => []
            ]);
            $update['currentParent'] = $this->request->data['current_parentid'];
            $update['currentChild'] = $this->request->data['current_id'];
            $item = $itemModel->patchEntity($item, $update);
            if ($itemModel->save($item)) {
                $this->jp(200, '设置成功!', '', true);
            }else{
                $this->jp(300, '设置失败!', '', true);
            }
        }


        $flowDetail_id = ($itemData->currentChild == 0) ? $itemData->currentParent : $itemData->currentChild;
        if($flowDetail_id != 0) {
            $data = $this->FlowDetails->get($flowDetail_id, [
                'contain' => ['ParentFlowDetails', 'Flows']
            ]);
            $this->set('data', $data);
        }
        $this->set(compact('itemData', 'item_id'));
    }
}
