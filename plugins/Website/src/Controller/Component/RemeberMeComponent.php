<?php
/**
 * Created by PhpStorm.
 * User: xujing
 * Date: 2016/6/29
 * Time: 14:14
 * Description
 */
namespace Website\Controller\Component;

use Cake\Controller\Component;
use Cake\Event\Event;

class RemeberMeComponent extends Component
{
    public $components = array('Auth');

    /*
     * 判断用户是否自动授权或存在cookie
     *
     */
    public function beforeFilter(Event $event)
    {
        $user = $this->Auth->user();
        if (!empty($user) || $this->request->action === 'logout' || $this->request->is(array('post', 'put'))) {
            return;
        }
        $user = $this->Auth->identify();
        if (empty($user)) {
            return;
        }
        $this->Auth->setUser($user);
        $url = $this->Auth->redirectUrl();
        return $this->_registry->getController()->redirect($url);
    }
}