<?php
namespace Website\OAuth2\Client\Provider;

use App\Controller\Traits\HttpRequestTrait;

abstract class AppProvider
{
    use HttpRequestTrait;

    /*
     *
     */
    protected $clientId;

    /*
     *
     */
    protected $clientSecret;

    /*
     *
     */
    protected $redirectUri;

    /*
     * string
     */
    protected $state;


    /*
     * Construct
     */
    public function __construct(array $options = array())
    {
        foreach ($options as $option => $value) {
            if (property_exists($this, $option)) {
                $this->{$option} = $value;
            }
        }
    }

    /*
     * Return the base URL of for authorizing a client
     */
    abstract public function getBaseAuthorizationUrl();

    /*
     * Returns the base URL for requesting an access token
     */
    abstract public function getBaseAccessTokenUrl();

    /*
     * Returns the default scopes used by thie provider
     */
    abstract public function getDefaultScopes();

    /*
     * Returns ths string that should be used to separator scopes when building
     */
    protected function getScopeSeparator()
    {
        return ',';
    }

    /*
     * Returns authorization parameters based on provider options
     */
    protected function getAuthorizationParamters(array $options)
    {
        if (empty($options['state'])) {
            $options['state'] = $this->getRandomState();
        }
        if (empty($options['scope'])) {
            $options['scope'] = $this->getDefaultScopes();
        }
        $options += array('response_type' => 'code');
        if (is_array($options['scope'])) {
            $separator = $this->getScopeSeparator();
            $options['scope'] = implode($separator, $options['scope']);
        }
        $this->state = $options['state'];
        //$options['appid'] = $this->clientId;
        $options['redirect_uri'] = $this->redirectUri;
        return $options;
    }

    /*
    * Builds the authorization URL's query string
    */
    protected function getAuthorizationQuery(array $params)
    {
        return $this->buildQueryString($params);
    }

    /*
     *
     */
    protected function getAccessTokenQuery(array $params)
    {
        return $this->buildQueryString($params);
    }

    /*
     * Appends a query string to a URL
     */
    protected function appendQuery($url, $query)
    {
        $query = trim($query, '?&');
        if ($query) {
            $url = $url . '?' . $query;
        }
        return $url . $this->addParam();
    }

    /*
     * Appends a query string to a URL
     */
    protected function appendTokenQuery($url, $query)
    {
        $query = trim($query, '?&');
        if ($query) {
            return $url . '?' . $query;
        }
        return $url;
    }

    /*
     * 请求URL后面加额外的参数
     */
    protected function addParam()
    {
        return null;
    }

    /*
     * 获取一个随机数
     */
    public function getRandomState()
    {
        return $this->createRandomNum(4);
    }

    /*
     * create a random num
     */
    public function createRandomNum($i)
    {
        $str = "abcdefghijklmnopqrstuvwxyz";
        $finalStr = "";
        for ($j = 0; $j < $i; $j++) {
            $finalStr .= substr($str, rand(0, 25), 1);
        }
        return $finalStr;
    }

    /*
     * Get state
     */
    public function getState()
    {
        return $this->state;
    }

    /*
     * Builds the authorization URL
     */
    public function getAuthorizationUrl(array $options = array())
    {
        $base = $this->getBaseAuthorizationUrl();
        $params = $this->getAuthorizationParamters($options);
        $query = $this->getAuthorizationQuery($params);
        return $this->appendQuery($base, $query);
    }
}
?>