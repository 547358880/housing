<?php
/**
 * Created by PhpStorm.
 * User: xujing
 * Date: 2016/6/23
 * Time: 9:53
 * Description
 */
namespace Weixin\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class WxMenusController extends AppController
{
    public function index()
    {
        $wxMenu = $this->WxMenus->newEntity();
        pr($wxMenu);
        die();
    }

    /*
     * 菜单添加
     */
    public function add()
    {
        $wxMenu = $this->WxMenus->newEntity();
        pr($wxMenu);
        die();

    }
}