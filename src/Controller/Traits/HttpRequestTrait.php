<?php
/**
 * Created by PhpStorm.
 * User: xujing
 * Date: 2016/6/23
 * Time: 9:09
 * Description
 */
namespace App\Controller\Traits;

trait HttpRequestTrait
{
    /*
     *
     */
    public function buildQueryString(array $params)
    {
        return http_build_query($params, null, '&');
    }

    /*
     * 获取getRequest数据
     */
    public function getRequest($url)
    {
        if (function_exists('file_get_contents')) {
            $fileContent = file_get_contents($url);
        } else {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            $fileContent = curl_exec($ch);
            curl_close($ch);
        }
        return json_decode($fileContent, true);
    }

    /*
    * curl请求
    * @param string $url 请求的URL
    * @param array $data 请求的数据
    */
    public function curlPostRequest($url, $data)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result, true);
    }
}