<?php
/**
 * Created by PhpStorm.
 * User: xujing
 * Date: 2016/6/23
 * Time: 10:34
 * Description
 */
namespace Weixin\Model\Table;

use Cake\ORM\Table;

class WxMenusTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config); // TODO: Change the autogenerated stub
        $this->table('wx_menus');
        $this->primaryKey('id');
    }
}