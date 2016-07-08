<?php
/**
 * Created by PhpStorm.
 * User: xujing
 * Date: 2016/6/29
 * Time: 13:17
 * Description
 */
namespace Website\Controller;

use Cake\ORM\TableRegistry;

class MapController extends AppController
{
    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
    }

    /*
      * 地图显示
      */
    public function index()
    {
        $this->viewBuilder()->layout('front');
        $areas = TableRegistry::get('Areas')->getTree();
        $items = TableRegistry::get('Items')->getOkData();
        $itemState = TableRegistry::get('Phetom.Items')->itemState();
        $noticeCount = TableRegistry::get('Phetom.Notices')->getNotReadCount($this->Auth->user('id'), 1);
        $noticeNotCount = TableRegistry::get('Phetom.Notices')->getNotReadCount($this->Auth->user('id'), 2);
        $this->set(compact('areas', 'items', 'itemState', 'noticeCount', 'noticeNotCount'));
    }

    /*
     * 获取数据
     */
    public function getData()
    {
        $areaId = $this->request->data('areaId') ?: 0;
        $result = TableRegistry::get('Website.Streets')->getStateCount($areaId);
        $this->echoForAjax($result);
    }
}