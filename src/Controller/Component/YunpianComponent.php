<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/4
 * Time: 16:21
 */

namespace App\Controller\Component;

use Cake\Controller\Component;

class YunpianComponent extends Component
{
    private $apikey = '58fa7006751d7354b06fdbb5cf459a22';
    private $userUrl = 'https://sms.yunpian.com/v2/user/get.json';              //查看账户信息
    private $singleUrl = 'https://sms.yunpian.com/v2/sms/single_send.json';     //单条发送
    private $batchUrl = 'https://sms.yunpian.com/v2/sms/batch_send.json';       //批量发送

    public $template = array(
        'notice' => '【包河区住建局】您好，$project项目$day天$type。如有疑问，请致电咨询。'
    );

    /*
     * 获取账户信息
     *
     * */
    public function getUser() {
        $ch = $this->comm();
        curl_setopt ($ch, CURLOPT_URL, $this->userUrl);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('apikey' => $this->apikey)));
        pr($this->exec($ch));
    }

    /*
     * 批量发送
     *
     * */
    public function batchSend($textData = null ,$telData = null) {
        if (!empty($telData)) {
            $data=array('text' => $textData,'apikey'=> $this->apikey,'mobile'=> $telData);
            $ch = $this->comm();
            curl_setopt ($ch, CURLOPT_URL, $this->batchUrl);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            $this->exec($ch);
        }
    }



    public function comm() {
        $ch = curl_init();
        /* 设置验证方式 */
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:text/plain;charset=utf-8', 'Content-Type:application/x-www-form-urlencoded','charset=utf-8'));

        /* 设置返回结果为流 */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        /* 设置超时时间*/
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        /* 设置通信方式 */
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        return $ch;
    }

    /*
     * 执行
     *
     * */
    public function exec($ch) {
        $json_data = curl_exec($ch);
        $data = json_decode($json_data, true);
        curl_close($ch);
        return $data;
    }

}
