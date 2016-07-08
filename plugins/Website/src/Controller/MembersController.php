<?php
/**
 * Created by PhpStorm.
 * User: xujing
 * Date: 2016/6/29
 * Time: 13:29
 * Description
 */
namespace Website\Controller;

use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;

class MembersController extends AppController
{
    /*
     * 用户中心
     */
    public function center()
    {
        $this->viewBuilder()->layout('front');
        $userInfo = $this->Auth->user();

        $this->set(compact('userInfo'));
    }

    /*
     * 个人中心
     *
     * */
    public function info() {
        $this->viewBuilder()->layout('front');
        $userInfo = $this->Auth->user();

        if ($this->request->is('post')) {
            $member = $this->Members->get($this->request->data['mid'], [
                'contain' => []
            ]);
            $member = $this->Members->patchEntity($member, $this->request->data);
            $this->Members->save($member);
            $this->redirect('website/members/center');
        }

        //获取用户信息
        $memberData = TableRegistry::get('Phetom.Members')->find()
            ->where(array('Members.id' => $userInfo['id']))
            ->first();
        $this->set(compact('memberData'));
    }
    
    /*
     * 用户登录
     */
    public function login()
    {
        $this->viewBuilder()->layout('ajax');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            return $this->_afterIdentifyUser($user);
        }
        if (!$this->request->is('post') && !($this->request->session()->check(Configure::read('Users.Key.Session.social')))) {
            if ($this->Auth->user()) {
                $url = $this->Auth->redirectUrl();
                return $this->redirect('/website/members/center');
            }
        }

        $configData = TableRegistry::get('Phetom.Configs')->getData();      //系统配置信息
        $this->set(compact('configData'));
    }

    /*
     * 第三方登录
     */
    public function socialLogin()
    {
        pr('5345345');
        pr($this->request);
        die();
    }

    /*
     * 登录过后的操作
     */
    protected function _afterIdentifyUser($user)
    {
        if (!empty($user)) {
            $isSocialLogin = $this->request->session()->check(Configure::read('Users.Key.Session.social'));     //保存用户信息
            if ($isSocialLogin) {                   //存在微信请求数据
                //获取用户ID
                $saveData = Hash::merge($this->request->session()->read(Configure::read('Users.Key.Session.social')), array('id' => $user['id']));
                $membersTable = TableRegistry::get('Members');
                $member = $membersTable->newEntity();
                $member = $membersTable->patchEntity($member, $saveData);
                $membersTable->save($member);
                $user = Hash::merge($this->request->session()->read(Configure::read('Users.Key.Session.social')), $user);
                $this->request->session()->delete(Configure::read('Users.Key.Session.social'));
                $this->Auth->redirectUrl('/website/members/index');
            }
            $this->Auth->setUser($user);
            //return $this->redirect($this->Auth->redirectUrl());
            return $this->redirect('/website/map/index');
        }
        return $this->redirect(Configure::read('Auth.loginAction'));
    }

    /*
     * 登出操作
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}