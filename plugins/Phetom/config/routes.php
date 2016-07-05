<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::plugin(
    'Phetom',
    ['path' => '/phetom'],
    function (RouteBuilder $routes) {
        $routes->fallbacks('DashedRoute');
    }
);
