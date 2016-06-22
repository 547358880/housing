<?php

use Cake\Routing\Router;

Router::plugin(
    'Weixin',
    array('path' => '/weixin'),
    function($routes) {
        $routes->fallbacks('DashedRoute');
    }
);