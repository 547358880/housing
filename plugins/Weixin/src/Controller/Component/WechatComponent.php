<?php
/**
 * Created by PhpStorm.
 * User: xujing
 * Date: 2016/6/23
 * Time: 8:34
 * Description
 */
namespace Weixin\Controller;

use Cake\Controller\Component;
use Cake\Traits\HttpRequestTrait;
use Cake\Utility\Xml;

class WechatComponent extends Component
{
    use HttpRequestTrait;

    public $controller;
    public $token = 'phetom8765';
    private $_getInfoStatus = false;          //获取信息的状态
    private $_appId;
    private $_appSecret;
    public $data;                      //微信传递的数据

    /*
     *
     */
    public function initialize(array $config)
    {
        parent::initialize($config); // TODO: Change the autogenerated stub
        $this->controller = $this->_registry->getController();
    //    $this->token = isset($config['token']) ? $config['token'] : $this->token;
    //    if (!$this->_getInfoStatus && $this->getInfo($this->token)) {
    //        extract()
    //    }
    }

    /*
     * 数据验证
     */
    public function wxRequestAuth()
    {
        $data = array(
            self::TOKEN,
            $_GET['timestamp'],
            $_GET['nonce']
        );

        sort($data, SORT_STRING);
        $signature = sha1(implode($data));
        if ($signature != $_GET['signature']) {
            exit ;
        }

        $echoStr = $_GET['echostr'];
        if ($echoStr) {
            echo $echoStr;
            exit ;
        }
    }

    /*
     * 解析微信传递的XML数据
     */
    public function parseData($xmlData)
    {
        $this->data = Xml::toArray(Xml::build($xmlData));
        return $this->data['xml'];
    }

    /*
     * 文本回复
     */
    public function replyText($content)
    {
        $msg['Content'] = $content;
    //    $this->_replyData($msg, 'text');
    }

    /*
     * 图文回复
     */
    public function replyNews($articles)
    {

    }
}