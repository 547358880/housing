<?php
namespace Phetom\Controller;
use Cake\ORM\TableRegistry;
use PhpParser\Node\Stmt\Class_;

class WelcomeController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }

    /*
     * 后台首页
     *
     */
    public function index()
    {
        $userData = $this->Auth->user();                                                        //用户信息
        $configData = TableRegistry::get('Phetom.Configs')->getData();                          //系统配置信息
        $menuData = TableRegistry::get('Phetom.Menus')->getMenu($userData['role_id']);          //获取用户组对应的菜单数据
        $this->set(compact('userData', 'configData', 'menuData'));
    }

    public function main()
    {
        $result = TableRegistry::get('Website.Streets')->getStateCount(0);
        $countData = array();
        for($i = 1;$i<=5;$i++) {
            $val = !isset($result[$i]) ? 0 : $result[$i];
            $countData[$i] = $val;
        }

        $this->set(compact('countData'));
    }
}