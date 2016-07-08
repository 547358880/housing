<?php
/**
 * Created by PhpStorm.
 * User: xujing
 * Date: 2016/6/29
 * Time: 15:03
 * Description: 和微信API交互的类
 */
namespace Website\Controller\Component;

use Cake\Controller\Component;
use App\Controller\Traits\HttpRequestTrait;
use Cake\Routing\Router;

class WxInteractiveComponent extends Component
{
    use HttpRequestTrait;

    const WX_API_URL = "https://api.weixin.qq.com/cgi-bin/";
    private $_appId;
    private $_appsecret;
    private $_isLoad = false;

    /*
     * 微信初始化
     */
    protected function _setupApp()
    {
        $this->_appId = 'wx2669e3f2d8c40979';
        $this->_appsecret = 'b9c3103334a052127815b82c9547c5d7';
    }

    /*
     * 获取accessToken
     */
    public function getAccessToken()
    {

    }

    /*
     * 网页授权
     */
//    public function getOuthUserInfo($controller)
//    {//如果在微信浏览器中
//        if (!$controller->request->query('code')) {
//            //获取code
//            $this->_setupApp();
//            $params = array(
//                'appid' => $this->_appId,
//                'redirect_uri' => Router::url($controller->request->here(false), true),
//                'response_type' => 'code',
//                'scope' => 'snsapi_userinfo',
//                'state' => 'getCode'            //state可存储Session防止重复请求
//            );
//            $url = "https://open.weixin.qq.com/connect/oauth2/authorize?" . http_build_query($params) . "#wechat_redirect";
//            $controller->redirect($url);
//        }
//        if ($controller->request->query('code') && ($controller->request->query('state') == 'getCode')) {
//            //获取accesstoken
//            $this->_setupApp();
//            $params = array(
//                'appid' => $this->_appId,
//                'secret' => $this->_appsecret,
//                'code' => $controller->request->query('code'),
//                'grant_type' => 'authorization_code'
//            );
//            $url = "https://api.weixin.qq.com/sns/oauth2/access_token?" . http_build_query($params);
//            $result = $this->getRequest($url);
//            if (isset($result['errcode'])) {
//                //writeWeixinError('OuthGetAccessToken', $result, $controller);
//            }
//            //获取用户信息
//            $getUserInfoUrl = "https://api.weixin.qq.com/sns/userinfo?access_token=" . $result['access_token'] . "&openid=" . $result['openid'] . "&lang=zh_CN";
//            $userInfo = $this->getRequest($getUserInfoUrl);
//            if (isset($userInfo['errcode'])) {
//                //writeWeixinError('OuthGetUserInfo', $userInfo, $controller);
//            }
//
//            return $userInfo;
//            //保存用户信息
////                $userInfo = ClassRegistry::init('Ucenter.UcenterMember')->saveUserInfoFromWeixin($userInfo);
////                return $userInfo['UcenterMember'];
//        }
//
//    }
}