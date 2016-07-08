<?php

namespace Phetom\Controller;

use App\Controller\AppController as BaseController;

class AppController extends BaseController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', array(
            'authenticate' =>'Form',
            'loginAction' => array(
                'controller' => 'Users',
                'action' => 'login'
            )
        ));

        $this->loadComponent('Yunpian');

        $this->viewBuilder()->layout('ajax');
    }

    /*
     * 页面跳转函数
     */
    protected function jp($status, $info, $navTabId = '', $closeCurrent = true, $forward = '', $dialogid = '', $divid = '') {
        $result = array();
        $result['statusCode'] = $status;
        $result['message'] = $info;
        $result['tabid'] = strtolower($navTabId);
        $result['forward'] = $forward;
        $result['dialogid'] = $dialogid;
        $result['divid'] = $divid;
        $result['forwardConfirm'] = '';
        $result['closeCurrent'] = $closeCurrent;
        header("Content-Type:text/html; charset=utf-8");
        exit(json_encode($result));
    }

}
