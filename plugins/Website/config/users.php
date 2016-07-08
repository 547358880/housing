<?php
/**
 * Created by PhpStorm.
 * User: xujing
 * Date: 2016/6/29
 * Time: 13:23
 * Description
 */

use Cake\Routing\Router;

return array(
    'Users' => array(
        'table' => 'Website.Members',
        'Key' => array(
            'Session' => array(
                'social' => 'User.social'
            )
        ),
        'Social' => array(          //第三方登录
            'login' => true
        )
    ),
    'Auth' => array(
        'loginAction' => array(
            'plugin' => 'Website',
            'controller' => 'Members',
            'action' => 'login'
        ),
        'authenticate' => array(
            'all' => array(
                'userModel' => 'Website.Members'
            ),
            'Form'
        ),
        'sessionKey' => 'Auth.Member'
    ),
    'OAuth' => array(
        'path' => array('plugin' => 'Website', 'controller' => 'Members', 'action' => 'socialLogin', 'prefix' => false),
        'autoLogin' => 'wechat',        //自动登录
        'providers' => array(
            'wechat' => array(          //微信登录
                'className' => 'Website\OAuth2\Client\Provider\Wechat',
                'options' => array(
                    'redirectUri' => Router::fullBaseUrl() . '/auth/wechat'     //跳转的URL
                )
            )
        )
    )
);