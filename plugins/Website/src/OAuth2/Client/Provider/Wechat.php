<?php

namespace Website\OAuth2\Client\Provider;

use Website\OAuth2\Client\Provider\AppProvider;

class Wechat extends AppProvider
{
    const BASE_WECHAT_URL = "https://open.weixin.qq.com/connect/";
    const BASE_GRAPH_URL = "https://api.weixin.qq.com/sns/";

    public function __construct(array $option)
    {
        parent::__construct($option);
        $this->clientId = 'wxc0a06e50b1432c7b';
        $this->clientSecret = '2ea2ebcca6e3bcef97affaa6e8923dbb';
    }

    public function getBaseAuthorizationUrl()
    {
        return self::BASE_WECHAT_URL . 'oauth2/authorize';
    }

    public function getBaseAccessTokenUrl()
    {
        return self::BASE_GRAPH_URL . 'oauth2/access_token';
    }

    public function getAuthorizationParamters(array $options)
    {
        $options = parent::getAuthorizationParamters($options);
        $options['appid'] = $this->clientId;
        ksort($options);
        return $options;
    }

    public function addParam()
    {
        return '#wechat_redirect';
    }

    /*
     * scope的方式
     */
    public function getDefaultScopes()
    {
        return 'snsapi_userinfo';
    }

    /*
     * 获取access_token
     */
    public function getAccessToken(array $options)
    {
        $params = array(
            'appid' => $this->clientId,
            'secret' => $this->clientSecret,
            'code' => $options['code'],
            'grant_type' => 'authorization_code'
        );
        $query = $this->getAccessTokenQuery($params);
        $url = $this->appendTokenQuery($this->getBaseAccessTokenUrl(), $query);
        $response = $this->getRequest($url);
        return $response;
    }

    /*
     * 获取用户信息
     */
    public function getResourceOwner(array $response)
    {
        $url = self::BASE_GRAPH_URL . 'userinfo?access_token=' . $response['access_token'] . '&openid=' . $response['openid'] . '&lang=zh_CN';
        return $this->getRequest($url);
    }
}

?>