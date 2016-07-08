<?php

namespace Website\Controller\Component;

use Cake\Controller\Component;
use Cake\Core\Configure;

class MembersAuthComponent extends Component
{
    public function initialize(array $config)
    {
        parent::initialize($config); // TODO: Change the autogenerated stub
        $this->_initAuth();
        if (Configure::read('Users.Social.login') && isWeixinBrowser()) {
            $this->_loadSocial();
        } 
        $this->_loadRemeberMe();
    }

    /*
     * Load Social Auth object
     */
    protected function _loadSocial()
    {
        $this->_getController()->Auth->config('authenticate', array('Website.Social'), true);
    }

    /*
     * Load RemeberMe Component
     */
    protected function _loadRemeberMe()
    {
        $this->_getController()->loadComponent('Website.RemeberMe');
    }

    protected function _getController()
    {
        return $this->_registry->getController();
    }

    /*
     * 初始化Auth组件
     */
    public function _initAuth()
    {
        $this->_getController()->loadComponent('Auth', Configure::read('Auth'));
        $this->_getController()->Auth->sessionKey = Configure::read('Auth.sessionKey');
        $this->_getController()->Auth->allow(array(
            'login',
            'logout',
        //    'socialLogin'
        ));
    }
}

?>