<?php
/**
 * Created by PhpStorm.
 * User: xujing
 * Date: 2016/6/22
 * Time: 16:05
 * Description
 */
namespace Weixin\Model\Table;

use Cake\ORM\Table;
use Cake\Utility\Xml;

class WxReplyTable extends Table
{
    /*
     * 微信传递的数据
     */
    protected $data = array();

    /*
     *
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->table('');
    }

    /*
     * 解析微信传递的XML数据
     */
    public function parseData($xmlData)
    {
        $this->data = Xml::toArray(Xml::build($xmlData));
        return $this->data['xml'];
    }
}