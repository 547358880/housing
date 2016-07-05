<?php
namespace Phetom\Controller;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public $paginate = [
        'order' => [
            'Users.created' => 'desc'
        ]
    ];

    public function initialize()
    {
        parent::initialize();
    }

    /*
     * Users login method
     */
    public function login()
    {
        $this->viewBuilder()->layout('ajax');
        if (!empty($this->request->data)) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect('/phetom/welcome/index');
            }
            $this->Flash->logintip('用户名或密码错误');
        }
        $configData = TableRegistry::get('Phetom.Configs')->getData();      //系统配置信息
        $this->set(compact('configData'));
    }

    /*
     *
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $conditions = array();
        //用户名查询
        if (isset($this->request->data['username']) && !empty($this->request->data['username'])) {
            $username = $this->request->data['username'];
            $conditions['Users.username like'] = '%' . $username . '%';
            $this->set('username', $username);
        }

        //管理用户组查询
        if (isset($this->request->data['role_id']) && !empty($this->request->data['role_id'])) {
            $role_id = $this->request->data['role_id'];
            $conditions['Users.role_id'] = $role_id;
            $this->set('role_id', $role_id);
        }

        $page = isset($this->request->data['pageCurrent']) ? $this->request->data['pageCurrent'] : 1;
        $numPerPage = isset($this->request->data['pageSize']) ? $this->request->data['pageSize'] : $this->limit;
        $this->paginate = [
            'contain' => ['Roles'],
            'page' => $page,
            'limit' => $numPerPage,
            'fields' => ['Users.id', 'Users.username', 'Users.nicheng', 'Users.sex', 'Users.images', 'Users.tel', 'Users.email', 'Users.role_id', 'Users.state', 'Roles.name']
        ];
        $query = $this->Users->find()->where($conditions);
        $data = $this->paginate($query);

        $roleData = TableRegistry::get('Phetom.Roles')->getRole();      //获取用户组

        $this->set(compact('data', 'page', 'numPerPage', 'roleData'));
    }

    /*
     * 添加用户
     *
     * */
    public function add() {
        if ($this->request->is('post')) {
            //检测用户名是否存在
            $conditions['Users.username'] = $this->request->data['username'];
            if ($this->Users->ishave($conditions)) {
                $this->jp(300, '添加失败，用户名称已经存在!', 'users', true);
            }

            $user = $this->Users->newEntity();
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->jp(200, '保存成功!', 'users', true);
            } else {
                $this->jp(300, '保存失败!', 'users', true);
            }
        }

        $roleData = TableRegistry::get('Phetom.Roles')->getRole();      //获取用户组
        $this->set(compact('roleData'));
    }

    /*
     * 编辑用户
     *
     * */
    public function edit($id = null) {
        $data = $this->Users->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            //检测用户名是否存在
            $conditions['Users.id !='] = $this->request->data['id'];
            $conditions['Users.username'] = $this->request->data['username'];
            if($this->Users->ishave($conditions)) {
                $this->jp(300, '编辑失败，用户名称已经存在!', 'users', true);
            }

            if (empty($this->request->data['password'])) {
                unset($this->request->data['password']);
            }

            $data = $this->Users->patchEntity($data, $this->request->data);
            if ($this->Users->save($data)) {
                $this->jp(200, '编辑成功!', 'users', true);
            } else {
                $this->jp(300, '编辑失败!', 'users', true);
            }
        }

        $roleData = TableRegistry::get('Phetom.Roles')->getRole();      //获取用户组
        $this->set(compact('data', 'roleData'));
    }

    /*
     * 删除用户
     *
     * */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $role = $this->Users->get($id);
        if ($this->Users->delete($role)) {
            $this->jp(200, '删除成功!', '', false);
        } else {
            $this->jp(300, '删除失败,请重试!', '', false);
        }
    }
}
