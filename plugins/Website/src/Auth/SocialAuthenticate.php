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
use Cake\Utility\Hash;


class SocialAuthenticate extends BaseAuthenticate
{
    protected $_provider;

    public function __construct(ComponentRegistry $registry, array $config)
    {
        $oauthConfig = Configure::read('OAuth');
        $config = array_merge($config, $oauthConfig);
        parent::__construct($registry, $config);
    }

    protected function _getController()
    {
        return $this->_registry->getController();
    }


    public function authenticate(Request $request, Response $response)
    {
//        pr($request);
//        die('111');
        if (!$user = $this->_authenticate($request)) {
            return false;
        }

        //die('dsadasd');
        //查看是否存在用户
        $this->config('fields.username', 'openid');
        $member = $this->_findUser($user['openid']);
        if (!empty($member)) {
            return $member;
        }
        $request->session()->write(Configure::read('Users.Key.Session.social'), $user); //存储session
        return false;
    }

    /*
     * Get a user bases on information in the request
     */
    public function getUser(Request $request)
    {
//        pr($request);
//        echo '222';
        //pr($request);
    }

    /*
     * Authenticates with OAuth2 provider by getting an access token
     */
    protected function _authenticate(Request $request)
    {
        if (!$this->_validate($request)) {
            return false;
        }

        $provider = $this->provider($request);
        $code = $request->query('code');
        $response = $provider->getAccessToken(compact('code'));
        return compact('token') + $provider->getResourceOwner($response);
    }

    /*
     * Validates OAuth2 request
     */
    protected function _validate(Request $request)
    {
        if (!array_key_exists('code', $request->query) || !$this->provider($request)) {
            return false;
        }

        $session = $request->session();
        $sessionKey = 'oauth2state';
        if ($request->query('state') !== $session->read($sessionKey)) {
            $request->session()->delete($sessionKey);
            return false;
        }
        return true;
    }

    /*
     * Retuan the $request
     */
    public function provider(Request $request) {
        $alias = $request->param('provider') ? : Configure::read('OAuth.autoLogin');
        if (!$alias) {
            return false;
        }
        if (empty($this->_provider)) {
            $this->_provider = $this->_getProvider($alias);
        }

        return $this->_provider;
    }

    /*
     * Instantiates provider object
     * @return \Website\OAuth2\Client\Provider\AbstractProvider
     */
    public function _getProvider($alias)
    {
        if (!$config = $this->config('providers.' . $alias)) {
            return false;
        }
        $class = $config['className'];
        return new $class($config['options']);
    }

    public function unauthenticated(Request $request, Response $response)
    {
        $provider = $this->provider($request);
        if (empty($provider) || $request->query('code')) {
            return null;
        }
        $url = $provider->getAuthorizationUrl();
        $request->session()->write('oauth2state', $provider->getState());
        $this->_getController()->redirect($url);
    }
}