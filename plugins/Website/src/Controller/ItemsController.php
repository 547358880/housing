<?php

namespace Website\Controller;

use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;
use PhpParser\Node\Stmt\Class_;

class ItemsController extends AppController
{
    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->Auth->allow(array('getChildren'));
    }

    /*
     * 项目列表页面
     */
    public function lists()
    {
        $this->viewBuilder()->layout('front');
        $conditions = array();
        if ($areaId = $this->request->query('areaId')) {
            $childAreas = TableRegistry::get('Areas')->getChildren($areaId);
            $childAreas[] = $areaId;
            $conditions['Streets.area_id in'] = $childAreas;
            $this->set('areaId', $areaId);
        }
        if ($areaId = $this->request->data('areaId')) {
            $childAreas = TableRegistry::get('Areas')->getChildren($areaId);
            $childAreas[] = $areaId;
            $conditions['Streets.area_id in'] = $childAreas;
        }
        if ($state = $this->request->query('state')) {
            $conditions['state'] = $state;
            $this->set('state', $state);
        }
        if ($state = $this->request->data('state')) {
            $conditions['state'] = $state;
        }
        $streets = TableRegistry::get('Website.Streets');
        $page = $this->request->data('page') ?: 1;
        $items = $streets->find()
            ->where($conditions)
            ->contain('Items')
            ->order(array('Items.ok' => 'asc', 'Items.created' => 'desc'))
            ->group(array('item_id'))
            ->limit(10)
            ->page($page)
            ->map(function ($row) {
                if (!is_file($row->item->image)) {
                    $row->item->image = 'images/item.png';
                }
                return $row;
            })
            ->toArray();
        $this->set(compact('items'));
        if ($this->request->is('ajax')) {
            $this->viewBuilder()->className('Json');
            $this->set('_serialize', array('items'));
        }
        $areas = TableRegistry::get('Areas')->getTree();
        $itemState = TableRegistry::get('Phetom.Items')->itemState();


        $this->set(compact('areas', 'itemState'));
    }


    /*
     * 项目详细页面
     */
    public function detail($id)
    {
        $this->viewBuilder()->layout('front');
        $item = $this->Items->find()
            ->where(array('id' => $id))
            ->map(function ($row) {
                if (!is_file($row->image)) {
                    $row->image = 'images/item.png';
                }
                return $row;
            })
            ->first();
        if (empty($item)) {
            throw new NotFoundException();
        }

        $this->set(compact('item'));
    }

    /* 项目进度
    */
    public function accordion($id)
    {
        $flows = TableRegistry::get('Phetom.Flows')->getData(array('item_id' => $id));
        //    $flowsId = $flows->id;
        $flowDetails = TableRegistry::get('Phetom.FlowDetails')->find()
            ->where(array('flow_id' => $flows->id, 'level' => 1))
            ->order(array('created' => 'asc'))
            ->toArray();
        $result = $this->_formatFlowDetails($flowDetails, $flows->item->currentParent);
        $parentNodes = json_encode($result['result']);
        $parentIndex = $result['resultIndex'];
        $this->set(compact('parentNodes', 'flows', 'parentIndex'));
        $this->viewBuilder()->layout('front');
    }

    /*
     * ajax查找数据
     */
    public function getChildren()
    {
        if (($parentId = $this->request->data('parentId')) && ($flowsId = $this->request->data('flowsId'))) {
            $flowDetails = TableRegistry::get('Phetom.FlowDetails')->findAllData($flowsId, $parentId);
            $nodes = $this->_formatFlowDetails($flowDetails, $this->request->data('currentChildState'));
            $this->echoForAjax($nodes);
        }
        exit;
    }

    protected function _formatFlowDetails($flowDetails, $nowNode)
    {
        $result = array();
        $i = 0;
        $index = -1;
        foreach ($flowDetails as $item) {
            $result[$i]['id'] = $item->id;
            $result[$i]['name'] = $item->name;
            $result[$i]['endtime'] = date('Y/m/d', strtotime($item->endtime));
            if ($item->id == $nowNode) {
                $index = $i;
            }
            $i++;
        }
        return array('result' => $result, 'resultIndex' => $index);
    }

    /*
     * 图表统计
     */
    public function tongji($type = null)
    {
        $type = !isset($type) ? 'jindu' : $type;
        $this->viewBuilder()->layout('front');

        $result = TableRegistry::get('Website.Streets')->getStateCount(0);
        unset($GLOBALS['children']);

        $countData = array();
        for ($i = 1; $i <= 5; $i++) {
            $val = !isset($result[$i]) ? 0 : $result[$i];
            $countData[$i] = $val;
        }

        $streetModel = TableRegistry::get('Website.Streets');
        $query = TableRegistry::get('Phetom.Areas')->findData(array('parent_id' => 1));
        $areaData = $query->toArray();

        foreach ($areaData as $key => $val) {
            $valData = $streetModel->getStateCount($val->id);
            $valCountData = array();
            for ($i = 1; $i <= 5; $i++) {
                $val = !isset($valData[$i]) ? 0 : $valData[$i];
                $valCountData[$i] = $val;
            }
            $areaData[$key]->count = $valCountData;
            unset($GLOBALS['children']);
        }
        $this->set(compact('type', 'countData', 'areaData'));
    }
}
