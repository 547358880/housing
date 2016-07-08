<?php
/**
 * Created by PhpStorm.
 * User: xujing
 * Date: 2016/6/29
 * Time: 13:10
 * Description
 */
use Cake\Routing\Router;
use Cake\Core\Configure;

Router::plugin(
    'Website',
    array('path' => '/website'),
    function($routes) {
        $routes->fallbacks('DashedRoute');
    }
);

$oauthPath = Configure::read('OAuth.path');
if (is_array($oauthPath)) {
    Router::scope('/auth', function($routes) use ($oauthPath) {
        $routes->connect(
            '/:provider',
            $oauthPath,
            array('provider' => implode('|', array_keys(Configure::read('OAuth.providers'))))
        );
    });
}