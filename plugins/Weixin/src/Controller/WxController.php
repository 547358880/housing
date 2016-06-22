<?php
/**
 * Created by PhpStorm.
 * User: xujing
 * Date: 2016/6/22
 * Time: 15:46
 * Description
 */
namespace Weixin\Controller;

use App\Controller\AppController;

class WxController extends AppController
{
    public $uses = array();

    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->Auth->allow('index');
    }

    public function index()
    {
        $postStr = $this->request->input();
        $this->loadModel('Weixin.WxReply');
        if ($postStr) {
            $data = $this->WxReply->parseData($postStr);
            pr($data);
        }

        die();
    }
}