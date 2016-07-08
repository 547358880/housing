<?php
/**
 * Created by PhpStorm.
 * User: xujing
 * Date: 2016/6/29
 * Time: 13:40
 * Description: 第三方登录
 */
namespace Website\Auth;

use Cake\Auth\BaseAuthenticate;
use Cake\Core\Configure;
use Cake\Network\Request;
use Cake\Network\Response;
use Cake\Controller\ComponentRegistry;

class WeixinAuthenticate extends BaseAuthenticate
{

    /*
     * Get the controller
     */
    protected function _getController()
    {
        return $this->_registry->getController();
    }

    /*
     *
     */
    public function authenticate(Request $request, Response $response)
    {
        if (isWeixinBrowser()) {                            //在微信浏览器中
            $data = $request->session()->read(Configure::read('Users.Key.Session.social'));
            if (!empty($data)) {
                $request->session()->delete(Configure::read('Users.Key.Session.social'));
                return $data;
            } else {
                $user = $this->_getController()->loadComponent('Website.WxInteractive')->getOuthUserInfo();
                $this->config('fields.username', 'openid');
                $member = $this->_findUser($user['openid']);
                if ($user) {                    //存在用户
                    return $member;
                } else {                        //不存在用户
                    $request->session()->write(Configure::read('Users.Key.Session.social'), $user);     //缓存微信过来的用户信息
                }
            }
        }
        return false;
    }
}