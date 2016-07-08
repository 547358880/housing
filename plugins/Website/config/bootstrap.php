<?php
/**
 * Created by PhpStorm.
 * User: xujing
 * Date: 2016/6/29
 * Time: 13:22
 * Description
 */
use Cake\Core\Configure;
use Cake\Routing\Router;

Configure::load('Website.users');

// 判断是否是在微信浏览器里
function isWeixinBrowser() {
    $agent = $_SERVER ['HTTP_USER_AGENT'];
    if (! strpos ( $agent, "icroMessenger" )) {
        return false;
    }
    return true;
}